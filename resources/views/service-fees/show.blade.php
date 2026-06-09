@extends('layouts.app')
@section('content')
<div id="content" class="content">
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
   <li class="breadcrumb-item"><a href="/home">Home</a></li>
   <li class="breadcrumb-item"><a href="#"></a></li>
</ol>
<h1 class="page-header">Show </h1>
<div class="row">
<div class="col-md-12">
   <div class="panel panel-inverse">
      <div class="panel-heading">
         <h4 class="panel-title">Service</h4>
         <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
         </div>
      </div>
      <div class="panel-body">
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>Name</th>
                  <th>Created At</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>{{ $serviceTemplate->name }}</td>
                  <td>{{ $serviceTemplate->created_at }}</td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</div>
<div class="col-md-6">
   <div class="panel panel-inverse">
      <div class="panel-heading">
         <h4 class="panel-title">Add Fee</h4>
         <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
         </div>
      </div>
      <div class="panel-body">
      <form method="POST" action="{{ route('fee-templates.store', $serviceTemplate) }}">
         @csrf
         <div class="form-group">
            <label class="">Code</label>
            <div class="">
               <input type="text" name="code" placeholder="Enter Code" class="form-control" />
            </div>
         </div>
         <div class="form-group">
            <label class="">Name Fees</label>
            <div class="">
               <input type="text" name="name_fees" placeholder="Enter Name Fees" class="form-control" />
            </div>
         </div>
         <div class="form-group ">
            <label class="">Amount</label>
            <div class="">
               <input type="text" name="amount" placeholder="Enter Amount" class="form-control" />
            </div>
         </div>
         <div class="form-group row m-b-10">
            <label class="col-md-3 col-form-label pt-1">Enabled Year Computation:</label>
            <div class="col-lg-9 col-xl-6 custom-control custom-switch ">
               <input type="checkbox" class="custom-control-input" id="is_year_enabled" name="enabled_year_computation" checked>
               <label class="custom-control-label" for="is_year_enabled"></label>
            </div>
         </div>

         <div class="form-group row m-b-10">
            <label class="col-md-3 col-form-label pt-1">Enabled Surcharge :</label>
            <div class="col-lg-9 col-xl-6 custom-control custom-switch ">
               <input type="checkbox" class="custom-control-input" id="is_surcharge_enabled" name="enabled_surcharge">
               <label class="custom-control-label" for="is_surcharge_enabled"></label>
            </div>
         </div>

         <div class="form-group row m-b-10">
            <label class="col-md-3 col-form-label pt-1">Enabled DST Portable Computation:</label>
            <div class="col-lg-9 col-xl-6 custom-control custom-switch ">
               <input type="checkbox" class="custom-control-input" id="is_enabled_portable_computation" name="enabled_portable_computation">
               <label class="custom-control-label" for="is_enabled_portable_computation"></label>
            </div>
         </div>
           <div class="form-group row m-b-10">
            <label class="col-md-3 col-form-label pt-1">Enabled DST Default Computation:</label>
            <div class="col-lg-9 col-xl-6 custom-control custom-switch ">
               <input type="checkbox" class="custom-control-input" id="is_enabled_dst_computation" name="enabled_dst_default">
               <label class="custom-control-label" for="is_enabled_dst_computation"></label>
            </div>
         </div>

         <div class="form-group row m-b-10">
            <label class="col-md-3 col-form-label pt-1">Enabled Licensed Fee Computation:</label>
            <div class="col-lg-9 col-xl-6 custom-control custom-switch ">
               <input type="checkbox" class="custom-control-input" id="is_enabled_licensed_fee_computation" name="enabled_licensed_fee_computation">
               <label class="custom-control-label" for="is_enabled_licensed_fee_computation"></label>
            </div>
         </div>

     {{--  <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="customSwitch1">
        <label class="custom-control-label" for="customSwitch1">Toggle this switch element</label>
      </div>
 --}}
         <div class="form-group">
            <label class=""></label>
            <div class="">
               <button type="submit" class="btn btn-primary" id="btn-save">Submit</button>
            </div>
          </form>
         </div>
      </div>
   </div>
</div>
<div class="col-md-6">
<div class="panel panel-inverse">
   <div class="panel-heading">
      <h4 class="panel-title">Service</h4>
      <div class="panel-heading-btn">
         <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
         <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
         <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
         <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
      </div>
   </div>
   <div class="panel-body">
      <table class="table table-bordered">
         <thead>
            <tr>
               <th>ID</th>
               <th>Fee Name</th>
               <th>Amount</th>
               <th>Options</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($serviceTemplate->feeTemplates as $row)
            <tr>
               <td>{{ $row->id }}</td>
               <td>{{ $row->name_fees }}</td>
               <td>{{ $row->amount }}</td>
               <td>
                  <a href="{{ route('fee-templates.edit', $row) }}" class="btn btn-primary btn-xs"> Edit</a>
                  <form method="POST" action="{{ route('fee-templates.destroy', $row) }}" style="display: inline;">
                     @csrf
                     {{ method_field('DELETE') }}
                     <button type="submit" class="btn btn-danger btn-xs"> Delete</button>
                  </form>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>
@endsection