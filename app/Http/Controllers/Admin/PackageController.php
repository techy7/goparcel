<?php

namespace App\Http\Controllers\Admin;

use App\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::all();

        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|max:100|unique:packages,name',
            'description' => 'required|max:300',
            'amount' => 'required|max:4'
        ], [
            'name.required' => 'This field is required.',
            'description.required' => 'This field is required.',
            'amount.required' => 'This field is required.',
        ]);

        $package = Package::create($data);

        return redirect()->route('admin.packages')->with('success', $package->name . ' Package has been successfully added.');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Package $package)
    {
        $data = request()->validate([
            'name' => 'required|max:100|unique:packages,name,'.$package->id,
            'description' => 'required|max:300',
            'amount' => 'required|max:4'
        ], [
            'name.required' => 'This field is required.',
            'description.required' => 'This field is required.',
            'amount.required' => 'This field is required.',
        ]);

        $package->update($data);

        return redirect()->route('admin.packages')->with('update', $package->name . ' Package has been successfully updated.');
    }

    public function destroy(Package $package)
    {
        $package->delete();

        return redirect()->route('admin.packages')->with('delete', $package->name . ' Package has been successfully deleted.');
    }
}
