<?php

namespace App\Http\Controllers\Customer;

use App\Type;
use App\User;
use App\Pickup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Package;

class PickupController extends Controller
{
    public function index()
    {
        $productTypes = Type::all();
        
        return view('customers.pickup.index', compact('productTypes'));
    }

    public function store()
    {
        $pickupData = request()->validate([
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

        $pickup = auth()->user()->pickups()->create($pickupData);

        $pickupForeign = Pickup::find($pickup->id);

        $packageData = request()->validate([
            'weight' => '',
            'amount' => '',
        ]);

        $pickupForeign->package()->create($packageData);

        return redirect()->route('customer.pickup.store')->with('success', 'Pickup has been successfully added.');
    }
}
