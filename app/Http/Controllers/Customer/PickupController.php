<?php

namespace App\Http\Controllers\Customer;

use App\Pickup;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PickupController extends Controller
{
    public function index()
    {
        return view('customers.pickup.index');
    }

    public function store()
    {
        $data = request()->validate([
            'pickup_date' => 'required',
            'pickup_location' => 'required|string|max:255',
            'receiver_name' => 'required|max:100|regex:/^[a-zA-Z ]+$/',
            'receiver_email' => 'required|email',
            'receiver_phone' => 'required|phone:PH',
            'receiver_location' => 'required|string|max:255',
        ], [
            'receiver_name.regex' => 'The :attribute field can only contain letters.',
            'receiver_phone.phone' => 'The receiver contact number field contains an invalid number.',
        ]);

        auth()->user()->pickups()->create($data);

        return redirect()->route('customer.pickup.store')->with('success', 'Pickup has been successfully added.');
    }
}
