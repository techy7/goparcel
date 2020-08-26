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

    public function searchTrack()
    {
        
        return view('customers.bookings.track-search');
    }

    public function track(User $user, Pickup $pickup)
    {
        $pickups = $pickup->get();
        $statuses = DeliveryStatus::all();
        
        $pickupOrder = $pickups->where('tracking_number', request()->route('tracking_number'))->first();

        $pa = PickupActivity::
        where('pickup_id', $pickupOrder->id)
        ->get();        
       $count = $pa->count();
 
        return view('customers.bookings.track', 
        compact(
            'pickupOrder', 
            'statuses',
            'count'
        ));
    }

    public function waybill(User $user, Pickup $pickup)
    {
        $pickups = $pickup->get();

        $pickupId = $pickups->filter(function ($pick, $key) {
            return $pick->id == request()->route('id');
        });

        $userPickup = $pickupId->first();

        $logo = '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';

        $pdf = PDF::loadView('customers.bookings.waybill', compact('userPickup', 'logo'));
        return $pdf->download(config('app.name') . ' ' . $userPickup->tracking_number . '.pdf');

        // return view('customers.bookings.waybill', compact('userPickup', 'logo'));
    }
}
