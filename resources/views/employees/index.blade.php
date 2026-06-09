@extends('layouts.app')
@section('content')



<div id="content" class="content">
   <!-- begin breadcrumb -->
   <ol class="breadcrumb float-xl-right">
      <li class="breadcrumb-item"><a href="javascript:;" class="">Home</a></li>
      <li class="breadcrumb-item text-black active">Employees</li>
   </ol>
   <!-- end breadcrumb -->
   <!-- begin page-header -->
   <h1 class="page-header text-dark">Employees <small></small></h1>
   <div class="panel panel-inverse">
      <div class="panel-heading">
         <h4 class="panel-title text-white">Employees lists</h4>
         <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"></a>
         </div>
      </div>
      <div class="panel-body ">
         <div class="table-responsive">
            <table class="table table-bordered " id="users">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Image</th>
                     <th>Name</th>  
                     <th>Options</th>
                  </tr>
               </thead>
               <tbody>
               	@foreach($employees as $employee)
               	<tr>
               		<td>{{ $employee->id }}</td>
               		 <td>
      						<div class="widget-list-item">
      						<div class="widget-list-media">
                        @if ($employee->avatar)
                     	  <img src="{{ $employee->avatar }}" alt="" class="rounded" style="width: 25px;" />
                        @endif
                          <img src="{{ Storage::url($employee->avatar) }}" alt="" class="rounded" style="width: 25px;" />
                     	</div>
                     </td>
               		<td>{{ $employee->name }}</td> 
               		<td><a href="" class="btn btn-primary btn-xs">Manage</a></td>
               	</tr>
               @endforeach
               </tbody>



@endsection