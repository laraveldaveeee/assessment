<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Http\Request;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }


    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        return redirect('/login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);
        $username = $request->get($this->username());
        $user = User::where($this->username(), $username)->first();
        return $this->sendFailedLoginResponse($request);
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        return $credentials;
    }

     protected function authenticated(Request $request, $user)
     {
        if ($user->isAdmin()) {
            return redirect('/home');
        }
        if ($user->isChiefEngineer()) {
            return redirect('/chief-engineer/home');
        }
        if ($user->isAccessor()) {
            return redirect('/applicants');
        }
        if ($user->isCashier()) {
            if ($user->id == 9) { // Return login to Dianne Garcia 
                return redirect('/cashier/home')->with('alert-login-dsg', '');
            } 
            //else return login to Marivic Gumalo
            return redirect('/cashier/home')->with('alert-login-mog', '');
        }
       
        if ($user->isAccounting()) {
            return redirect('/accounting/home');
        }
        if ($user->isProcessor()) {
            return redirect('/processor/home');
        }
        if ($user->isAdminAide()) {
            return redirect('/admin-aide/home');
        }
     }
}
