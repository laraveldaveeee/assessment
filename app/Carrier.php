<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class Carrier extends Model
{
    use LogsActivity;
     protected $fillable = [
    	'applicant',
    	'address',
    ];

     protected static $logAttributes = [
        'applicant',
         'address'
    ];
    
    //protected $dates = ['due_date'];
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function assessments()
    {
        return $this->hasMany(Assessment::class);
    }
}
