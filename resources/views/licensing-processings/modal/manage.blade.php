
<div class="modal fade" id="manage-licenses-modal" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="manageLicenseModal"></h4>
      </div>
      <div class="modal-body">
          <form id="manageLicensesForm" name="manageLicensesForm" class="form-horizontal">
              <label>Date of Process</label>

               <input type="date" class="form-control"  id="edit_date_processed" name="date_processed"   value="">
                     @if ($errors->has('date_processed'))
                            <span class="help-block">
                                <strong>{{ $errors->first('date_processed') }}</strong>
                            </span>
                       @endif
                


              <label>Remarks</label>
                  <select  class="form-control"  id="edit_remarks" name="remarks"  value="">
                    <option value="Releasing">Releasing</option>
                    <option value="Pending">Pending</option>
                  </select>
                   
                   @if ($errors->has('remarks'))
                          <span class="help-block">
                              <strong>{{ $errors->first('remarks') }}</strong>
                          </span>
                     @endif

                <label>Reasons</label>
                <textarea type="text" name="reason" id="edit_reason" class="form-control" ></textarea>

          <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="btn-update">Update
              </button>
          </div>
      </form>
  </div>
</div>
</div>
</div>
<!-- End Modal -->
