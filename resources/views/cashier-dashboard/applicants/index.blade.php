@extends('layouts.app')
@section('content')
<div id="content" class="content">
	<h1 class="page-header">Applicant Company</h1>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">Applicant lists</h4>
			<div class="panel-heading-btn">
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
				<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
			</div>
		</div>
		
		<div class="panel-body">
			<table class="table table-bordered" id="applicant-table">
				<thead>
					<tr>
						<th>ID</th>
					{{-- 	<th>SOA NO</th> --}}
						<th>Applicant Company Name</th>
						<th>Address</th>
						<th>Options</th>
					</tr>
				</thead>
				 <tbody>
				 {{-- 	@foreach ($applicants as $applicant)
				 	<tr>
				 		<td>{{ $applicant->id }}</td>
				 		<td>{{ $applicant->applicant_company }}</td>
				 		<td>{{ $applicant->address }}</td>
				 	  <td>{!! $applicant->latest_assessment->status ?? '<span class="label label-primary">For Payment </span>' !!}</td>
				 		<td><a href="/cashier/{{ $applicant->latestAssessment->id }}/applicant-assessments" class="btn btn-outline-primary btn-xs"> Manage</a></td>
				 	</tr>
				 	@endforeach --}}
				 </tbody>
			</table>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script>

	$(document).ready(function () {
	$.ajaxSetup({
		headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$('#applicant-table').DataTable({
	  	"ordering":'true',
		"order": [0, 'desc'],
	    processing: true,
	    serverSide: true,

	    ajax: '{!! route('cashier/applicant-list') !!}',
	    columns: [
	        { data: 'id'},  
			// { data: 'latest_assessment.soa_no'}, //Get the latest of SOA NO
	        { data: 'applicant_company',},
	        { data: 'address',}, 	
	        { data: 'action', name: 'action', orderable: false, searchable: false },
	    ]
		  });
	  });
</script>

@endpush