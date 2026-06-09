<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
// use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;

class Applicant extends Model
{
    use LogsActivity;
    // use HasTrixRichText;
    protected $fillable = [
    	'applicant_company',
    	'address',
        'due_date',
        'assess_date',
        'nature_of_documents',
        'notes',
    ];
    protected static $logAttributes = [
        'applicant_company',
         'address'
    ];
    protected $dates = ['due_date', 'assess_date'];
    public function latestAssessment()
    {
        return $this->hasOne(Assessment::class)->latest();
    }
    public function assessments()
    {
    	return $this->hasMany(Assessment::class);
    }
    public function service()
    {
    	return $this->belongsTo(Service::class);
    }
 
}
