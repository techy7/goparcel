<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name'];

    public function packages()
    {
        return $this->belongsTo(Package::class);
    }
}
