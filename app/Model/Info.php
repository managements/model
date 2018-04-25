<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = [
        'first_name','last_name',
        'dtn','sex','address',
        'house_nbr','city','user_id',
        'created_at','update_at'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function tels()
    {
        return $this->hasMany(Tel::class);
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    public function agendas()
    {
        return $this->belongsToMany(Agenda::class);
    }
}
