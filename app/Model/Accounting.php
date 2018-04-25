<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Accounting extends Model
{
    protected $fillable = [
        'taxes','tva','piece','trade_id','post_id','created_at','updated_at'
    ];

    public function trade()
    {
        return $this->belongsTo(Trade::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
