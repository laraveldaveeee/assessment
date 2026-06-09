<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Service extends Model
{
    public function sufRates()
    {
    	return $this->belongsToMany(SufRate::class)->withTimestamps();
    }

    // public function serviceFee()
    // {
    // 	return $this->belongsTo(ServiceFee::class);
    // }
}
