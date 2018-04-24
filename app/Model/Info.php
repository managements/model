<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = [
        'first_name','last_name',
        'dtn','sex','address',
        'house_nbr','city','tel',
        'profil','cover','user_id',
        'created_at','update_at'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
