<?php

namespace App\Http\Controllers\Website;

use App\Helpers\Mails\Mailer;
use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        return view('site.welcome', []);
    }

    public function register(Request $request)
    {
        if (!is_null(Auth::user())) {
            return redirect()->route('voyager.dashboard');
        }
        return view('site.register.index', []);
    }

    public function doRegister(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'confirm_password' => 'required',
            'site_id' => 'required|unique:sites',
        ]);

        $user = $this->createUser($request);

        $domainManager = new DomainController();

        $domainManager->registerDnsZone($request);

        $site = new Site();
        $site->site_id = $request->site_id;
        $site->owner_id = $user->id;
        $site->save();
        dd($user);

        Auth::login($user, true);

        
        $mailer = new Mailer($user);
        $mailer->sendRegistrationEmail([]);
        
        return $this->redirectTo();
    }

    /*
     * Preempts $redirectTo member variable (from RedirectsUsers trait)
     */
    public function redirectTo()
    {
        return redirect()->route('voyager.dashboard');
    }

    /**
     * Get the administrator role, create it if it does not exists.
     *
     * @return mixed
     */
    protected function getUserRole()
    {
        $role = Voyager::model('Role')->firstOrNew([
            'name' => 'user',
        ]);

        if (!$role->exists) {
            $role->fill([
                'display_name' => 'Normal User',
            ])->save();
        }

        return $role;
    }

    /**
     * Get or create user.
     *
     * @param bool $create
     *
     * @return \App\User
     */
    protected function createUser(Request $request)
    {
        $model = Auth::guard(app('VoyagerGuard'))->getProvider()->getModel();
        $model = Str::start($model, '\\');

        $name = $request->name;
        $password = $request->password;
        $confirmPassword = $request->confirm_password;
        $email = $request->email;

        $user = call_user_func($model . '::forceCreate', [
            'name' => $name,
            'email' => $email,
            'password' => \Hash::make($password),
        ]);

        // the user not returned
        if (!$user) {
            exit;
        }

        // Get or create role
        $role = $this->getUserRole();

        // Get all permissions
        $permissions = Voyager::model('Permission')->all();

        // Assign all permissions to the admin role
        $role->permissions()->sync(
            $permissions->pluck('id')->all()
        );

        // Ensure that the user is admin
        $user->role_id = $role->id;
        $user->save();

        return $user;
    }
}
