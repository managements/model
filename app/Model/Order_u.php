<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order_u extends Model
{
    protected $fillable = [
        'pu','qt','ht','tva',
        'tva_prince','ttc',
        'taxes','product_id','order_id'
    ];

    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
