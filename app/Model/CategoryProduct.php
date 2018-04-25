<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $fillable = [
        'category',
        'store_id','section_id',
        'created_at','updated_at'
    ];
}
