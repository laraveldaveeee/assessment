@extends('layouts.app')

@section('content')


<div id="content" class="content content-full-width">
<div class="profile">
   <div class="profile-header">
      <div class="profile-header-cover " id="particles-js"></div>
      <div class="profile-header-content ">
         @if (auth()->user()->avatar)

         <div class="profile-header-img">
            <img src="{{ auth()->user()->avatar }}" alt="" style="height: 100%" style="width: 100%">
         </div>
         @else
         <div class="profile-header-img">

            <img src="{{ asset('img/user.png') }}" alt="" style="height: 100%" style="width: 100%">
         </div>
         @endif

         <div class="profile-header-info">

            <h4 class="mt-0 mb-1">{{ auth()->user()->name }}</h4>
            <p class="mb-2">{{ ucfirst(auth()->user()->role->name) }}</p>
            <a href="/settings" class="btn btn-primary btn-xs">Edit Profile</a>
           <div>
       

           </div>
         </div>
      </div>
      <ul class="profile-header-tab nav nav-tabs" style="background: #3498DB">
         <li class="nav-item"><a class="nav-link active" data-toggle="tab" style="color: #fff;">&nbsp;I am Assessor
</a></li>
         <li class="nav-item"><a  class="nav-link" data-toggle="tab">&nbsp;</a></li>
         <li class="nav-item"><a class="nav-link" data-toggle="tab">&nbsp;</a></li>
         <li class="nav-item"><a  class="nav-link" data-toggle="tab">&nbsp;</a></li>
         <li class="nav-item"><a  class="nav-link" data-toggle="tab">&nbsp;</a></li>
      </ul>
   </div>
</div>
</div>  

 <div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb float-xl-right">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item active">Blank Page</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Home <small></small></h1>
            <!-- end page-header -->
            <!-- begin panel -->
              

              

            <!-- end panel -->
        </div>
        <!-- end #content -->
@endsection
