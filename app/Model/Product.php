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

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function categoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class);
    }

    public function imageProducts()
    {
        return $this->hasMany(ImageProduct::class);
    }

    public function order_u()
    {
        return $this->hasOne(Order_u::class);
    }
}
