<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Pickup;
use Carbon\Carbon;
use App\Rules\same_email;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PickupController extends Controller
{
    public function index()
    {
        $pickups = Pickup::whereActive(1)->get();

        return view('admin.pickups.index', compact('pickups'));
    }

    public function edit(Pickup $pickup)
    {
        return view('admin.pickups.edit', compact('pickup'));
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
