<div class="modal fade" id="ajax-or-modal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="orModal"></h4>
         </div>
         <div class="modal-body">
            <form id="orForm" class="form-horizontal">
             
               <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
               <input type="hidden" name="assessmentId" id="assessmentId">
                  <form method="POST" action="/cashier/applicant-assessments/{{ $assessment->applicant->latestAssessment->id }}">
                   {{--   @csrf
                     {{ method_field('PATCH') }} --}}
                     <div class="form-group">
                        <label>OR NO:</label>
                        <input class="form-control" name="or_no" placeholder="Enter OR No." id="edit_or_no">
                     </div>
                     <div class="form-group">
                        <button type="submit" class="btn btn-primary"> Update</button>
                     </div>
                  </form>
            </div>
         </div>
      </div>
   </div>
</div>