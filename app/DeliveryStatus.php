<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryStatus extends Model
{
    protected $fillable = ['name'];

    public function pickupActivities()
    {
        return $this->hasMany(PickupActivity::class);
    }
}
