<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
        'title','text','de','a',
        'created_at','updated_at'
    ];
}
