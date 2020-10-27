<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Pickup;
use Carbon\Carbon;
use App\DeliveryStatus;
use App\PickupActivity;
use App\Rules\same_email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use DateTime;
use DateInterval;

class PickupController extends Controller
{
    public function index()
    {
        $pickups = Pickup::where('active',1)->orderBy('pickups.pickup_date','DESC')->get();
        //dd($pickups);

        $cities = DB::table('pickups')->distinct()->pluck('pickup_city');
        $states = DB::table('pickups')->distinct()->pluck('pickup_state');
        $cities = DB::table('pickups')->distinct()->pluck('pickup_city');
        $postal_codes = DB::table('pickups')->distinct()->pluck('pickup_postal_code');
        $package_types = DB::table('packages')->distinct()->pluck('name');
        $deliveryStatus = DeliveryStatus::all();  
     //   $latestPickupStatus = $pickup->pickupActivities->first()->deliveryStatus;
     // dd($pickups);
       // return dd($city);
        return view('admin.pickups.index', compact('pickups', 'cities', 'states', 'postal_codes', 'package_types','deliveryStatus'));
    }

    public function filter(Request $request)
    {

        $cities = DB::table('pickups')->distinct()->pluck('pickup_city');
        $states = DB::table('pickups')->distinct()->pluck('pickup_state');
        $cities = DB::table('pickups')->distinct()->pluck('pickup_city');
        $postal_codes = DB::table('pickups')->distinct()->pluck('pickup_postal_code');
        $package_types = DB::table('packages')->distinct()->pluck('name');
        $deliveryStatus = DeliveryStatus::all();  

        $searchCities = preg_split('/,+/',$request->displayCity, -1, PREG_SPLIT_NO_EMPTY);
        $searchStates = preg_split('/,+/',$request->displayState, -1, PREG_SPLIT_NO_EMPTY);
        $searchPostalCodes = preg_split('/,+/',$request->displayPostalCode, -1, PREG_SPLIT_NO_EMPTY);
        $searchPackageType = preg_split('/,+/',$request->displayPackageType, -1, PREG_SPLIT_NO_EMPTY);
        $searchDeliveryStatus = preg_split('/,+/',$request->displayDeliveryStatus, -1, PREG_SPLIT_NO_EMPTY);

        $s = array();
        foreach($searchDeliveryStatus as $status){
          array_push($s,DeliveryStatus::where('name', $status)->first()->id);
           
        }

        date_default_timezone_set('Asia/Manila');
        $date = new DateTime();
        $date->add(DateInterval::createFromDateString('yesterday'));
        $fromdateCreated = date('Y-m-d H:i:s', strtotime( $date->format('Y-m-d')." 17:00:00" . ' -1 day'));
        $todateCreated = date($date->format('Y-m-d')." 17:00:00");

        $hasNewRequest = $request->has('newRequest');
        $hasDateFrom = !is_null($request->datepickerFrom);
        $hasDateTo = !is_null($request->datepickerFrom);

        date_default_timezone_set('Asia/Manila');
        $date = new DateTime();
        $date->add(DateInterval::createFromDateString('yesterday'));
        $fromdateCreated = date('Y-m-d H:i:s', strtotime( $date->format('Y-m-d')." 17:00:00" . ' -1 day'));
        $todateCreated = date($date->format('Y-m-d')." 17:00:00");

        $searches = array(
            'cities' => $searchCities,
            'states' => $searchStates,
            'postalCodes' => $searchPostalCodes,
            'packageTypes' => $searchPackageType,
            'deliveryStatuses' => $searchDeliveryStatus,
            'fromDate' =>  $request->datepickerFrom,
            'toDate' =>  $request->datepickerTo,
            'newRequest' => $request->has('newRequest')
        );
        //max actvity
        $maxActivity = PickupActivity::select('pickup_id', DB::raw('MAX(delivery_status_id) as 
          max_activity'))
          ->groupBy('pickup_id');
        $pickups = Pickup::
          join('packages', 'pickups.package_id','=','packages.id')
          ->joinSub($maxActivity, 'max_activity', function ($join) {
              $join->on('pickups.id', '=', 'max_activity.pickup_id');
            })
          ->selectRaw('pickups.*, packages.name as package_name, max_activity.max_activity')
          ->where(function ($q) use ($searchCities) {
            foreach ($searchCities as $value) {
              $q->orWhere('pickup_city', 'like', "%{$value}%");
            }
          })
          ->where(function ($q) use ($searchStates) {
            foreach ($searchStates as $value) {
              $q->orWhere('pickup_state', 'like', "%{$value}%");
            }
          })
          ->where(function ($q) use ($searchPostalCodes) {
            foreach ($searchPostalCodes as $value) {
              $q->orWhere('pickup_postal_code', 'like', "%{$value}%");
            }
          })
          ->where(function ($q) use ($searchPackageType) {
            foreach ($searchPackageType as $value) {
              $q->orWhere('name', 'like', "%{$value}%");
            }
          })
          ->where(function ($q) use ($s) {
            foreach ($s as $value) {
              $q->orWhere('max_activity', 'like', "%{$value}%");
            }
          })
          ->where(function ($q) use ($request, $hasDateFrom) {
            if($hasDateFrom){
             $q->where('pickup_date','>=', date('Y-m-d H:i:s',strtotime($request->datepickerFrom.' 00:00:00')));
            }
          })
          ->where(function ($q) use ($request,$hasDateTo) {
            if($hasDateTo){
              $q->where('pickup_date','<=', date('Y-m-d H:i:s',strtotime($request->datepickerTo.' 23:59:59')));
            }
          })
          ->where(function ($q) use ($hasNewRequest, $fromdateCreated) {
            if($hasNewRequest){
              $q->where('pickups.created_at','>=', $fromdateCreated);
            }
          })
          ->where(function ($q) use ($hasNewRequest, $todateCreated) {
            if($hasNewRequest){
              $q->where('pickups.created_at','<=', $todateCreated);
            }
          })  
          ->where('pickups.active',1)
          ->orderBy('pickups.pickup_date','DESC')    
          ->get();
          return view('admin.pickups.index', compact('pickups', 'cities', 'states', 'postal_codes', 'package_types', 'searches', 'deliveryStatus'));
    }

    public function edit(Pickup $pickup)
    {
        $deliveryStatus = DeliveryStatus::all();

        $customerPickupStatus = $pickup->pickupActivities->pluck('delivery_status_id')->all();

        $latestPickupStatus = $pickup->pickupActivities->first()->deliveryStatus;

        return view('admin.pickups.edit', compact('pickup', 'deliveryStatus', 'customerPickupStatus', 'latestPickupStatus'));
    }


    public function update(Pickup $pickup)
    {
          //  dd(request()->all());
        $pickupData = request()->validate([
            'pickup_date' => 'required',
            'pickup_address' => 'required|string|max:255',
            'pickup_city' => 'required|string|max:255',
            'pickup_state' => 'required|string|max:255',
            'pickup_postal_code' => 'required|integer',
            'receiver_name' => 'required|max:100|regex:/^[a-zA-Z ]+$/',
            'receiver_address' => 'required|string|max:255',
            'receiver_city' => 'required|string|max:255',
            'receiver_state' => 'required|string|max:255',
            'receiver_postal_code' => 'required|integer',
            
        ]);
        $pickup->update([
            'pickup_date' =>  $pickupData['pickup_date'],
            'pickup_address' => $pickupData['pickup_address'],
            'pickup_city' => $pickupData['pickup_city'],
            'pickup_state' =>  $pickupData['pickup_state'],
            'pickup_postal_code' => $pickupData['pickup_postal_code'],
            'pickup_country' => 'Philippines',
            'receiver_name' => $pickupData['receiver_name'],
            'receiver_address' => $pickupData['receiver_address'],
            'receiver_city' => $pickupData['receiver_city'],
            'receiver_state' =>  $pickupData['receiver_state'],
            'receiver_postal_code' => $pickupData['receiver_postal_code'],

        ]);

        if(request('delivery_status_id') != null){
          $pickup->pickupActivities()->create([
            'pickup_id' => $pickup->id,
            'delivery_status_id' => request('delivery_status_id'),
          ]);
        }
        return redirect()->route('admin.pickups')->with('update', 'Pickup with tracking number ' . $pickup->tracking_number . ' has been successfully updated.');
    }

    public function destroyConfirmation(Pickup $pickup)
    {
        return view('admin.pickups.confirmation', compact('pickup'));
    }

    public function softDestroy(Pickup $pickup)
    {
        $data = request()->validate([
            'email' => ['required', new same_email($pickup->user->email)]
        ], [
            'email.required' => 'This field is required.'
        ]);

        $pickup->update([
            'active' => 0
        ]);

        return redirect()->route('admin.pickups', $pickup->id)->with('delete', 'Pickup for ' . $pickup->user->name . '  has been successfully deleted.');
    }

    public function newRequest()
    {
        $newRequests = Pickup::whereDate('pickup_date', now())->get();

        return view('admin.pickups.new-request', compact('newRequests'));
    }

    public function updateStatus(){
      if(request()->ajax()){
        $pickup = Pickup::where('id',request()->pickup_id)
        ->where('user_id', request()->cust_id)
        ->first();
        $pickup->setMaxActivity();
        $tracking_number = $pickup->tracking_number;

        $pickup->pickupActivities()->create([
          'pickup_id' => request()->pickup_id,
          'delivery_status_id' => request()->index,
        ]);
        return response()->json(['tracking_number' => $tracking_number]);
      }
    }
}
