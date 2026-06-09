@extends('layouts.app')
@section('content')



	<div id="content" class="content">
					<!-- begin breadcrumb -->
		<ol class="breadcrumb float-xl-right">
			<li class="breadcrumb-item"><a href="/home">Home</a></li>
			<li class="breadcrumb-item"><a href="/applicants">Show SUF Rates</a></li>
			 
		</ol>

		<h1 class="page-header">Show SUF Rates</h1>
				<div class="row">
					<div class="col-md-12">
						<div class="panel panel-inverse" >
							<div class="panel-heading">
							<h4 class="panel-title">Show SUF Rates</h4>
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
								<th>Name</th>
								<th>Rates</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{{ $sufRate->suf_name }}</td>
								<td>{{ $sufRate->rates }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>


		<div class="col-md-12">
					<div class="panel panel-inverse" >
						<div class="panel-heading">
						<h4 class="panel-title">Services</h4>
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
								<th>ID</th>
								<th>Name</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($sufRate->serviceTemplates as $sufrate)
							<tr>
								<td>{{ $sufrate->id }}</td>
								<td>{{ $sufrate->name }}</td>
							</tr>
							@endforeach
						</tbody>
			 		</table>
			 	</div>
			 </div>
			</div>
		</div>
	</div>

 



@endsection