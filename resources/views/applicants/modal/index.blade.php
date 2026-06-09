
<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="applicantCrudModal"></h4>
      </div>
      <div class="modal-body">
          <form id="userForm" name="userForm" class="form-horizontal">
               <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                   {{-- <input type="hidden" name="applicantId" id="applicantId"> --}}
                  <label>Applicant Company</label>
                      <input type="text" class="form-control"  id="applicant_company" name="applicant_company" placeholder="Enter Applicant Company" value="" >
                       @if ($errors->has('name'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('applicant_company') }}</strong>
                              </span>
                         @endif
                  </div>

              <div class="form-group">
                  <label>Address</label>
                      <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" value="">
                  </div>
              </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="btn-save"  value="create">Submit
              </button>
          </div>
      </form>
  </div>
</div>
</div>
<!-- End Modal -->
