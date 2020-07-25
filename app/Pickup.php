<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    protected $dates = ['pickup_date'];

    protected $fillable = [
        'pickup_date',
        'pickup_location',
        'receiver_name',
        'receiver_email',
        'receiver_phone',
        'receiver_location',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function package()
    {
        return $this->hasOne(Package::class);
    }
}
