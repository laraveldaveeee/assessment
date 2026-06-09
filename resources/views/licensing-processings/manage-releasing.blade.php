@extends('layouts.app')
@section('content')



<div id="content" class="content">
				<!-- begin breadcrumb -->
				<ol class="breadcrumb float-xl-right">
					<li class="breadcrumb-item"><a href="/home">Home</a></li>
					 
				</ol>
				<!-- end breadcrumb -->
				<!-- begin page-header -->
				<h1 class="page-header">Manage Licensing Processing </h1>
				<!-- end page-header -->
				<!-- begin panel -->
				<div class="panel panel-inverse">
					<div class="panel-heading">
						<h4 class="panel-title">Manage Licensing Processing</h4>
						<div class="panel-heading-btn">
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="panel-body">
						<form method="POST" action="{{ route('licensing-processing.updateLicenseForRelease', $licensingProcessing) }}" class="form-horizontal">
							@csrf

						{{ method_field('PATCH') }}

						<label>Date of Release</label>
							<div class="form-group">
							<input type="date" class="form-control"   name="date_releasing"   value="{{ Carbon\Carbon::parse($licensingProcessing->date_releasing)->format('Y-m-d') }}">
							@if ($errors->has('date_releasing'))
							<span class="help-block">
							    <strong>{{ $errors->first('date_releasing') }}</strong>
							</span>
							@endif
						</div>


						<label>Reasons (Optional)</label>
						<textarea type="text" name="reason" id="edit_reason" class="form-control" > {{ $licensingProcessing->reason }}</textarea>
						
						<br>
						<div class="form-group">
						<button type="submit" class="btn btn-primary" id="btn-update">Update
						</button>
						</div>
						</form>
					</div>
				</div>
			</div>
							


 

@endsection