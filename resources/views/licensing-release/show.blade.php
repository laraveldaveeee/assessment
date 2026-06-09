@extends('layouts.app')
@section('content')


<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="/home">Home</a></li>
		 
	</ol> 
	<h1 class="page-header">Show Licensing For Release </h1>
 
	<div class="panel panel-inverse">
			<div class="panel-heading">
				<h4 class="panel-title">Show Licensing Release</h4>
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="table-responsive">
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Receiver Name</th>
							<th>Date of Receive</th>
							<th>Remarks</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ $licensingRelease->name_receiver }}</td>
							<td>{{ $licensingRelease->date_receive }}</td>
							<td>
								@if ($licensingRelease->remarks == 'Receive')
									<span class="label label-primary"> {{ $licensingRelease->remarks }} </span>
								@endif
							</td>
						</tr>
					</tbody>
				</table>

				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Date of Distribution: &nbsp; {{ $licensingRelease->date_of_distribution->toFormattedDateString() }}</th>
							<th>Name of Applicant: &nbsp; {{ $licensingRelease->applicant_company }}</th>
							<th>Processor: {{ $licensingRelease->processorLicensing->code_name }}</th>
							<th>Date of Processed: {{ $licensingRelease->date_processed->toFormattedDateString() }}</th>
							<th>Date of Releasing: 
								@if ($licensingRelease->date_releasing)
									{{ $licensingRelease->date_releasing->toFormattedDateString()  }}
								@endif

							</th>
						</tr>
						<tr>
							<th>Or Date: &nbsp; {{ $licensingRelease->or_date->toFormattedDateString() }}</th>

							<th>Or No: &nbsp; {{ $licensingRelease->or_number }}</th>
							<th>Quantity: &nbsp; {{ $licensingRelease->quantity }}</th>

							<th>Requirements: &nbsp; {{ $licensingRelease->requirements }}</th>
							<th>Licensed Filed: &nbsp; {{ $licensingRelease->license_filed }}</th>
						</tr>
					</thead>

				</table>
 

				<table class="table table-bordered">
					<thead>
						<th>Signature</th>
					</thead>
					<tbody>
						@if ($licensingRelease->signature)
							<tr>
								<td><img src="{{ Storage::url($licensingRelease->signature) }}"></td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>



@endsection