@extends('layouts.app')

@section('content')
 <div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb float-xl-right">
                <li class="breadcrumb-item"><a href="javascript:;">Services</a></li>
                <li class="breadcrumb-item active">Fee</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Update Fees <small></small></h1>
            <!-- end page-header -->
            <!-- begin panel -->
            <div class="row">
                <div class="col-md-4">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">Update Fees</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('services.update', $service) }}">
                            @csrf

                            {{ method_field('PATCH') }}

						<div class="form-group">
						    <label>Roc Fee</label>
						    <input type="text" class="form-control" name="roc_fee">
						</div>

						 <div class="form-group">
						    <label>App Fee</label>
						    <input type="text" class="form-control" name="app_fee">
						</div>

						<div class="form-group">
						    <label>Filing Fee</label>
						    <input type="text" class="form-control" name="filing_fee">
						</div>
                        
						 <div class="form-group">
						    <label>DST Fee</label>
						    <input type="text" class="form-control" name="dst_fee">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection