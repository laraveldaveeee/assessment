<div class="modal fade" id="modal-dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Disapproved </h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="/applicant-assessments/{{ $assessment->id }}/disapproved" >
				@csrf
				{{ method_field('PATCH') }}

				<div class="col-md-12">
					<label>Message</label>
					<div class="form-group">
						<textarea class="form-control" name="messages" placeholder="Leave a message"></textarea>
				  	</div>
			  	</div>
 
				<div class="col-md-12">
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>

			</div>
			 
		</form>	
		</div>
	</div>
	</div>

