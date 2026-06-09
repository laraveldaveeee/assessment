
<div class="modal fade" id="edit-licenses-modal" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <h4 class="modal-title" id="editLicenseModal"></h4>
      </div>
      <div class="modal-body">
          <form id="editLicensesForm" name="editLicensesForm" class="form-horizontal">
              <label>Date of Distribution</label>

                 <input type="date" class="form-control"  id="edit_date_of_distribution" name="date_of_distribution" placeholder="Enter Applicant Company" value="">
                       @if ($errors->has('date_of_distribution'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('date_of_distribution') }}</strong>
                              </span>
                         @endif
                  

  
                  <label>Name of Applicant/Company</label>
                  <input type="text" name="applicant_company" class="form-control" id="edit_applicant_company" >
                        @if ($errors->has('applicant_company'))
                          <span class="help-block">
                              <strong>{{ $errors->first('applicant_company')  }}
                              </strong>
                          </span>
                      @endif
           
               
                  <label>OR Number</label>
                  <input type="text" name="or_number" class="form-control" id="edit_or_number">
                        @if ($errors->has('or_number'))
                          <span class="help-block">
                              <strong>{{ $errors->first('or_number')  }}
                              </strong>
                          </span>
                      @endif
                  
                    <label>Details of License Filed</label>
                    <select class="form-control selectpicker" name="license_filedp[]" multiple="multiple" id="edit_license_filed">
                      <option  selected="" disabled="" value="">Select Details of License Filed</option>
                      <option value="RLM">RLM</option>
                      <option value="AMATEUR">AMATEUR</option>
                      <option value="PURCHASE/POSSES">PURCHASE/POSSES</option>
                      <option value="CAT/TVRO">CAT/TVRO</option>
                      <option value="AIRCRAFT/SHIFT">AIRCRAFT/SHIFT</option>
                    </select>
                          @if ($errors->has('license_filed'))
                            <span class="help-block">
                                <strong>{{ $errors->first('license_filed')  }}
                                </strong>
                            </span>
                        @endif
                   
                 
                  <label>Processor</label>
                  <select class="form-control" name="processor" id="edit_processor">
                    <option  selected="" disabled="" value="">Select Processor</option>
                    <option value="RPA">RPA</option>
                    <option value="MAL">MAL</option>
                  </select>
                        @if ($errors->has('processor'))
                          <span class="help-block">
                              <strong>{{ $errors->first('processor')  }}
                              </strong>
                          </span>
                      @endif



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
