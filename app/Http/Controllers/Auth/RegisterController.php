<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected function redirectTo()
    {
        if (auth()->user()->hasRole('Super Admin'))
        {
            return route('admin.dashboard.index');
        }
        elseif (auth()->user()->hasRole('User'))
        {
            return route('admin.users.index');
        }
        elseif (auth()->user()->hasRole('Customer'))
        {
            return route('customer.dashboard', auth()->user()->username);
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'min:5', 'max:20', 'unique:users'],
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:30', 'unique:users'],
            'm_number' => ['required', 'phone:PH'],
            'address' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'numeric', 'max:4'],
            'city' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string', 'min:8', 'max:16', 'confirmed'],
        ],[
            'username.required' => __('auth.error_required'),
            'username.unique' => __('auth.error_username_already_taken'),
            'name.required' => __('auth.error_required'),
            'email.required' => __('auth.error_required'),
            'email.email' => __('auth.error_invalid_email'),
            'email.unique' => __('auth.error_email_already_taken'),
            'm_number.required' => __('auth.error_required'),
            'm_number.phone' => __('auth.error_invalid_phone'),
            'address.required' => __('auth.error_required'),
            'postal_code.required' => __('auth.error_required'),
            'city.required' => __('auth.error_required'),
            'password.required' => __('auth.error_required'),
            'password.confirmed' => __('auth.error_password_not_match'),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'm_number' => preg_replace('~\D~', '', $data['m_number']),
            'address' => $data['address'],
            'postal_code' => $data['postal_code'],
            'city' => $data['city'],
            'state' => config('location.PH_cities_states')[$data['city']],
            'country' => 'Philippines',
            'roles' => $data['roles'],
            'password' => Hash::make($data['password']),
        ]);

        return $user->assignRole(request('roles'));

    }
}
