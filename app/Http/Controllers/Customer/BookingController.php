<?php

namespace App\Http\Controllers\Customer;

use App\User;
use App\Pickup;
use App\DeliveryStatus;
use App\PickupActivity;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function index()
    {
        $userBackends = User::all();

        $users = User::with('roles')->where('id', '>', 5)->latest()->get();

        $nonCustomers = $userBackends->reject(function ($user, $key) {
            return $user->hasRole('Customer');
        });

        return view('customers.bookings.index', compact('nonCustomers'));
    }

    public function track(User $user, Pickup $pickup)
    {
        $pickups = $pickup->get();

        $pickupOrder = $pickups->where('tracking_number', request()->route('tracking_number'))->first();

        foreach ($pickupOrder->pickupActivities as $pickupActivity) {
            $pickupActive = $pickupActivity->deliveryStatus;
        }

        return view('customers.bookings.track', 
        compact(
            'pickupOrder', 
            'pickupActive', 
        ));
    }

    public function waybill(User $user, Pickup $pickup)
    {
        $pickups = $pickup->get();

        $pickupId = $pickups->filter(function ($pick, $key) {
            return $pick->id == request()->route('id');
        });

        $userPickup = $pickupId->first();

        $pdf = PDF::loadView('customers.bookings.waybill', compact('userPickup'));
        return $pdf->download(config('app.name') . ' ' . $userPickup->tracking_number . '.pdf');

        // return view('customers.bookings.waybill', compact('userPickup'));
    }
}
