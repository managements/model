<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'limit','status','company_id','category_id',
        'created_at','updated_at'
    ];
}
