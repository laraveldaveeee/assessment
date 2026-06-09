<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class FeeTemplate extends Model
{
	/**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    public function serviceTemplate()
    {
    	return $this->belongsTo(ServiceTemplate::class);
    }

  
}
