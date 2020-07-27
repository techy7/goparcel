<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Rules\same_email;
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
            'username' => ['required', 'string', 'min:5', 'max:20', 'unique:users'],
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:30', 'unique:users'],
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

        $data['password'] = Hash::make(request('password'));

        $user = User::create($data);

        DB::table('model_has_roles')->where('model_id', $user->id)->delete();

        $user->assignRole(request('roles'));

        return redirect()->route('admin.users')->with('success', $user->name . ' User has been successfully added.');
    }

    public function edit(User $user)
    {
        $userDatas = $user->first();

        $roles = Role::all();

        $nonCustomerRoles = $roles->reject(function ($role, $key) {
            return $role->name == 'Customer';
        });

        $userRoles = DB::table("model_has_roles")->where('model_id', $userDatas->id)
            ->pluck('model_has_roles.role_id', 'model_has_roles.role_id')
            ->all();

        return view('admin.users-and-access-roles.users.edit', compact('userDatas', 'nonCustomerRoles', 'userRoles'));
    }

    public function update(User $user)
    {
        $userDatas = $user->first();

        dd($userDatas);

        $data = request()->validate([
            'username' => ['required', 'string', 'min:5', 'max:20', 'unique:users'],
            'name' => 'required|string|max:100|regex:/^[a-zA-Z ]+$/',
            'email' => 'required|email|unique:users,email,'.$userDatas->id,
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

        $userDatas->update($data);

        DB::table('model_has_roles')->where('model_id', $userDatas->id)->delete();

        $userDatas->assignRole(request('roles'));

        return redirect()->route('admin.users.index')->with('update', $user->name . ' User has been successfully updated.');
    }

    public function destroyConfirmation(User $user)
    {
        $userDatas = $user->first();
        dd($userDatas->id);

        $userDetails = $user->findOrFail($userDatas->id);

        dd($userDetails->email);

        return view('admin.users-and-access-roles.users.confirmation', compact('userDatas'));
    }

    public function destroy(User $user)
    {
        $userDatas = $user->first();
        
        $data = request()->validate([
            'email' => ['required', new same_email($userDatas->email)]
        ], [
            'email.required' => 'This field is required.'
        ]);

        $userDatas->delete();

        return redirect()->route('admin.users', $userDatas->id)->with('delete', $user->name . ' User has been successfully deleted.');
    }
}
