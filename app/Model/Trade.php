<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    protected $fillable = [
        'tva','taxes','company_id','created_at','updated_at'
    ];
}
