<!DOCTYPE html>
<html>
   <head>
      <title>NTC</title>
        <link href="{{ asset('css/print.css') }}" rel="stylesheet" type="text/css" />
      <style type="text/css">
      </style>
   </head>
   <body> 
      <div class="col-md-12"> 
        <table class="table-bordered table-sm " width="100%" align="center" style="background: #1A5276; color: #fff;">
          <tbody>
            <tr> 
              <td>
                  <p class="text-center">
                    <small>
                            <strong>
                              Republic of the Philippines <br> 
                              NATIONAL TELECOMMUNICATIONS COMMISSION <br>
                              Regional Office III, DMGC, Maimpis, City of San Fernando Pampanga <br>
                              Tel. No. (045) 961-3743 / Fax No. 861-7958
                            </strong>
                      </small>
                  </p>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <br>
      <div class="col-md-12">
          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th colspan="2" class="text-center" style="background: #1A5276; color: #fff;"><small><strong>STATEMENT OF ACCOUNT<strong><small></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><small>Applicant: <strong>{{ $assessment->carrier->applicant }}</strong></small></td>
                <td>
            {{--       @if ($assessment->carrier->created_at)
                    <small>Date: <strong>{{ $assessment->carrier->created_at->toFormattedDateString() }}</strong></small>
                  @endif --}}
                    <small>Date: <strong>{{ $assessment->carrier->created_at->toFormattedDateString() }}</strong></small>
                </td>
              </tr>
              <tr>
                <td><small>Address: <strong> {{ $assessment->carrier->address }}</strong></small></td>
                <td><small>SOA #: <strong>{{ $assessment->soa_number }}</strong></small></td>
              </tr>
              <tr>
                <td><small>Contact No/Email Add:  <strong>-</strong></small></td>
                <td><small>Total Amount Due: <strong style="color: red;">P {{ $assessment->grandTotalCarrier() }}.00</strong></small></td>
              </tr>
              <tr>
                <td ><small>Note: {{ $assessment->notes }}</small> </td>
                <td><small>Due Date: <strong>{{ optional($assessment->date_validity)->toFormattedDateString() }}</strong></small></td>
              </tr>
              <tr>
                <td >
                 <small> Assessed by : {{ $assessment->user->name }}</small>
                </td>
                  <td colspan="2">
                  <p style="float:right;">
                 {{--    @if ($assessment->status === 'Approved' || $assessment->status === 'Pending' || $assessment->status === 'For Payment' || $assessment->status == 'Paid')
                      <img src="{{ asset('signatures/test.png') }}">
                      @elseif ($assessment->status === 'Verified')
                        <small>
                            Approved by: <br>
                            @if ($user->role->name === 'chief engineer')
                                <strong>Engr. Wilson O. Lejarde</strong> <br>
                            @endif  
                          Engr. V
                       </small>
                    @endif --}}
                    </p> 
                  </td>
                </tr> 
              </tbody>
            </table>
          </div>

      <div class="container">
        <div class="row"> 
          <div class="col-5"> 

              <div class="no-gutters"> 
                  <table class="" border="1" width="100%"  >
                     <thead>
                        <tr>
                           <th colspan="6" style="background: #2471A3; color: #fff;"><small><strong>{{ $assessment->class_station }} {{ $assessment->remarks }}</strong></small></th>
                        </tr>
                        <tr>
                           <th><small>&nbsp;Code</small></th>
                           <th><small>&nbsp;AMT</small></th>
                        </tr>
                     </thead>
                     <tbody>
                       @foreach ($assessment->categories as $category)
                        <tr>
                           <td><small>&nbsp;{{ $category->description }}</small></td>
                           <td><small>&nbsp;{{ $category->amount }}</small></td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                </div>
      
          </div>

          @if ($assessment->op_no)
            <div class="col-7"> 
              <table class="table table-bordered table-sm">
                <thead>
                  <tr>
                    <th colspan="3" style="background: #2471A3;">&nbsp;</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><small>Entity Name:<strong>NTC - Regional Office III</strong></small></td>
                    <td colspan="2"><small>Serial No:  <strong>{{ $assessment->op_no }}</strong></small></td>
                  </tr>
                  <tr>
                    <td><small>Fund Cluster :<strong>01</strong></small></td>
                    <td colspan="2"><small>Date : <strong>{{ $assessment->created_at->toFormattedDateString() }}</strong></small></td>
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
                    <td colspan="3"><small>Please issue Official Receipt in favor of: &nbsp;<strong>{{ $assessment->carrier->applicant }}</strong></small></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td colspan="2"><small>(Name of Payor)</small></td>
                  </tr>
                  <tr>
                    <td colspan="3"><small>Address: <strong>{{ $assessment->carrier->address }}</strong></small></td>
                  </tr>
                  <tr>
                    <td colspan="3"><small>in the amount of: <strong> {{ convert_number_to_words($grandTotals) }} PESOS</strong></small></td>
                  </tr>
                  <tr>
                    <td colspan="3"><small>Amount: <strong style="color: red;">P {{ $assessment->grandTotalCarrier() }}.00</strong></small></td>
                  </tr>
                  <tr>
                    <td colspan="3">for payment of: 
                      @foreach ($assessment->categories as $category)
                      <small>
                        <strong>
                          {{ $category->description }} ({{ $category->amount }}){{ ! $loop->last ? ',' : '' }}
                        </strong>
                      </small>
                      @endforeach
                    </td>
                    <tr> 
                      <td><small>as per Statement of Account No. </small><br>
                         <small>
                          <strong>{{ optional($assessment)->soa_number }} </strong>
                          </small>
                      </td>
                      <td colspan="2"><small>Dated:<strong> {{ $assessment->carrier->created_at->toFormattedDateString() }}&nbsp;</strong></small></td>
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
                      <td><small><strong style="color: red;">P {{ $grandTotals }}.00</strong></small></td>
                    </tr>
                  </tr>
                </tbody>
              </table>
              <table class="table table-bordered table-sm">
                <tbody>
                  <tr>
                    <td class="text-right">
                      <img src="{{ asset('img/test.png') }}" style="height: 25%;"><br>
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
                    <td><small>OR DATE: <strong>{{ optional($assessment->or_date)->toFormattedDateString() }}</strong></small></td>
                  </tr>
                  <tr>
                    <td><small>AMOUNT: <strong style="color:red">P {{ $grandTotals }}.00</strong></small></td>
                  </tr>
                </tbody>
              </table>
            </div> 
          @endif
        </div> 
      </div>   
   </body>
</html>
