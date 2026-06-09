<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="{{ asset('css/print.css') }}" crossorigin="anonymous">
  <title></title>
</head>
<body> 
   <div class="table-responsive"> 
     <table class="table"  width="100%" align="center">
          <tbody>
            <tr> 
              <td style="text-align:center;background: #154360" ><img src="{{ asset('img/ntc.png') }}" style="width:50%;"></td>
              <td style="background: #154360;">
                  <p class="text-center">
                    <h5 style="text-align:;color: #fff;">
                            <strong>
                              Republic of the Philippines <br> 
                              Department of Information Communications Technology <br>
                              NATIONAL TELECOMMUNICATIONS COMMISSION <br>
                              Quezon City<br>
                            </strong>
                      </h5>
                  </p>
              </td>
            </tr>
          </tbody>
        </table> 
      </div>

      <h4 align="center" style="margin-top:6%;"><strong>ROUTING SLIP</strong></h4>
      <br>

      <div class="form-group">
        <table class="table table-bordered">
          <thead>
            <tr >
              <th >Date Received: {{ optional($assessment->or_date)->toFormattedDateString() }}</th>
              <th colspan="5">Reference No: 40-2026-06-</th>
            </tr>
            <tr>
              <th colspan="5">NAME/APPLICANT: {{ $assessment->applicant->applicant_company }}</th>
            </tr>
           <tr>
              <th colspan="5">NATURE OF DOCUMENTS: {{ $assessment->applicant->nature_of_documents }}</th>
            </tr>
            <tr>
              <th colspan="5"></th>
            </tr>
            <tr>
              <th colspan="4" style="text-align: center;">RECEIVED BY:</th>
              <th rowspan="3">ACTION TAKEN</th>
            </tr>
            <tr>
              <th>BRANCH/DIV.</th>
              <th>NAME</th>
              <th>DATE</th>
              <th>TIME</th>
            </tr>
          </thead>
          <tbody>
<tr>
              <td><strong>EOD</strong></td>
              <td><strong>{{ $assessment->user->name }}</strong></td>
              <td><strong>{{ optional($assessment->time_update)->toFormattedDateString() }}</strong></td>
              <td><strong>{{ optional($assessment->time_update)->format('g:i:s A') }}</strong></td>
              <td> 
                

                @if ($assessment->assessmentServices->contains(function ($service) {
                    return in_array($service->name, ['P-SIM-LP_NEW', 'P-SIM-LP_REN']);
                  }))

                  <strong>In-house inspection was conducted, and a SOA was issued.</strong>
                
                @else
                <strong>Issued SOA</strong>

                @endif
                 

              </td>
            </tr> 
            <tr>
              <td><strong>FAD</strong></td>
              <td><strong> 
                @if ($assessment->user_accounting_id == 10 || $assessment->user_accounting_id == 20)
                  Realyn S. Dayrit
                @endif
                </strong>
              </td>
              <td><strong>{{ optional($assessment->accounting_time_update)->toFormattedDateString() }}</strong></td>
              <td><strong>{{ optional($assessment->accounting_time_update)->format('g:i:s A') }}</strong></td>
              <td><strong>Issued OP</strong></td>
            </tr> 
            <tr>
              <td><strong>FAD</strong></td>
              <td>
                <strong>
                @if ($assessment->user_cashier_id == 9)
                   Dianne S. Garcia
                @endif   
                @if ($assessment->user_cashier_id == 23)
                   Nolly Tolentino
                @endif    
              </strong></td>
  <td><strong>{{ optional($assessment->or_date)->toFormattedDateString() }}</strong></td>
              <td><strong>{{ optional($assessment->cashier_time_update)->format('g:i:s A') }}</strong></td>
              <td><strong>Issued OR</strong></td>
            </tr> 
            <tr>
              <td><strong>EOD</strong></td>
              <td><strong></strong></td>
              <td><strong></strong></td>
              <td><strong></strong></td>
              <td><strong>Assigned Reference Number</strong></td>
            </tr>
            <tr>
              <td><strong>EOD</strong></td>
              <td><strong></strong></td>
              <td><strong></strong></td>
              <td><strong></strong></td>
              <td><strong>Processed</strong></td>
            </tr>
            <tr>
              <td><strong>EOD</strong></td>
              <td><strong></strong></td>
              <td><strong></strong></td>
              <td><strong></strong></td>
              <td><strong>Approval Recommended</strong></td>
  </tr> 
            <tr>
              <td><strong>ORD</strong></td>
              <td><strong></strong></td>
              <td><strong></strong></td>
              <td><strong></strong></td>
              <td><strong>Approved & Signed License</strong></td>
            </tr>
            <tr>
              <td><strong>EOD</strong></td>
              <td><strong></strong></td>
              <td><strong></strong></td>
              <td><strong></strong></td>
              <td><strong>Released License</strong></td>
            </tr> 
            <tr>
              <td><strong>Records</strong></td>
              <td><strong></strong></td>
              <td><strong></strong></td>
              <td><strong></strong></td>
              <td><strong>Filed in Records Section</strong></td>
            </tr>
          </tbody>
        </table>
    
<br>
<br>
<br>
<br>
<br>
<pre>=================================================================================================================== </pre>


<table class="table table-bordered">
  <tbody>
    <tr>
      <td colspan="2"><h3 style="text-align:center;"><u>ACKNOWLEDGMENT RECEIPT</u></h3></td>
    </tr>
    <tr>
      <td colspan="2"><p>APPLICANT: {{ $assessment->applicant->applicant_company }} </p></td>
    </tr>
    <tr>
      <td colspan="2"><p>UNIQUE IDENTIFICATION NO: 40-2026-06- </p></td>
    </tr>
    <tr>
      <td colspan="2"><p>OR DATE :<strong> {{ $assessment->or_date }} </strong> / OR # :<strong> {{ $assessment->or_no }} </strong> </p></td>
    </tr> 
  </tbody>
</table>
 


</body>
</html>
