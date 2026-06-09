<!DOCTYPE html>
<html>
   <head>
      <title>NTC</title>
      <link href="{{ asset('css/print.css') }}" rel="stylesheet" type="text/css" />

      <style type="text/css">
      </style>
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
            <table class="table-bordered" style="width: 100%;">
               <thead>
                  <tr>
                     <th> Bill To:</th>
                     <th> Address </th>
                     <th> GrandTotal </th>
                  </tr>
               </thead>
               <tbody>
                  <td class="serif-font text-small">{{ $assessment->applicant->applicant_company }} </td>
                  <td class="serif-font text-small">{{ $assessment->applicant->address }}</td>
                  <td class="serif-font text-small"><b>P {{ $grandTotal }}.00</b></td>
               </tbody>
            </table>
         </div>
      </div>
       
      @foreach ($assessment->assessmentServices->chunk(1) as $chunk)

        <div class="row no-gutters">
           
           @foreach ($chunk as $key => $assessment)

           <div class="col-4">
              <table class="table table-bordered table-sm text-center">
                 <thead>
                    <tr>
                       <th colspan="6">{{ $assessment->name }}</th>
                    </tr>
                    <tr>
                       <th>Code</th>
                       <th>YR</th>
                       <th>%</th>
                       <th>QTY</th>
                       <th>FEE</th>
                       <th>TOTAL</th>
                    </tr>
                 </thead>
                 <tbody>
                    @foreach ($assessment->serviceFees as $fee)
                    <tr>
                       <td><small>{{ $fee->name_fees }}</small></td>
                          <td>{{ $fee->enabled_year_computation ? $assessment->yr : '' }}</td>
                          <td>{{ $fee->surcharge_amount }}</td>
                          <td>{{ $assessment->qty }}</td>
                          <td>{{ $fee->amount }}</td>
                          <td>{{ $fee->total }}</td>
                    </tr>
                    @endforeach
                 </tbody>
              </table>
           </div>
           @endforeach
        </div>
      @endforeach
      
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
      <div class="row no-gutters">
         <div class="col-12">
            <table class="table-bordered table-sm" style="width: 100%;">
               <thead>
                  <tr>
                     <th colspan="6">&nbsp;</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     &nbsp; 
                     <td>&nbsp; Entity Name: <b>NTC - Regional Office III</b></td>
                     <td colspan="5">&nbsp; Serial No: <b>{{ $assessment->op_no }}</b> &nbsp;</td>
                  </tr>
                  <tr>
                     <td>&nbsp; Fund Cluster: <b>01</b></td>
                     <td colspan="5" align="right">&nbsp; Date: <b>{{ $assessment->created_at->toFormattedDateString() }}</b> &nbsp;</td>
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
                     <td>&nbsp; Please issue Official Receipt in favor of: &nbsp;&nbsp; <b>{{ $assessment->assessment->applicant->applicant_company }}</b></td>
                     <td colspan="5" align="right">Address: <b>{{ $assessment->assessment->applicant->address }}</b> &nbsp;</td>
                  </tr>
                  <tr>
                     <td colspan="6">&nbsp; (Name of Payor)</td>
                  </tr>
                  <tr>
                     <td>&nbsp; in the amount of &nbsp; <b>{{ num_to_words($grandTotal) }}</b></td>
                     <td colspan="5" align="right"><b>Amount: P {{ $grandTotal }}.00</b> &nbsp;</td>
                  </tr>
                  <tr>
                     <td colspan="6">&nbsp; for payment of &nbsp; 
                        @foreach ($grouped as $name => $fees)
                          <b>{{ $name }} ({{ $fees->sum('total') }}){{ ! $loop->last ? ',' : '' }}</b>
                        @endforeach
                    </td>
                  </tr>
                  <tr>
                     <td>&nbsp; as per Statement of Account No. &nbsp; <b>{{ $assessment->soa_no }}</b></td>
                     <td colspan="5" align="right">Dated: <b>{{ $assessment->assessment->applicant->created_at->toFormattedDateString() }}</b> &nbsp;</td>
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
            </table>
            <br>
          <header class="clearfix">
           <div id="" class="clearfix">
              <table style="width: 100%;">
                 <tbody align="right">
                    <tr>
                       <td class="serif-font"><u>REALYN A. SISON-DAYRIT</u> &nbsp;</td>
                    </tr>
                    <tr>
                       <td class="serif-font"><i>Signature over Printed Name Head of Accounting</i> &nbsp;</td>
                    </tr>
                    <tr>
                       <td>Division/Unit/Authorized Official</td>
                    </tr>
                 </tbody>
              </table>
           </div>
          </header>
          <table>
              <tbody>
                <tr>
                   <td class="serif-font">&nbsp; OR NO: <u>{{ $assessment->assessment->or_no }}</u> </td>
                </tr>
                <tr>
                   <td class="serif-font">&nbsp; OR DATE: {{ optional($assessment->assessment->or_date)->toFormattedDateString() }}<u></u></td>
                </tr>
                <tr>
                   <td class="serif-font">&nbsp; AMOUNT: <u>P {{ $grandTotal }}.00</u></td>
                </tr>
              </tbody>
          </table>
        </div>
      </div>
   </body>
</html>