<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'ht','tva','tva_prince','ttc','bl','fc','buy','sale',
        'deal_id','trade_id','created_at','update_at'
    ];
}
