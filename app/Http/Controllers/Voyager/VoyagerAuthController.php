<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\Controller;

class VoyagerAuthController extends Controller
{
    use AuthenticatesUsers;

    public function login()
    {
        if ($this->guard()->user()) {
            return redirect()->route('voyager.dashboard');
        }
        return Voyager::view('voyager::login');
    }

    public function postLogin(Request $request)
    {
        $this->validateLogin($request);
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->credentials($request);

        if ($this->guard()->attempt($credentials, $request->has('remember'))) {
            return $this->sendLoginResponse($request);
        }
        
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /*
     * Preempts $redirectTo member variable (from RedirectsUsers trait)
     */
    public function redirectTo()
    {
        return route('voyager.dashboard');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard(app('VoyagerGuard'));
    }
}
