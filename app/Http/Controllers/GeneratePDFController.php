<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Applicant;
use App\Assessment;

class GeneratePDFController extends Controller
{
    public function index(Assessment $assessment)
    {
    	$assessment->load(['applicant', 'assessmentServices.serviceFees', 'fees']);
        $grandTotal = $assessment->grandTotal();
    	$pdf = \PDF::loadView('applicants.pdf.index', [
            'assessment' => $assessment,
            'grandTotal' => $grandTotal,
        ]);
    	// $pdf->setPaper('8.5x13', 'potrait');
        $pdf->setPaper('legal','portrait');
		return $pdf->stream();
    }
}
