@extends('layouts.app')

@section('content')
<div id="content" class="content">
				<!-- begin breadcrumb -->
				<ol class="breadcrumb float-xl-right">
					<li class="breadcrumb-item"><a href="/home">Home</a></li>
					<li class="breadcrumb-item"><a href="/applicants">Applicant</a></li>
					 
				</ol>
				<!-- end breadcrumb -->
				<!-- begin page-header -->
				<h1 class="page-header">Pending Applicant Company</h1>
				<!-- end page-header -->
				<!-- begin panel -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">Pending Applicant</h4>
						<div class="panel-heading-btn">
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="panel-body">
						<div id="app">
						<pending-assessment></pending-assessment>
						</div>
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

	    ajax: '{!! route('chief-engineer/home.index') !!}',
	    columns: [
	    	{ data: 'id' },
	        { data: 'soa_no'}, //Get the latest of SOA NO
	        { data: 'applicant.applicant_company',},
	        { data: 'applicant.address',}, 	
	         {

				//"data": "latest_assessment.status", // can be null or undefined
				"defaultContent": "<span class='label label-warning'>Pending </span>"		
			},

	        { data: 'action', name: 'action', orderable: false, searchable: false },
	    ]
		  });
	  });
</script>

@endpush