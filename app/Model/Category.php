<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category'];

    public $timestamps = false;

    public function posts()
    {
        $this->hasMany(Post::class);
    }
}
