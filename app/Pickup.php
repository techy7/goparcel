<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    protected $dates = ['pickup_date'];
    protected $maxActivity = 0;

    protected $fillable = [
        'sender_name',
        'sender_phone',

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
        'actual_weight',
        'package_amount',

        'active',
        'tracking_number',
        'charge_to_sender',
        'item_amount',
        'additional_fee',
        'cod',
        'service_fee',
        'additional_instruction'
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
        return $this->hasMany(PickupActivity::class)->latest();
    }

    // public function getDeliveryStatus($pickupId)
    // {
    //     return $pickupId;
    // }

    public function setMaxActivity(){
       $this->maxActivity = max($this->pickupActivities->pluck('delivery_status_id')->all());

    }
    public function getMaxActivity(){
        return $this->maxActivity;
    }
}
