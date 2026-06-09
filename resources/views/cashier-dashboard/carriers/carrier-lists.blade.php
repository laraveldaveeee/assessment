@extends('layouts.app')
@section('content')
<div id="content" class="content">
	<h1 class="page-header ">Carrier Company</h1>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">Carrier lists</h4>
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			</div>
		</div>
		
		<div class="panel-body">
			<table class="table table-bordered " id="carrier-table">
				<thead>
					<tr>
						<th>ID</th>
						<th>SOA NO</th>
						<th>Applicant</th>
						<th>Status</th>
						<th>Or No</th>
						<th>Options</th>
						{{-- <th>Carrier Company</th>
						<th>Status</th>
						<th>Options</th> --}}
					</tr>
				</thead>
				 <tbody>
				 	{{-- @foreach ($carriers as $carrier)
				 	<tr>
						<td>{{ $carrier->id }}</td>
				 		<td>{{ $carrier->carrier->applicant }}</td>
				 		<td>{{ $carrier->carrier->address }}</td>
				 		<td>{!! $carrier->assessment->carrier_status ?? '<span class="label label-success">Paid </span>' !!}</td>
						<td><a href="/cashier/{{ $carrier->id }}/show-assessments" class="btn btn-outline-primary btn-xs"><i class="fa fa-pencil"></i> Show Details</a></td>
				 	</tr>
				 	@endforeach --}}
				 </tbody>
				</table>
			</div>
		</div>
	</div>
@endsection

@push ('scripts')
<script> 
	  $(document).ready(function () {
	    $.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
    });

  
	 $('#carrier-table').DataTable({
	      	  //"ordering":'true',
          "order": [0, 'desc'],
          processing: true,
          serverSide: true,
          ajax: '{!! route('cashier.carrier-list.carrierLists') !!}',
          columns: [
              { data: 'id'},
              { data: 'soa_number'},
              { data: 'carrier.applicant'},
              { data: 'carrier_status'},
              { data: 'or_no'},
              // { data: 'assessment.soa_number'},
              // // { data: 'latest_assessment.soa_no'}, //Get the latest of SOA NO
              // { data: 'applicant'},
              // { data: 'address'},
              // { data: 'assessment.status'},
             //  {
           		// 	"data": "latest_assessment.status", // can be null or undefined
           		// 	"defaultContent": "<i>Not set</i>"
   		        // },
               { data: 'action', name: 'action', orderable: false, searchable: false },
	        ]
	  });
});

	
</script>


@endpush