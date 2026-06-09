@extends('layouts.app')
@section('content')


<div id="content" class="content">
				<!-- begin breadcrumb -->
				<ol class="breadcrumb float-xl-right">
					<li class="breadcrumb-item"><a href="/home">Home</a></li>
					 
				</ol>
				<!-- end breadcrumb -->
				<!-- begin page-header -->
				<h1 class="page-header">Processors </h1>
				<!-- end page-header -->
				<!-- begin panel -->


       			@if(auth()->user()->isAdmin())

				<div class="panel panel-inverse">
					<div class="panel-heading">
						<h4 class="panel-title">Add Processor</h4>
						<div class="panel-heading-btn">
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="panel-body">
						
						<form method="POST" action="/processors-licensing">
							@csrf

							<div class="form-group">
								<label>Code Name</label>
								<input type="text" name="code_name" class="form-control">
							</div>

							<div class="form-group">
								<label>FullName</label>
								<input type="text" name="fullname" class="form-control">
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
							
						</form>

					</div>
				</div>

				@endif
		

			<div class="panel panel-inverse">
					<div class="panel-heading">
						<h4 class="panel-title">Processors</h4>
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
									<th>CodeName</th>
									<th>FullName</th>
									<th>Options</th>
								</tr>
							</thead>

							<tbody>
								@foreach ($processorsLicensings as $processorsLicense)
								<tr>
									<td>{{ $processorsLicense->code_name }}</td>
									<td>{{ $processorsLicense->fullname }}</td>
									<td><a href="/processors-licensing/{{ $processorsLicense->id }}/show-details" class="btn btn-primary btn-xs">Show details</a></td>
								</tr>
								@endforeach
							</tbody>
						</table>

					</div>
				</div>
			</div>







@endsection