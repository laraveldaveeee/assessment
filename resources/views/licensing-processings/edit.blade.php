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
			 

							<form id="upload_form" method="POST" action="/licensing-processing/update/{{ $licensingProcessing->id }}">
								 @csrf
								 {{ method_field('PATCH') }}
		                    <div class="row">
			                    <div class="col-md-4">
			                    	<div class="form-group{{ $errors->has('date_of_distribution') ? ' has-error' : '' }}">
			                    		<label>Date of Distribution</label>
			                    		<input type="date" name="date_of_distribution" class="form-control"  value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
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
			                    		<input type="text" name="applicant_company" class="form-control" value="{{ $licensingProcessing->applicant_company }}">
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
			                    		<input type="date" name="or_date" class="form-control" value="{{ Carbon\Carbon::parse($licensingProcessing->or_date)->format('Y-m-d') }}">
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
			                    		<input type="text" name="or_number" class="form-control" value="{{ $licensingProcessing->or_number }}">
			                              @if ($errors->has('or_number'))
			                                <span class="help-block">
			                                    <strong>{{ $errors->first('or_number')  }}
			                                    </strong>
			                                </span>
			                            @endif
			                    	</div>
		                    	</div>
 


                        <div id="dynamic_field" style="width: 800px;">
                            <div class="row m-b-10">
                                <div class="col-md-6">
                                   <label>Details of License Filed</label>
								<select class=" form-control"  name="license_filed[]">
									 	
									<option  selected="" disabled="" value="">Select Licensed Filed</option>
									<option value='RLM' {{ $licensingProcessing->license_filed === 'RLM'  ? 'selected' : '' }} >RLM</option>
									<option value='AMATEUR' {{ $licensingProcessing->license_filed === 'AMATEUR'  ? 'selected' : '' }}>AMATEUR</option>
									<option value='PURCHASE/POSSES' {{ $licensingProcessing->license_filed === 'PURCHASE/POSSES'  ? 'selected' : '' }} >PURCHASE/POSSES</option>
									<option value='CAT/TVRO' {{ $licensingProcessing->license_filed === 'CAT/TVRO'  ? 'selected' : '' }}>CAT/TVRO</option>
									<option value='AIRCRAFT/SHIFT' {{ $licensingProcessing->license_filed === 'AIRCRAFT/SHIFT'  ? 'selected' : '' }}>AIRCRAFT/SHIFT</option>
								</select>
                                </div>

                                <div class="col-md-6">
                               <label>Select Quantity</label>
								<select class="form-control"  name="quantity[]">
									
									<option  selected="" disabled="" value="">Select Quantity</option>
									<option value="1" {{ $licensingProcessing->quantity === '1'  ? 'selected' : '' }}>1</option>
									<option value="2" {{ $licensingProcessing->quantity === '2'  ? 'selected' : '' }}>2</option>
									<option value="3" {{ $licensingProcessing->quantity === '3'  ? 'selected' : '' }}>3</option>
									<option value="4" {{ $licensingProcessing->quantity === '4'  ? 'selected' : '' }}>4</option>
									<option value="5" {{ $licensingProcessing->quantity === '5'  ? 'selected' : '' }}>5</option>
									<option value="6" {{ $licensingProcessing->quantity === '6'  ? 'selected' : '' }}>6</option>
									<option value="7" {{ $licensingProcessing->quantity === '7'  ? 'selected' : '' }}>7</option>
									<option value="8" {{ $licensingProcessing->quantity === '8'  ? 'selected' : '' }}>8</option>
									<option value="9" {{ $licensingProcessing->quantity === '9'  ? 'selected' : '' }}>9</option>
									<option value="10"{{ $licensingProcessing->quantity === '10' ? 'selected' : '' }}>10</option>
									 
									 
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
										<option value="NEW" {{ $licensingProcessing->requirements === 'NEW'  ? 'selected' : '' }}>NEW</option>
										<option value="REN" {{ $licensingProcessing->requirements === 'REN'  ? 'selected' : '' }}>REN</option>
										<option value="MOD" {{ $licensingProcessing->requirements === 'MOD'  ? 'selected' : '' }}>MOD</option>
										<option value="DUP" {{ $licensingProcessing->requirements === 'DUP'  ? 'selected' : '' }}>DUP</option>
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

											<option  selected="" disabled="" value="">Select Processor </option>

											@foreach($licensedProcessors as $processorId => $processor)
												<option value="{{ $processorId }}" {{ $licensingProcessing->processor_licensing_id  === $processorId ? 'selected' : '' }}>{{ $processor }}</option>
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
			                    	<div class="form-group{{ $errors->has('reason') ? ' has-error' : '' }}">
			                    		<label>Reasons (optional)</label>
			                    		<textarea type="text" name="reason" class="form-control" > {{ $licensingProcessing->reason }}</textarea>
			                              @if ($errors->has('reason'))
			                                <span class="help-block">
			                                    <strong>{{ $errors->first('reason')  }}
			                                    </strong>
			                                </span>
			                            @endif
			                    	</div>
		                    	</div>
							
		                    </div>
								 
		                    	<div class="form-group">
		                    		
		                    		<button type="submit" class="btn btn-primary">Update</button>
		                    	</div>

							</form>
					
					</div>
				</div>
 
@endsection


@push('scripts')

 <script type="text/javascript">

        $(document).ready(function(){      
          var postURL = "/licensing-processing";
          var i=1;  
	          $('#add').click(function(){  
	               i++;
	            
	            $('#dynamic_field').append('<tr id="row'+i+'"><td><label>Details of License Filed:</label><select class=" form-control" style="width:390px; margin-right:20px;" name="license_filed[]"> <option value="RLM" >RLM</option><option value="AMATEUR">AMATEUR</option><option value="PURCHASE/POSSES">PURCHASE/POSSES</option><option value="CAT/TVRO">CAT/TVRO</option><option value="AIRCRAFT/SHIFT">AIRCRAFT/SHIFT</option></select></td> <td><label>Select Quantity:</label><select class="form-control"  name="quantity[]" style="margin-right:300px;"> <option  selected="" disabled="" value="">Select Quantity</option><option value="1" {{ $licensingProcessing->quantity === '1'  ? 'selected' : '' }}>1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option> </select> </td><td> <label>&nbsp;</label><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove" style="margin-left:20px;">X</button></td></tr>');  

	          });

		      $(document).on('click', '.btn_remove', function(){  
		           var button_id = $(this).attr("id");   
		           $('#row'+button_id+'').remove();  
		      }); 
        });  
    </script>


@endpush