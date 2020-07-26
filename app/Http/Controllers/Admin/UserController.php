<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

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
}
