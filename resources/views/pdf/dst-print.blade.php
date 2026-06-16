<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>NTC</title>
<link href="{{ asset('css/print.css') }}" rel="stylesheet" type="text/css" />

<style>
    @media print {
    body {
        margin: 0;
        padding: 0;
    }

    .col-5, .col-7 {
        float: none !important;
        width: 100% !important;
    }

    table {
        page-break-inside: avoid !important;
    }

    .no-break {
        page-break-inside: avoid;
    }
}
</style>
</head>

<body>

<div class="col-md-12">
    <table width="100%" style="background:#154360;color:#fff;">
        <tr>
            <td class="text-center">
                <small>
                    <strong>
                        Republic of the Philippines <br>
                        NATIONAL TELECOMMUNICATIONS COMMISSION <br>
                        Regional Office III, DMGC, Maimpis, City of San Fernando Pampanga <br>
                        Tel. No. (045) 961-3743 / Fax No. 861-7958
                    </strong>
                </small>
            </td>
        </tr>
    </table>
</div>

     <div class="col-md-12">
          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th colspan="2" class="text-center" style="background: #154360; color: #fff;"><small><strong>STATEMENT OF ACCOUNT<strong><small></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><small>Applicant: <strong>{{ $assessment->applicant->applicant_company }}</strong></small></td>
                <td>  
                  @if ($assessment->applicant->date_assessment)
                     <small>Date: <strong>{{ Carbon\Carbon::parse($assessment->applicant->date_assessment)->format('F d, Y') }}</strong></small>
                  @else
                     <small>Date: <strong>{{ Carbon\Carbon::parse($assessment->applicant->date_assessment)->format('F d, Y') }}</strong></small>
                  @endif

                   <br>
                      <small>Time In :<strong> {{ optional($assessment->time_update)->toTimeString() }}</strong></small>
                      <small>Time In (Accounting) :<strong> {{ optional($assessment->accounting_time_update)->toTimeString() }}</strong></small>
                </td>
              </tr>
              <tr>
                <td><small>Address: <strong> {{ $assessment->applicant->address }}</strong></small></td>
                <td><small>SOA #: <strong>{{ $assessment->soa_no }} | ID NO: {{ $assessment->applicant->id }}</strong></small></td>
              </tr>
              <tr>
                 <td><small>Status: 
                  @if ($assessment->status === 'For Payment')
                    <strong style="color: red;">-  {{ $assessment->status }}  (Cashier) </strong>
                  @elseif ($assessment->status === 'Paid')
                    <strong style="color: green">- {{ $assessment->status }}</strong>         
                  @elseif ($assessment->status === 'Advance assessment of fees only; subject for re-assessment/screening of application as to the completeness of requirements prior to payment')
                    <strong style="color: red">- {{ $assessment->status }}</strong>
                  @elseif ($assessment->status === 'Pending')
                    <strong style="color: orange">- {{ $assessment->status }}</strong>
                  @elseif ($assessment->status === 'Approved')
                    <strong style="color: blue;">- {{ $assessment->status }}</strong>
                  @endif                  
                </small>
              </td> 
                <td ><h4><strong>P {{ number_format($dstTotal, 2) }}</strong></h4></td>
              </tr>
              <tr>
                <td width="500px;"><small>Note: {!! $assessment->applicant->notes !!}</small> </td>
                <td> <small> To be paid on or before: <h5 > <strong>{{ optional($assessment->applicant->due_date)->format('F d, Y') }} </strong> </h5>  otherwise subject to re-assessment
              </small></td>

              </tr>
              <tr>
                <td >
                  {{--  <img src="{{ asset('signatures/karen.png') }}" style="width: 50px;">
                 <small> Assessed by : {{ $assessment->user->name }}</small> --}}
                <small>Assessed By: <br> <strong> Engr. {{ $assessment->user->name }}
 

                </strong></small>

                @if ($assessment->status == 'Pending' || $assessment->status == 'Approved' || $assessment->status == 'Paid')
                 @if ($assessment->user->id == 5 )
                  <figure class="signature-wrapper">
                    <img src="{{ asset('signatures/karen.png') }}" style="width: 200px; margin-top: -70px; margin-left: 63px;">
                  </figure>
                  @endif
                  @if ($assessment->user->id == 4)
                     <figure class="signature-wrapper">
                        <img src="{{ asset('signatures/mark.png') }}" style="width: 200px; margin-top: -70px; margin-left: 63px;">
                    </figure>
                  @endif
                    @if ($assessment->user->id == 17)
                    <figure class="signature-wrapper">
                      <img src="{{ asset('img/willymay.png') }}" style="width: 200px; margin-top: -70px; margin-left: 63px;">
                    </figure>
                  @endif
                   @if ($assessment->user_id == 16)

                     <figure class="signature-wrapper">
                        <img src="{{ asset('img/george.png') }}" style="width: 200px; margin-top: -120px; margin-left: 8px;">
                    </figure>
                  @endif
                   @if ($assessment->user_id == 26)

                     <figure class="signature-wrapper">
                        <img src="{{ asset('img/kat.png') }}" style="width: 220px; margin-top: -80px; margin-left: 8px;">
                    </figure>
                  @endif
                   @if ($assessment->user_id == 24)

                     <figure class="signature-wrapper">
                        <img src="{{ asset('img/ronald.png') }}" style="width: 150px; margin-top: -80px; margin-left: 8px;">
                    </figure>
                  @endif
                @endif
                </td>
                  <td colspan="2">
                  <p style="float:right;">
                    @if ($assessment->status === 'Approved' || $assessment->status === 'For Payment' || $assessment->status == 'Paid')
                      <img src="{{ asset('signatures/test.PNG') }}">
                      @elseif ($assessment->status === 'Advance assessment of fees only; subject for re-assessment/screening of application as to the completeness of requirements prior to payment' || $assessment->status === 'Pending assessment')
                        <small>
                            Approved by: <br>
                          {{--   @if ($user->role->name === 'chief engineer') --}}

                                <strong>Engr. Wilson O. Lejarde</strong> <br>
                           {{--  @endif   --}}
                          OIC Regional Director                       </small>
                    @endif
                    </p> 
                  </td>
                </tr> 
              </tbody>
            </table>
          </div>
 
{{-- ========================= --}}
{{-- SERVICES LOOP --}}
{{-- ========================= --}}
<div class="container">
  <div class="row"> 
    <div class="col-5"> 
    @foreach ($assessment->assessmentServices as $assessmentService) 
    @php
        $serviceFees = $dstFees->where(
            'assessment_service_id',
            $assessmentService->id
        ); 
        $serviceTotal = $serviceFees->sum('total');
    @endphp 

    <table width="100%" class="table table-bordered table-sm" style="margin-bottom:20px;">
        <thead>
            <tr>
                <th colspan="6" style="background:#154360;color:#fff;">
                    {{ $assessmentService->name }}
                    @if($assessmentService->expiration_date)
                        - {{ $assessmentService->expiration_date->format('F d, Y') }}
                    @endif
                </th>
            </tr>

            <tr>
                <th>Code</th>
                <th>YR</th>
                <th>%</th>
                <th>QTY</th>
                <th>FEE</th>
                <th>AMT</th>
            </tr>
        </thead>

        <tbody>

            @foreach ($serviceFees as $fee)
            <tr>
                <td>{{ $fee->name_fees }}</td>
                <td>{{ $assessmentService->yr  }}</td>
                <td></td>
                <td>{{ $assessmentService->qty ?? 1 }}</td>
                <td>{{ number_format($fee->total, 2) }}</td>
                <td>{{ number_format($fee->total, 2) }}</td>
            </tr>
            @endforeach

            <tr>
                <th colspan="5" style="text-align:right;">Service Total</th>
              <th>{{ number_format($serviceTotal, 2) }}</th>
            </tr> 
        </tbody>
        </table> 
        @endforeach
        </div>

         @if ($assessment->op_no) 
            <div class="col-7"> 
              <table class="table table-bordered table-sm">
                <thead>
                  <tr>
                    <th colspan="3" style="background: #154360;">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><small>Entity Name:<strong>NTC - Regional Office III</strong></small></td>
                    <td colspan="2"><small>Serial No:  <strong>{{ $assessment->op_no }}</strong></small></td>
                  </tr>
                  <tr>
                    <td><small>Fund Cluster :<strong>01</strong></small></td>
                    <td colspan="2">
                  @if ($assessment->applicant->assess_date)
                     <small>Date: <strong>{{ $assessment->applicant->assess_date->format('F d, Y')  }}</strong></small>
                  @else
                     <small>Date: <strong>{{ $assessment->created_at->format('F d, Y')  }}</strong></small>
                  @endif

                    </td>
                  </tr>
                  <tr>
                    <td colspan="3" class="text-center"><strong>ORDER OF PAYMENT</strong></td>
                  </tr>
                  <tr>
                    <td colspan="3"><small>The Collecting Officer</small></td>
                  </tr>
                  <tr>
                    <td colspan="3"><small>Cash/Treasury Unit</small></td>
                  </tr>
                  <tr>
                    <td colspan="3"><small>Please issue Official Receipt in favor of: &nbsp;<strong>{{ $assessment->applicant->applicant_company }}</strong></small></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td colspan="2"><small>(Name of Payor)</small></td>
                  </tr>
                  <tr>
                    <td colspan="3"><small>Address: <strong>{{ $assessment->applicant->address }}</strong></small></td>
                  </tr>
                  <tr>  
                    <td colspan="3"><small>in the amount of:  <strong>{{ convert_number_to_words($dstTotal) }} PESOS</strong></small></td>
                  </tr>
                  <tr>
                    <td colspan="3"><small>Amount: <strong>P {{ number_format($dstTotal, 2) }}</strong></small></td>
                  </tr>
                  <tr>
                    <td colspan="3">for payment of: 
                    @foreach($dstFeesGrouped as $name => $fees)
                          <small>
                            <strong>
                              {{ $name }} ({{ number_format($fees->sum('total'), 2) }})
                              {{ !$loop->last ? ',' : '' }}
                            </strong>
                          </small>
                    @endforeach
                    </td>
                    <tr> 
                      <td ><small>as per Statement of Account No. </small><br>
                         <small>
                          <strong>{{ optional($assessment)->soa_no }}</strong>
                        </small>
                      </td>
                      <td colspan="2"> 
                        @if ($assessment->applicant->assess_date)
                     <small>Date: <strong>{{ $assessment->applicant->assess_date->toFormattedDateString() }}</strong></small>
                        @else
                           <small>Date: <strong>{{ $assessment->created_at->toFormattedDateString() }}</strong></small>
                        @endif
                    </td>
                    </tr>
                    <tr>
                      <td colspan="3"><small>Please deposit the collection under Bank Account/s:</small></td>
                    </tr>
                    <tr>
                      <td><small>No.</small></td>
                      <td><small>Name of Bank</small></td>
                      <td><small>Amount</small></td>
                    </tr>
                    <tr>
                      <td><small><strong>3402-2641-78</strong></small></td>
                      <td><small><strong>LBP-WEST SN. FDO.</strong></small></td>
                      <td><small><strong>P {{ number_format($dstTotal, 2) }}</strong></small></td>
                    </tr>
                  </tr>
                </tbody>
              </table>

                <table class="table table-bordered table-sm">
                <tbody>
                  <tr>
                    <td class="text-right">
                      @if ($assessment->user_accounting_id == 11) 
                        <img src="{{ asset('img/FCA.png') }}" style="height: 20%; margin-bottom: -50px;">
                        <h5>Realyn S. Dayrit</h5> <br>
                      @elseif ($assessment->user_accounting_id == 10)
                      <img src="{{ asset('img/test.png') }}" style="height: 25%;"><br> 

                      @elseif ($assessment->user_accounting_id == 20)
                        <img src="{{ asset('img/anne.png') }}" style="height: 20%; margin-bottom: -35%; margin-left: 320px;">
                       <h5>Realyn S. Dayrit</h5> <br>
                      @endif
                      <small>Signature over Printed Name Head of Accounting</small><br>
                      <small>Division/Unit/Authorized Official</small>
                    </td>
                  </tr>
                </tbody>
              </table>
              <table class="table table-bordered table-sm">
                <tbody>
                  <tr>
                    <td><small>OR NO: <strong>{{ $assessment->or_no }}</strong></small></td>
                  </tr>
                  <tr>
                    <td><small>OR DATE: <strong>{{ optional($assessment->or_date)->format('F d, Y')  }}</strong></small></td>
                  </tr>
                  <tr>
                    <td><small>AMOUNT: <strong>P {{ $dstTotal, 2 }}</strong></small></td>
                  </tr>
                </tbody>
              </table>
            </div> 
         @endif  
        </div> 
      </div>    

</body>
</html>