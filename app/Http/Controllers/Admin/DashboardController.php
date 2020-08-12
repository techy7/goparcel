<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Pickup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $pickups = Pickup::whereActive(1)->get();

        $newRequests = Pickup::whereDate('pickup_date', now())->get();

        $numberPickups = Pickup::all()->count();

        $users = User::all();

        $filterCustomerUsers = $users->filter(function ($user, $key) {
            return $user->hasRole('Customer');
        });

        $numberCustomers = $filterCustomerUsers->count();

        $filterStaffUsers = $users->reject(function ($user, $key) {
            return $user->hasRole('Customer');
        });

        $numberStaffs = $filterStaffUsers->count();

        return view('admin.dashboard.index', compact('pickups', 'newRequests', 'numberPickups', 'numberCustomers', 'numberStaffs'));
    }
}
