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

        $packages = Package::all();
        
        return view('customers.pickup.index', compact('productTypes', 'packages'));
    }

    public function store()
    {
        $pickupData = request()->validate([
            'pickup_date' => 'required',
            'pickup_address' => 'required|string|max:255',
            'pickup_city' => 'required|string|max:255',
            // 'pickup_state' => 'required|string|max:255',
            'pickup_postal_code' => 'required|integer',
            'pickup_country' => 'required|string|max:255',
            'receiver_name' => 'required|max:100|regex:/^[a-zA-Z ]+$/',
            'receiver_email' => 'required|email',
            'receiver_phone' => 'required|phone:PH',
            'receiver_address' => 'required|string|max:255',
            'receiver_city' => 'required|string|max:255',
            // 'receiver_state' => 'required|string|max:255',
            'receiver_postal_code' => 'required|string|max:255',
            'receiver_country' => 'required|string|max:255',
            'package_id' => 'required|integer',
            'package_length' => 'nullable|integer',
            'package_width' => 'nullable|integer',
            'package_height' => 'nullable|integer',
            'package_amount' => 'nullable|integer', // eto yung Grand Total ng amount magagamit ito sa Own Packaging kapag sobra yung kg
        ], [
            'receiver_name.regex' => 'The :attribute field can only contain letters.',
            'receiver_phone.phone' => 'The receiver contact number field contains an invalid number.',
        ]);

        $pickup = auth()->user()->pickups()->create([
            'pickup_date' => request('pickup_date'),
            'pickup_address' => request('pickup_address'),
            'pickup_city' => $pickupData['pickup_city'],
            'pickup_state' => config('location.PH_cities_states')[$pickupData['pickup_city']],
            'pickup_postal_code' => request('pickup_postal_code'),
            'pickup_country' => request('pickup_country'),
            'receiver_name' => request('receiver_name'),
            'receiver_email' => request('receiver_email'),
            'receiver_phone' => request('receiver_phone'),
            'receiver_address' => request('receiver_address'),
            'receiver_city' => $pickupData['receiver_city'],
            'receiver_state' => config('location.PH_cities_states')[$pickupData['receiver_city']],
            'receiver_postal_code' => request('receiver_postal_code'),
            'receiver_country' => request('receiver_country'),
            'package_id' => request('package_id'),
            'package_length' => $pickupData['package_length'],
            'package_width' => $pickupData['package_width'],
            'package_height' => $pickupData['package_height'],
            'package_amount' => $pickupData['package_amount'],
        ]);
        // $pickup = auth()->user()->package()->pickups()->create($pickupData);

        // For second table save
        // $pickupForeign = Pickup::find($pickup->id);

        // $packageData = request()->validate([
        //     'weight' => '',
        //     'amount' => '',
        // ]);

        // $pickupForeign->package()->create($packageData);

        return redirect()->route('customer.pickup.store', auth()->user()->username)->with('success', 'Pickup has been successfully added.');
    }
}
