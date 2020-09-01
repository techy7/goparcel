<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Pickup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Vistag\HumanReadable\ReadableNumber;
use DateTime;
use DateInterval;

class DashboardController extends Controller
{
    public function index()
    {
        
        date_default_timezone_set('Asia/Manila');
        $date = new DateTime();
        $date->add(DateInterval::createFromDateString('yesterday'));
        $fromdateCreated = date('Y-m-d H:i:s', strtotime( $date->format('Y-m-d')." 17:00:00" . ' -1 day'));
        $todateCreated = date($date->format('Y-m-d')." 17:00:00"); 

        $newRequests = Pickup::
        where('created_at','>=', $fromdateCreated)
        ->where('created_at','<=', $todateCreated)
        ->orderBy('pickups.pickup_date','DESC')
        ->get();

    


        $numberPickups = new ReadableNumber(Pickup::all()->count());
        $numberPickups = $numberPickups->long();

        $users = User::all();

        $filterCustomerUsers = $users->filter(function ($user, $key) {
            return $user->hasRole('Customer');
        });

        $numberCustomers = new ReadableNumber($filterCustomerUsers->count());
        $numberCustomers = $numberCustomers->long();

        $filterStaffUsers = $users->reject(function ($user, $key) {
            return $user->hasRole('Customer');
        });

        $numberStaffs = new ReadableNumber($filterStaffUsers->count());
        $numberStaffs = $numberStaffs->long();

        return view('admin.dashboard.index', compact('newRequests', 'numberPickups', 'numberCustomers', 'numberStaffs'));
    }
}
