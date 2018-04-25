<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tel extends Model
{
    protected $fillable = [
        'tel','company_id','info_id','deal_id'
    ];
}
