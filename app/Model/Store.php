<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = ['company_id','created_at','updated_at'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function categoryProducts()
    {
        return $this->hasMany(CategoryProduct::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function storePrince()
    {
        return $this->hasOne(StorePrince::class);
    }
}
