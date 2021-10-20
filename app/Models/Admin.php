<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use Notifiable;
    protected $guard = 'admin';
    protected $fillable = [
        'name' , 'email' , 'password','image','created_at','updated_at'
    ];

    protected $hidden = [
        'password' , 'remember_Token',
    ];
}
