<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Assessment;
use App\Applicant;
use App\NewCarrier;
use App\ServiceFee;
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

    //PER DST
  public function printDST($assessmentId)
    {
        // $assessment = Assessment::with('serviceFees')->findOrFail($assessmentId);
        // $dstFees = $assessment->serviceFees()
        //     ->whereRaw('LOWER(name_fees) = ?', ['dst'])
        //     ->get()
        //     ->groupBy('name_fees');
        // $dstTotal = $dstFees->flatten()->sum('total');
        // $pdf = \PDF::loadView('pdf.dst-print', [
        //     'assessment' => $assessment,
        //     'dstFees' => $dstFees, 
        //     'dstTotal' => $dstTotal, 
        // ]);

        $assessment = Assessment::with([
            'serviceFees',
            'assessmentServices',
            'applicant',
            'user'
        ])->findOrFail($assessmentId);

        $dstFees = $assessment->serviceFees()
            ->whereRaw('LOWER(name_fees) = ?', ['dst'])
            ->get(); 

        $dstFeesGrouped = $dstFees->groupBy('name_fees');

        $dstTotal = $dstFees->sum('total');

        $pdf = \PDF::loadView('pdf.dst-print', [
            'assessment' => $assessment,
            'dstFees'     => $dstFees,
            'dstFeesGrouped'     => $dstFeesGrouped,
            'dstTotal'    => $dstTotal,
        ])->setOption('margin-top', 10)
          ->setOption('margin-right', 10)
          ->setOption('margin-bottom', 20)
          ->setOption('margin-left', 10);

        return $pdf->stream('DST-' . $assessment->id . '.pdf');
    }

    public function printReceiptDST($assessmentId)
    {
        $assessment = Assessment::with('serviceFees')->findOrFail($assessmentId);
        $dstFees = ServiceFee::whereHas('assessmentService', function ($q) use ($assessmentId) {
                $q->where('assessment_id', $assessmentId);
            })
            ->whereRaw("LOWER(TRIM(name_fees)) = 'dst'")
            ->get()
            ->groupBy('name_fees');
        $dstTotal = $dstFees->flatten()->sum('total');
        $pdf = \PDF::loadView('pdf.receipt-dst', [
            'assessment' => $assessment,
            'dstFees'     => $dstFees,
            'dstTotal'    => $dstTotal,
        ]);
        return $pdf->stream('DST-' . $assessment->id . '.pdf');
    }

    public function printReceiptSUF($assessmentId)
    {
        $assessment = Assessment::with('serviceFees')->findOrFail($assessmentId);
        $fees = ServiceFee::whereHas('assessmentService', function ($q) use ($assessmentId) {
                $q->where('assessment_id', $assessmentId);
            })
            ->get(); 
        // SUF ONLY (keyword match) 
        $sufFees = $fees->filter(function ($fee) {
            return stripos($fee->name_fees, 'suf') !== false;
        });

        $sufGrouped = $sufFees->groupBy('name_fees');
        $sufTotal = $sufFees->sum('total');

        return \PDF::loadView('pdf.receipt-suf', [
            'assessment' => $assessment,
            'sufFees' => $sufGrouped,
            'sufTotal' => $sufTotal,
        ])->stream('SUF-'.$assessmentId.'.pdf');
    }

    public function printSUF($assessmentId)
    {
        // $assessment = Assessment::with('serviceFees')->findOrFail($assessmentId); 
        // $sufFees = ServiceFee::whereHas('assessmentService', function ($q) use ($assessmentId) {
        //         $q->where('assessment_id', $assessmentId);
        //     })
        //     ->where(function ($q) {
        //         $q->whereRaw("LOWER(name_fees) LIKE '%suf%'");
        //     })
        //     ->get(); 

        $assessment = Assessment::with([
            'serviceFees',
            'assessmentServices',
            'applicant',
            'user'
        ])->findOrFail($assessmentId);

        $sufFees = ServiceFee::whereHas('assessmentService', function ($q) use ($assessmentId) {
            $q->where('assessment_id', $assessmentId);
        })
        ->whereRaw("LOWER(name_fees) LIKE '%suf%'")
        ->get();

        $sufFeesGrouped = $sufFees->groupBy('name_fees');
        $sufTotal = $sufFees->sum('total'); 
        
        $pdf = \PDF::loadView('pdf.suf-print', [
            'assessment' => $assessment,
            'sufFees' => $sufFees,
            'sufFeesGrouped'  => $sufFeesGrouped,
            'sufTotal' => $sufTotal,
        ])->setOption('margin-top', 10)
          ->setOption('margin-right', 10)
          ->setOption('margin-bottom', 20)
          ->setOption('margin-left', 10);

        return $pdf->stream('SUF-' . $assessment->id . '.pdf');
    }

}

