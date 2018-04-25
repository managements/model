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

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function store()
    {
        return $this->hasOne(Store::class);
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    public function tels()
    {
        return $this->hasMany(Tel::class);
    }

    public function agendas()
    {
        return $this->belongsToMany(Agenda::class);
    }

    public function deals()
    {
        return $this->hasMany(Deal::class);
    }

    public function trades()
    {
        return $this->hasMany(Trade::class);
    }
}
