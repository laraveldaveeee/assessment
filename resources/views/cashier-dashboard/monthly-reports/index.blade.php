@extends('layouts.app')
@section('content')
<div id="content" class="content">
	<h1 class="page-header ">Monthly Report</h1>
	<div class="row">
	<div class="col-md-4">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">-</h4>
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
				</div>
			</div>
		
			<div class="panel-body ">
						<form class="form-horizontal" method="GET" action="/monthly-report"> 
						<div class="form-group{{ $errors->has('month') ? ' has-error' : '' }}">
						    <label for="from" class="col-md-4 control-label text-white">Month</label>
						    <div class="col-md-12">
						        <input id="from" type="month" class="form-control b" name="month" value="{{ request('month') }}">

						        @if ($errors->has('from'))
						            <span class="help-block">
						                <strong style="color: #ff5b57;">{{ $errors->first('month') }}</strong>
						            </span>
						        @endif
						    </div>
						</div>

						<div class="form-group{{ $errors->has('from_undeposited') ? ' has-error' : '' }}">
						    <label for="from_undeposited" class="col-md-4 control-label t">From Undeposited</label>
						    <div class="col-md-12">
						        <input id="from_undeposited" type="date" class="form-control bg-" name="from_undeposited" value="{{ request('from_undeposited') }}">

						        @if ($errors->has('from_undeposited'))
						            <span class="help-block">
						                <strong style="color: #ff5b57;">{{ $errors->first('from_undeposited') }}</strong>
						            </span>
						        @endif
						    </div>
						</div>						

						<div class="form-group{{ $errors->has('to_undeposited') ? ' has-error' : '' }}">
						    <label for="to_undeposited" class="col-md-4 control-label ">To Undeposited</label>
						    <div class="col-md-12">
						        <input id="to_undeposited" type="date" class="form-control b" name="to_undeposited" value="{{ request('to_undeposited') }}">
						        @if ($errors->has('to_undeposited'))
						            <span class="help-block">
						                <strong style="color: #ff5b57;">{{ $errors->first('to_undeposited') }}</strong>
						            </span>
						        @endif
						    </div>
						</div>

						<div class="form-group">
						    <div class="col-md-6 col-md-offset-4">
						        <button type="submit" class="btn btn-outline-primary">
						            Generate
						        </button>

						        <a href="" class="btn btn-outline-danger">
						            Cancel
						        </a>
						    </div>
						</div>
						</form>
					</div>
				</div>
				</div>
	    <div class="col-md-8">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">-</h4>
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
				</div>
			</div>

			<div class="panel-body">
				<div class="form-group">
				@if (request()->has('month') )
				  <a href="{{ route('monthly-report/export', ['month' => request('month'), 'from_undeposited' => request('from_undeposited'), 'to_undeposited'	=> request('to_undeposited') ]) }}" class="btn btn-outline-primary" style="display: inline-block;">Generate Excel Reports</a>
				@endif
				</div>
			    <table class="table table-bordered">
			    	<thead>
			    		<th class="">Or Date</th>
			    		<th class="">Or No.</th>
			    	</thead>
			    	@if (request()->has('month'))
			    	<tbody>
			    		@foreach ($assessments as $assessment)
			    		<tr>
			    			<td class="">{{ $assessment->or_date }}</td>
			    			<td class="">{{ $assessment->or_no }}</td>
			    		</tr>
			    		@endforeach
			    	</tbody>
			    	@endif
			    </table>
				 
			</div>
		</div>
@endsection