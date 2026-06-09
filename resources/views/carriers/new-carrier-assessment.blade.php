@extends('layouts.app')
@section('content')	

<div id="content" class="content">
	<!-- begin breadcrumb -->
		<h1 class="page-header">New Carrier </h1>
		<div class="row">   
		<div class="col-md-12">
				 <div class="panel panel-default" >
				 	 <div class="panel-heading">
			         <h4 class="panel-title">New Carrier  lists</h4>
			         <div class="panel-heading-btn">
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			         </div>
			      </div>
				<div class="panel-body bg-default">

					<table class="table table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Ref #</th>
								<th>Company</th>
								<th>Address</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody> 
							<tr>
								<td>{{ $newCarrier->id }}</td>
								<td>{{ $newCarrier->soa_number }}</td>
								<td>{{ $newCarrier->applicant_company }}</td>
								<td>{{ $newCarrier->address }}</td>
								<td>{{ $newCarrier->status }}</td> 
							</tr> 
						</tbody>
					</table>

				</div> 
			</div>
		</div> 

			<div class="col-md-4">
				 <div class="panel panel-default" >
				 	 <div class="panel-heading">
			         <h4 class="panel-title">New Carrier </h4>
			         <div class="panel-heading-btn">
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			         </div>
			      </div>
				<div class="panel-body bg-default">
					<form method="POST" action="/new-carrier/{{ $newCarrier->id }}">
						@csrf
						{{ method_field('PATCH') }}
					<div class="row">
					<div class="col-md-12">
						<div class="form-group{{ $errors->has('class_stations') ? 'has-error' : '' }}">
							<label>Class Station</label>
							<select class="form-control" id="mySelect"  name="class_stations" onchange="myFunction()">
								<option selected="" disabled="">Select Class Station</option>
								<option value="FB">FB</option>
								<option value="FB-BWA">FB-BWA-LTE</option>
								<option value="FB-BWA-5G">FB-BWA-5G</option>
								<option value="FX-WDN">FX-WDN</option>
								<option value="FX-MW">FX-MW</option>
								<option value="TC">TC</option>
								<option value="STORAGE">STORAGE</option>
								<option value="MOD">MOD</option>
							</select>
						</div>
						@if ($errors->has('class_stations'))
										<span class="help-block">
											<strong style="color: red;">{{ $errors->first('class_stations') }}</strong>
										</span>
							@endif

					</div> 
					<div class="col-md-6">
					<div class="form-group">
						<div id="License Fee"></div>
					</div>	
					</div>	

					<div class="col-md-6">
					<div class="form-group">
						<div id="Inspection Fee">
						</div>
					</div>
					</div>

					<div class="col-md-12">
					<div class="form-group">
						<div id="DST">
						</div>
					</div>
					</div>	

					<div class="col-md-12">
					<div class="form-group">
						<div id="FB-BWA-LTE">
						</div>
					</div>
					</div>


					<div class="col-md-12">
					<div class="form-group">
						<div id="FB-BWA-5G">
						</div>
					</div>
					</div>

					<div class="col-md-12">
					<div class="form-group">
						<div id="FX-WDN">
						</div>
					</div>
					</div>

					<div class="col-md-12">
					<div class="form-group">
						<div id="FX-MW">
						</div>
					</div>
					</div> 

					<div class="col-md-12">
					<div class="form-group">
						<div id="STORAGE">
						</div>
					</div>
					</div> 
					<div class="col-md-12">
					<div class="form-group">
						<div id="MOD">
						</div>
					</div>
					</div> 

					<div class="col-md-12">
					<div class="form-group">
						<div id="AMOUNT">
						</div>
					</div>
					</div> 
					<div class="col-md-12">
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
					</div>
				</div>
			</div>
		</form>
	</div> 
	</div>  


		<div class="col-md-8">
				 <div class="panel panel-default" >
				 	 <div class="panel-heading">
			         <h4 class="panel-title">Assessment Carrier </h4>
			         <div class="panel-heading-btn">
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			         </div>
			      </div>
				<div class="panel-body bg-default">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Fees</th>
								<th>Amount</th>
							</tr>
							@if ($newCarrier->license_fee)
							<tr>
								<th>License Fee</th>
								<th>{{ $newCarrier->license_fee }}</th>
							</tr>
							@endif 

							@if ($newCarrier->inspection_fee)
							<tr>
								<th>Inspection Fee</th>
								<th>{{ $newCarrier->inspection_fee }}</th>
							</tr>
							@endif
							@if ($newCarrier->dst)
							<tr>
								<th>DST</th>
								<th>{{ $newCarrier->dst }}</th>
							</tr>
							@endif
							@if ($newCarrier->fees || $newCarrier->amount)
							<tr>
								<th>
									@if ($newCarrier->class_stations == 'STORAGE')
                        STORAGE
                    @endif
									{{ $newCarrier->fees }}</th>
								<th>{{ $newCarrier->amount }}</th>
							</tr>
							@endif
				 
							<tr>
								<th></th>
								<th>Total :
									@php 
										$total =  	$newCarrier->license_fee  + $newCarrier->inspection_fee + 
													$newCarrier->dst +  $newCarrier->amount;

									@endphp
									<Strong> 
										 {{ $total }}
									</Strong>

								</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-4">
				 <div class="panel panel-default" >
				 	 <div class="panel-heading">
			         <h4 class="panel-title">Proceed to cashier</h4>
			         <div class="panel-heading-btn">
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
			            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			         </div>
			      </div>
				<div class="panel-body bg-default">

					<form method="POST" action="/new-carrier/{{ $newCarrier->id }}/update">
						@csrf
						{{ method_field('PATCH') }}
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Proceed</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>


	<script type = "text/javascript" >
	function myFunction() {
	       var selected = document.getElementById("mySelect").value;
		   if (selected === 'FB') {
			document.getElementById("License Fee").innerHTML = '';
			document.getElementById("Inspection Fee").innerHTML = '';
			document.getElementById("DST").innerHTML = '';
		   	
		   	document.getElementById("License Fee").innerHTML = `<label>License Fee <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="license_fee">
                    `;

            document.getElementById("Inspection Fee").innerHTML = ` <label>Inspection Fee <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="inspection_fee">
                     `; 

            document.getElementById("DST").innerHTML = ` <label>DST <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="dst">
                     `;
		} else if (selected === 'FB-BWA') {

			document.getElementById("License Fee").innerHTML = '';
		   	document.getElementById("Inspection Fee").innerHTML = '';
		   	document.getElementById("DST").innerHTML = '';
		   	document.getElementById("FB-BWA-LTE").innerHTML = '';


		   	document.getElementById("License Fee").innerHTML = `<label>License Fee <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="license_fee">
                    `;

            document.getElementById("Inspection Fee").innerHTML = ` <label>Inspection Fee <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="inspection_fee">
                     `; 

            document.getElementById("DST").innerHTML = ` <label>DST <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="dst">
                     `;
			
			document.getElementById("FB-BWA-LTE").innerHTML = `
                        <input type="text" class="form-control" name="fees" value="SUF-BWA" hidden="">
                     `;

             document.getElementById("AMOUNT").innerHTML = ` <label>SUF AMOUNT <font style="color:red;">*</font></label>
                          <input type="text" class="form-control" name="amount" value="">
                     `;
		} 
		else if (selected === 'FB-BWA-5G') {

			document.getElementById("License Fee").innerHTML = '';
		   	document.getElementById("Inspection Fee").innerHTML = '';
		   	document.getElementById("DST").innerHTML = '';
		   	document.getElementById("FB-BWA-5G").innerHTML = '';


		   	document.getElementById("License Fee").innerHTML = `<label>License Fee <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="license_fee">
                    `;

            document.getElementById("Inspection Fee").innerHTML = ` <label>Inspection Fee <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="inspection_fee">
                     `; 

            document.getElementById("DST").innerHTML = ` <label>DST <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="dst">
                     `;
			
			document.getElementById("FB-BWA-5G").innerHTML = `
                        <input type="text" class="form-control" name="fees" value="SUF-BWA-5G" hidden="">
                     `;

             document.getElementById("AMOUNT").innerHTML = ` <label>SUF AMOUNT <font style="color:red;">*</font></label>
                          <input type="text" class="form-control" name="amount" value="">
                     `;
		}


		else if (selected === 'FX-WDN') {

			document.getElementById("License Fee").innerHTML = '';
		   	document.getElementById("Inspection Fee").innerHTML = '';
		   	document.getElementById("DST").innerHTML = '';
		   	document.getElementById("FX-WDN").innerHTML = '';
		   	document.getElementById("AMOUNT").innerHTML = '';


		   	document.getElementById("License Fee").innerHTML = `<label>License Fee <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="license_fee">
                    `;

            document.getElementById("Inspection Fee").innerHTML = ` <label>Inspection Fee <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="inspection_fee">
                     `; 

            document.getElementById("DST").innerHTML = ` <label>DST <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="dst">
                     `;
			
			document.getElementById("FX-WDN").innerHTML = ` 
                        <input type="text" class="form-control" name="fees" value="SUF-WDN" hidden="">
                     `;

            document.getElementById("AMOUNT").innerHTML = ` <label>SUF AMOUNT <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="amount" value="">
                     `;



		} else if (selected === 'FX-MW') {

			document.getElementById("License Fee").innerHTML = '';
		   	document.getElementById("Inspection Fee").innerHTML = '';
		   	document.getElementById("DST").innerHTML = '';
		   	document.getElementById("FX-MW").innerHTML = '';


		   	document.getElementById("License Fee").innerHTML = `<label>License Fee <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="license_fee">
                    `;

            document.getElementById("Inspection Fee").innerHTML = ` <label>Inspection Fee <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="inspection_fee">
                     `; 

            document.getElementById("DST").innerHTML = ` <label>DST <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="dst">
                     `;
			
			document.getElementById("FX-MW").innerHTML = `  
                        <input type="text" class="form-control" name="fees" value="SUF-MW" hidden="">
                     `;

          	document.getElementById("AMOUNT").innerHTML = ` <label>SUF AMOUNT <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="amount" value="">
                     `;
		}


		else if (selected === 'TC') {

			document.getElementById("License Fee").innerHTML = '';
		   	document.getElementById("Inspection Fee").innerHTML = '';
		   	document.getElementById("DST").innerHTML = '';
		   	document.getElementById("FX-MW").innerHTML = '';


		   	document.getElementById("License Fee").innerHTML = `<label>License Fee <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="license_fee">
                    `;

            document.getElementById("Inspection Fee").innerHTML = ` <label>Inspection Fee <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="inspection_fee">
                     `; 

            document.getElementById("DST").innerHTML = ` <label>DST <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="dst">
                     `;
			
			document.getElementById("FX-MW").innerHTML = `  
                        <input type="text" class="form-control" name="fees" value="SUF-MW" hidden="">
                     `;

          	document.getElementById("AMOUNT").innerHTML = ` <label>SUF AMOUNT <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="amount" value="">
                     `;
		} else if (selected === 'STORAGE') {

			document.getElementById("License Fee").innerHTML = '';
		   	document.getElementById("Inspection Fee").innerHTML = '';
		   	document.getElementById("DST").innerHTML = '';
		   	document.getElementById("FX-MW").innerHTML = '';
		   	document.getElementById("STORAGE").innerHTML = '';


		   	document.getElementById("STORAGE").innerHTML = `<label>Amount<font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="amount">
                    `;
				document.getElementById("DST").innerHTML = ` <label>DST <font style="color:red;">*</font></label>
                        <input type="text" class="form-control" name="dst">
                     `;
			
 
		}
	}
</script>




@endsection



  
