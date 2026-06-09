@extends('layouts.app')
@section('content')
	<div id="content" class="content">
		<ol class="breadcrumb float-xl-right">
			<li class="breadcrumb-item"><a href="/home">Home</a></li>
			<li class="breadcrumb-item"><a href="/applicants">Show Applicant</a></li>
		</ol>
		<h1 class="page-header">Show Applicant</h1>
			<div class="form-group">
				<a href="{{ url()->previous() }}" class="btn btn-sm btn-primary mb-10"><i class="fa fa-arrow-left"></i> Back Previous Page</a>
			</div>
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
						<table class="table table-bordered">
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
					<div class="note note-warning note-with-right-icon">
					  <div class="note-icon"><i class="fa fa-lightbulb"></i></div>
					  <div class="note-content text-left">
					    <h4><b>Note!</b></h4>
					    <p> If you want to renew the applicant/company you need to copy/replicate this assessments</p>
					  </div>
					</div>
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
								<a href="/applicant-details/{{ $assessment->id }}" class="btn btn-warning btn-xs" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>
								
									<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModalCenter" data-id="{{ $assessment->id }}">
									<i class="fa fa-clone" aria-hidden="true"></i> Copy Assessment
									</button>
								
								
									<a href="/assessments/{{ $assessment->id }}" class="btn btn-primary btn-xs"> <i class="fa fa-clone" aria-hidden="true"></i> Edit Assessment </a>
								
 								<form method="POST" action="/assessments/{{ $assessment->id }}/delete" style="display:inline-block;">
 										@csrf
 										{{ method_field('DELETE') }}

 										<button type="submit" class="btn btn-danger btn-xs">Delete</button>
 									
 								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
@push('scripts')
<script type="text/javascript">
	$('#exampleModalCenter').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var id = button.data('id') // Extract info from data-* attributes
	  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	  var modal = $(this)
	  modal.find('#assessment').val(id)
	})
</script>
@endpush
