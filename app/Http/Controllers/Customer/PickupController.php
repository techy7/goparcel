<?php

namespace App\Http\Controllers\Customer;

use App\User;
use Exception;
use App\Pickup;
use App\Package;
use Carbon\Carbon;
use App\PickupActivity;
use Illuminate\Http\Request;
use App\Mail\CustomerPickupDetails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\PickupResource;

class PickupController extends Controller
{
    public function index()
    {
        $cities = config('location.PH_states_cities');

        $packages = Package::all();

        $packageFiltered = $packages->reject(function ($pack, $key) {
            return $pack->name == 'Own Packaging';
        });

        $ownPackagingAmount = Package::where('name', 'Own Packaging')->first();
        
        $ownPackaging = Package::where('name', 'Own Packaging')->get();

        return view('customers.pickup.index', compact('packages', 'packageFiltered', 'ownPackagingAmount', 'ownPackaging', 'cities'));
    }

    public function store()
    {
        $pickupData = request()->validate([
            'sender_name' => 'required|max:100|regex:/^[a-zA-Z ]+$/',
            'sender_phone' => 'required|phone:PH',
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
            'sender_phone.phone' => 'The sender contact number field contains an invalid number.',
            'receiver_phone.phone' => 'The receiver contact number field contains an invalid number.',
            'package_id.required' => 'The package field is required.',
        ]);

        $pickup = auth()->user()->pickups()->create([
            'sender_name' => request('sender_name'),
            'sender_phone' => request('sender_phone'),
            'pickup_date' => $pickupData['pickup_date'],
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
            'package_length' => request('package_length') ?? 0,
            'package_width' => request('package_width') ?? 0,
            'package_height' => request('package_height') ?? 0,
            'package_amount' => request('package_amount'),
            'tracking_number' => strtoupper(uniqid('PB'))
        ]);

        $pickup->pickupActivities()->create();

        return response()->json($pickup);


        // Mail::to($pickup->receiver_email)->send(new CustomerPickupDetails($pickup));

        // return redirect()->route('customer.pickup', auth()->user()->username)->with('success', 'Pickup has been successfully added.');
    }

    public function trackDelivery()
    {
        return view('customers.pickup.order-tracking');
    }

    public function trackDeliveryShow(Pickup $pickup)
    {

        $pickups = $pickup->get();

        $pickupOrder = $pickups->where('tracking_number', request()->route('tracking_number'))->first();

        if ($pickupOrder == null) {
            abort(404);
        }

        foreach ($pickupOrder->pickupActivities as $pickupActivity) {
            $pickupActive = $pickupActivity->deliveryStatus;
        }

        if (request()->wantsJson()) {
            return response()->json($pickupOrder);
        }
        return view('customers.pickup.order-tracking',compact('pickupOrder'));
    }
}
