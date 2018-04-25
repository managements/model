<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
        'title','text','de','a',
        'created_at','updated_at'
    ];

    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    public function infos()
    {
        return $this->belongsToMany(Agenda::class);
    }

    public function imageProducts()
    {
        return $this->hasMany(ImageProduct::class);
    }
}
