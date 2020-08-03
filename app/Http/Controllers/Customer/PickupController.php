<?php

namespace App\Http\Controllers\Customer;

use App\Type;
use App\User;
use App\Pickup;
use App\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\CustomerPickupDetails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class PickupController extends Controller
{
    public function index()
    {
        $cities = config('location.PH_states_cities');

        $productTypes = Type::all();

        $packages = Package::all();

        $packageFiltered = $packages->reject(function ($pack, $key) {
            return $pack->name == 'Own Packaging';
        });

        $ownPackagingAmount = Package::where('name', 'Own Packaging')->first();
        $ownPackaging = Package::where('name', 'Own Packaging')->get();
        
        return view('customers.pickup.index', compact('productTypes', 'packages', 'packageFiltered', 'ownPackagingAmount', 'ownPackaging', 'cities'));
    }

    public function store()
    {
        $pickupData = request()->validate([
            'pickup_date' => 'required',
            'pickup_address' => 'required|string|max:255',
            'pickup_city' => 'required|string|max:255',
            'pickup_postal_code' => 'required|integer',
            'receiver_name' => 'required|max:100|regex:/^[a-zA-Z ]+$/',
            'receiver_email' => 'required|email',
            'receiver_phone' => 'required|phone:PH',
            'receiver_address' => 'required|string|max:255',
            'receiver_city' => 'required|string|max:255',
            'receiver_postal_code' => 'required|string|max:255',
            'package_id' => 'required',
            'package_length' => 'nullable|max:5',
            'package_width' => 'nullable|max:5',
            'package_height' => 'nullable|max:5',
            'package_amount' => 'nullable|max:5',
        ], [
            'receiver_name.regex' => 'The :attribute field can only contain letters.',
            'receiver_phone.phone' => 'The receiver contact number field contains an invalid number.',
        ]);

        $pickup = auth()->user()->pickups()->create([
            'pickup_date' => Carbon::createFromFormat('F d, Y (D)', $pickupData['pickup_date']),
            'pickup_address' => request('pickup_address'),
            'pickup_city' => $pickupData['pickup_city'],
            'pickup_state' => config('location.PH_cities_states')[$pickupData['pickup_city']],
            'pickup_postal_code' => request('pickup_postal_code'),
            'pickup_country' => 'Philippines',
            'receiver_name' => request('receiver_name'),
            'receiver_email' => request('receiver_email'),
            'receiver_phone' => request('receiver_phone'),
            'receiver_address' => request('receiver_address'),
            'receiver_city' => $pickupData['receiver_city'],
            'receiver_state' => config('location.PH_cities_states')[$pickupData['receiver_city']],
            'receiver_postal_code' => request('receiver_postal_code'),
            'receiver_country' => 'Philippines',
            'package_id' => request('package_id'),
            'package_length' => $pickupData['package_length'],
            'package_width' => $pickupData['package_width'],
            'package_height' => $pickupData['package_height'],
            'package_amount' => $pickupData['package_amount'],
            'tracking_number' => strtoupper(uniqid('PB'))
        ]);

        Mail::to($pickup->receiver_email)->send(new CustomerPickupDetails($pickup));

        return redirect()->route('customer.pickup.store', auth()->user()->username)->with('success', 'Pickup has been successfully added.');
    }
}
