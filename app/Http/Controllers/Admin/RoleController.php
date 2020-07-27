<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('admin.users-and-access-roles.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('admin.users-and-access-roles.roles.create', compact('permissions'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|max:100|unique:roles,name',
            'description' =>'required|max:300',
            'permission' => 'required'
        ], [
            'name.required' => 'This field is required.',
            'description.required' => 'This field is required.',
            'description.required' => 'This field is required.',
        ]);

        $role = Role::create([
            'name' => request('name'),
            'description' => request('description')
        ]);

        $role->syncPermissions(request('permission'));

        return redirect()->route('admin.roles')->with('success', $role->name . ' Access Role has been successfully added.');
    }

    public function show(Role $role)
    {
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id", $role->id)
            ->get();

        return view('admin.users-and-access-roles.roles.show', compact('role', 'rolePermissions'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();

        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $role->id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('admin.users-and-access-roles.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Role $role)
    {
        $data = request()->validate([
            'name' => 'required|max:100|unique:roles,name,'.$role->id,
            'description' => 'required|max:300',
            'permission' => 'required'
        ], [
            'name.required' => 'This field is required.',
            'description.required' => 'This field is required.',
            'description.required' => 'This field is required.',
        ]);

        $role->name = request('name');
        $role->description = request('description');
        $role->syncPermissions(request('permission'));
        $role->save();

        return redirect()->route('admin.roles')->with('update', $role->name . ' Access Role has been successfully updated.');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('admin.roles')->with('delete', $role->name . ' Access Role has been successfully deleted.');
    }
}
