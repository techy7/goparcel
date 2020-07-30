<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['name', 'description', 'amount'];

    public function pickups()
    {
        return $this->hasMany(Pickup::class);
    }

    public function priceFormatted($price)
    {
        $amount = number_format($price, 2, '.', ',');
        return '₱' . $amount;
    }
}
