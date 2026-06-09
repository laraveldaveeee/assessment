@extends('layouts.app')
@section('content')
<div id="content" class="content">
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
   <li class="breadcrumb-item"><a href="/home">Home</a></li>
   <li class="breadcrumb-item"><a href="/admin-aide">Edit Admin Aide</a></li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Edit Admin Aide </h1>
<!-- end page-header -->
<div class="row">
<div class="col-md-12">
   <div class="panel panel-inverse">
      <div class="panel-heading">
         <h4 class="panel-title">Edit Admin Aide</h4>
         <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
         </div>
      </div>
      <div class="panel-body">
         <form method="POST" action="/admin-aide/{{ $adminAide->id }}">
            @csrf
            {{ method_field('PATCH') }}
            <div class="form-group">
               <label>Name</label>
               <input type="text" class="form-control" name="name" value="{{ $adminAide->name }}">
            </div>
            <div class="form-group">
               <label>Username</label>
               <input type="text" class="form-control" name="username" value="{{ $adminAide->username }}">
            </div>
            <div class="form-group">
               <label>Password</label>
               <input type="password" class="form-control" name="password" value="">
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-primary">Update</button>
            </div>
         </form>
      </div>
   </div>
   <!-- end panel -->
</div>
@endsection