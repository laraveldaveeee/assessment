@extends('layouts.app')
@section('content')
<div id="content" class="content content-full-width">
<div class="profile">
   <div class="profile-header">
      <div class="profile-header-cover"  id="particles-js"></div>
      <div class="profile-header-content">
         @if ($user->avatar)
         <div class="profile-header-img">
            <img src="{{ Storage::url($user->avatar) }}" alt="" style="height: 100%" style="width: 100%">
         </div>
         @else
         <div class="profile-header-img">
            <img src="{{ asset('img/user.png') }}" alt="" style="height: 100%" style="width: 100%">
         </div>
         @endif
         <div class="profile-header-info">
            <h4 class="mt-0 mb-1">{{ $user->name }}</h4>
            <p class="mb-2">{{ $user->role->name }}</p>
            <p>&nbsp;</p>
           <div></div>
         </div>
      </div>
      <ul class="profile-header-tab nav nav-tabs" style="background: #f0f8ff21">
         <li class="nav-item" >
            @if($user->role->name === 'administrator')
               <a class="nav-link active text-white" data-toggle="tab">
                  I am FullStack Web Developer. At your service :)
               </a>
            @endif     

            @if($user->role->name === 'chief engineer')
               <a class="nav-link active" data-toggle="tab">
                  I am Chief Engineer V
               </a>
            @endif   

            @if($user->role->name === 'assessor')
               <a class="nav-link active" data-toggle="tab">
                  I am Assessor
               </a>
            @endif


            @if($user->role->name === 'cashier')
               <a class="nav-link active text-white" data-toggle="tab">
                  I am Cashier
               </a>
            @endif

         </li>
         <li class="nav-item"><a  class="nav-link" data-toggle="tab">&nbsp;</a></li>
         <li class="nav-item"><a class="nav-link" data-toggle="tab">&nbsp;</a></li>
         <li class="nav-item"><a  class="nav-link" data-toggle="tab">&nbsp;</a></li>
         <li class="nav-item"><a  class="nav-link" data-toggle="tab">&nbsp;</a></li>
      </ul>
   </div>
</div>
<div class="profile-content">
   <div class="tab-content p-0">
      <div class="tab-pane fade show active" id="profile-post">
         <div class="panel panel-inverse">
            <div class="panel-heading">
               <h4 class="panel-title">Profile </h4>
               <div class="panel-heading-btn">
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
               </div>
            </div>
            <div class="panel-body bg-dark">
               <table class="table table-bordered text-white">
                  <thead>
                     <tr>
                        <th>Name: {{ $user->name }}</th>
                        <th>Role / Designation: {{ ucfirst($user->role->name) }}</th>
                     </tr>
                     <tr>
                        <th>Username: {{ $user->username }}</th>
                        <th>Created At: {{ $user->created_at }}</th>
                     </tr>
                  </thead>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>



@endsection