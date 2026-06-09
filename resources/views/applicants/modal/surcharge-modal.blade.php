<div class="modal fade" id="ajax-surcharge-modal" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="assessmentFeeModal"></h4>
         </div>

         <div class="modal-body">
            <form id="surchargeForm" class="form-horizontal">
               <input type="hidden" name="feeId" id="feeId">

               <div class="form-group">
                  <label>Surcharge</label>
                  <input type="text" name="surcharge" class="form-control" id="surcharge" required="">
               </div>

               <div class="form-group">
                  <button type="submit" class="btn btn-primary" id="btn-update">Add Surcharge</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>