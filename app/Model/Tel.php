<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tel extends Model
{
    protected $fillable = [
        'tel','company_id','info_id','deal_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function info()
    {
        return $this->belongsTo(Info::class);
    }

    public function deal()
    {
        return $this->belongsTo(Deal::class);
    }
}
