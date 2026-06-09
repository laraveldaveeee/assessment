@extends('layouts.app')

@section ('content')
<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
	  {{--  <li class="breadcrumb-item"><a href="/home">Home</a></li>
	   <li class="breadcrumb-item"><a href="/applicants">Applicant</a></li> --}}
	</ol>

	<h1 class="page-header">Carrier Details</h1>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default" >
				<div class="panel-heading">
				<h4 class="panel-title">Carrier Details</h4>
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
								<td>Name Applicant</td>
								<td>Created At</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{{ $assessment->carrier->applicant }}</td>
								<td>{{ $assessment->carrier->created_at->diffForHumans() }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-default" >
				<div class="panel-heading">
				<h4 class="panel-title">Assessment Details</h4>
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
							<th>SOA</th>
							<th>Grand Total</th>
						</thead>
						<tbody>
							<tr>
								<td>{{ $assessment->soa_number }}</td>
								<td><strong class="text-red">P {{ $assessment->grandTotalCarrier() }}</strong></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
			<div class="col-md-6">
			<div class="panel panel-default" >
				<div class="panel-heading">
				<h4 class="panel-title">Assessment Fees</h4>
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
							<th>Fees</th>
							<th>Amount</th>
						</thead>
						<tbody>
							@foreach ($assessment->categories as $category)
							<tr>
								<td>{{ $category->description }}</td>
								<td>{{ $category->amount }}</td>
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