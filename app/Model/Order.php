<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'ht','tva','tva_prince','ttc','bl','fc','buy','sale',
        'deal_id','trade_id','created_at','update_at'
    ];

    public function deal()
    {
        return $this->belongsTo(Deal::class);
    }

    public function order_us()
    {
        return $this->hasMany(Order_u::class);
    }

    public function trade()
    {
        return $this->belongsTo(Trade::class);
    }
}
