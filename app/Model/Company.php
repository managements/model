<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name','licence','address',
        'build','floor','aprt_nbr',
        'zip','city','speaker',
        'range','limit','status',
        'turnover','logo','cover','taxes',
        'created_at','updated_at'
    ];
}
