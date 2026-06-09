@extends('layouts.app')
@section('content')
	<div id="content" class="content">
		{{-- <ol class="breadcrumb float-xl-right">
			<li class="breadcrumb-item"><a href="/home">Home</a></li>
			<li class="breadcrumb-item"><a href="/applicants">Show Applicant</a></li>
		</ol> --}}
		<h1 class="page-header">Show Applicant</h1>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-default" >
							<div class="panel-heading">
							<h4 class="panel-title">Show Applicant</h4>
								<div class="panel-heading-btn">
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
									<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
								</div>
							</div>
						<div class="panel-body">
						<table class="table table-bordered ">
						<thead>
							<tr>
								<th>Applicant</th>
								<th>Address</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{{ $applicant->applicant_company }}</td>
								<td>{{ $applicant->address }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		 <div class="col-md-12">
					<div class="panel panel-default" >
						<div class="panel-heading">
						<h4 class="panel-title">Assessments</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
						</div>

					<div class="panel-body">
					{{-- <div class="note note-danger note-with-right-icon">
					  <div class="note-icon"><i class="fa fa-lightbulb"></i></div>
					  <div class="note-content text-left">
					    <h4><b>Note!</b></h4>
					    <p> You can modify the assessment OR NO:</p>
					  </div>
					</div> --}}
					<table class="table table-bordered">
					<thead>
						<tr>
							<th>SOA-NO</th>
							<th>Description</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($applicant->assessments as $assessment)
						@include('applicants.modal.duplicate-modal')
						<tr>
							<td>{{ $assessment->soa_no }}</td>
							<td>-</td>
							<td>
								<a href="/cashier/applicant/assessment-details/{{ $assessment->id }}" class="btn btn-primary btn-xs"><i class="fa fa-bar-chart" aria-hidden="true"></i> Show Assessment </a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
		 
 
@endsection

 
