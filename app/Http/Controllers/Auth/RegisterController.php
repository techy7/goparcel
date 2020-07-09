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
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'm_number' => ['required', 'phone:PH'],
            'address' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            // 'first_name.required' => 'This field is required.',
            // 'first_name.regex' => 'The first name field can only contain letters.',
            // 'last_name.required' => 'This field is required.',
            // 'last_name.regex' => 'The last name field can only contain letters.',
            // 'email.required' => 'This field is required.',
            'm_number.required' => 'This field is required.',
            'm_number' => 'The mobile number field contains an invalid number.',
            // 'age.min' => 'The age must be at least 3 years old.',
            // 'age.max' => 'The age may not be greater than 30 years old.',
            // 'gender.not_in' => 'The gender field is required.',
            // 'dob.required' => 'The birthday field is required.',
            // 'dob.before' => 'The date of birth must be at least 3 years old.',
            // 'guardian_name.regex' => 'The guardian name field can only contain letters.',
            // 'educational_level_id.not_in' => 'The educational level field is required.',
            // 'password.same' => 'The password field and confirm password field must match.'
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
        return User::create([
            'username' => $data['username'],
            'm_number' => $data['m_number'],
            'address' => $data['address'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
