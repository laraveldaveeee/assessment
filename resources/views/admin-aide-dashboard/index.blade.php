@extends('layouts.app')
@inject('stats','App\Stats') 
@section('content')
<div id="content" class="content">
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
   <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
   <li class="breadcrumb-item active">Blank Page</li>
</ol>
<!-- end breadcrumb -->
<!-- begin page-header -->
<h1 class="page-header">Home <small></small></h1>
<div class="row">
<!-- begin col-3 -->
<div class="col-xl-3 col-md-6">
   <div class="widget widget-stats bg-danger">
      <div class="stats-icon">
         <div class="icon-img">
            <img src="{{ asset('img/app.png') }}" alt="" />
         </div>
      </div>
      <div class="stats-info">
         <h4>TOTAL PROCESSORS</h4>
         <p>{{ $stats->totalProcessors() }}</p>
      </div>
      <div class="stats-link">
         <a href="javascript:;">View Detail </a>
      </div>
   </div>
</div>
@endsection