<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['name', 'description', 'amount'];

    public function pickup()
    {
        return $this->belongsTo(Pickup::class);
    }
}
