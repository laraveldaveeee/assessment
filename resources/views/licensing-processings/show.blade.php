@extends('layouts.app')
@section('content')



<div id="content" class="content">
				<!-- begin breadcrumb -->
				<ol class="breadcrumb float-xl-right">
					<li class="breadcrumb-item"><a href="/home">Home</a></li>
					 
				</ol>
				<!-- end breadcrumb -->
				<!-- begin page-header -->
				<h1 class="page-header">Show Licensing Processing </h1>
				<!-- end page-header -->
				<!-- begin panel -->
				<div class="panel panel-inverse">
					<div class="panel-heading">
						<h4 class="panel-title">Show Licensing Processing</h4>
						<div class="panel-heading-btn">
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="panel-body">

						<table class="table table-bordered">
							<tbody>
 
								<tr>
									<td><b>Date of Distribution :</b> {{ $licensingProcessing->date_of_distribution }} </td>
									<td><b>Type :</b> {{ $licensingProcessing->requirements }}</td>
									<td><b>Name of Applicant :</b> {{ $licensingProcessing->applicant_company }}</td>
								</tr>
								<tr>

									<td><b>Processor: </b> {{ $licensingProcessing->processorLicensing->code_name }}</td>
									<td><b>OR Date : </b> {{ $licensingProcessing->or_date }}</td>
									<td><b>OR Number : </b> {{ $licensingProcessing->or_number }}</td>
								</tr>
								<tr>
									<td><b>Remarks : </b> {{ $licensingProcessing->remarks }}</td>
									<td><b>Date Processed : </b> {{ $licensingProcessing->date_processed }}</td>
									<td><b>Date In : </b> </td>
								</tr>
								<tr>
									<td colspan="3"><b>Reason :</b> {{ $licensingProcessing->reason }}</td>
								</tr>
							</tbody>
							
						</table>


						<table class="table table-bordered">
							<thead>
								<tr>
									<th>License Filed</th>
									<th>Quantity</th>
								</tr>
							</thead>
							<tbody>
								<tr>
										<td>{!! nl2br($licensingProcessing->license_filed) !!}</td>
										<td> {!! nl2br($licensingProcessing->quantity) !!}</td>
								</tr>
							</tbody>
						</table>

					</div>
				</div>
			</div>
			
 


@endsection