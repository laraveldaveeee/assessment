@extends('layouts.app')
@section('content')



<div id="content" class="content">
				<!-- begin breadcrumb -->
				<ol class="breadcrumb float-xl-right">
					<li class="breadcrumb-item"><a href="/home">Home</a></li>
					 
				</ol>
				<!-- end breadcrumb -->
				<!-- begin page-header -->
				<h1 class="page-header">Licensing Processing </h1>
				<!-- end page-header -->
				<!-- begin panel -->
				<div class="panel panel-inverse">
					<div class="panel-heading">
						<h4 class="panel-title">Licensing Processing</h4>
						<div class="panel-heading-btn">
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="panel-body">
							
						@include('licensing-processings.modal.manage')

							<form id="upload_form">
								 
		                    <div class="row">
			                    <div class="col-md-4">
			                    	<div class="form-group{{ $errors->has('date_of_distribution') ? ' has-error' : '' }}">
			                    		<label>Date of Distribution</label>
			                    		<input type="date" name="date_of_distribution" class="date form-control"  value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
			                              @if ($errors->has('date_of_distribution'))
			                                <span class="help-block">
			                                    <strong>{{ $errors->first('date_of_distribution')  }}
			                                    </strong>
			                                </span>
			                            @endif
			                    	</div>
		                    	</div>

		                    	<div class="col-md-4">
			                    	<div class="form-group{{ $errors->has('applicant_company') ? ' has-error' : '' }}">
			                    		<label>Name of Applicant/Company</label>
			                    		<input type="text" name="applicant_company" class="form-control" >
			                              @if ($errors->has('applicant_company'))
			                                <span class="help-block">
			                                    <strong>{{ $errors->first('applicant_company')  }}
			                                    </strong>
			                                </span>
			                            @endif
			                    	</div>
		                    	</div>



		                    	<div class="col-md-4">
			                    	<div class="form-group{{ $errors->has('or_date') ? ' has-error' : '' }}">
			                    		<label>OR Date</label>
			                    		<input type="date" name="or_date" class="form-control" >
			                              @if ($errors->has('or_date'))
			                                <span class="help-block">
			                                    <strong>{{ $errors->first('or_date')  }}
			                                    </strong>
			                                </span>
			                            @endif
			                    	</div>
		                    	</div>
							

							<div class="col-md-4">
			                    	<div class="form-group{{ $errors->has('or_number') ? ' has-error' : '' }}">
			                    		<label>OR Number</label>
			                    		<input type="text" name="or_number" class="form-control" >
			                              @if ($errors->has('or_number'))
			                                <span class="help-block">
			                                    <strong>{{ $errors->first('or_number')  }}
			                                    </strong>
			                                </span>
			                            @endif
			                    	</div>
		                    	</div>

	{{-- 
						<div class="col-md-4">
							<div class="form-group{{ $errors->has('license_filed') ? ' has-error' : '' }}">
								<label>Details of License Filed</label>
								<select class="selectpicker form-control" multiple="multiple" name="license_filed[]">
									 
									<option value="RLM">RLM</option>
									<option value="AMATEUR">AMATEUR</option>
									<option value="PURCHASE/POSSES">PURCHASE/POSSES</option>
									<option value="CAT/TVRO">CAT/TVRO</option>
									<option value="AIRCRAFT/SHIFT">AIRCRAFT/SHIFT</option>
								</select>
						          @if ($errors->has('license_filed'))
						            <span class="help-block">
						                <strong>{{ $errors->first('license_filed')  }}
						                </strong>
						            </span>
						        @endif
							</div>
						</div>



							<div class="col-md-4">
							<div class="form-group{{ $errors->has('license_filed') ? ' has-error' : '' }}">
								<label>Select Quantity</label>
								<select class="selectpicker form-control" multiple="multiple"  name="quantity[]">
									
									<option  selected="" disabled="" value="">Select Quantity</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									 
									 
								</select>
						          @if ($errors->has('license_filed'))
						            <span class="help-block">
						                <strong>{{ $errors->first('license_filed')  }}
						                </strong>
						            </span>
						        @endif
							</div>
						</div>
 --}}





                        <div id="dynamic_field" style="width: 800px;">
                            <div class="row m-b-10">
                                <div class="col-md-6">
                                   <label>Details of License Filed</label>
								<select class=" form-control"  name="license_filed[]">
									 
									<option value="RLM">RLM</option>
									<option value="AMATEUR">AMATEUR</option>
									<option value="PURCHASE/POSSES">PURCHASE/POSSES</option>
									<option value="CAT/TVRO">CAT/TVRO</option>
									<option value="AIRCRAFT/SHIFT">AIRCRAFT/SHIFT</option>
								</select>
                                </div>

                                <div class="col-md-6">
                               <label>Select Quantity</label>
								<select class="form-control"  name="quantity[]">
									
									<option  selected="" disabled="" value="">Select Quantity</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									 
									 
								</select>
                                </div>
                            </div> 
                        </div>

                        	<div class="col-md-2">
								<div class="form-group" style="margin-top: 25px;">
									 <button type="button" name="add" id="add" class="btn btn-block btn-primary">Add More</button>
								</div>
							</div>


						<div class="col-md-12">
								<div class="form-group{{ $errors->has('requirements') ? ' has-error' : '' }}">
									<label>Req Type</label>
									<select class="form-control" name="requirements">
										<option  selected="" disabled="" value="">Select Req Type</option>
										<option value="NEW">NEW</option>
										<option value="REN">REN</option>
										<option value="MOD">MOD</option>
										<option value="DUP">DUP</option>
									</select>
							          @if ($errors->has('requirements'))
							            <span class="help-block">
							                <strong>{{ $errors->first('requirements')  }}
							                </strong>
							            </span>
							        @endif
								</div>
								</div>

					 
 
 
							<div class="col-md-12">
								<div class="form-group{{ $errors->has('processor') ? ' has-error' : '' }}">
									<label>Assign Processor</label>
									<select class="form-control" name="processors">
											<option  selected="" disabled="" value="">Select Processor</option>
											@foreach($licensedProcessors as $processorId => $processor)
												<option value="{{ $processorId }}">{{ $processor }}</option>
											@endforeach
									</select>
							          @if ($errors->has('processor'))
							            <span class="help-block">
							                <strong>{{ $errors->first('processor')  }}
							                </strong>
							            </span>
							        @endif
								</div>
								</div>

 				


							<div class="col-md-12">
			                    	<div class="form-group{{ $errors->has('or_number') ? ' has-error' : '' }}">
			                    		<label>Reasons (optional)</label>
			                    		<textarea type="text" name="reason" class="form-control" ></textarea>
			                              @if ($errors->has('or_number'))
			                                <span class="help-block">
			                                    <strong>{{ $errors->first('or_number')  }}
			                                    </strong>
			                                </span>
			                            @endif
			                    	</div>
		                    	</div>
							

 


		                    </div>
								 
		                    	<div class="form-group">
		                    		
		                    		<button type="submit" class="btn btn-primary">Submit</button>
		                    	</div>

							</form>
					
					</div>
				</div>

 			<div class="panel panel-inverse">
					<div class="panel-heading">
						<h4 class="panel-title">Licensing Processing lists</h4>
						<div class="panel-heading-btn">
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="table-responsive">
					<div class="panel-body">
						<table class="table table-bordered" id="licensing-processing-table">
							<thead>
								<tr>
									<th>Date of Distribution</th>
									<th>Name of Applicant</th>
								 
									<th>Processor</th>
									<th>Remarks</th>
									<th>Date of Processed</th>
									<th>Options</th>
									 
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
</div>
					 


@endsection


@push('scripts')

<script type="text/javascript">
     $(document).ready(function () {
	    $.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
    });

  
	 $('#licensing-processing-table').DataTable({
	      	"ordering":'true',
			"order": [0, 'desc'],
	        processing: true,
	        serverSide: true,

	        ajax: '{!! route('licensing-processing') !!}',

	        columns: [
				{ data: 'date_of_distribution', name: 'date_of_distribution' },
				{ data: 'applicant_company',},
			 
				{ data: 'processor_licensing.code_name'},
				{ data: 'remarks',},
				{ data: 'date_processed',},

	            { data: 'action', name: 'action', orderable: false, searchable: false },
	        ]
	  });

		/* When click edit Licensing  */
	    $('body').on('click', '#manage-licensing', function () {
	      var licensingProcessingId = $(this).data('id');

	      $.get('licensing-processing/' + licensingProcessingId +'/edit', function (data) {
	          $('#manageLicenseModal').html("Manage License Processing");
	          $('#btn-update').val("manage-licensing");
	          $('#manage-licenses-modal').modal('show');
	          $('#licensingProcessingId').val(data.id);
	          $('#edit_date_processed').val(data.date_processed);
	          $('#edit_remarks').val(data.remarks);
	          $('#edit_reason').val(data.reason);
	      });

   	});




	// if ($("#manageLicensesForm").length > 0) {
	//       $("#manageLicensesForm").validate({
	//      submitHandler: function(form) {

	//       var licensingProcessingId = $('#licensingProcessingId').val();

	//       var actionType = $('#btn-update').val();
	//       $('#btn-update').html('<i class="fa fa fa-spinner fa-spin"></i> Updating..');



	//       $.ajax({
	//           data: $('#manageLicensesForm').serialize(),
	//           type: "POST",
	//           url: '/update-processing/' + licensingProcessingId,

	//           dataType: 'json',
	//           success: function (data) {
	//               $('#btn-update').html('Update');
	//               var oTable = $('#licensing-processing-table').dataTable();
	//               oTable.fnDraw(false);
	//  		  	  toastr.info("License Processing has been update!");
	// 	          $('#manageLicensesForm').trigger("reset");
	// 	          $('#manage-licenses-modal').modal('hide');
	// 	          $('#btn-update').html('Update');
	              
	//           },
	//           error: function (data) {
	//               console.log('Error:', data);
	//               $('#btn-update').html('Update');
	//           }
	//        });
	//      }
	//   })
	// }

	 

	    $("#upload_form").on('submit', function(e){
	    e.preventDefault();

	    swal({
	      title: "Do you want to add License Processing?",
	      //text: " Success!",
	      icon: "warning",
	      buttons: true,
	      dangerMode: true,
	    }).then((response) => {
	        if (response) {
	            $.ajax({
	            route: '{{ url('licensing-processing') }}',
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

						var oTable = $('#licensing-processing-table').dataTable();
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


 <script type="text/javascript">

        $(document).ready(function(){      
          var postURL = "/licensing-processing";
          var i=1;  
	          $('#add').click(function(){  
	               i++;
	            
	            $('#dynamic_field').append('<tr id="row'+i+'"><td><label>Details of License Filed:</label><select class=" form-control" style="width:390px; margin-right:20px;" name="license_filed[]"> <option value="RLM">RLM</option><option value="AMATEUR">AMATEUR</option><option value="PURCHASE/POSSES">PURCHASE/POSSES</option><option value="CAT/TVRO">CAT/TVRO</option><option value="AIRCRAFT/SHIFT">AIRCRAFT/SHIFT</option></select></td> <td><label>Select Quantity:</label><select class="form-control"  name="quantity[]" style="margin-right:300px;"> <option  selected="" disabled="" value="">Select Quantity</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option> </select> </td><td> <label>&nbsp;</label><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" style="margin-left:20px;">X</button></td></tr>');  

	          });

		      $(document).on('click', '.btn_remove', function(){  
		           var button_id = $(this).attr("id");   
		           $('#row'+button_id+'').remove();  
		      }); 
        });  
    </script>


@endpush