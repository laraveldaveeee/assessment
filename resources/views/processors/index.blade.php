@extends('layouts.app')

@section('content')

 <div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb float-xl-right">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item active">Processor Accounts</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">Processor Accounts <small></small></h1>
            <!-- end page-header -->
            <!-- begin panel -->
            <div class="row">
                <div class="col-md-4">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">Add Processor</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form id="upload_form">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- end panel -->
            </div>
 
            <!-- end #content -->

            <div class="col-md-8">
            <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">Processor list</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">

                        <table class="table table-bordered" id="processor-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                              
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



            <!-- end panel -->
        </div>
        <!-- end #content -->

 

@endsection

@push('scripts')

<script type="text/javascript">
    $(document).ready(function () {


     $('#processor-table').DataTable({
            "ordering":'true',
            "order": [0, 'desc'],
            processing: true,
            serverSide: true,

            ajax: '{!! route('processors') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name',},
                { data: 'username',},
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
      });


        $("#upload_form").on('submit', function(e){
        e.preventDefault();

        swal({
          title: "Do you want to add another Processor?",
          // text: " Success!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((response) => {
            if (response) {
                $.ajax({
                route: '{{ url('processors') }}',
                    method: 'POST',
                    data:new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    processData: false,
                    cache : false,
                    success:function(data){
                        swal({
                              title: 'Success!',
                              text: data.message,
                              type: 'success',
                              icon: 'success'
                          })

                        document.getElementById("upload_form").reset(); 

                        var oTable = $('#processor-table').dataTable();
                        oTable.fnDraw(false);
                   },
                   
                   error:function (data) {
                      swal({
                          title: 'Oops...',
                          text: 'Error',
                          type: 'error',
                          icon: 'error'
                      })                        
                   }
               });
            }
        })
    });
});
    

</script>
@endpush
