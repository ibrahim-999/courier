<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;

    public $table = 'couriers';
    protected $fillable = [
        'name',
        'address',
        'number',
        'created_at',
        'updated_at',
    ];

}
