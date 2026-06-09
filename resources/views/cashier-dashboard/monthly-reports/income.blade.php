<!DOCTYPE html>
<html>
<head>
	<title>Monthly Reports</title>
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>
<body>
	<p align="center"><strong>REPORT OF COLLECTIONS AND DEPOSITS</strong></p>
	<div class="table table-responsive"></div>
	<table class="table table-bordered table-sm table-hover">
		<thead>
			<tr>
				<th colspan="18"><p>Entity Name: NATIONAL TELECOMMUNICATIONS COMMISSION</p></th>
				<th colspan="3">Report No: DSG <br>
								Sheet No:
								Date :{{--  @foreach ($assessments as $assessment)
											{{ $assessment->or_date }}
										@endforeach --}}
			   </th>
			</tr>
			<tr>
				<th colspan="21">Particulars</th>
			</tr>
			<tr>
				<th></th>
				<th>OR No.</th>
				<th>Payor</th>
				<th width="15">License Fees</th>
				<th width="15">MOD Fees</th>
				<th width="15">ROC Fees</th>
				<th width="15">Registration Fees</th>
				<th width="16">Admin Fees</th>
				<th width="37">Surcharge (License Fee/ROC/SUF/SRF/)</th>
				<th width="15">Permit Fees</th>
				<th width="15">Clearance Cert.</th>
				<th width="16">Examination Fees</th>
				<th width="16">Inspection Fees</th>
				<th width="16">Application Fees</th>
				<th width="15">Filing Fees</th>
				<th width="15">SRF</th>
				<th width="15">SUF</th>
				<th width="15">Misc.</th>
				<th width="15">DST</th>
				<th width="15">TOTAL</th>
				<th></th>
			</tr>
			<tr>
				<th colspan="20"></th>
			</tr>
			<tr>
				<th>Nature of <br>Collection</th>
				<th colspan="20"></th>
			</tr>
			<tr>
				<th></th>
			</tr>
		</thead>
			<tbody>
				@foreach ($assessments as $key => $dates)
					@foreach ($dates as $assessment)
						@if ($loop->last)
							@include ('cashier-dashboard.monthly-reports.subtotal')
						@endif
						<tr>
							<td width="14">@if ($loop->first) {{ $key }} @endif</td>
							<td>{{ $assessment->or_no }}</td>
							<td width="90">
								{{ $assessment->applicant->applicant_company ?? null }}
								{{ $assessment->carrier->applicant ?? null }}
							</td>
							<td>
								{{ $assessment->sumTotal('License Fee') ? $assessment->sumTotal('License Fee') : '' }}
							</td>
							<td>{{ $assessment->sumTotal('Mod Fee') ? $assessment->sumTotal('Mod Fee') : '' }}</td>
							<td>{{ $assessment->sumTotal('ROC Fee') ? $assessment->sumTotal('ROC Fee') : '' }}</td>
							<td>{{ $assessment->sumTotal('Registration Fee') ? $assessment->sumTotal('Registration Fee') : '' }}</td>
							<td>{{ $assessment->sumTotal('Admin Fee') ? $assessment->sumTotal('Admin Fee') : ''  }}</td>
							<td>
								@if ($assessment->sumTotal('Surcharge ROC Fee'))
									{{ $assessment->sumTotal('Surcharge ROC Fee') + $assessment->sumTotal('Surcharge License Fee') + $assessment->sumTotal('Surcharge (SUF Surcharge)') }}
								@endif


								@if ($assessment->sumTotal('Surcharge Permit Fee'))
									{{ $assessment->sumTotal('Surcharge Permit Fee') }}
								@endif
							</td>
							<td>
								@if ($assessment->sumTotal('Permit Fee'))
									{{ $assessment->sumTotal('Permit Fee') }}
								@endif							
								@if ($assessment->sumTotal('Permit Poss Fee'))
									{{ $assessment->sumTotal('Permit Poss Fee') }}
								@endif
							</td>
							<td></td>
							<td></td>
							<td>
								@if ($assessment->sumTotal('Inspection Fee'))
									{{ $assessment->sumTotal('Inspection Fee') }}
								@endif
							</td>
							<td></td>
							<td>{{ $assessment->sumTotal('Filing Fee')  ? $assessment->sumTotal('Filing Fee')  : '' }}</td>
							<td></td>
							<td>{{ $assessment->sumTotal('SUF') ?  $assessment->sumTotal('SUF')  : '' }}</td>
							<td></td>
							<td>{{ $assessment->sumTotal('DST') ?  $assessment->sumTotal('DST')  : '' }}</td>
							<td>
								@php 
									$grandTotalForReports = $assessment->sumTotal('License Fee') 
									+ $assessment->sumTotal('Mod Fee') 
									+ $assessment->sumTotal('Registration Fee') 
									+ $assessment->sumTotal('ROC Fee') 
									+ $assessment->sumTotal('Registration Fee') 
									+ $assessment->sumTotal('Admin Fee') 
									+ $assessment->sumTotal('Surcharge ROC Fee')  
									+ $assessment->sumTotal('Surcharge License Fee') 
									+ $assessment->sumTotal('Surcharge (SUF Surcharge)') 
									+ $assessment->sumTotal('Surcharge Permit Fee') 
									+ $assessment->sumTotal('Permit Fee') 
									+ $assessment->sumTotal('Permit Poss Fee')
									+ $assessment->sumTotal('Inspection Fee') 
									+ $assessment->sumTotal('Filing Fee') 
									+ $assessment->sumTotal('SUF') 
									+ $assessment->sumTotal('DST') 
								@endphp
								{{ $grandTotalForReports }}
							</td>
							<td><strong style="color: red;"> {{ $grandTotalForReports - $assessment->sumTotal('DST') }}</strong></td>
						</tr>	
					@endforeach
				@endforeach

			<tr>
				 @if (request()->has('from_undeposited') && request()->has('to_undeposited')) 
				<td><strong style="color:red;">UNDEPOSITED</strong></td>
				<td></td>
				<td></td>
				<td><strong>{{ $undepositLicenseFeeSumTotal }}</strong></td>
				<td><strong></strong></td>
				<td><strong>{{ $undepositRocSumTotal }}</strong></td>
				<td></td>
				<td></td>
				<td><strong>{{ $undepositSurchargeSumTotal }}</strong></td>
				<td><strong>{{ $undepositPermitFeesSumTotal }}</strong></td>
				<td><strong></strong></td>
				<td><strong></strong></td>
				<td><strong> {{ $undepositInsfectionFeesSumTotal }}</strong></td>
				<td><strong></strong></td>
				<td><strong>{{ $undepositFilingFeesSumTotal }}</strong></td>
				<td><strong></strong></td>
				<td><strong>{{ $undepositSUFSumTotal }}</strong></td>
				<td><strong></strong></td>
				<td><strong>{{ $undepositDSTSumTotal }}</strong></td>
				<td><strong>{{ $undepositTotalSumTotal }}</strong></td>
				<td><strong style="color:red;">{{ abs($undepositedSumTotal) }}</strong></td>
				@endif
			</tr>
			<tr>
				<td><strong>TOTAL</strong></td>
				<td></td>
				<td></td>
				<td><strong>{{ $licenseFeeSumTotal }}</strong></td>
				<td><strong>{{ $modFeeSumTotal }}</strong></td>
				<td><strong>{{ $rocFeeSumTotal }}</strong></td>
				<td><strong>{{ $registrationFeeSumTotal }}</strong></td>
				<td><strong>{{ $adminFeeSumTotal }}</strong></td>
				<td><strong>{{ $surchargeFeeSumTotal }}</strong></td>
				<td><strong>{{ $permitFeeSumTotal }}</strong></td>
				<td></td>
				<td></td>
				<td><strong>{{ $inspectionFeeSumTotal }}</strong></td>
				<td></td>
				<td><strong>{{ $filingFeeSumTotal }}</strong></td>
				<td></td>
				<td><strong>{{ $sufFeeSumTotal }}</strong></td>
				<td></td>
				<td><strong>{{ $dstFeeSumTotal }}</strong></td>
				<td><strong>{{ $totalFeeSumTotal }}</strong></td>
				<td style="color: red;"><strong>{{ abs($depositDstFeeSumTotal) }}</strong></td>
			</tr>
		</tbody>
	</table> 
<table class="table table-bordered">
 	<thead>
 		<tr>
 			<th></th>
 			<th>Undeposited Collections last report : </th>
 			<th></th>
 		</tr>
 		<tr>
 			<th></th>
 			<th>Collection Per OR NOs : &nbsp;         
 			 	@foreach ($maxOrRanges as $assessment)
 			 		@if ($loop->first)
 			 			{{ $assessment->or_no }} -
 			 		@endif
 			 		@if ($loop->last)
 			 			{{ $assessment->or_no }}
 			 		@endif
 			 	@endforeach
 			 </th>
 			 <th><strong style="color:red;"> {{ abs($depositDstFeeSumTotal) }}</strong></th> 
 		</tr> 
 		<tr>
 			<th></th>
 			<th>Deposits: </th>
 			<th></th>
 		</tr>
 		<tr>
			<th></th>
 			<th>CASH:</th>
 			<th></th>
 		</tr>
 		<tr>
			<th></th>
 			<th>CHECKS</th>
 			<th></th>
 		</tr>
 		<tr>
 			<th></th>
 			<th>Undeposited Collections this report</th>
 			<th style="color:red;"> {{ abs($undepositedSumTotal) }}</th>
 		</tr>
 	</thead>
 </table>
</body>
</html>