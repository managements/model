<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    protected $fillable = [
        'image', 'product_id', 'agenda_id',
        'created_at','updated_at'
    ];
}
