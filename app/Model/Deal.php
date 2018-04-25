<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = [
        'name','speaker','address',
        'build','floor','aprt_nbr',
        'city', 'description','vote',
        'provider','client','company_id',
        'created_at','updated_at'
    ];
}
