<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Rules\same_email;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $userBackends = User::all();

        $users = User::with('roles')->where('id', '>', 5)->latest()->get();

        $nonCustomers = $userBackends->reject(function ($user, $key) {
            return $user->hasRole('Customer');
        });

        return view('admin.users-and-access-roles.users.index', compact('nonCustomers'));
    }

    public function create()
    {
        $roles = Role::all();

        $nonCustomerRoles = $roles->reject(function ($role, $key) {
            return $role->name == 'Customer';
        });

        return view('admin.users-and-access-roles.users.create', compact('nonCustomerRoles'));
    }

    public function store()
    {
        $data = request()->validate([
            'username' => ['required', 'string', 'min:5', 'max:100', 'unique:users'],
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:150', 'unique:users'],
            'm_number' => ['required', 'phone:PH'],
            'address' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'numeric', 'min:999', 'max:9999'],
            'city' => ['required', 'string', 'max:100'],
            'password' => ['required', 'min:6', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 'confirmed'],
            'roles' => 'required',
        ], [
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
            'password.regex' => __('auth.error_password_invalid'),
            'password.confirmed' => __('auth.error_password_not_match'),
        ]);

        $user = User::create([
            'username' => Str::of($data['username'])->trim()->lower(),
            'name' => Str::of($data['name'])->trim()->title(),
            'email' => Str::of($data['email'])->trim()->lower(),
            'm_number' => preg_replace('~\D~', '', $data['m_number']),
            'address' => Str::of($data['address'])->trim()->title(),
            'postal_code' => $data['postal_code'],
            'city' => Str::of($data['city'])->trim()->title(),
            'state' => config('location.PH_cities_states')[$data['city']],
            'country' => 'Philippines',
            'roles' => $data['roles'],
            'password' => Hash::make($data['password']),
        ]);

        DB::table('model_has_roles')->where('model_id', $user->id)->delete();

        $user->assignRole(request('roles'));

        return redirect()->route('admin.users')->with('success', $user->name . ' User has been successfully added.');
    }

    public function edit(User $user)
    {
        $userData = $user->findOrFail(request()->route('username'));

        $roles = Role::all();

        $nonCustomerRoles = $roles->reject(function ($role, $key) {
            return $role->name == 'Customer';
        });

        $userRoles = DB::table("model_has_roles")->where('model_id', $userData->id)
            ->pluck('model_has_roles.role_id', 'model_has_roles.role_id')
            ->all();

        // dd($userRoles);

        return view('admin.users-and-access-roles.users.edit', compact('userData', 'nonCustomerRoles', 'userRoles'));
    }

    public function update(User $user)
    {
        $userData = $user->findOrFail(request()->route('username'));

        $data = request()->validate([
            'username' => 'required|string|min:5|max:20|unique:users,username,'.$userData->id,
            'name' => 'required|string|max:100|regex:/^[a-zA-Z ]+$/',
            'email' => 'required|email|unique:users,email,'.$userData->id,
            'm_number' => ['required', 'phone:PH'],
            'address' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'numeric', 'min:999', 'max:9999'],
            'city' => ['required', 'string', 'max:100'],
            // Uncomment if needed
            // 'password' => ['required', 'min:6', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/', 'confirmed'],
            'roles' => 'required',
        ], [
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
            // Uncomment if needed
            // 'password.required' => __('auth.error_required'),
            // 'password.regex' => __('auth.error_password_invalid'),
            // 'password.confirmed' => __('auth.error_password_not_match'),
        ]);

        $userData->update([
            'username' => Str::of($data['username'])->trim()->lower(),
            'name' => Str::of($data['name'])->trim()->title(),
            'email' => Str::of($data['email'])->trim()->lower(),
            'm_number' => preg_replace('~\D~', '', $data['m_number']),
            'address' => Str::of($data['address'])->trim()->title(),
            'postal_code' => $data['postal_code'],
            'city' => Str::of($data['city'])->trim()->title(),
            'state' => config('location.PH_cities_states')[$data['city']],
            'country' => 'Philippines',
            'roles' => $data['roles'],
            // Uncomment if needed
            // 'password' => Hash::make($data['password']),
        ]);

        DB::table('model_has_roles')->where('model_id', $userData->id)->delete();

        $userData->assignRole(request('roles'));

        return redirect()->route('admin.users')->with('update', $userData->name . ' User has been successfully updated.');
    }

    public function destroyConfirmation(User $user)
    {
        $userData = $user->findOrFail(request()->route('username'));

        return view('admin.users-and-access-roles.users.confirmation', compact('userData'));
    }

    public function destroy(User $user)
    {
        $userData = $user->findOrFail(request()->route('username'));
        
        $data = request()->validate([
            'email' => ['required', new same_email($userData->email)]
        ], [
            'email.required' => 'This field is required.'
        ]);

        $userData->delete();

        return redirect()->route('admin.users', $userData->id)->with('delete', $userData->name . ' User has been successfully deleted.');
    }
}
