@extends('layouts.app')
@section('content')
<div id="content" class="content content-full-width">
<div class="profile">
   <div class="profile-header">
      <div class="profile-header-cover " id="particles-js"></div>
      <div class="profile-header-content ">
         @if (auth()->user()->avatar)
         <div class="profile-header-img">
            @if (auth()->user()->isAccessor() || auth()->user()->isAdmin())
                 <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="" style="height: 100%" style="width: 100%">
              @elseif (auth()->user()->avatar)
                <img src="{{ auth()->user()->avatar }}" align="" style="height: 100%; widows: 100%;">
            @endif
         </div>
         @else
         <div class="profile-header-img">
            <img src="{{ asset('img/user.png') }}" alt="" style="height: 100%" style="width: 100%">
         </div>
         @endif
         <div class="profile-header-info">
            <h4 class="mt-0 mb-1">{{ auth()->user()->name }}</h4>
            <p class="mb-2">{{ ucfirst(auth()->user()->role->name) }}</p>
            <a href="/settings" class="btn btn-primary btn-xs">Edit Profile</a>
           <div>
           </div>
         </div>
      </div>
      <ul class="profile-header-tab nav nav-tabs" style="background: #4e5c6869">
         <li class="nav-item"><a class="nav-link active" data-toggle="tab" style="color: #fff;">&nbsp;I am Assessor</a></li>
         <li class="nav-item"><a class="nav-link" data-toggle="tab">&nbsp;</a></li>
         <li class="nav-item"><a class="nav-link" data-toggle="tab">&nbsp;</a></li>
         <li class="nav-item"><a class="nav-link" data-toggle="tab">&nbsp;</a></li>
         <li class="nav-item"><a class="nav-link" data-toggle="tab">&nbsp;</a></li>
      </ul>
   </div>
</div>
</div>
<div id="content" class="content">
   <div class="panel panel-default" >
      <div class="panel-heading">
         <h4 class="panel-title">Create Applicant / Company</h4>
         <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
         </div>
      </div>
      <div class="panel-body">
         <form method="POST" action="/applicants" id="">
            @csrf
            <div class="form-group row m-b-10{{ $errors->has('applicant_company') ? 'has-error' : '' }}">
               <label class="col-lg-3 text-lg-right col-form-label">Applicant/Company Name</label>
               <div class="col-lg-9 col-xl-6">
                <input type="text" name="applicant_company" placeholder="Enter Applicant / Company Name" class="form-control" />
                  @if ($errors->has('applicant_company'))
                  <span class="help-block">
                  <strong style="color: red;">{{ $errors->first('applicant_company') }}</strong>
                  </span>
                  @endif
               </div>
            </div>

            <div class="form-group row m-b-10{{ $errors->has('address') ? 'has-error' : '' }}">
               <label class="col-lg-3 text-lg-right col-form-label">Address / License No.</label>
               <div class="col-lg-9 col-xl-6">
                  <input type="text" name="address" placeholder="Address / License No " class="form-control" />
                  @if ($errors->has('address'))
                  <span class="help-block">
                  <strong style="color: red;">{{ $errors->first('address') }}</strong>
                  </span>
                  @endif
               </div>
            </div>

             <div class="form-group row m-b-10{{ $errors->has('nature_of_documents') ? 'has-error' : '' }}">
               <label class="col-lg-3 text-lg-right col-form-label">Nature of Documents</label>
               <div class="col-lg-9 col-xl-6">
                  <i>Ex: 1 RLM (NEW)</i>
                  <input type="text" name="nature_of_documents" placeholder="" class="form-control" />
                  @if ($errors->has('nature_of_documents'))
                  <span class="help-block">
                  <strong style="color: red;">{{ $errors->first('nature_of_documents') }}</strong>
                  </span>
                  @endif
               </div>
            </div>


      <div class="form-group row m-b-10{{ $errors->has('assess_date') ? 'has-error' : '' }}">
               <label class="col-lg-3 text-lg-right col-form-label">Assessment Date</label>
               <div class="col-lg-9 col-xl-6">
                  <input type="date" name="assess_date"  class="form-control"  value="{{ Carbon\Carbon::now()->format('mm-dd-YYYY') }} " />
                  @if ($errors->has('assess_date'))
                  <span class="help-block">
                  <strong style="color: red;">{{ $errors->first('assess_date') }}</strong>
                  </span>
                  @endif
               </div>
            </div>

{{--              <div class="form-group row m-b-10{{ $errors->has('due_date') ? 'has-error' : '' }}">
               <label class="col-lg-3 text-lg-right col-form-label">Due Date.</label>
               <div class="col-lg-9 col-xl-6">
                    <input type="date" name="due_date" class="form-control" value="">
                  @if ($errors->has('due_date'))
                  <span class="help-block">
                  <strong style="color: red;">{{ $errors->first('due_date') }}</strong>
                  </span>
                  @endif
               </div>
            </div>
            <div class="form-group row m-b-10{{ $errors->has('notes') ? 'has-error' : '' }}">
               <label class="col-lg-3 text-lg-right col-form-label">Notes</label>
               <div class="col-lg-9 col-xl-6">
               <textarea class="form-control" name="notes" placeholder="Optional"></textarea>
                  @if ($errors->has('notes'))
                     <span class="help-block">
                     <strong style="color: red;">{{ $errors->first('notes') }}</strong>
                     </span>
                  @endif
               </div>
            </div>
 --}}
            <div class="form-group row m-b-10">
               <label class="col-lg-3 text-lg-right col-form-label"></label>
               <div class="col-lg-9 col-xl-6">
                  <button type="submit" class="btn btn-primary" >Submit</button>
               </div>
            </div>
         </form>
      </div>
   </div>
   <!-- end page-header -->
   <!-- begin panel -->
   @include('applicants.modal.index')
   @include('applicants.modal.edit-applicant')
   {{--
   <div class="form-group">
      <a href="javascript:void(0)" class="btn btn-primary " id="create-new-applicant">Add New Applicant</a>
   </div>
   --}}
   <div class="panel panel-default">
      <div class="panel-heading">
         <h4 class="panel-title">Applicant</h4>
         <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
         </div>
      </div>
      <div class="table-responsive">
         <div class="panel-body">
            <table class="table table-bordered" id="applicant-table">
               <thead>
                  <tr>
                     <th>ID</th>
                 {{--     <th>SOA No</th> --}}
                     <th>Applicant Company Name</th>
                     <th>Address</th>
                    {{--  <th>Status</th> --}}
                     <th>Options</th>
                  </tr>
               </thead>
               <tbody id="applicant-crud">
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection
@push('scripts')
<script>
   $(document).ready(function () {
     $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });
   $('#applicant-table').DataTable({
          //"ordering":'true',
          "order": [0, 'desc'],
          processing: true,
          serverSide: true,
          ajax: '{!! route('applicants.index') !!}',
          columns: [
              { data: 'id'},
              // { data: 'latest_assessment.soa_no'}, //Get the latest of SOA NO
              { data: 'applicant_company'},
              { data: 'address'},
             //  {
               //    "data": "latest_assessment.status", // can be null or undefined
               //    "defaultContent": "<i>Not set</i>"
                 // },
              { data: 'action', name: 'action', orderable: false, searchable: false },
          ]
    });

   /*  When user click add applicant button */
     $('#create-new-applicant').click(function () {
         $('#btn-save').val("create-applicant");
         //$('#applicantId').val('');
         $('#applicantForm').trigger("reset");
         $('#applicantCrudModal').html("Add New Applicant");
         $('#ajax-crud-modal').modal('show');
     });
   /* When click edit applicant  */
     $('body').on('click', '#edit-applicant', function () {
       var applicantId = $(this).data('id');

       $.get('applicants/' + applicantId +'/edit', function (data) {
           $('#editApplicantModal').html("Edit Applicant");
           $('#btn-update').val("edit-applicant");
           $('#edit-applicant-modal').modal('show');

           $('#applicantId').val(data.id);
           $('#edit_applicant_company').val(data.applicant_company);
           $('#edit_address').val(data.address);
           $('#edit_nature_of_documents').val(data.nature_of_documents);
           $('#edit_assess_date').val(data.assess_date);
       })
      });
   });

   // if ($("#userForm").length > 0) {
   //     $("#userForm").validate({

   //    submitHandler: function(form) {

   //     var actionType = $('#btn-save').val();

   //     $('#btn-save').html('<i class="fa fa fa-spinner fa-spin"></i>  Submitting..');
   //     $("#btn-save").prop('disabled', true); // disable button

   //    document.getElementById("applicant_company").addEventListener("keyup", function () {

   //       var applicant_company = document.getElementById('applicant_company').value;

   //             if (applicant_company != "") {

   //                document.getElementById('btn-save').removeAttribute("disabled");

   //             } else {

   //                document.getElementById('btn-save').setAttribute("disabled", null);
   //             }
   //      });


   //    document.getElementById("address").addEventListener("keyup", function () {

   //       var address = document.getElementById('address').value;

   //          if (address != "") {

   //             document.getElementById('btn-save').removeAttribute("disabled", null);

   //          } else {

   //             document.getElementById('btn-save').setAttribute("disabled", null);
   //          }
     //  });

   //      $.ajax({
   //          data: $('#userForm').serialize(),
   //          route: '{{ url('applicants.store') }}',
   //          type: "POST",
   //          dataType: 'json',
   //          success: function (data) {
   //              $('#userForm').trigger("reset");
   //              $('#ajax-crud-modal').modal('hide');
   //              $('#btn-save').html('Submit');
   //              var oTable = $('#applicant-table').dataTable();
   //              oTable.fnDraw(false);

   //            toastr.success("Applicant has been success!");

   //           $('#userForm').trigger("reset");
   //           $('#ajax-crud-modal').modal('hide');
   //           $('#btn-save').html('Submit');
   //           $("#btn-save").prop('disabled', false); // enable button
   //          },

   //          error: function (data) {
   //              console.log('Error:', data);
   //              $('#btn-save').html('Submit');
   //          }
   //       });
   //     }
   //  })
   // }

   if ($("#editApplicantForm").length > 0) {
       $("#editApplicantForm").validate({
       submitHandler: function(form) {
       var applicantId = $('#applicantId').val();
       var actionType = $('#btn-update').val();
       $('#btn-update').html('<i class="fa fa fa-spinner fa-spin"></i> Updating..');
       $.ajax({
           data: $('#editApplicantForm').serialize(),
           type: "POST",
           url: '/update-applicants/' + applicantId,
           dataType: 'json',
           success: function (data) {
             $('#btn-update').html('Update');
             var oTable = $('#applicant-table').dataTable();
             oTable.fnDraw(false);
             toastr.info("Applicant has been update!");
            $('#editApplicantForm').trigger("reset");
            $('#edit-applicant-modal').modal('hide');
            $('#btn-update').html('Update');
           },
           error: function (data) {
               console.log('Error:', data);
               $('#btn-update').html('Update');
           }
        });
      }
    })
  }

</script>
@endpush
