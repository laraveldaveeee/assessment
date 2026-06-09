<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewCarrier extends Model
{
    protected $guarded = [];

     protected $dates = [ 

        'from',
        'to'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }


//  public function sumAmount($name)
// {

//      $query = NewCarrier::query();

//     if (request()->filled('from') && request()->filled('to')) {
//         $query->whereBetween('or_date', [request('from'), request('to')]);
//     }

//     if (request()->filled('applicant_company')) {
//         $query->where('applicant_company', 'like', '%' . request('applicant_company') . '%');
//     }

//     if (request()->filled('class_stations')) {
//         $query->where('class_stations', request('class_stations'));
//     }

//     if (request()->filled('fees')) {
//         $query->where('fees', request('fees'));
//     }

//     $query->where('fees', $name);

//     // Fix: Handle varchar amounts
//     return $query->get()->sum(function ($item) {
//         return (float) str_replace(',', '', $item->amount);

//     });
    
// }


//     public function sumClass($class_station)
//     { 
//         $classStations = NewCarrier::query(); 
//         if (request()->has('from') && request()->has('to')) { 
//              $classStations->whereBetween('or_date', [request('from'), request('to')])->get();
//         }

//        if (request('class_stations')) {
//             $classStations->where('class_stations', request('class_stations'));
//         }   

//         // foreach ($classStations as $assessment) {
//         //     $total = $assessment->license_fee + $assessment->inspection_fee + $dst;
//         // }
        
//         return $classStations = $classStations->where('class_stations', $class_station)->sum('total_class'); //Ga 
//     } 
 
 public function sumAmount($name)
{
    $query = NewCarrier::query();

    if (request()->filled('from') && request()->filled('to')) {
        $query->whereBetween('or_date', [request('from'), request('to')]);
    }

    if (request()->filled('applicant_company')) {
        $query->where('applicant_company', 'like', '%' . request('applicant_company') . '%');
    }

    if (request()->filled('class_stations')) {
        $query->where('class_stations', request('class_stations'));
    }

    if (request()->filled('fees')) {
        $query->where('fees', request('fees'));
    }

    // Filter by the specific fee type
    $query->where('fees', $name);

    // Clean and sum
    return $query->get()->sum(function ($item) {
        return (float) preg_replace('/[^\d.]/', '', $item->amount);
    });
}


public function sumClass($class_station)
{
    $query = NewCarrier::query();

    if (request()->filled('from') && request()->filled('to')) {
        $query->whereBetween('or_date', [request('from'), request('to')]);
    }

    // ✅ Missing part added — applicant_company filter
    if (request()->filled('applicant_company')) {
        $query->where('applicant_company', 'like', '%' . request('applicant_company') . '%');
    }

    if (request()->filled('class_stations')) {
        $query->where('class_stations', request('class_stations'));
    }

    // Filter by the passed class station
    $query->where('class_stations', $class_station);

    // Clean and sum total_class
    return $query->get()->sum(function ($item) {
        return (float) preg_replace('/[^\d.]/', '', $item->total_class);
    });
}
        
}
