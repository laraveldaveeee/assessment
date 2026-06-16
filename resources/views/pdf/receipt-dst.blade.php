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
		<strong style="color: red; ">{{ optional($assessment->or_date)->toFormattedDateString() }}</strong>
	</div>
	<div class="form-group" style="height: 2cm;">
	</div>
	<div class="form-group" style="margin-top: -75px;margin-left: 5%;" style="">
		{{-- <strong>{{ $assessment->applicant->applicant_company }}</strong> --}}
		<table class="" style="" width="38%">
			<tbody>
				<tr>
					<td height="68">

						<p class=""><strong style="color: red;">{!! $assessment->applicant->applicant_company !!}</strong>

					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<div class="form-group" style="margin-top: 5%; margin-left: 7%;">
		<table class="table-sm" style="width:32%;">
		    <tbody>

		     @foreach($dstFees as $name => $fees)
			    <tr>
			        <td>{{ $name }}</td>
			        <td style="text-align:right;">
			            {{ number_format($fees->sum('total'), 2) }}
			        </td>
			    </tr> 

		        @if ($loop->last)
		            @for ($i = 1; $i <= (8 - count($dstFees)); $i++)
		                <tr>
		                    <td>&nbsp;</td>
		                    <td>&nbsp;</td>
		                </tr>
		            @endfor
		        @endif
		    @endforeach

		    <tr>
		        <td></td>
		        <td style="text-align:right;">
		            {{ number_format($dstTotal, 2) }}
		        </td>
		    </tr>

		    </tbody>
		</table>
		<br>

		<table class="" style="width: 50%;">
			<tr>
				<td height="68" colspan="2"><b>{{ convert_number_to_words($dstTotal) }} Pesos Only</b></td>
			</tr>
		</table>
	</div>	

	<div style="margin-top: 7%;margin-left: 4%;">
		{{ $assessment->treasury }} 
	</div>
	<div style="margin-top: 30px;margin-left: 4%;">
		{{ $assessment->date_of_treasury }}
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
