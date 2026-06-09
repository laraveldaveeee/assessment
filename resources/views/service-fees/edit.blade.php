@extends('layouts.app')
@section('content')
<div id="content" class="content">
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
   <li class="breadcrumb-item"><a href="javascript:;">Service Fees</a></li>
   <li class="breadcrumb-item active">Service Fees</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Service Fees <small></small></h1>
<!-- end page-header -->
<!-- begin panel -->
<!-- begin panel -->
<div class="row">
<div class="col-md-12">
   <div class="panel panel-inverse">
      <div class="panel-heading">
         <h4 class="panel-title">Add Service Fees</h4>
         <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
         </div>
      </div>
      <div class="panel-body">
         <form method="POST" action="/service-fees/{{ $serviceTemplate->id }}" id="">
            @csrf
            {{ method_field('PATCH') }}
            <div class="form-group row m-b-10">
               <label class="col-lg-3 text-lg-right col-form-label">Service Name</label>
               <div class="col-lg-9 col-xl-6">
                  <input type="text" name="name" placeholder="Enter Name Fees" class="form-control" value="{{ $serviceTemplate->name }}" />
               </div>
            </div>
            <div class="form-group row m-b-10">
               <label class="col-lg-3 text-lg-right col-form-label"></label>
               <div class="col-lg-9 col-xl-6">
                  <button type="submit" class="btn btn-primary" id="btn-save">Update</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
@endsection