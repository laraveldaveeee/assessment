@extends('layouts.app')
@section('content')

<div id="content" class="content">
   <!-- begin breadcrumb -->
   <ol class="breadcrumb float-xl-right">
      <li class="breadcrumb-item"><a href="javascript:;" >Home</a></li>
      <li class="breadcrumb-item  active">Users</li>
   </ol>
   <!-- end breadcrumb -->
   <!-- begin page-header -->
   <h1 class="page-header ">Users <small></small></h1>
   <div class="panel panel-default">
      <div class="panel-heading">
         <h4 class="panel-title ">User lists</h4>
         <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"></a>
         </div>
      </div>
      <div class="panel-body">
         <div class="table-responsive">
            <table class="table table-bordered" id="users">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Image</th>
                     <th>Name</th>
                     <th>Username</th>
                     <th>Role/Designation</th>
                     <th>Status</th>
                     <th>Options</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($users as $user)
                  <tr>
                     <td>{{ $user->id }}</td>
                     <td>
                        <div class="widget-list-item">
                        <div class="widget-list-media">
                        @if ($user->avatar)
                          <img src="{{ $user->avatar }}" alt="" class="rounded" style="width: 25px;" />
                        @endif
                          <img src="{{ Storage::url($user->avatar) }}" alt="" class="rounded" style="width: 25px;" />
                        </div>
                     </td>
                     <td>{{ $user->name }}</td>
                     <td>{{ $user->username }}</td>
                     <td>{{ ucfirst($user->role->name) }}</td>
                     <td>
                        @if ($user->isOnline())
                           <span class="label label-green">Online</span>
                        @else 
                           <span class="label label-gray">Offline</span>
                        @endif
                     </td>
                     <td>
                        <a href="/view/profile/{{ $user->id }}" class="btn btn-success btn-xs"><i class="fa fa-image"></i> View Profile</a>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
</div>

@endsection
 
@push('scripts')
<script type="text/javascript">
   $(document).ready( function () {
       $('#users').DataTable();
   });
</script>

@endpush