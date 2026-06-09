<div class="modal fade" id="ajax-crud-modal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="assessmentModal"></h4>
         </div>
         <div class="modal-body">
            <form id="assessForm" class="form-horizontal">
               <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  <input type="hidden" name="assessmentId" id="assessmentId">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group ">
                           <label>Classification</label>
                           <select class="form-control selectpicker" id="ajax-classification" data-size="10" data-live-search="true" data-style="btn-gray" name="edit_for_services">
                              <option value="" selected="" disabled="">Select Service</option>
                              @foreach ($serviceTemplates as $serviceTemplate)
                              <option value="{{ $serviceTemplate->id }}">{{ $serviceTemplate->name }}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>QTY</label>
                           <input type="text" name="edit_for_qty" class="form-control" id="edit_qty">
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Year</label>
                           <input type="text" name="edit_for_yr" class="form-control" id="edit_yr">
                        </div>
                     </div>
                 
                     <div class="col-md-12" id="ajax_suf_rates">
                        <div class="form-group select_suf">
                           <label>Select SUF</label>
                           <select class="form-control" name="edit_suf_rates" id="select_suf">
                              
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6" id="ajax_bandwith">
                        <div class="form-group">
                           <label>Bandwith</label>
                           <input type="text" class="form-control" name="edit_bandwidth" id="edit_bandwidth">
                        </div>
                     </div>
                     <div class="col-md-6" id="ajax_no_of_station">
                        <div class="form-group">
                           <label>No. Of Station</label>
                           <input type="text" class="form-control" name="edit_no_of_station" id="edit_no_of_station">
                        </div>
                     </div>
                  </div>
                  <button class="btn btn-primary" id="btn-update" value="create">Update</button>
                </form>
            </div>
         </div>
      </div>
   </div>
</div>