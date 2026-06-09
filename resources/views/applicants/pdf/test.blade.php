<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
      <title>NTC</title>
      <link rel="stylesheet" href="{{ asset('css/style.css') }}"   />
      <link rel="stylesheet" href="{{ asset('css/print.css') }}"   />
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
               </tr>
            </thead>
            <tbody style="background: #ECF0F1;">
               <td class="serif-font text-small"> {{ $assessment->applicant->applicant_company }} </td>
               <tr>
                  <td class="serif-font text-small">{{ $assessment->applicant->address }}</td>
               </tr>
            </tbody>
         </table>
      </div>
 
        <br>



       {{--  @foreach ($assessment->assessmentServices as $assessment)
            <table class="table table-bordered">
              <thead>
                <tr>
                    <th>{{ $assessment->name }}</th>
                </tr>
                <tr>
                  <th>CODE</th>
                  <th>YR</th>
                  <th>QTY</th>
                  <th>FEE</th>
                  <th>TOTAL</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($assessment->serviceFees as $assessmentService)
                <tr>
                    <td>{{ $assessmentService->name_fees }}</td>
                    <td>{{ $assessmentService->enabled_year_computation ? $assessment->yr : '' }}</td>
                    <td>{{ $assessment->qty }}</td>
                    <td>{{ $assessmentService->amount }}</td>
                    <td>{{ $assessmentService->total }}</td>
                </tr>
              </tbody>
            @endforeach
          </table>
        @endforeach
 --}}



@foreach ($assessment->assessmentServices as $assessment)

@php
    $assessmentSplit = $assessment->serviceFees->chunk(round($assessment->serviceFees->count() / 2));
@endphp
 <table class="table table-bordered">
    <tr>
        <td>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>CODE</th>
                    <th>YR</th>
                    <th>QTY</th>
                    <th>FEE</th>
                    <th>TOTAL</th>
                </tr>
                </thead>

                @foreach($assessmentSplit[0] as $assessmentService)
                <tbody> 
                    <tr>
                        <td>{{ $assessmentService->name_fees }}</td>
                        <td>{{ $assessmentService->enabled_year_computation ? $assessment->yr : '' }}</td>
                        <td>{{ $assessment->qty }}</td>
                        <td>{{ $assessmentService->amount }}</td>
                        <td>{{ $assessmentService->total }}</td>
                      
                    </tr>
                </tbody>
                @endforeach
            </table>
        </td>
        <td>

             <table class="table table-bordered">

                <thead>
                <tr>
                    <th>CODE</th>
                    <th>YR</th>
                    <th>QTY</th>
                    <th>FEE</th>
                    <th>TOTAL</th>
                </tr>
                </thead>

                @foreach($assessmentSplit[1] as $assessmentService)
                <tbody>
                    <tr>
                        <td>{{ $assessmentService->name_fees }}</td>
                        <td>{{ $assessmentService->enabled_year_computation ? $assessment->yr : '' }}</td>
                        <td>{{ $assessment->qty }}</td>
                        <td>{{ $assessmentService->amount }}</td>
                        <td>{{ $assessmentService->total }}</td>
                       
                    </tr>
                </tbody>
                @endforeach
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table class="table table-bordered">
                  <thead>
                <tr>
                    <th>CODE</th>
                    <th>YR</th>
                    <th>QTY</th>
                    <th>FEE</th>
                    <th>TOTAL</th>
                </tr>
                </thead>

                @foreach($assessmentSplit[0] as $assessmentService)
                <tbody> 
                    <tr>
                        <td>{{ $assessmentService->name_fees }}</td>
                        <td>{{ $assessmentService->enabled_year_computation ? $assessment->yr : '' }}</td>
                        <td>{{ $assessment->qty }}</td>
                        <td>{{ $assessmentService->amount }}</td>
                        <td>{{ $assessmentService->total }}</td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>

@endforeach
        
 
    </div>
</div>
@endforeach
<!-- end panel -->



<table class="" style="width: 100%;">
    <thead style="background: #3498DB; font-family: sans-serif;">
        <tr>
            <th style="color: #fff;" align="right">GrandTotal: <b style="color: #fff;"> P {{ $grandTotal }}.00</b> &nbsp;</th>
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
@if ($assessment->status == 'Approved')
    <table class="table table-bordered" style="width: 100%;">
        <thead style="background: #3498DB; font-family: sans-serif;">
            <tr>
                <th style="color: white;text-align: center;" colspan="6">ORDER OF PAYMENT</th>
            </tr>
        </thead>
        <tbody style="background: #ECF0F1;">
            <tr>
                <td class="serif-font" colspan="2">&nbsp; Family Name: &nbsp; <u><b>NTC - Regional Office III</b></u> </td>
                <td></td>
                <td></td>
                <td></td>
                <td class="serif-font" align="right">&nbsp; Serial No: &nbsp; <u><b>{{ $assessment->assessment->op_no ?? null}}</b></u> &nbsp;</td>
            </tr>
            <tr>
                 <td class="serif-font">&nbsp; Fund Cluster: &nbsp; <u>01</u></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                 <td class="serif-font" align="right">&nbsp; Date: <b><u>{{ $assessment->assessment->applicant->created_at->toFormattedDateString() }}</u></b> &nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" class="serif-font">&nbsp; <b>The Collecting Officer:</b></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td colspan="2" class="serif-font">&nbsp; Cash/Treasury Unit</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td class="serif-font" colspan="6">&nbsp; Please issue Official Receipt in favor of : <b><u>{{ $assessment->assessment->applicant->applicant_company }}</u></b> </td>
             
               
            </tr>
            <tr>
                <td></td>
                <td class="serif-font">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>(Name of Payor)</small></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
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
                <td colspan="6" class="serif-font">&nbsp; (Address/Office of Payor) : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u>{{ $assessment->assessment->applicant->address }}</u></b></td>
            </tr>
            <tr>
                <td colspan="6" class="serif-font">&nbsp; in the amount of &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><u>{{ num_to_words($grandTotal) }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; P {{ $grandTotal }}.00</u></b></td>
            </tr>
            <tr>
                <td class="serif-font" colspan="6">&nbsp; for payment of </td>
            </tr>
            <tr>
                <td class="serif-font" colspan="5">&nbsp; as per Statement of Account No. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b><u>{{ $assessment->assessment->soa_no }}</u></b> </td>
                <td  class="serif-font" align="right">Dated: <b><u>{{ $assessment->assessment->applicant->created_at->toFormattedDateString() }}</u></b> &nbsp;</td>
            </tr>

            <tr>
                <td  colspan="6"></td>
            </tr>

            <tr>
                <td  colspan="6"></td>
            </tr>
            <tr>
                <td  colspan="6"></td>
            </tr>
            <tr>
                <td  colspan="6"></td>
            </tr>
            <tr>
                <td  colspan="6"></td>
            </tr>
            <tr>
                <td  colspan="6"></td>
            </tr>
            <tr>
                <td  colspan="6"></td>
            </tr>
            <tr>
                <td  colspan="6"></td>
            </tr>
            <tr>
                <td  colspan="6"></td>
            </tr>
            <tr>
                <td  colspan="6"></td>
            </tr>
            <tr>
                <td  colspan="6"></td>
            </tr>
            <tr>
                <td  colspan="6"></td>
            </tr>
            <tr>
                <td  colspan="6"></td>
            </tr>
            <tr>
                <td  colspan="6"></td>
            </tr>
            <tr>
                <td  colspan="6"></td>
            </tr>
            <tr>
                <td  colspan="6"></td>
            </tr>
            <tr>
                <td class="serif-font" colspan="6">&nbsp; Please deposit the collection under Bank Account/s:</td>
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
                <td class="serif-font">&nbsp; No.</td>
                <td class="serif-font" colspan="2">&nbsp; Name of Bank</td>
                <td></td>
                <td></td>
                <td class="serif-font" >&nbsp; Amount</td>
            </tr>
            <tr>
                <td class="serif-font">&nbsp; <b><u>3402-2641-78</u></b></td>
                <td class="serif-font" colspan="2">&nbsp; <b><u>LBP-WEST SN. FDO.</u></b></td>
                <td></td>
                <td></td>
                <td class="serif-font">&nbsp;<b> <u>P {{ $grandTotal }}.00</u></b></td>
            </tr>
            <tr>
                  <td>&nbsp; <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                <td colspan="2">&nbsp; <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                <td></td>
                <td></td>
                <td>&nbsp; <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp; <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                <td colspan="2">&nbsp; <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
                <td></td>
                <td class="serif-font">Total:</td>
                <td class="serif-font">&nbsp;<b> <u>P {{ $grandTotal }}.00</u></b></td>
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
            </tr> <tr>
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
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td class="serif-font"><small><u>REALYN A. SISON-DAYRIT</u></small> &nbsp; </td>
                 
            </tr>
            <tr>
                 <td class="serif-font" colspan="6" align="right"><small>Signature over Printed Name Head of Accounting</small> &nbsp; </td>
            </tr>
            <tr>
                <td class="serif-font" colspan="6" align="right"><small>Division/Unit/Authorized Official</small> &nbsp; </td>
            </tr>
        </tbody>
    </table>
    <br>
    <table>
        <tbody>
            <tr>
                <td class="serif-font">&nbsp; OR NO: <u>{{ $assessment->assessment->or_no }}</u> </td>
            </tr>
            <tr>
                <td class="serif-font">&nbsp; OR DATE: <u>{{ $assessment->assessment->applicant->created_at->toFormattedDateString() }}</u></td>
            </tr>
            <tr>
                <td class="serif-font">&nbsp; AMOUNT: <u>P {{ $grandTotal }}.00</u></td>
            </tr>
        </tbody>
    </table>
    @endif
  </div>
 


  </body>
  </html>