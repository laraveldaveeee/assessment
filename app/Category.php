<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class Category extends Model
{
	use LogsActivity;
     protected $fillable = [
    	'carrier_id',
    	'assessment_id', //Optional
		'description',
		'amount',
    ];	

	protected static $logFillable = true;

    public function carrier() 
    {
    	return $this->belongsTo(Carrier::class);
    }

    public function assessment()
    {
    	return $this->belongsTo(Assessment::class);
    }   
  
}
