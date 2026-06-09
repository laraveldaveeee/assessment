@extends('layouts.app')
@section('content')

<div id="content" class="content">
            <!-- begin breadcrumb -->
            <ol class="breadcrumb float-xl-right">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item active">SUF Rates</li>
            </ol>
            <!-- end breadcrumb -->
            <!-- begin page-header -->
            <h1 class="page-header">SUF Rates <small></small></h1>
            <!-- end page-header -->
            <!-- begin panel -->
            <div class="row">
                <div class="col-md-4">
                <div class="panel panel-inverse">
                    <div class="panel-heading">
                        <h4 class="panel-title">Add SUF Rates</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <form id="upload_form" >
                        	{{-- @csrf --}}
                        	<div class="form-group">
                        	 	<label>Services</label>
                        	 	 <select class="form-control js-example-basic-multiple" id="services" name="services[]" multiple="">
                        	 	 	@foreach ($services as $keyId => $service)
                        	 	 		<option value="{{ $keyId }}">{{ $service }}</option>
                        	 	 	@endforeach
                        	 	 </select>

    						            </div>

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="suf_name" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label>Rates</label>
                                <input type="text" class="form-control" name="rates" placeholder="Enter Rates">
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
      						<h4 class="panel-title">SUF Service Rate list</h4>
      						<div class="panel-heading-btn">
      							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
      							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
      							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
      							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
      						</div>
      				</div>
    					<div class="panel-body">
                <div class="table-responsive">
    						<table class="table table-bordered" id="suf-rates-table">
    							<thead>
    								<tr>
    									<th>ID</th>
    									<th>Name</th>
    									<th>Rate</th>
    									<th>Options</th>
    								</tr>
    							</thead>
    							<tbody>
                  {{-- @foreach ($sufRates as $sufRate)
                  <tr>
                        <td>{{ $sufRate->id }}</td>
                        <td>{{ $sufRate->name }}</td>
                            <td>{{ $sufRate->rates }}</td>
                        <td>
                          <a href="" class="btn btn-primary btn-xs"><i class="fa fa-edit"> Edit</i></a>
                          <a href="" class="btn btn-warning btn-xs"><i class="fa fa-bar-chart"> Show</i></a>

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
	  $('#suf-rates-table').DataTable({
          "ordering":'true',
          "order": [0, 'desc'],
          processing: true,
          serverSide: true,
	        ajax: '{!! route('suf-rates') !!}',
	        columns: [
  	            { data: 'id', name: 'id' },
  	            { data: 'suf_name',},
  	            { data: 'rates',},
  	            { data: 'action', name: 'action', orderable: false, searchable: false },
  	         ]
  	     });

          $("#upload_form").on('submit', function(e){
          e.preventDefault();

          swal({
            title: "Do you want to add another SUF RATE?",
            //text: " Success!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          }).then((response) => {
              if (response) {
                  $.ajax({
                  route: '{{ url('suf-rates') }}',
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
              						var oTable = $('#suf-rates-table').dataTable();
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