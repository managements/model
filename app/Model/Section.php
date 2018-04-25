<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'section','store_id','created_at','updated_at'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function categoryProducts()
    {
        return $this->hasMany(CategoryProduct::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
