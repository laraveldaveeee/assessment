<div class="modal fade" id="ajax-update-modal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="feeModal"></h4>
         </div>

         <div class="modal-body">
            <form id="feeForm" class="form-horizontal">
               <input type="hidden" name="feeId" id="feeId">

               <div class="form-group">
                  <label>Fee</label>
                  <input type="text" name="update_fee" class="form-control" id="update_fee" required="">
               </div>

               <div class="form-group">
                  <button type="submit" class="btn btn-primary" id="btn-update">Update Fee</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>