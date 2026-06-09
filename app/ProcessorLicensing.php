<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class ProcessorLicensing extends Model
{
    protected $fillable = [
    	'code_name',
    	'fullname'
    ];
    public function licensingProcessings() 
    {
    	return $this->hasMany(LicensingProcessing::class);
    }
}
