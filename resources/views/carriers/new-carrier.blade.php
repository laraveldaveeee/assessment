@extends('layouts.app')
@section('content')
<div id="content" class="content">
	<!-- begin breadcrumb -->
		<h1 class="page-header">New Carrier </h1>
		<div class="row">
			<div class="col-md-12">
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
				 
				  <form method="POST" action="/new-carrier">
				  	@csrf
			      	<div class="panel-body">
				      		<div class="row"> 
				     
						      {{-- 	<div class="col-md-12">
						      		<div class="form-group">
						      			<label>Company Name</label>
						      			
					      			</div>
					      		</div>	 --}}
					      		<div class="col-md-12">
						      		<div class="form-group{{ $errors->has('applicant_company') ? 'has-error' : '' }}">
						      			<label>Selected Existing Company Name</label>
						      			<select class="form-control" name="existing_company">
						      				<option selected="" value="" disabled="">Select Existing Company</option>
						      				@foreach ($groupByCarriers as $newCarrier) 
						      					<option value="{{ $newCarrier->applicant_company }}">{{ $newCarrier->applicant_company }}</option>
						      			 
						      				@endforeach
						      			</select>
					      			</div>
					      			@if ($errors->has('applicant_company'))
										<span class="help-block">
											<strong style="color: red;">{{ $errors->first('applicant_company') }}</strong>
										</span>
									@endif
					      		</div>

							     <div class="col-md-12">
							      	
								 <div class="form-group">
				                        <input type="checkbox" id="myCheck" onclick="myFunction()">
				                        <label>Add another company</label>
				                        <div id="text" style="display:none" >
				                        	{{-- <label>NEw Company</label> --}}
				                          <input type="text" class="form-control" name="new_company" placeholder="Enter new Company">
				                            
				                        </div> 
				                     </div>
				                  </div>


					      		<div class="col-md-6">
					      			<div class="form-group{{ $errors->has('soa_number') ? 'has-error' : '' }}">
						      			<label>Ref #</label>
						      			<input type="text" class="form-control" name="soa_number">
										@if ($errors->has('soa_number'))
										<span class="help-block">
											<strong style="color: red;">{{ $errors->first('soa_number') }}</strong>
										</span>
										@endif
					      			</div>
					      		</div>
					      		<div class="col-md-6">
					      			<div class="form-group{{ $errors->has('address') ? 'has-error' : '' }}">
					      				<label>Address</label>
					      				<input type="text" class="form-control" name="address">
					      				@if ($errors->has('address'))
										<span class="help-block">
											<strong style="color: red;">{{ $errors->first('address') }}</strong>
										</span>
										@endif
					      			</div>
					      		</div>
					      		<div class="col-md-6">
				      				<div class="form-group{{ $errors->has('remarks') ? 'has-error' : '' }}">
					      				<label>Remarks</label>
					      				<input type="text"  class="form-control" name="remarks">
					      				@if ($errors->has('remarks'))
										<span class="help-block">
											<strong style="color: red;">{{ $errors->first('remarks') }}</strong>
										</span>
										@endif
				      				</div>
				      			</div>
 
				      			<div class="col-md-6">
				      				<div class="form-group{{ $errors->has('due_date') ? 'has-error' : '' }}">
				      					<label>Due Date</label>
				      					<input type="date"  name="due_date" class="form-control">
				      					@if ($errors->has('due_date'))
										<span class="help-block">
											<strong style="color: red;">{{ $errors->first('due_date') }}</strong>
										</span>
										@endif
				      				</div>
				      			</div>	
				      			<div class="col-md-12">
				      				<div class="form-group{{ $errors->has('assessed_by') ? 'has-error' : '' }}">
				      					<label>Assessed By:</label>
				      					<select class="form-control" name="assessed_by">
				      						<option disabled="" selected="">Select Assessor</option>
				      						<option value="RPA">RPA</option>
				      						<option value="WOL">WOL</option>
				      						<option value="KGB">KGB</option>
				      						<option value="RJM">RJM</option>
				      						<option value="RDV">RDV</option>
				      						<option value="WDD">WDD</option>
				      						<option value="GMB">GMB</option>
				      						<option value="MFD">MFD</option>
				      						<option value="AMD">AMD</option>
				      						<option value="KDV">KDV</option>
				      					</select>

				      				</div>
				      				@if ($errors->has('assessed_by'))
										<span class="help-block">
											<strong style="color: red;">{{ $errors->first('assessed_by') }}</strong>
										</span>
										@endif
				      			</div>
				      			<div class="col-md-12">
				      			<div class="form-group">
				      				<button type="submit" class="btn btn-primary">Submit</button>
				      			</div>
					 	 </div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

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

					<table class="table table-bordered" id="new-carrier-lists-tables">
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
						{{-- <tbody>
							@foreach ($newCarriers as $newCarrier)
							<tr>
								<td>{{ $newCarrier->id }}</td>
								<td>{{ $newCarrier->soa_number }}</td>
								<td>{{ $newCarrier->applicant_company }}</td>
								<td>{{ $newCarrier->address }}</td>
								<td>{{ $newCarrier->status }}</td>
								<td><a href="/new-carrier/{{ $newCarrier->id }}/show" class="btn btn-primary btn-xs">Show</a></td>
							</tr>
							@endforeach
						</tbody> --}}
					</table>

				</div>
			</div>
		</div>

	</div>
</div>
</div>


@endsection

@push ('scripts')


<script>
function myFunction() {
var checkBox = document.getElementById("myCheck");
var text = document.getElementById("text");
if (checkBox.checked == true){
text.style.display = "block";
} else {
text.style.display = "none";
}
}
</script>
 
<script>
   $(document).ready(function () {
     $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
   $('#new-carrier-lists-tables').DataTable({
          //"ordering":'true',
          "order": [0, 'desc'],
          processing: true,
          serverSide: true,
          ajax: '{!! route('new-carrier') !!}',
          columns: [
              { data: 'id'}, //Get the latest of SOA NO
              { data: 'soa_number'},
              { data: 'applicant_company'},
              { data: 'address'},
              {
           			"data": "status", // can be null or undefined
           			"defaultContent": "<i>Not set</i>"		
   		        },
              { data: 'action', name: 'action', orderable: false, searchable: false },
          	]
    	});
    });
</script>
@endpush 
