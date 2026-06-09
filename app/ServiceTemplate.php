<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class ServiceTemplate extends Model
{
	/**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    public function feeTemplates()
    {
    	return $this->hasMany(FeeTemplate::class);
    }
    public function sufRates()
    {
        return $this->belongsToMany(SufRate::class, 'service_template_suf_rate', 'service_template_id', 'suf_rate_id')->withTimestamps();
    }
}
 