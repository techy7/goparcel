<?php

namespace App\Http\Controllers\Customer;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('customers.account.index', compact('user'));
    }

    public function edit(User $user)
    {
        $user = auth()->user();
        
        return view('customers.account.edit', compact('user'));
    }

    public function update(User $user)
    {
        $user = auth()->user();

        $data = request()->validate([
            'name' => 'required|string|max:100|regex:/^[a-zA-Z ]+$/',
            // 'email' => 'required|email|unique:users,email,'.$user->id,
            'm_number' => ['required', 'phone:PH'],
            'address' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'numeric', 'min:999', 'max:9999'],
            'city' => ['required', 'string', 'max:100'],
            'profile_picture' => ['image']
        ], [
            'name.required' => 'This field is required.',
            'name.regex' => 'The first name field can only contain letters.',
            // 'password.same' => 'The password field and confirm password field must match.',
            'm_number.required' => 'This field is required.',
            'm_number' => 'The mobile number field contains an invalid number.',
            'profile_picture.image' => 'The profile picture should be an image.'
        ]);


        if (request('profile_picture')) {
            $avatar = request()->file('profile_picture');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(50,50)->save(public_path('/uploads/avatars/'.$filename));
            $data['profile_picture']  = $filename;
        }

        // if (request('profile_picture')) {
        //     $imagePath = request('profile_picture')->store('uploads/images/customers/original', 'public');
        //     $imageMerge = ['image' => $imagePath];
        //     $data['profile_picture'] = $imagePath;
        // }

        // if (request('profile_picture')) {
        //     $imagePath = request('profile_picture')->store('uploads/images/customers/avatar', 'public');
        //     $image = Image::make(public_path("storage/{$imagePath}"))->fit(32, 32);
        //     //$image = Image::make(request()->file('profile_picture')->getRealPath())->fit(32, 32);
        //     $image->save();
        //     $imageMerge = ['image' => $imagePath];
        //     $data['profile_picture'] = $imagePath;
        // }

        // if ($data['password'] != $user->password) {
        //     $data['password'] = Hash::make(request('password'));
        // } elseif ($data['password'] == $user->password) {
        //     $data['password'] = request('password');
        // }

        // dd(isset($data['profile_picture']) );
        $updateData = [
            'name' => Str::of($data['name'])->trim()->title(),
            // 'email' => Str::of($data['email'])->trim()->lower(),
            'profile_picture' => isset($data['profile_picture']) ? $data['profile_picture'] : null,
            'm_number' => preg_replace('~\D~', '', $data['m_number']),
            'address' => Str::of($data['address'])->trim()->title(),
            'postal_code' => $data['postal_code'],
            'city' => Str::of($data['city'])->trim()->title(),
            'state' => config('location.PH_cities_states')[$data['city']],
            'country' => 'Philippines',
        ];

        // $imageMerge = [
        //     'profile_picture' => $data['profile_picture'] ?? $user->profile_picture
        // ];

        // $user->update(array_merge(
        //     $updateData,
        //     // $imageMerge ?? []
        // ));
           
        $user->update($updateData);

        return redirect()->route('customer.account', $user->id)->with('update', 'Your profile has been successfully updated.');
    }
}
