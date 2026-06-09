<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class ServiceFee extends Model
{
    protected $fillable = [
    	'code',
    	'name_fees',
    	'assessment_service_id',
    	'amount',
        'total',
        'enabled_year_computation',
        'enabled_surcharge',
        'surcharge_amount',
        'enabled_suf_surcharge',
        'enabled_portable_computation',
        'enabled_dst_default', // DST => 1 QTY
        'enabled_licensed_fee_computation'
    ];
    public function assessmentService()
    {
    	return $this->belongsTo(AssessmentService::class);
    }

    // public function feeTemplate()
    // {
    //     return $this->belongsTo(FeeTemplate::class);
    // }
}
