@extends('layouts.app')
@section('content')
<div id="content" class="content">
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
   <li class="breadcrumb-item"><a href="javascript:;">Fee</a></li>
   <li class="breadcrumb-item active">Fee</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Edit Fee<small></small></h1>
<!-- end page-header -->
<!-- begin panel -->
<!-- begin panel -->
<div class="row">
<div class="col-md-12">
<div class="panel panel-inverse">
<div class="panel-heading">
   <h4 class="panel-title">Edit Fees</h4>
   <div class="panel-heading-btn">
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
   </div>
</div>
<div class="panel-body">
<form method="POST" action="{{ route('fee-template.update', $row) }}">
   @csrf
   {{ method_field('PATCH') }}
   <div class="form-group row m-b-10">
      <label class="col-lg-3 text-lg-right col-form-label">Code</label>
      <div class="col-lg-9 col-xl-6">
         <input type="text" name="code" placeholder="Enter Code" class="form-control" value="{{ $row->code }}"/>
      </div>
   </div>
   <div class="form-group row m-b-10">
      <label class="col-lg-3 text-lg-right col-form-label">Name Fees</label>
      <div class="col-lg-9 col-xl-6">
         <input type="text" name="name_fees" placeholder="Enter Name Fees" class="form-control" value="{{ $row->name_fees }}"/>
      </div>
   </div>
   <div class="form-group row m-b-10">
      <label class="col-lg-3 text-lg-right col-form-label">Amount</label>
      <div class="col-lg-9 col-xl-6">
         <input type="text" name="amount" placeholder="Enter Amount" class="form-control" value="{{ $row->amount }}"/>
      </div>
   </div>
   <div class="form-group row m-b-10">
      <label class="col-md-3 col-form-label pt-1">Enabled Year Computation:</label>
      <div class="col-lg-9 col-xl-6 custom-control custom-switch mb-1">
         <input type="checkbox" class="custom-control-input" id="is_year_enabled" name="enabled_year_computation" {{ $row->enabled_year_computation ? 'checked' : '' }}>
         <label class="custom-control-label" for="is_year_enabled"></label>
      </div>
   </div>
   <div class="form-group row m-b-10">
      <label class="col-md-3 col-form-label pt-1">Enabled Surcharge :</label>
      <div class="col-lg-9 col-xl-6 custom-control custom-switch ">
         <input type="checkbox" class="custom-control-input" id="is_surcharge_enabled" name="enabled_surcharge" {{ $row->enabled_surcharge ? 'checked' : '' }}>
         <label class="custom-control-label" for="is_surcharge_enabled"></label>
      </div>
   </div>
   <div class="form-group row m-b-10">
      <label class="col-md-3 col-form-label pt-1">Enabled DST Portable Computation:</label>
      <div class="col-lg-9 col-xl-6 custom-control custom-switch ">
         <input type="checkbox" class="custom-control-input" id="is_enabled_portable_computation" name="enabled_portable_computation" {{ $row->enabled_portable_computation ? 'checked' : '' }}>
         <label class="custom-control-label" for="is_enabled_portable_computation"></label>
      </div> 
   </div>
   <div class="form-group row m-b-10">
      <label class="col-md-3 col-form-label pt-1">Enabled DST Default Computation:</label>
      <div class="col-lg-9 col-xl-6 custom-control custom-switch ">
         <input type="checkbox" class="custom-control-input" id="is_enabled_dst_computation" name="enabled_dst_default" {{ $row->enabled_dst_default ? 'checked' : '' }}>
         <label class="custom-control-label" for="is_enabled_dst_computation"></label>
      </div>
   </div>

  <div class="form-group row m-b-10">
      <label class="col-md-3 col-form-label pt-1">Enabled Licensed Fee Computation:</label>
      <div class="col-lg-9 col-xl-6 custom-control custom-switch ">
         <input type="checkbox" class="custom-control-input" id="is_enabled_licensed_fee_computation" name="enabled_licensed_fee_computation" {{ $row->enabled_licensed_fee_computation ? 'checked' : '' }}>
         <label class="custom-control-label" for="is_enabled_licensed_fee_computation"></label>
      </div>
   </div>

   <div class="form-group row m-b-10">
      <label class="col-lg-3 text-lg-right col-form-label"></label>
      <div class="col-lg-9 col-xl-6">
         <button type="submit" class="btn btn-primary" id="btn-save">Update</button>
      </div>
   </div>
</form>
@endsection