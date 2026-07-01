<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Haruncpi\LaravelIdGenerator\IdGenerator;
class Assessment extends Model
{
    use LogsActivity;

    protected $with = ['applicant', 'carrier'];
    
    protected $fillable = [
        'soa_prefix',
        'soa_no',
        'soa_year',
        'date_validity',
        'status',
        'user_id',
        'applicant_id',
        'user_accounting_id',
        'user_cashier_id',
        'messages',
        'or_no',
        'or_no_suf',
        'or_no_dst',
        'op_no',
        'or_date',
        'order_payment_date',
        'notes',
        'date_assessment',
        'soa_number',
        'class_station',
        'remarks',
        'noted',
        'due_date',
        'accounting_time_update',
        'cashier_time_update',
        'time_update',
        'carrier_status',
        'date_of_treasury',
        'recieved',
        'treasury'
    ];
    
    protected $dates = [
        'or_date',
        'created_at',
        'order_payment_date', 
        'accounting_time_update',
        'time_update',
        'date_validity', 
        'cashier_time_update', 
        'date_assessment'
    ];
 
    protected static $logFillable = true;
    public function serviceFees()
    {
        return $this->hasManyThrough(ServiceFee::class, AssessmentService::class);
    }
    public function sumTotal($name)
    {
        return $this->serviceFees->where('name_fees', $name)->sum('total');
    }

    public function sumFees($name) 
    {
         return $this->serviceFees->where('name_fees', $name)->sum('total');
    }

  

    // public function sumTotalReports($name)
    // {
    //     return $this->serviceFees->where('name_fees', $name)->sum('total');
    // }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function applicant()
    {
        return $this->belongsTo(Applicant::class);
    }
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
     public function carrier()
    {
        return $this->belongsTo(Carrier::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    
    public function assessmentServices()
    {
        return $this->hasMany(AssessmentService::class);
    }
    public function getSoaNoAttribute($value = null)
    {
        // if ($value) {
        //     return $this->soa_prefix . '-' . $value;
        // }
        if ($value) {
            $pieces  = explode('-', $value);
            $year    = $pieces[0];
            $counter = $pieces[1];
            return 'SOA-' . $counter . '-' . $year;
        }
    }
   
    public function grandTotal()
    {
        return $this->fees->sum('total');
    }

    public function grandTotalCarrier()
    {
        return $this->categories->sum('amount');
    }


    /**
     * Get all of the fees for the assessment.
     */
    public function fees()
    {
        return $this->hasManyThrough(ServiceFee::class, AssessmentService::class);
    }
  
    public static function applicants()
    {
        if (auth()->user()->isAdmin()) {
            return Assessment::with('applicant')->where('status', 'Verified')->latest()->get();
        }      
        if (auth()->user()->isChiefEngineer()) {
            return Assessment::with('applicant')->where('status', 'Pending')->take(5)->latest()->get();
        }               
        if (auth()->user()->isAccessor()) {
            return Assessment::with('applicant')->where('status', 'Verified')->take(5)->latest()->get();
        }        
        if (auth()->user()->isChiefEngineer()) {
            return Assessment::with('applicant')->where('status', 'Approved')->take(5)->latest()->get();
        }
        if (auth()->user()->isAccounting()) {
            return Assessment::with('applicant')->where('status', 'Approved')->take(5)->latest()->get();
        }        
        if (auth()->user()->isCashier()) {
            return Assessment::with('applicant')->where('status', 'For Payment')->take(5)->latest()->get();
        }        
    }
}
