<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

	<title>Receipt</title>
	      <link href="{{ asset('css/print.css') }}" rel="stylesheet" type="text/css" />
	      {{-- <style type="text/css">
	      	.wrap {
	      		word-wrap: break-word;
	      		width: 50%;
	      	}
	      </style> --}}
</head>
<body >
<div class="container" >
	<div class="form-group" style="height: 4.2cm;">
	</div>
	<div class="form-group" style="margin-left: 7%;">
		<strong style="color: red; ">{{ \Carbon\Carbon::parse($newCarrier->or_date)->toFormattedDateString() }}</strong>
	</div>
	<div class="form-group" style="height: 2cm;">
	</div>
	<div class="form-group" style="margin-top: -75px;margin-left: 5%;" style=""> 
		<table class="" style="" width="38%">
			<tbody>
				<tr>
					<td height="68">

						<p class=""><strong style="color: red;">{{ $newCarrier->applicant_company }}</strong>

					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="form-group" style="margin-top: 5%; margin-left: 7%;">
		<table class="table-sm "  style="width: 38%;">
			 
				<tr>
					<td>License Fee</td>
					<td>{{ $newCarrier->license_fee }}</td>
				</tr>
				<tr>
					<td>Inspection Fee</td>
					<td>{{ $newCarrier->inspection_fee }}</td>
				</tr>
				<tr>
					<td>{{ $newCarrier->class_stations }}</td>
				<td>{{ $newCarrier->amount }}</td>
				</tr>
				<tr>
					<td>DST Fee</td>
					<td>{{ $newCarrier->dst }}</td>
				</tr>

				<tr>
					<td style="text-align:right;"></td>
				</tr>
					 
							<tr>
								<td>&nbsp;</td>
								<td style=" line-height: 0em;">&nbsp;</td>
							</tr>
				 
				<tr>
					<td></td>
					<td style="text-align: right; line-height: -0em; ">{{ $newCarrier->total_class }} </td>
				</tr>
			</tbody>
		</table>

		<br>
		<br>
		<br>
		<br>
		<br>
		<br>

		<table class="" style="width: 40%;">
			<tr>
				<td height="68" colspan="2"><b> {{ convert_number_to_words($newCarrier->total_class) }} Pesos Only</b></td>
			</tr>
		</table>
	</div>	

	<div style="margin-top: 7%;margin-left: 4%;">
		 
	</div>
	<div style="margin-top: 30px;margin-left: 4%;">
		 
	</div>

{{-- 	<div class="form-group">
		 <table class="table-sm" style="width: 70%;">
		 	<thead>
		 		<tr>
		 			<th></th>
		 			<th></th>
		 		</tr>
		 	</thead>
		 	<tbody>
		 		@foreach ($grouped as $name => $fees)
			 		<tr>
			 			<td><strong>{{ $name }}</strong></td>
			 			<td><strong>{{ $fees->sum('total') }}</strong></td>
			 		</tr>
			 	@endforeach

			 	<tr>
			 		<td></td>
			 		<div style="margin-bottom: 0px;">
				 		<td colspan="5">
				 			<strong>{{ $grandTotal }}.00</strong>
				 		</td>
			 		</div>
			 	</tr>
			 	<tr>
			 		<td colspan="5"><strong>{{ convert_number_to_words($grandTotal) }} Pesos Only</strong></td>
			 	</tr>
		 	</tbody>
		 </table>
	</div> --}}
</div>
</body>
</html>