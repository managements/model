<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gain extends Model
{
    protected $fillable = [
        'prince','prince_store','deal_id',
        'created_at','updated_at'
    ];

    public function deal()
    {
        return $this->belongsTo(Deal::class);
    }
}
