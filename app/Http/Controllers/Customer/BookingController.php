<?php

namespace App\Http\Controllers\Customer;

use App\User;
use App\Pickup;
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
        
        $pickupStatus = PickupActivity::all();

        foreach ($pickupOrder->pickupActivities as $pickupActivity) {
            $pickupActive = $pickupActivity;
        }

        return view('customers.bookings.track', compact('pickupOrder', 'pickupStatus', 'pickupActive'));
    }

    public function waybill(User $user, Pickup $pickup)
    {
        $pickups = $pickup->get();

        $pickupId = $pickups->filter(function ($pick, $key) {
            return $pick->id == request()->route('id');
        });

        $userPickup = $pickupId->first();

        $pdf = PDF::loadView('customers.bookings.waybill', compact('userPickup'));
        return $pdf->download('waybill.pdf');

        // return view('customers.bookings.waybill', compact('userPickup'));
    }

    public function download(User $user)
    {
        $pdf = PDF::loadView('customers.bookings.waybill');
        return $pdf->download('waybill.pdf');

        return redirect()->route('customer.bookings.waybill', auth()->user()->username)->with('success', 'Waybill has been successfully downloaded.');
    }
}
