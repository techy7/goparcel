<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        return view('admin.users-and-access-roles.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.users-and-access-roles.permissions.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|max:100|unique:permissions,name',
            'description' => 'required|max:300'
        ], [
            'name.required' => 'This field is required.',
            'description.required' => 'This field is required.',
        ]);

        $permission = Permission::create($data);

        return redirect()->route('admin.permissions')->with('success', $permission->name . ' Permission has been successfully added.');
    }

    public function edit(Permission $permission)
    {
        return view('admin.users-and-access-roles.permissions.edit', compact('permission'));
    }

    public function update(Permission $permission)
    {
        $data = request()->validate([
            'name' => 'required|max:100|unique:permissions,name,'.$permission->id,
            'description' => 'required|max:300'
        ], [
            'name.required' => 'This field is required.',
            'description.required' => 'This field is required.',
        ]);

        $permission->update($data);

        return redirect()->route('admin.permissions')->with('update', $permission->name . ' Permission has been successfully updated.');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('admin.permissions')->with('delete', $permission->name . ' Permission has been successfully deleted.');
    }
}