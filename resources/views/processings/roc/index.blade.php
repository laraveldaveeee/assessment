@extends('layouts.app')
@section('content')

	<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
	    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
	    <li class="breadcrumb-item active">RLM</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">RLM <small></small></h1>
	 <!-- begin panel -->
            <div class="row">
                <div class="col-md-5">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">Add Applicant Details</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                    	<form>
                    		<div class="row">
                    			<div class="col-md-5">
		                    		<div class="form-group">
		                    			<label>License Number</label>
		                    			<input type="text" name="license_number" class="form-control">
		                    		</div>                    		
	                    		</div>                    		
	                    		</div>                    		
                    		<div class="form-group">
                    			<label>Lastname</label>
                    			<input type="text" name="lastname" class="form-control">
                    		</div>                    		
                    		<div class="form-group">
                    			<label>Firstname</label>
                    			<input type="text" name="firstname" class="form-control">
                    		</div>                    		
                    		<div class="form-group">
                    			<label>M.I</label>
                    			<input type="text" name="middle_initial" class="form-control">
                    		</div>                    		
                    		<div class="form-group">
                    			<label>Birthdate</label>
                    			<input type="date" name="middle_initial" class="form-control">
                    		</div>                    		
                    		<div class="form-group">
                    			<label>Birthdate</label>
                    			<input type="date" name="middle_initial" class="form-control">
                    		</div>                    		
                    		<div class="form-group">
                    			<label>Address</label>
                    			<input type="text" name="address" class="form-control">
                    		</div>
                    		<div class="row">	
                    		<div class="col-md-6">
                    		<div class="form-group">
                    			<label>Height</label>
                    			<input type="text" name="height" class="form-control">
                    		</div>                    		
                    		</div>       
                    		<div class="col-md-6">             		
	                    		<div class="form-group">
	                    			<label>Weight</label>
	                    			<input type="text" name="weight" class="form-control">
	                    		</div>
                    		</div>
                    		</div>
                    		<div class="form-group">
                    			<label>Sex</label>
                    			<select class="form-control">
                    				<option value="Male">Male</option>
                    				<option value="Female">Female</option>
                    			</select>
                    		</div>
                    		<div class="form-group">
                    			<label>Citizenship</label>
                    			<input type="text" name="citizenship" class="form-control">
                    		</div>


                    	</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
@endsection