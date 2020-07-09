<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function dashboard()
    {
        return view('customers.dashboard');
    }

    public function accountIndex()
    {
        return view('customers.account.index');
    }
}
