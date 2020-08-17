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

class PickupController extends Controller
{
    public function index()
    {
        $pickups = Pickup::join('packages', 'pickups.package_id','=','packages.id')
        ->whereActive(1)->get();

        $cities = DB::table('pickups')->distinct()->pluck('pickup_city');
        $states = DB::table('pickups')->distinct()->pluck('pickup_state');
        $cities = DB::table('pickups')->distinct()->pluck('pickup_city');
        $postal_codes = DB::table('pickups')->distinct()->pluck('pickup_postal_code');
        $package_types = DB::table('packages')->distinct()->pluck('name');

       // return dd($city);
        return view('admin.pickups.index', compact('pickups', 'cities', 'states', 'postal_codes', 'package_types'));
    }

    public function filter(Request $request)
    {

        $cities = DB::table('pickups')->distinct()->pluck('pickup_city');
        $states = DB::table('pickups')->distinct()->pluck('pickup_state');
        $cities = DB::table('pickups')->distinct()->pluck('pickup_city');
        $postal_codes = DB::table('pickups')->distinct()->pluck('pickup_postal_code');
        $package_types = DB::table('packages')->distinct()->pluck('name');

        $searchCities = preg_split('/,+/',$request->displayCity, -1, PREG_SPLIT_NO_EMPTY);
        $searchStates = preg_split('/,+/',$request->displayState, -1, PREG_SPLIT_NO_EMPTY); 
        $searchPostalCodes= preg_split('/,+/',$request->displayPostalCode, -1, PREG_SPLIT_NO_EMPTY);
        $searchPackageType= preg_split('/,+/',$request->displayPackageType, -1, PREG_SPLIT_NO_EMPTY);  

        //$request->datepickerFrom = $request->datepickerFrom.' 23:59:59';
        //dd(date('Y-m-d H:i:s',strtotime($request->datepickerFrom)));
        $searches = array(
            'cities' => $searchCities,
            'states' => $searchStates,
            'postalCodes' => $searchPostalCodes,
            'packageTypes' => $searchPackageType,
            'fromDate' =>  $request->datepickerFrom,
            'toDate' =>  $request->datepickerTo,
        );
        
  
        $pickups= Pickup::
        join('packages', 'pickups.package_id','=','packages.id')
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
          ->where(function ($q) use ($request) {
            if(!empty($request->datepickerTo)){
             $q->where('pickup_date','<=',date('Y-m-d H:i:s',strtotime($request->datepickerTo.' 23:59:59')));
            }
          })
          ->where(function ($q) use ($request) {
            if(!empty($request->datepickerFrom)){
             $q->where('pickup_date','>=',date('Y-m-d H:i:s',strtotime($request->datepickerFrom.' 00:00:00')));
            }
          })
        //   ->where('pickup_date','<=',date('Y-m-d h:i:s',strtotime($request->datepickerTo)) && !empty($request->datepickerTo))
        //   ->where('pickup_date','>=',date('Y-m-d h:i:s',strtotime($request->datepickerFrom)))
          ->get();

          //dd($pickups);
          return view('admin.pickups.index', compact('pickups', 'cities', 'states', 'postal_codes', 'package_types', 'searches'));
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
        $pickupData = request()->validate([
            'pickup_date' => 'required',
            'pickup_address' => 'required|string|max:255',
            'pickup_city' => 'required|string|max:255',
            'pickup_postal_code' => 'required|integer',
        ]);

        $pickup->update([
            'pickup_date' => Carbon::createFromFormat('F d, Y (D)', $pickupData['pickup_date']),
            'pickup_address' => request('pickup_address'),
            'pickup_city' => $pickupData['pickup_city'],
            'pickup_state' => config('location.PH_cities_states')[$pickupData['pickup_city']],
            'pickup_postal_code' => request('pickup_postal_code'),
            'pickup_country' => 'Philippines',
        ]);

        $delivery = request()->validate([
            'delivery_status_id' => 'not_in:0'
        ], [
            'delivery_status_id.not_in' => 'The delivery status has already been used.',
        ]);

        $pickup->pickupActivities()->create($delivery);

        return redirect()->route('admin.pickups')->with('update', 'Pickup for ' . $pickup->user->name . ' has been successfully updated.');
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
}
