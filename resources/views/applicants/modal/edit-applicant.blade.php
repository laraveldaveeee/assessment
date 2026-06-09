
<div class="modal fade" id="edit-applicant-modal" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="editApplicantModal"></h4>
      </div>
      <div class="modal-body">
          <form id="editApplicantForm" name="editApplicantForm" class="form-horizontal">
               <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <input type="hidden" name="applicantId" id="applicantId">
                  <label>Applicant Company</label>
                      <input type="text" class="form-control"  id="edit_applicant_company" name="applicant_company" placeholder="Enter Applicant Company" value="">
                       @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('name') }}</strong>
                              </span>
                         @endif
                  </div>

              <div class="form-group">
                  <label>Address</label>
                      <input type="text" class="form-control" name="address" id="edit_address" placeholder="Enter Address" value="">
                  </div> 
                  

                   <div class="form-group { $errors->has('nature_of_documents') ? 'has-error' : '' }}">

               <label class="">Nature of Documents</label>
              
                  <i>Ex: 1 RLM (NEW)</i>
                  <input type="text" name="nature_of_documents" id="edit_nature_of_documents" laceholder="" class="form-control" />
                  @if ($errors->has('nature_of_documents'))
                  <span class="help-block">
                  <strong style="color: red;">{{ $errors->first('nature_of_documents') }}</strong>
                  </span>
                  @endif
               </div>
           

              <div class="form-group">
                  <label>Date</label>
                      <input type="date" class="form-control" name="assess_date" id="edit_assess_date" placeholder="Enter Date" value="">
                  </div>
              </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="btn-update">Update</button>
          </div>
      </form>
  </div>
</div>
</div>
<!-- End Modal -->
