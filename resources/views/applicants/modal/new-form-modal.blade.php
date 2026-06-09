<div class="modal fade" id="modal-dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Form </h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="{{ route('assessments.store', $assessment) }}}" id="new-form-modal">
				@csrf
				
				<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label>QTY</label>
						<input type="text" name="qty" class="form-control">
					</div> 
				</div>
				
				<div class="col-md-6">
					<div class="form-group">
						<label>Year</label>
						<input type="text" name="yr" class="form-control">
					</div>
				</div> 

				<div class="col-md-12">
					
				<div class="form-group ">
				<label >Classification</label>
					 
				<select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-inverse" name="services">
					
					<option value="" selected="" disabled="" >Select Service</option>
					@foreach ($services as $service)
						<option value="{{ $service->id }}">{{ $service->label }}   {{ $service->name }}</option>
					@endforeach
				</select>
				</div>
				 
				</div>
 
				<div class="col-md-12">
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>

			</div>
			 
		</div>
	</div>
	</div>
</div>

