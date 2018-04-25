<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    protected $fillable = [
        'email','company_id','info_id','deal_id','created_at'
    ];

    public $timestamps = false;

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
