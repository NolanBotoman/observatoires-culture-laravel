<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Billable, HasApiTokens;

    protected $fillable = [
        'username',
        'email',
        'password',
        'isAdmin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
