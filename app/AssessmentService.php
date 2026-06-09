<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class AssessmentService extends Model
{
    protected $fillable = [
        'name',
        'qty',
        'yr',
        'expiration_date',
        'noted',
        'bandwidth',
        'enabled_portable_computation',
        'no_of_station'
    ];

    protected $dates = ['expiration_date'];
    public function sufRate()
    {
        return $this->belongsTo(SufRate::class, 'suff_rate_id');
    }
    public function assessment()
    {
        return $this->belongsTo(Assessment::class);
    }
    public function serviceFees()
    {
        return $this->hasMany(ServiceFee::class);
    } 
    public function fees()
    {
        return $this->hasMany(FeeTemplate::class);
    }
}