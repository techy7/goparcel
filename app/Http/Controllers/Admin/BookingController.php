<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Pickup;
use App\Rules\same_email;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    public function index()
    {
        $pickups = Pickup::all();

        return view('admin.bookings.index', compact('pickups'));
    }

    public function destroyConfirmation(Pickup $pickup)
    {
        return view('admin.bookings.confirmation', compact('pickup'));
    }

    public function searchTrack()
    {
        return view('admin.bookings.track-search');
    }

    public function destroy(Pickup $pickup)
    {
        $data = request()->validate([
            'email' => ['required', new same_email($pickup->user->email)]
        ], [
            'email.required' => 'This field is required.'
        ]);

        $pickup->delete();

        return redirect()->route('admin.bookings', $pickup->id)->with('delete', 'Booking for ' . $pickup->user->name . ' has been successfully deleted.');
    }
}
