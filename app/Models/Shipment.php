<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    use HasFactory;
    public $table = 'shipments';
    protected $fillable = [
        'description',
        'address',
        'number',
        'courier_id',
        'status',
        'created_at',
        'updated_at',
    ];
    public function courier()
    {
        return $this->belongsTo(Courier::class,'courier_id');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class,'shipment_product');
    }
    /*public static function boot()
    {
        parent::boot();
        static::creating(function ($model){
            $model->number = $model->shipment->prefix.'_'.str_pad($model->number,5,'0',STR_PAD_LEFT);
        });
    }*/
}
