<?php

namespace App\Http\Controllers\Customer;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index()
    {
        return view('customers.account.index');
    }

    public function edit(User $user)
    {
        return view('customers.account.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'name' => 'required|max:100|regex:/^[a-zA-Z ]+$/',
            // 'password' => 'required|same:confirm-password|min:8',
            'm_number' => 'required|phone:PH',
            'address' => 'max:255',
        ], [
            'name.required' => 'This field is required.',
            'name.regex' => 'The first name field can only contain letters.',
            // 'password.same' => 'The password field and confirm password field must match.',
            'm_number.required' => 'This field is required.',
            'm_number' => 'The mobile number field contains an invalid number.',
        ]);

        // if ($data['password'] != $user->password) {
        //     $data['password'] = Hash::make(request('password'));
        // } elseif ($data['password'] == $user->password) {
        //     $data['password'] = request('password');
        // }

        $user->update($data);

        return redirect()->route('customer.account.index', $user->id)->with('update', 'Your profile has been successfully updated.');
    }
}