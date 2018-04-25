<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = [
        'email','company_id','info_id','deal_id','created_at'
    ];

    public $timestamps = false;
}
