@extends('layouts.app')
@section('content')
<div id="content" class="content">
	<h1 class="page-header ">Pending New Carrier Company</h1>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">Pending New Carrier lists</h4>
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			</div>
		</div>
		
		<div class="panel-body">
			<table class="table table-bordered " id="new-pending-carrier-lists-tables">
				<thead>
					<tr>
						<th>ID</th>
						<th>Ref NO</th>
						<th>Applicant</th>
						<th>Address</th>
						<th>Status</th>
						<th>Options</th> 
					</tr>
				</thead>
				 <tbody>
				{{--  	@foreach ($newCarriers as $carrier)
				 	<tr>
						<td>{{ $carrier->id }}</td>
						<td>{{ $carrier->soa_number }}</td>
				 		<td>{{ $carrier->applicant_company }}</td>
				 		<td>{{ $carrier->address }}</td>
				 		<td>{!! $carrier->assessment->carrier_status ?? '<span class="label label-success">Paid </span>' !!}</td>
						<td><a href="/carrier/{{ $carrier->id }}/show-assessments" class="btn btn-outline-primary btn-xs"><i class="fa fa-pencil"></i> Show Details</a></td>
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
   $('#new-pending-carrier-lists-tables').DataTable({
          //"ordering":'true',
          "order": [0, 'desc'],
          processing: true,
          serverSide: true,
        ajax: '{!! route('cashier.pendings') !!}',
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
