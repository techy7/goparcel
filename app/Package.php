<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['weight'];

    public function pickup()
    {
        return $this->belongsTo(Pickup::class);
    }
}
