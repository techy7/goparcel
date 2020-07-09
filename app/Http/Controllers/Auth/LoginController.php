<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        return route('customer.dashboard');
        // if (auth()->user()->hasRole('Super Admin')) 
        // {
        //     return route('admin.dashboard.index');
        // } 
        // elseif (auth()->user()->hasRole('User')) 
        // {
        //     return route('admin.users.index');
        // } 
        // elseif (auth()->user()->hasRole('Student')) 
        // {
        //     return route('students-profile.index', auth()->user()->id);
    }
    

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
}
