<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    protected $fillable = [
        'taxes','justify_taxes','total_taxes',
        'tva','justify_tva','total_tva','company_id','created_at','updated_at'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function accounting()
    {
        return $this->hasMany(Accounting::class);
    }
}
