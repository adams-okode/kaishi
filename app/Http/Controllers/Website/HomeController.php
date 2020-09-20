<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;


class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('site.welcome', []);
    }

    public function register(Request $request)
    {
        return view('site.register.index', []);
    }

    public function doRegister(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('site.front.register')
                ->withErrors($validator)
                ->withInput();
        }
        
        $this->createUser($request);

    }

    /**
     * Get the administrator role, create it if it does not exists.
     *
     * @return mixed
     */
    protected function getAdministratorRole()
    {
        $role = Voyager::model('Role')->firstOrNew([
            'name' => 'admin',
        ]);

        if (!$role->exists) {
            $role->fill([
                'display_name' => 'Administrator',
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
        $email = $request->email;

        $model = Auth::guard(app('VoyagerGuard'))->getProvider()->getModel();
        $model = Str::start($model, '\\');

        $name = $request->name;
        $password = $request->password;
        $confirmPassword = $request->confirm_password;

        return call_user_func($model . '::forceCreate', [
            'name' => $name,
            'email' => $email,
            'password' => \Hash::make($password),
        ]); 
    }
}
