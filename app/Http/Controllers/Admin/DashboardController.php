<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Pickup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Vistag\HumanReadable\ReadableNumber;

class DashboardController extends Controller
{
    public function index()
    {
        $pickups = Pickup::whereActive(1)->get();

        $newRequests = Pickup::whereDate('pickup_date', now())->get();

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

        return view('admin.dashboard.index', compact('pickups', 'newRequests', 'numberPickups', 'numberCustomers', 'numberStaffs'));
    }
}
