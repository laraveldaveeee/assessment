<div class="modal fade" id="modal-dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add OR NO. </h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			</div>
			<div class="modal-body">
				<form method="POST" action="/cashier/applicant-assessments/{{ $assessment->applicant->latestAssessment->id }}">
				@csrf
				{{ method_field('PATCH') }}

					<div class="form-group">
					<label>OR NO:</label>
						<input class="form-control" name="or_no" placeholder="Enter OR No.">
				  	</div>
 
					<div class="form-group">
						<button type="submit" class="btn btn-primary"> Submit</button>
					</div>

			</div>
			 
		</form>	
		</div>
	</div>
	</div>

