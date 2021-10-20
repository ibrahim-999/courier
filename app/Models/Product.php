<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $table = 'products';
    protected $fillable = [
        'name',
        'image',
        'created_at',
        'updated_at',
    ];

    public function shipments()
    {
        return $this->belongsToMany(Shipment::class,'shipment_product');
    }

}
