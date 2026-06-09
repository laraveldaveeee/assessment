<!DOCTYPE html>
<html lang="en">
<<<<<<< HEAD
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>NTC</title>
<link rel="stylesheet" href="{{ asset('css/style.css') }}"   />
</head>
<body>
<header class="clearfix">

<div  style="font-family: sans-serif;"><center><small>NATIONAL TELECOMMUNICATIONS COMMISSION</small></center></div>
<div  style="font-family: sans-serif;"><center><small>REGIONAL OFFICE 3 </small>  </center></div>
<div><p style="float:right; font-family:sans-serif; margin-top: -19px;"> Bill No: {{ $assessment->soa_no }}</p></div>  
<div style="font-family: sans-serif;"><center><small>Region Office III, Maimpis City of San Fernando, Pampanga</small></center></div>
<div style="font-family: sans-serif;"><center>STATEMENT OF ACCOUNT</center></div>
<div><p style="float:right; margin-top: -10px; font-family: sans-serif;"> Date: {{ $assessment->applicant->created_at->toFormattedDateString() }}</p></div>  
<br>
<div id="" class="clearfix">
<div>
    <table style="width: 100%;">
        <thead>
            <tr>
                <th style="background: #3498DB; color: #fff; font-family: sans-serif;text-align: left;">&nbsp; Bill To:</th>
                <th style="background: #3498DB; color: #fff;">&nbsp; <b> </b></th>
                <th style="background: #3498DB; color: #fff;">&nbsp; <b> </b></th>
                <th style="background: #3498DB; color: #fff;">&nbsp; <b> </b></th>
                <th style="background: #3498DB; color: #fff;">&nbsp; <b> </b></th>
                <th style="background: #3498DB; color: #fff; text-align: right; font-family: sans-serif;">&nbsp;  Account Summary &nbsp;</th>
            </tr>
        </thead>
        <tbody style="background: #ECF0F1;">
                <td style="font-family: sans-serif;">&nbsp;Applicant: <b>{{ $assessment->applicant->applicant_company }}</b></td>
                <td></td>
                <td></td>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="font-family: sans-serif;">&nbsp;Address: {{ $assessment->applicant->address }} </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
 
 <br>
       {{--  @php
            $sum = 0;
        @endphp --}}
        @foreach ($assessment->assessmentServices as $assessment)
            @php
                $quantity = $assessment->qty;
                $year     = $assessment->yr;
            @endphp
            <table class="table table-bordered" style="width: 100%">
                <thead  style="background: #3498DB; font-family: sans-serif;">
                    <tr>
                    <th style=" color: #fff; text-align: left;"><small> &nbsp;{{ $assessment->name }}</small></th>
                        <th style="color:#fff;">YR</th>
                        <th style="color:#fff;">QTY</th>
                        <th style="color:#fff;">FEE</th>
                        <th style="color:#fff;">TOTAL</th>
                    </tr>
                </thead>
                <tbody style="background: #ECF0F1;">
                    @if ($assessment->roc_fee)
                        <tr>
                            <td style="font-family: sans-serif;">&nbsp;<small>603 (2) Roc Fee</small></td>
                            <td align="center">{{ $year }}</td>
                            <td align="center">{{ $quantity }}</td>
                            <td align="center">{{ $assessment->roc_fee }}</td> 
                            <td align="center">{{ $assessment->totalFee($assessment->roc_fee) }}</td>
                        </tr>
                    @endif
                    @if ($assessment->filing_fee)
                        <tr>
                            <td  style="font-family: sans-serif;">&nbsp;<small>628 (2) Filing Fee</small></td>
                            <td align="center"></td>
                            <td align="center">{{ $quantity }}</td>
                            <td align="center">{{ $assessment->filing_fee }}</td>
                            <td align="center">{{ $assessment->qty * $assessment->filing_fee }}</td>
                        </tr>
                    @endif

                    @if ($assessment->app_fee)
                    <tr>
                        <td  style="font-family: sans-serif;">&nbsp;<small>628 (1) App Fee</small></td>
                        <td></td>
                        <td align="center">{{ $quantity }}</td>
                        <td align="center">{{ $assessment->app_fee }}</td>
                        <td align="center">{{ $quantity  * $assessment->app_fee  }}</td>
                    </tr>
                    @endif

                    @if ($assessment->dst_fee)
                        <tr>
                            <td  style="font-family: sans-serif;">&nbsp;<small>Dst</small></td>
                            <td></td>
                            <td align="center">{{ $quantity }}</td>
                            <td align="center">{{ $assessment->dst_fee }}</td>
                            <td align="center">{{ $assessment->dst_fee * $quantity }}</td>
                        </tr>
                    @endif

                    @if ($assessment->examination_fee)
                    <tr>
                            <td style="font-family: sans-serif;">&nbsp;<small>Examination Fee</small></td>
                            <td>{{ $year }}</td>
                            <td>{{ $quantity }}</td>
                            <td>{{ $assessment->examination_fee }}</td>
                            <td>{{ $quantity * $assessment->examination_fee * $year }}</td>

                    </tr>
                    @endif

                    @if ($assessment->radio_station_license_fee)
                    <tr>
                        <td  style="font-family: sans-serif;">&nbsp;<small>603 (1) Rad. Stn. Lic.</small></td>
                        <td style="margin-left: -100; ">{{ $year }}</td>
                        <td>{{ $quantity }}</td>
                        <td>{{ $assessment->radio_station_license_fee }}</td>

                        <td>{{ $assessment->totalFee($assessment->radio_station_license_fee)  }}</td>
                    </tr>
                    @endif
                    @if ($assessment->inspection_fee)
                    <tr>
                      <td>Inspection Fee</td>
                      <td>{{ $year }}</td>
                      <td>{{ $quantity }}</td>
                      <td>{{ $assessment->inspection_fee }}</td>
                      <td>{{ $assessment->totalFee($assessment->inspection_fee) }}</td>
                    </tr>
                    @endif

                    @if ($assessment->construction_permit_fee)
                    <tr>
                      <td>Construction Fee</td>
                      <td> </td>
                      <td>{{ $quantity }}</td>
                      <td>{{ $assessment->construction_permit_fee }}</td>
                      <td>{{ $assessment->construction_permit_fee }}</td>  
                    </tr>
                    @endif
                </tbody>
            </table>
        @endforeach
 
    </div>
</div>
<!-- end panel -->

 

<table class="" style="width: 100%;">
    <thead style="background: #3498DB; font-family: sans-serif;">
        <tr>
            <th style="color: #fff;" align="right">GrandTotal: <b style="color: #ffff;"> P {{ $grandTotal }}.00</b> &nbsp;</th>
        </tr>
    </thead>
</table>
{{-- <div style="background: #17A589; color: #fff;"> GrandTotal {{ $grandTotal }} {{ num_to_words($grandTotal) }}</div> --}}
</main>
<br>
    <header class="clearfix">
      <div id="" class="clearfix">
        <table style="width: 100%;">
            <tbody align="right">
                <tr>
                    <td style="font-family: sans-serif;">Approved by: &nbsp;</td>
                </tr>
                <tr>
                    <td style="font-family: sans-serif;"><u>Engr. Wilson O. Lejarde</u> &nbsp;</td>
                </tr>
                <tr>
                    <td style="font-family: sans-serif;"><i>Engr. V</i> &nbsp;</td>
                </tr>
            </tbody>
        </table>
=======
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>NTC</title>
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('css/print.css') }}"> 
   </head>
   <body>
      <header class="clearfix">
      <div class="serif-font center"><small>NATIONAL TELECOMMUNICATIONS COMMISSION</small></div>
      <div class="serif-font center"><small>REGIONAL OFFICE 3 </small> </div>
      <div>
         <p class="paragraph-1"> Bill No: {{ $assessment->soa_no }}</p>
      </div>
      <div class="serif-font center"><small>Region Office III, Maimpis City of San Fernando, Pampanga</small></div>
      <div class="serif-font center">STATEMENT OF ACCOUNT</div>
      <div>
         <p class="paragraph"> Date: {{ $assessment->applicant->created_at->toFormattedDateString() }}</p>
      </div>
      <br>
      <div id="" class="clearfix">
      <div>
         <table class="table-1" style="width: 100%;">
            <thead>
               <tr>
                  <th> Bill To:</th>
                  <th> Address </th>
                  <th> GrandTotal </th>
               </tr>
            </thead>
            <tbody>
                <td class="serif-font text-small"> {{ $assessment->applicant->applicant_company }} </td>
                <td class="serif-font text-small">{{ $assessment->applicant->address }}</td>
                <td class="serif-font text-small"><b>P {{ $grandTotal }}.00</b></td>
            </tbody>
         </table>
      </div>



{{-- @foreach ($assessment->assessmentServices as $assessment)

@php
    $assessmentSplit = $assessment->serviceFees->chunk(round($assessment->serviceFees->count() / 2));
@endphp
 --}}
      <table class="table-bordered">
         <tr>
            <td>
               <table class="table table-bordered" >
                  <thead>
                     <tr>
                        <th colspan="5">RLM NEW</th>
                     </tr>
                     <tr>
                        <th>Code</th>
                        <th>Qty</th>
                        <th>Yr</th>
                        <th>Fee</th>
                        <th>Total</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td class="text-small">Radio Lic. Fee</td>
                        <td>1</td>
                        <td>1</td>
                        <td>230</td>
                        <td>230</td>
                     </tr>
                  </tbody>
               </table>
            </td>
            <td>
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th colspan="5" >RLM NEW</th>
                     </tr>
                     <tr>
                        <th>Code</th>
                        <th>YR</th>
                        <th>QTY</th>
                        <th>FEE</th>
                        <th>TOTAL</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td class="text-small">Radio Lic. Fee</td>
                        <td>1</td>
                        <td>1</td>
                        <td>500</td>
                        <td>500</td>
                     </tr>
                  </tbody>
               </table>
            </td>
            <td>
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th colspan="5">RLM NEW</th>
                     </tr>
                     <tr>
                        <th>Code</th>
                        <th>YR</th>
                        <th>QTY</th>
                        <th>FEE</th>
                        <th>TOTAL</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td class="text-small">Radio Lic. Fee</td>
                        <td>1</td>
                        <td>1</td>
                        <td>600</td>
                        <td>600</td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
      </table>
      {{-- @endforeach --}}

      
      <div>
          <p>Assess by: {{ $assessment->user->name }}</p>
>>>>>>> aa26a19d7ef1a56ab71c4f006c90a1e9c1c7ec68
      </div>

         <header class="clearfix">
            <div id="" class="clearfix">
              <table style="width: 100%;">
                  <tbody align="right">
                      <tr>
                          <td class="serif-font">Approved by: &nbsp;</td>
                      </tr>
                      <tr>
                          <td class="serif-font"><u>Engr. Wilson O. Lejarde</u> &nbsp;</td>
                      </tr>
                      <tr>
                          <td class="serif-font"><i>Engr. V</i> &nbsp;</td>
                      </tr>
                  </tbody>
              </table>
            </div>
        </header>


  <hr> 
  <div class="clearfix">
      <table class="table table-bordered">
          <thead>
            <tr>
              <th style="text-align: center;" colspan="6">&nbsp;</th>
            </tr>
          </thead>
          <tbody>
            <tr>&nbsp; 
              <td>&nbsp; Entity Name: <b>NTC - Regional Office III</b></td>
              <td colspan="5" align="right">&nbsp; Serial No: <b>{{ $assessment->op_no }}</b> &nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp; Fund Cluster: <b>01</b></td>
              <td colspan="5" align="right">&nbsp; Date: <b>{{ $assessment->applicant->created_at->toFormattedDateString() }}</b> &nbsp;</td>
            </tr>
            <tr>
             <th style="text-align: center;" colspan="6">&nbsp; <b>ORDER OF PAYMENT</b></th>
            </tr>
            <tr>
              <td colspan="6">&nbsp; The Collecting Officer:</td>
            </tr>
            <tr>
              <td colspan="6">&nbsp; Cash / Treasury Unit:</td>
            </tr>
            <tr>
                <td>&nbsp; Please issue Official Receipt in favor of: &nbsp;&nbsp; <b>{{ $assessment->applicant->applicant_company }}</b></td>
                <td colspan="5" align="right">Address: <b>{{ $assessment->applicant->address }}</b> &nbsp;</td>
            </tr>
            <tr>
              <td colspan="6">&nbsp; (Name of Payor)</td>
            </tr>
            <tr>
              <td>&nbsp; in the amount of &nbsp; <b>{{ num_to_words($grandTotal) }}</b></td>
              <td colspan="5" align="right"><b>Amount: P {{ $grandTotal }}.00</b> &nbsp;</td>
            </tr>
            <tr>
              <td colspan="6">&nbsp; for payment of &nbsp; <b>Radio Lic. Fee (1330)</b></td>
            </tr>
            <tr>
              <td>&nbsp; as per Statement of Account No. &nbsp; <b>{{ $assessment->soa_no }}</b></td>
              <td colspan="5" align="right">Dated: <b>{{ $assessment->applicant->created_at->toFormattedDateString() }}</b> &nbsp;</td>
            </tr>
            <tr>
              <th align="center" colspan="6">&nbsp; <b>Please deposit the collection under Bank Account/s:</b></th>
            </tr>
            <tr>
              <td>&nbsp; No.</td>
              <td>&nbsp; Name of Bank</td>
              <td colspan="4" align="right">&nbsp; Amount &nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp; <b>3402-2641-78</b></td>
              <td>&nbsp; <b>LBP-WEST SN. FDO.</b></td>
              <td colspan="4" align="right">&nbsp; <b>P {{ $grandTotal }}.00</b> &nbsp; </td>
            </tr>
            <tr>
              <td colspan="6"></td>
            </tr> 
            <tr>
              <td colspan="6"></td>
            </tr>
            <tr>
              <td colspan="6"></td>
            </tr>
            <tr>
              <td colspan="6"></td>
            </tr>
            <tr>
              <td colspan="6"></td>
            </tr>
             <tr>
              <td colspan="6"></td>
            </tr>
            <tr>
              <td colspan="6"></td>
            </tr>
            <tr>
              <td colspan="6"></td>
            </tr>
            <tr>
              <td colspan="6"></td>
            </tr>

            <tr>
              <td align="right" colspan="6"><u>REALYN A. SISON-DAYRIT</u> &nbsp;</td>
            </tr>
            <tr>
              <td align="right" colspan="6">Signature over Printed Name Head of Accounting &nbsp;</td>
            </tr>
            <tr>
               <td colspan="6" align="right">Division/Unit/Authorized Official &nbsp; </td>
            </tr>
          </tbody>
      </table>
  </div>
  <br>

    <table style="width: 20%;">
        <tbody style="background: #F1948A">
            <tr>
                <td>&nbsp; OR NO: <u><b>{{ $assessment->or_no }}</b></u> </td>
            </tr>
            <tr>
                <td>&nbsp; OR DATE: <u><b>{{ $assessment->applicant->created_at->toFormattedDateString() }}</b></u></td>
            </tr>
            <tr>
                <td>&nbsp; AMOUNT: <u><b>P {{ $grandTotal }}.00</b></u></td>
            </tr>
        </tbody>
    </table>

   </body>
</html>