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
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
