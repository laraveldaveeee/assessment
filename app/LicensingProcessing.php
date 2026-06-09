<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class LicensingProcessing extends Model
{
    protected $fillable = [
    	'date_of_distribution',
    	'applicant_company',
    	'or_date',
    	'or_number',
    	'license_filed',
    	'processor',
    	'remarks',
    	'date_processed',
        'requirements',
        'quantity',
        'reason',
        'date_releasing',
        'signature',
        'name_receiver',
        'date_receive'

    ];
    protected $dates = ['date_of_distribution','date_processed','date_releasing','or_date'];
    public function processorLicensing()
    {
        return $this->belongsTo(ProcessorLicensing::class);
    }
}
