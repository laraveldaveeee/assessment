<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class SufRate extends Model
{
    protected $fillable = [
    	'suf_name',
    	'rates'
    ];
    public function serviceTemplates()
    {
    	return $this->belongsToMany(ServiceTemplate::class)->withTimestamps();
    }
}


