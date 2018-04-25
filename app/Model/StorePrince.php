<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class StorePrince extends Model
{
    protected $fillable = [
        'prince','store_id','created_at','updated_at'
    ];
}
