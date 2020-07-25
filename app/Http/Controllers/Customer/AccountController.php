<?php

namespace App\Http\Controllers\Customer;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class AccountController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('customers.account.index', compact('user'));
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
            'profile_picture' => 'image',
        ], [
            'name.required' => 'This field is required.',
            'name.regex' => 'The first name field can only contain letters.',
            // 'password.same' => 'The password field and confirm password field must match.',
            'm_number.required' => 'This field is required.',
            'm_number' => 'The mobile number field contains an invalid number.',
            'profile_picture.image' => 'The profile picture should be an image.'
        ]);

        if (request('profile_picture')) {
            $imagePath = request('profile_picture')->store('uploads/images/customers/original', 'public');
            $imageMerge = ['image' => $imagePath];
            $data['profile_picture'] = $imagePath;
        }

        if (request('profile_picture')) {
            $imagePath = request('profile_picture')->store('uploads/images/customers/avatar', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(32, 32);
            $image->save();
            $imageMerge = ['image' => $imagePath];
            $data['profile_picture'] = $imagePath;
        }

        // if ($data['password'] != $user->password) {
        //     $data['password'] = Hash::make(request('password'));
        // } elseif ($data['password'] == $user->password) {
        //     $data['password'] = request('password');
        // }

        $user->update(array_merge(
            $data,
            $imageMerge ?? []
        ));

        return redirect()->route('customer.account', $user->id)->with('update', 'Your profile has been successfully updated.');
    }
}
