@extends('layouts.app')
@section('content')


<div id="content" class="content">
				<!-- begin breadcrumb -->
				<ol class="breadcrumb float-xl-right">
					<li class="breadcrumb-item"><a href="/home">Home</a></li>
					 
				</ol>
				<!-- end breadcrumb -->
				<!-- begin page-header -->
				<h1 class="page-header">Processor Details </h1>
				<!-- end page-header -->
				<!-- begin panel -->

				<div class="panel panel-inverse">
					<div class="panel-heading">
						<h4 class="panel-title">Processor Details</h4>
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
									<th>Date of Distribution</th>
									<th>Name of Applicant</th>
									<th>Remarks</th>
									<th>Date of Processed</th>
									<th>Options</th>
								</tr>

								<tbody>
									@foreach ($processorsLicense->licensingProcessings as $data)
									<tr>
										<td>{{ $data->date_of_distribution }}</td>
										<td>{{ $data->applicant_company }}</td>
										<td>{{ $data->remarks }}</td>
										<td>{{ $data->date_processed }}</td>
										<td><a href="/licensing-release/{{ $data->id }}/show" class="btn btn-primary btn-xs">Show</a></td>
									</tr>
									@endforeach
								</tbody>
							</thead>
						</table>
						 
					</div>
				</div>
		

 



@endsection