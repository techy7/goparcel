<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    protected $dates = ['pickup_date'];

    protected $fillable = [
        'pickup_date',

        'pickup_address',
        'pickup_city',
        'pickup_state',
        'pickup_postal_code',
        'pickup_country',

        'receiver_name',
        'receiver_email',
        'receiver_phone',
        'receiver_address',
        'receiver_city',
        'receiver_state',
        'receiver_postal_code',
        'receiver_country',

        'package_id',
        'package_length',
        'package_width',
        'package_height',
        'package_amount',

        'active',
        'tracking_number'
    ];

    public function priceFormatted($price)
    {
        $amount = number_format($price, 2, '.', ',');
        return '₱' . $amount;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function pickupActivities()
    {
        return $this->hasMany(PickupActivity::class);
    }
}
