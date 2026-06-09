 

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      	<h1 align="center">Do you want to duplicate?</h1>{{-- 
       <form method="POST" action="{{ route('duplicate-assessments.store', $assessment) }}}" style="display: inline-block;"> --}}
       <form method="POST" action="/duplicate-assessments" style="display: inline-block;">
  			@csrf
        <input type="hidden" name="assessment" id="assessment" value="">
  			<div class="form-group">
  				<button type="submit" class="btn btn-block btn-primary">Duplicate Assessment</button> 
  			</div>
  		</form> 
      </div>
    </div>
  </div>
</div>