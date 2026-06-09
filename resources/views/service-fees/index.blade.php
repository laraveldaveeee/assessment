@extends('layouts.app')
@section('content')
<div id="content" class="content">
   <!-- begin breadcrumb -->
 
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
               <form method="POST" action="" id="">
                  @csrf
                  <div class="form-group row m-b-10{{ $errors->has('name') ? 'has-error' : '' }}">
                     <label class="col-lg-3 text-lg-right col-form-label">Service Name</label>
                     <div class="col-lg-9 col-xl-6">
                        <input type="text" name="name" placeholder="Enter Name Fees" class="form-control" />
                        @if ($errors->has('name'))
                        <span class="help-block">
                          <strong style="color: red;">{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <!-- end custom-switches -->
                  <div class="form-group row m-b-10">
                     <label class="col-lg-3 text-lg-right col-form-label"></label>
                     <div class="col-lg-9 col-xl-6">
                        <button type="submit" class="btn btn-primary" id="btn-save">Submit</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
      <div class="col-md-12">
         <div class="panel panel-inverse">
            <div class="panel-heading">
               <h4 class="panel-title">Service Fees list</h4>
               <div class="panel-heading-btn">
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
               </div>
            </div>
            <div class="panel-body">
               <table class="table table-bordered" id="service-table" style="text-color:white;">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Name Fee</th>
                        <th>Options</th>
                     </tr>
                  </thead>
                  <tbody>
                    {{--  @foreach ($serviceTemplates as $serviceTemplate)
                     <tr>
                        <td>{{ $serviceTemplate->id }}</td>
                        <td>{{ $serviceTemplate->name }}</td>
                        <td>
                           <a href="/service-fees/{{ $serviceTemplate->id }}/show" class="btn btn-primary btn-xs">Show</a>
                           <a href="/service-fees/{{ $serviceTemplate->id }}/edit" class="btn btn-primary btn-xs">Edit</a>
                        </td>
                     </tr>
                     @endforeach --}}
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
    $(document).ready(function () {
     $('#service-table').DataTable({
            "ordering":'true',
            "order": [0, 'asc'],
            processing: true,
            serverSide: true,
            ajax: '{!! route('service-with-fees') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name',},
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });
});
</script>
@endpush