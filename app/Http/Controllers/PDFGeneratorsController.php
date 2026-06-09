<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Assessment;
use App\Applicant;
use App\NewCarrier;
use App\User;
class PDFGeneratorsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index(Assessment $assessment)
    {
        $assessment->load(['applicant','assessmentServices.serviceFees', 'fees']);
        // return $assessment;
        $grouped    = $assessment->fees->groupBy('name_fees');
        $grandTotal = $assessment->grandTotal(); 
        $user       = User::where('role_id', 2)->first();
        $pdf        = \PDF::loadView('pdf.assessment', [
            'assessment'    => $assessment,
            'grouped'       => $grouped,
            'grandTotal'    => $grandTotal,
            'user'          => $user,
        ]);
        $pdf->setPaper('legal','portrait'); 
        return $pdf->stream(); 
    }

    public function receipt(Assessment $assessment)
    {
        $assessment->load(['applicant','assessmentServices.serviceFees', 'fees']);
        $grouped    = $assessment->fees->groupBy('name_fees');
        $grandTotal = $assessment->grandTotal(); 
        $pdf        = \PDF::loadView('pdf.receipt', [
            'assessment'    => $assessment,
            'grouped'       => $grouped,
            'grandTotal'    => $grandTotal,
        ]);
        $pdf->setPaper('legal','portrait'); 
        return $pdf->stream(); 
    }

    public function generateOP(Assessment $assessment) 
    {
        $assessment->load(['applicant', 'assessmentServices.serviceFees', 'fees']);
        $grouped = $assessment->fees->groupBy('name_fees');
        $grandTotal = $assessment->grandTotal();
        $pdf = \PDF::loadView('pdf.assessment-print-cashier', [
            'assessment'    => $assessment,
            'grouped'       => $grouped,
            'grandTotal'    => $grandTotal
        ]);
        $pdf->setPaper('legal', 'portrait');
        return $pdf->stream();
    }

    public function printCarrier(Assessment $assessment)
    {
         $assessment->load(['categories', 'carrier']);
        $grandTotals = $assessment->grandTotalCarrier();
        $pdf = \PDF::loadView('pdf.carrier-print', [
            'assessment'    => $assessment,
            'grandTotals'    => $grandTotals,
        ]);
        return $pdf->stream();
    }

    public function routing(Assessment $assessment)
    {
        $assessment->load(['applicant', 'assessmentServices.serviceFees', 'fees']);
        $pdf = \PDF::loadView('pdf.routing-slip', [
            'assessment'    => $assessment, 
        ]);
        $pdf->setPaper('legal', 'portrait');
        return $pdf->stream();
    }

    public function printNewCarrier(NewCarrier $newCarrier)
    {  
        $pdf = \PDF::loadView('pdf.newCarrier', [
            'newCarrier'    => $newCarrier, 
        ]);
        $pdf->setPaper('legal', 'portrait');
        return $pdf->stream();
    }

    public function filtering()
    {
        $newCarriers = NewCarrier::query(); 
        $classStations = NewCarrier::query(); 

        if (request()->has('from') && request()->has('to')) { 
             $classStations->whereBetween('or_date', [request('from'), request('to')])->get(); 
        } 
       if (request('class_stations')) { 
            $classStations->where('class_stations', 
                           request('class_stations'));
        } 
        if (request('fees')) { 
            $classStations->where('fees', 
                            request('fees'));
        } 

        $classStations = $classStations->orderBy('or_date')->orderBy('or_no')->get();
        
        $pdf = \PDF::loadView('pdf.filter', [
            'newCarriers'     => $newCarriers, 
            'classStations'    => $classStations, 
        ]);
        $pdf->setPaper('legal', 'landscape');
        return $pdf->stream();
    }

    public function routingCarrier(NewCarrier $newCarrier)
    {
         $pdf = \PDF::loadView('pdf.routingCarrier', [
            'newCarrier'    => $newCarrier, 
        ]);
        $pdf->setPaper('legal', 'portrait');
        return $pdf->stream();
    }  

    public function carrierReceipt(NewCarrier $newCarrier)
    {
         $pdf = \PDF::loadView('pdf.carrier-receipt', [ 
            'newCarrier'    => $newCarrier , 
        ]);
        $pdf->setPaper('legal', 'portrait');
        return $pdf->stream();
    }
}

