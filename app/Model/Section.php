<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'section','store_id','created_at','updated_at'
    ];
}
