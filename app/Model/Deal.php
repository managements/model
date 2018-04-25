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

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    public function tels()
    {
        return $this->hasMany(Tel::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function gain()
    {
        return $this->hasOne(Gain::class);
    }
}
