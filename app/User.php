<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'name',
        'm_number',
        'address',
        'city',
        'state',
        'postal_code',
        'country',
        'profile_picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pickups()
    {
        return $this->hasMany(Pickup::class);
    }

    public function imageOriginalSize()
    {
        $profilePath = str_replace('avatar', 'original', $this->profile_picture);

        $imagePath = ($profilePath) ? '/storage/' . $profilePath : 'N/A';
        return $imagePath;
    }

    public function imageAvatarSize()
    {
        $imagePath = ($this->profile_picture) ? '/storage/' . $this->profile_picture : 'N/A';
        return $imagePath;
    }

    // public function getRouteKeyName()
    // {
    //     return 'username';
    // }
}
