<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PickupActivity extends Model
{
    protected $guarded = [];
    
    public function pickup()
    {
        return $this->belongsTo(Pickup::class);
    }

    public function deliveryStatus()
    {
        return $this->belongsTo(DeliveryStatus::class);
    }
}
