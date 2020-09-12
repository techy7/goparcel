<?php

namespace App\Http\Controllers\Customer;

use App\User;
use App\Pickup;
use App\DeliveryStatus;
use App\PickupActivity;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

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

        $pickupOrder = $pickups->where('tracking_number', request()->route('tracking_number'))->first();
        //dd($pickupOrder->id);
        $statuses = PickupActivity::
        rightJoin('delivery_statuses', function($q) use ($pickupOrder){
            $q->on('delivery_statuses.id', '=', 'pickup_activities.delivery_status_id')
            ->where('pickup_activities.pickup_id', '=', $pickupOrder->id);
        })
        ->selectRaw('pickup_activities.*, delivery_statuses.name as name, delivery_statuses.created_at as ca, delivery_statuses.updated_at as ua, delivery_statuses.icon as icon, delivery_statuses.id as status_id')
      
        ->get();

        return view('customers.bookings.track',
        compact(
            'pickupOrder',
            'statuses'
        ));
    }

    public function waybill(User $user, Pickup $pickup)
    {
        $pickups = $pickup->get();

        $pickupId = $pickups->filter(function ($pick, $key) {
            return $pick->id == request()->route('id');
        });

        $userPickup = $pickupId->first();

        $customPaper = array(0,0,567.00,283.80);
        $pdf = PDF::loadView('customers.bookings.waybill', compact('userPickup'));
        return $pdf->download($userPickup->tracking_number . '.pdf');

        // return view('customers.bookings.waybill', compact('userPickup', 'logo'));
    }

    public function trackDeliveryShow(Request $request)
    {
       // dd("test");
        $pickupOrder = Pickup::where('tracking_number', $request->tracking_number)->first();
        $statuses = DeliveryStatus::all();
        //return $pickupOrder;


        if ($pickupOrder == null) {
            if($request->tracking_number == null) 
            Session::flash('message', 'Please enter the tracking number of your parcel!'); 
            else
            Session::flash('message', 'Tracking number for the parcel not found'); 
            return redirect()->route('customer.bookings.searchTrack', auth()->ucusser()->username);
        }

        $statuses = DeliveryStatus::all();
        $statuses = PickupActivity::
        rightJoin('delivery_statuses', function($q) use ($pickupOrder){
            $q->on('delivery_statuses.id', '=', 'pickup_activities.delivery_status_id')
            ->where('pickup_activities.pickup_id', '=', $pickupOrder->id);
        })
        ->selectRaw('pickup_activities.*, delivery_statuses.name as name, delivery_statuses.created_at as ca, delivery_statuses.updated_at as ua,  delivery_statuses.icon as icon, delivery_statuses.id  as status_id')  
        ->get();
        return view('customers.bookings.track-search',
        compact(
            'pickupOrder',
            'statuses'
        ));
    }
}
