<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes; //soft delete
    protected $fillable = ['name', 'description', 'amount', 'max_weight', 'active'];

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
