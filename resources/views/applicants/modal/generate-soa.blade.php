<div class="modal fade" id="generateNewAssessmentwithSOA" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            {{-- <form id="renew-form" method="POST" action="{{ route('generate-assessment.store', $assessment) }}"> --}}
            <form id="renew-form" method="POST" action="/applicants/{{ $assessment->applicant->id }}/new-generate">
               @csrf
               <h1 style="text-align: center;">Are you sure?</h1>
               <p style="text-align: center;">Do you want to add another Assessment? </p>
               <div class="modal-footer" style="margin-bottom: -20px;">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" >Submit</button>
            </form>
            </div>
         </div>
      </div>
   </div>
</div>