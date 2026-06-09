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
						<form method="POST" action="{{ route('licensing-processing.updateLicense', $licensingProcessing) }}" class="form-horizontal">
							@csrf

						{{ method_field('PATCH') }}
						<label>Date of Process</label>
							<div class="form-group">
							<input type="date" class="form-control"  id="edit_date_processed" name="date_processed"   value="{{ Carbon\Carbon::parse($licensingProcessing->date_processed)->format('Y-m-d') }}">
							@if ($errors->has('date_processed'))
							<span class="help-block">
							    <strong>{{ $errors->first('date_processed') }}</strong>
							</span>
							@endif
						</div>



{{-- 						<label>Remarks</label>
						<select  class="form-control"  id="edit_remarks" name="remarks"  value="{{ $licensingProcessing->remarks }}">
						<option value="Releasing">Releasing</option>
						<option value="Pending">Pending</option>
						</select>

						@if ($errors->has('remarks'))
						<span class="help-block">
						  <strong>{{ $errors->first('remarks') }}</strong>
						</span>
						@endif --}}

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