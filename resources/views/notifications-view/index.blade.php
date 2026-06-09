@extends('layouts.app')
@section('content')
	 <div id="content" class="content">
		<ol class="breadcrumb float-xl-right">
			<li class="breadcrumb-item"><a href="/home">Home</a></li>
			<li class="breadcrumb-item"><a href="/view-notifications">Notifications</a></li>
		</ol>
		<!-- End breadcrumb-->
		<h1 class="page-header text-white">Verified Applicant Company</h1> 
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-inverse">
					<div class="panel-heading">
					    <h4 class="panel-title">Notification Lists</h4>
					    <div class="panel-heading-btn">
					        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
					        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					    </div>
					</div>
					<div class="panel-body bg-dark">
						<table class="table table-bordered text-white" id="notification-data">
							<thead>
								<tr>
									<th>ID</th>
									<th>Applicant Company Name</th>
									<th>Address</th>
									<th>Status</th>
									<th>Options</th>
								</tr>
							</thead>
							<tbody>
								{{-- @foreach ($assessments as $assessment)
								<tr>
									<td>{{ $assessment->applicant->applicant_company }}</td>
									<td>{{ $assessment->applicant->address }}</td>
									<td>{{ $assessment->status }}</td>
									<td>
										@if (auth()->user()->isAdmin() || auth()->user()->isAccessor())
											<a href="/assessments/{{ $assessment->id }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Manage Assessment</a>
										@elseif (auth()->user()->isCashier())
											<a href="/cashier/{{ $assessment->id }}/applicant-assessments" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Manage </a>
										@endif
									</td>
								</tr> 
								@endforeach --}}
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	 </div>
@endsection
@push('scripts')
	<script>
		$(document).ready(function () {
			$('#notification-data').DataTable({
					"ordering":'true',
					"order": [0, 'desc'],
					processing: true,
					serverSide: true,
					ajax: '{!! route('view-notifications') !!}',
					columns: [
						{ data: 'id', name: 'id' },
						{ data: 'applicant.applicant_company',},
						{ data: 'applicant.address',},
						{ data: 'status', },																																
						{ data: 'action', name: 'action', orderable: false, searchable: false },
					]
			});
		});
	</script>
@endpush
