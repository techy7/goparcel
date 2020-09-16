<?php

namespace App\Http\Controllers\Customer;

use App\User;
use Exception;
use App\Pickup;
use App\Package;
use Carbon\Carbon;
use App\DeliveryStatus;
use App\PickupActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Mail\CustomerPickupDetails;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Resources\PickupResource;



class PickupController extends Controller
{   

    
    public function index()
    {
        $customer = auth()->user();
        
        
        $cities = config('location.PH_states_cities');

        $packages = Package::all();

        $packageFiltered = $packages->reject(function ($pack, $key) {
            return $pack->name == '[aca] Packaging';
        });

        $ownPackagingAmount = Package::where('name', 'Own Packaging')->first();
        
        $ownPackaging = Package::where('name', 'Own Packaging')->get();

        return view('customers.pickup.index', compact('customer','packages', 'packageFiltered', 'ownPackagingAmount', 'ownPackaging', 'cities'));
    }

   
   public function computeTotal(){
    if(request()->ajax()){
        // $additional_fee = 0; //for default packaging
        // $service_fee = 0;

        
        if(!is_null(request()->package)){
            $package = Package::where('name', request()->package)->first();
            $service_fee = $package->amount;
        }
        $vol_weight =  ceil(((request()->l * request()->w * request()->h)/4000));
        $additional_fee = request()->aw > $vol_weight ? ((request()->aw-5) * 28) : (($vol_weight - 5) * 28);
        $additional_fee = ( $additional_fee < 0) ? 0 : $additional_fee;
        //$item_amount =  (float) str_replace(',','',request()->item) ;
 
       $item_amount = request()->cod == 'true'? (float) str_replace(',','',request()->item): 0;
        if(request()->charge_to != 'true'){
           $service_fee = 0;
           $additional_fee  = 0;
        }
        $total_amount =  $additional_fee + $service_fee + $item_amount; 
    
       
        session(['total_amount' => $total_amount]); //set class variable 
        session(['additional_fee' => $additional_fee]);
        session(['item_amount' => $item_amount]);
        session(['service_fee' => $service_fee]); 
         return response()->json(['service_fee' => $service_fee, 'additional_fee'=>$additional_fee, 'total_amount'=>$total_amount, 'item_amount'=>$item_amount]);
    }
   }

    public function store()
    {
        // dd(request()->all());
        // dd(str_pad(1122112, 8, '0', STR_PAD_LEFT));
        // dd(request()->has('cod'));
        $pickupData = request()->validate([
            'sender_name' => 'required|max:100|regex:/^[a-zA-Z ]+$/',
            'sender_phone' => 'required|phone:PH',
            'pickup_date' => 'required',
            'pickup_address' => 'required|string|max:255',
            'pickup_city' => 'required|string|max:255',
            'pickup_postal_code' => 'required',
            'receiver_name' => 'required|max:100|regex:/^[a-zA-Z ]+$/',
            'receiver_email' => 'required|email',
            'receiver_phone' => 'required|phone:PH',
            'receiver_address' => 'required|string|max:255',
            'receiver_city' => 'required|string|max:255',
            'receiver_postal_code' => 'required',
            'radioPackage' => 'required',
            'package_length' => 'required_if:radioPackage,Own Packaging',
            'package_width' => 'required_if:radioPackage,Own Packaging',
            'package_height' => 'required_if:radioPackage,Own Packaging',
            'actual_weight' => 'required_if:radioPackage,Own Packaging',
            'item_amount' => 'required| regex:/^((?!-).)*$/ |not_in:0' ,
        ]
         , [
            'receiver_name.regex' => 'The :attribute field can only contain letters.',
             'sender_phone.phone' => 'The sender contact number field contains an invalid number.',
             'receiver_phone.phone' => 'The receiver contact number field contains an invalid number.',
             'radioPackage.required' => 'Please select a package.',
             'item_amount.required_with' => "The item amount field is required on COD.",
             ]
        );

        
        $pickup = auth()->user()->pickups()->create([
            'sender_name' => request('sender_name'),
            'sender_phone' => request('sender_phone'),
            'pickup_date' => request('pickup_date')." 00:00:00",
            'pickup_address' => request('pickup_address'),
            'pickup_city' => request('pickup_city'),
            'pickup_state' => config('location.PH_cities_states')[request('pickup_city')],
            'pickup_postal_code' => request('pickup_postal_code'),
            'pickup_country' => 'Philippines',
            'receiver_name' => request('receiver_name'),
            'receiver_email' => request('receiver_email'),
            'receiver_phone' => request('receiver_phone'),
            'receiver_address' => request('receiver_address'),
            'receiver_city' => request('receiver_city'),
            'receiver_state' => config('location.PH_cities_states')[request('receiver_city')],
            'receiver_postal_code' => request('receiver_postal_code'),
            'receiver_country' => 'Philippines',
            'package_id' => Package::where('name', request('radioPackage'))->first()->id,
            'package_length' => request('package_length') ?? 0,
            'package_width' => request('package_width') ?? 0,
            'package_height' => request('package_height') ?? 0,
            'actual_weight' => request('actual_weight') ?? 0,
            'package_amount' => session('total_amount'),
            'charge_to_sender' => !(request()->has('charge_to')),
            'cod' => request()->has('cod'),
            //'tracking_number' => strtoupper('PB'.substr(md5(time()), 0, 7)),
            'additional_fee' => session('additional_fee'),
            'item_amount' => session('item_amount'),
            'service_fee' => session('service_fee'),
            
        ]);

        $pickup->pickupActivities()->create();
        
        $pickup->tracking_number = 'PB'.str_pad($pickup->id, 7, '0', STR_PAD_LEFT);
        $pickup->save();
        // dd($pickup);
        Mail::to($pickup->receiver_email)->send(new CustomerPickupDetails($pickup));
        
        return redirect()->route('customer.pickup',auth()->user()->username)->with('success', 'Pickup has been successfully added. Tracking Code: '.$pickup->tracking_number);
    }

    public function trackDelivery()
    {
        $statuses = DeliveryStatus::all();
        return view('customers.pickup.order-tracking', compact('statuses'));
    }

    public function trackDeliveryShow(Request $request)
    {
        
        $pickupOrder = Pickup::where('tracking_number', $request->tracking_number)->first();
        $statuses = DeliveryStatus::all();
        //return $pickupOrder;


        if ($pickupOrder == null) {
            if($request->tracking_number == null) 
            Session::flash('message', 'Please enter the tracking number of your parcel!'); 
            else
            Session::flash('message', 'Tracking number for the parcel not found'); 
            return redirect()->route('track-delivery');
        }

        $statuses = DeliveryStatus::all();
        $statuses = PickupActivity::
        rightJoin('delivery_statuses', function($q) use ($pickupOrder){
            $q->on('delivery_statuses.id', '=', 'pickup_activities.delivery_status_id')
            ->where('pickup_activities.pickup_id', '=', $pickupOrder->id);
        })
        ->selectRaw('pickup_activities.*, delivery_statuses.name as name, delivery_statuses.created_at as ca, delivery_statuses.updated_at as ua, delivery_statuses.icon as icon, delivery_statuses.id  as status_id')
        
        
        ->get();
        
        return view('customers.pickup.order-tracking',
        compact(
            'pickupOrder',
            'statuses'
        ));
    }

  
}
