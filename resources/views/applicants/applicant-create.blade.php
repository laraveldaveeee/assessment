@extends('layouts.app')
@section('content')

<div id="content" class="content">
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
   <li class="breadcrumb-item"><a href="/home">Home</a></li>
   <li class="breadcrumb-item"><a href="/applicants">Applicant/Company</a></li>
</ol>

<h1 class="page-header">Create Applicant / Company</h1>
<div class="row">
  <div class="col-md-12">
   <div class="panel panel-inverse" >
      <div class="panel-heading">
         <h4 class="panel-title">Create Applicant / Company</h4>
         <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
         </div>
      </div>
      <div class="panel-body">

      	<form method="POST" action="/applicants" id="userForm">
      		@csrf
  		<div class="form-group row m-b-10{{ $errors->has('applicant_company') ? 'has-error' : '' }}">
  			<label class="col-lg-3 text-lg-right col-form-label">Applicant/Company Name</label>
  			<div class="col-lg-9 col-xl-6">
  				<input type="text" name="applicant_company" placeholder="Enter Applicant / Company Name" class="form-control" />
    				 @if ($errors->has('applicant_company'))
                <span class="help-block">
                  <strong style="color: red;">{{ $errors->first('applicant_company') }}</strong>
                </span>
            @endif
  			</div>
  		</div>

  		<div class="form-group row m-b-10{{ $errors->has('address') ? 'has-error' : '' }}">
  			<label class="col-lg-3 text-lg-right col-form-label">Address</label>
  			<div class="col-lg-9 col-xl-6">
  				<input type="text" name="address" placeholder="Address" class="form-control" />
  				 @if ($errors->has('address'))
              <span class="help-block">
                <strong style="color: red;">{{ $errors->first('address') }}</strong>
              </span>
          @endif
  			</div>
  		</div> 
  		<div class="form-group row m-b-10">
  			<label class="col-lg-3 text-lg-right col-form-label"></label>
  			<div class="col-lg-9 col-xl-6">
  				<button type="submit" class="btn btn-primary" id="btn-save">Submit</button>
  			</div>
  		</div> 
  	</form>
  </div>
  </div>
</div>
</div>


@endsection
