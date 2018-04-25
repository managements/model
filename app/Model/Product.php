<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product','ref','tva','description','size',
        'expired','qt','category_product_id','store_id','section_id',
        'created_at','updated_at'
    ];
}
