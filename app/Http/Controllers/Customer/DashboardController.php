<?php

namespace App\Http\Controllers\Customer;

use App\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $userNumberBookings = auth()->user()->pickups->count();

        $packages = Package::where('active',1)->get();

        return view('customers.dashboard.index', compact('userNumberBookings', 'packages'));
    }
}
