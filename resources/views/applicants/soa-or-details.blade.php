@extends('layouts.app')
@section('content')
 <div id="content" class="content content-full-width">
<div class="profile">
   <div class="profile-header">
      <div class="profile-header-cover " id="particles-js"></div>
      <div class="profile-header-content ">
         @if (auth()->user()->avatar)
         <div class="profile-header-img">
            @if (auth()->user()->isAccessor() || auth()->user()->isAdmin())
                 <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="" style="height: 100%" style="width: 100%">
              @elseif (auth()->user()->avatar)
                <img src="{{ auth()->user()->avatar }}" align="" style="height: 100%; widows: 100%;">
            @endif
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
      <ul class="profile-header-tab nav nav-tabs" style="background: #4e5c6869">
         <li class="nav-item"><a class="nav-link active" data-toggle="tab" style="color: #fff;">&nbsp;I am Assessor</a></li>
         <li class="nav-item"><a class="nav-link" data-toggle="tab">&nbsp;</a></li>
         <li class="nav-item"><a class="nav-link" data-toggle="tab">&nbsp;</a></li>
         <li class="nav-item"><a class="nav-link" data-toggle="tab">&nbsp;</a></li>
         <li class="nav-item"><a class="nav-link" data-toggle="tab">&nbsp;</a></li>
      </ul>
   </div>
</div>
</div>
<div id="content" class="content">
   <div class="panel panel-default" >
      <div class="panel-heading">
         <h4 class="panel-title">Assessment lists</h4>
         <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
         </div>
      </div>
      <div class="table-responsive">
      <div class="panel-body">

         <table class="table table-bordered" id="assessments-table">
               <thead>
                  <tr>
                     <th>OR #</th>
                     <th>SOA #</th>
                     <th>Options</th>
                  </tr>
               </thead>
               <tbody id="">
               </tbody>
            </table>
      </div>
   </div>
</div> 

@endsection

@push('scripts')
<script>
  $(document).ready(function () {
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#assessments-table').DataTable({
    "ordering":'true',
    "order": [0, 'desc'],
      processing: true,
      serverSide: true,
      ajax: '{!! route('soa-or-details.details') !!}',
      columns: [
          { data: 'or_no'},   
          { data: 'soa_no'},  
          { data: 'action', name: 'action', orderable: false, searchable: false },
      ]
    });
 });

</script>
@endpush



