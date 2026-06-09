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
      				<th >Date Received: {{ optional($newCarrier->or_date)->toFormattedDateString() }}</th>
      				<th colspan="5">Reference No: </th>
      			</tr>
      			<tr>
      				<th colspan="5">NAME/APPLICANT: {{ $newCarrier->applicant_company }}</th>
      			</tr>
      			<tr>
      				<th colspan="5">NATURE OF DOCUMENTS </th>
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
      				<td><strong>{{ $newCarrier->assessed_by }}</strong></td>
      				<td><strong> </strong></td>
      				<td><strong> </strong></td>
      				<td>In-house inspection was conducted, and a SOA was issued.
</td>
      			</tr>	
      			<tr>
      				<td><strong>FAD</strong></td>
      				<td><strong> 
                
      					</strong>
      				</td>
      				<td><strong> </strong></td>
      				<td><strong> </strong></td>
      				<td>Issued OP</td>
      			</tr>	
      			<tr>
      				<td><strong>FAD</strong></td>
      				<td>
                <strong>
                {{ $newCarrier->issued_or }}
              </strong></td>
      				<td><strong>{{ \Carbon\Carbon::parse($newCarrier->or_date)->toFormattedDateString() }} </strong></td>
      				<td><strong> {{ \Carbon\Carbon::parse($newCarrier->issued_time)->format('g:i:s A') }}</strong></td>
      				<td>Issued OR</td>
      			</tr>	
      			<tr>
      				<td><strong>EOD</strong></td>
      				<td><strong></strong></td>
      				<td><strong></strong></td>
      				<td><strong></strong></td>
      				<td>Assigned Reference Number</td>
      			</tr>
      			<tr>
      				<td><strong>EOD</strong></td>
      				<td><strong></strong></td>
      				<td><strong></strong></td>
      				<td><strong></strong></td>
      				<td>Processed</td>
      			</tr>
      			<tr>
      				<td><strong>EOD</strong></td>
      				<td><strong></strong></td>
      				<td><strong></strong></td>
      				<td><strong></strong></td>
      				<td>Approval Recommended</td>
      			</tr>	
      			<tr>
      				<td><strong>ORD</strong></td>
      				<td><strong></strong></td>
      				<td><strong></strong></td>
      				<td><strong></strong></td>
      				<td>Approved & Signed License</td>
      			</tr>
      			<tr>
      				<td><strong>EOD</strong></td>
      				<td><strong></strong></td>
      				<td><strong></strong></td>
      				<td><strong></strong></td>
      				<td>Released License</td>
      			</tr>	
      			<tr>
      				<td><strong>Records</strong></td>
      				<td><strong></strong></td>
      				<td><strong></strong></td>
      				<td><strong></strong></td>
      				<td>Filed in Records Section</td>
      			</tr>
      		</tbody>
      	</table>
      </div>
</body>
</html>