@extends('layouts.app')
@section('content')
<div id="content" class="content">
<ol class="breadcrumb float-xl-right">
   <li class="breadcrumb-item"><a href="/home">Home</a></li>
   <li class="breadcrumb-item"><a href="/applicants">Applicant</a></li>
</ol>
<h1 class="page-header">New Applicant</h1>
<div class="row">
<div class="col-md-12">
   <div class="panel panel-default" >
      <div class="panel-heading">
         <h4 class="panel-title">New Applicant Assesment</h4>
         <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
         </div>
      </div>
      @include ('applicants.modal.generate-soa')
      <div class="panel-body">
         <a href="/applicants" class="btn btn-sm btn-warning m-b-10"><i class="fa fa-arrow-left"></i> Back Previous Page</a>
         <a href="/pdf-generate/{{ $assessment->id }}" class="btn btn-sm btn-primary m-b-10" target="_blank"><i class="fa fa-file-pdf t-plus-1 text-danger fa-fw fa-lg"></i> Print as PDF</a>  
         <a href="javascript;;" data-id="{{ $assessment->applicant->id }}" class="btn btn-sm btn-primary m-b-10" data-toggle="modal" data-target="#generateNewAssessmentwithSOA" style="float: right;">New Assessment with SOA-NO</a>
         <table class="table table-bordered">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Applicant</th>
                  <th>Address</th>
                  <th>Date</th>
                  <th>Grand Total</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>{{ $assessment->applicant->id }}</td>
                  <td>{{ $assessment->applicant->applicant_company }}</td>
                  <td>{{ $assessment->applicant->address }}</td>
                  <td>{{ Carbon\Carbon::parse($assessment->applicant->assess_date)->toFormattedDateString() }}</td>
                  {{-- <td><b>&#8369; {{ number_format($assessment->grandTotal(), 2) }}</b></td> --}}
                 <td><b>&#8369; <span id="grand-total">{{ number_format($assessment->fees->sum('total'), 2) }}</span></b></td>


               </tr>
            </tbody>
            <tfoot>
               <tr>
                  <td> 
                     Notes: {!! optional($assessment->applicant)->notes !!} 
                  </td>
                  <td>Due Date: {{ optional($assessment->applicant->due_date)->toFormattedDateString() }}</td>
                  <td colspan="5">
                     <a href="javascript:void(0)" data-id="{{ $assessment->applicant->id }}" id="add-details" class="btn btn-inverse btn-xs"><i class="fa fa-pencil"></i> Add Notes and Due Date</a>
                  </td>
               </tr>
            </tfoot>
         </table>
      </div>
   </div>
</div>
<div class="col-md-5">
   <div class="panel panel-default">
      <div class="panel-heading">
         <h4 class="panel-title">Services</h4>
         <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
         </div>
      </div>
      <div class="panel-body">
         @include('applicants.modal.edit-fees')
         {{-- @include('applicants.modal.new-form-modal') --}}
         <div class="form-group">
            {{--  <a href="#modal-dialog" data-toggle="modal" class="btn btn-primary btn-block">Add Service</a> --}}
            <form method="POST" action="{{ route('assessments.store', $assessment) }}" id="new-form-modal">
               @csrf
               <div class="row">
                  <div class="col-md-12">
                     <div class="form-group">
                        <label>Classifications</label>
                        <select class="form-control selectpicker" data-size="10" data-live-search="true" data-style="btn-gray" name="services" id="services">
                           <option value="" selected="" disabled="" >Select Service</option>
                           @foreach ($serviceTemplates as $serviceTemplate)
                           <option value="{{ $serviceTemplate->id }}"> {{ $serviceTemplate->name }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group{{ $errors->has('qty') ? ' has-error' : '' }}">
                        <label>QTY</label>
                        <input type="text" name="qty" class="form-control">
                        @if ($errors->has('qty'))
                        <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('qty') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="col-md-6{{ $errors->has('year') ? 'has-error' : '' }}">
                     <div class="form-group">
                        <label>Year</label>
                        <input type="text" name="yr" class="form-control">
                        @if ($errors->has('qty'))
                        <span class="help-block">
                        <strong style="color: red;">{{ $errors->first('qty') }}</strong>
                        </span>
                        @endif
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <input type="checkbox" id="myCheck" onclick="myFunction()">
                        <label>Add Expiration Date: (optional)</label>
                        <div id="text" style="display:none" >
                           <input type="date" name="expiration_date" class="form-control" placeholder="Optional">
                           <div class="form-group " style="margin-top:15px;">
                              <label>Add Notes</label>
                              <textarea class="form-control" name="noted" placeholder="Optional"></textarea>
                           </div>
                        </div> 
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <select class="form-control" name="suf_rates" id="suf_rates">
                           <label >Select SUF</label>
                           <option value="0" disable="true" selected="true"> --- Select SUF --- </option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6" id="bandwith">
                     <div class="form-group">
                        <label>Bandwith</label>
                        <input type="text" class="form-control" name="bandwidth">
                     </div>
                  </div>
                  <div class="col-md-6" id="no_of_station">
                     <div class="form-group">
                        <label>No. of Channels</label>
                        <input type="text" class="form-control" name="no_of_station">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit</button>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
{{--    @if (count($assessment->assessmentServices))
 --}}    <div class="panel panel-default">
      <div class="panel-heading">
         <h4 class="panel-title">Proceed to the Chief Engr.</h4>
         <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
         </div>
      </div>
      <div id="app">
         <div class="panel-body"> 
               <button-submit :assessment="{{ $assessment }}"></button-submit>
         </div>
      </div>
   </div>
   {{-- @endif --}}
</div>
@include ('applicants.modal.add-details-modal')
<div class="col-md-7">
@include ('applicants.modal.surcharge-modal')
@include ('applicants.modal.update-fee-modal')
@foreach ($assessment->assessmentServices as $assessment)
<div class="panel panel-default" data-sortable-id="ui-general-3">
   <!-- begin panel-heading -->
   <div class="panel-heading">
      <h4 class="panel-title">
         {{ $assessment->name }} 
         @if ($assessment->expiration_date)
         <strong style="color: #ff5b57;"> - ({{ $assessment->expiration_date->toFormattedDateString() }}) </strong>
         @endif
      </h4>
      <div class="panel-heading-btn">
      </div>
   </div>
   
   <div class="panel-body">
       @if ($assessment->noted)
         <div class="form-group">
              <div class="alert alert-primary rounded-0 d-flex align-items-center mb-0 text-blue-900">
                     <div class="fs-24px w-80px text-center">
                     </div>
                     <div class="flex-1 ms-3"> 
                         <p><strong>Note:</strong> {{ $assessment->noted }}</p>
                     </div>
              </div> 
          </div>
       @endif
      <div class="form-group">
      <a href="javascript:void(0)" id="edit-assessment" data-id="{{ $assessment->id }}" class="btn btn-xs btn-primary m-b-10"><i class="fa fa-edit"></i> Edit</a>
      <a href="/assessments-delete/{{ $assessment->id }}" class="btn btn-danger btn btn-xs m-b-10 button delete-confirm"><i class="fa fa-trash"></i> Delete</a>
   </div>
      <div class="form-group">
      </div>
      <table class="table table-bordered">
         <thead>
            <tr>
               <th>CODE</th>
               <th>YR</th>
               <th>%</th>
               <th>QTY</th>
               <th>FEE</th>
               <th>TOTAL</th>
               <th>Optional</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($assessment->serviceFees as $fee)
            <tr>
               <td>
                  {{ $fee->name_fees }} 
               </td>
               <td>{{ $fee->enabled_year_computation ? $assessment->yr : '' }}</td>
               <td>
                  @if ($fee->surcharge_amount)
                     {{ $fee->surcharge_amount * 100 . '%' }}
                  @endif
               </td>
               <td>
                  @if ($fee->enabled_portable_computation)
                  {{ ceil($assessment->qty / 25) }}
                  @elseif ($fee->enabled_dst_default)
                  {{ 1 }}
                  @else
                  {{ $assessment->qty }}
                  @endif
               </td>
               {{-- <td class="fee" data-row-id="{{ $fee->id }}"> --}}
                  <td data-id="{{ $fee->id }}" class="fee-cell">
                  @if ($fee->surcharge_amount)
                  <div hidden=""> <span class="fee-value"> {{ $fee->amount }} </span> </div>
                  @elseif ($fee->enabled_licensed_fee_computation)
                   <span class="fee-value"> {{ $fee->amount }} </span>
                  @else
                 <div class="editable-amount d-flex align-items-center gap-1" style="max-width: 100%;">
                      <span class="display-amount">{{ $fee->amount }}</span>

                      <input type="number" 
                             class="form-control form-control-sm d-none edit-amount" 
                             value="{{ $fee->amount }}" 
                             style="max-width: 100px;">
                             &nbsp;
                      <button type="button" class="btn btn-success btn-sm confirm-amount d-none">
                          <i class="fa fa-save"></i>
                      </button>
                      &nbsp;
                      <button type="button" class="btn btn-secondary btn-sm cancel-amount d-none">
                          <i class="fa fa-times"></i>
                      </button>
                  </div>
                   {{-- <span class="fee-value"> {{ $fee->amount }} </span> --}}
                  @endif
               </td>
              <td class="total-fee" data-total-id="{{ $fee->id }}">
               <span class="fee-total">{{ $fee->total }}</span>
            </td>
               <td>
                  @if ($fee->enabled_surcharge || $fee->enabled_suf_surcharge)
                  <a href="javascript:void(0)" data-id="{{ $fee->id }}" id="edit-fee" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                  @endif
                {{--     <a href="javascript:void(0)" data-id="{{ $fee->id }}" id="update-fee" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a> --}}

                  <form method="POST" action="/assessments/serviceFee/{{ $fee->id }}" style="display: inline-block;">
                     @csrf
                     {{ method_field('DELETE') }}
                     <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
                  </form>
               </td>
            </tr>
         </tbody>
         @endforeach
      </table>
   </div>
</div>
@endforeach
<!-- end panel -->
@endsection
@push('scripts')
<script>
   $(document).ready(function () {
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
    $('body').on('click', '#edit-assessment', function () {
      var service = $(this).data('id');
          $('#ajax_suf_rates').hide();
          $('#ajax_bandwith').hide();
          $('#ajax_no_of_station').hide();  
           $.get('/ajax-assessments/' + service, function (data) {
              console.log(data)
              let suffRate = data.service.suff_rate_id
              if (suffRate) {
                // alert('test' +suffRate);
                $('#ajax_suf_rates').show();
                $('#ajax_bandwith').show();
                $('#ajax_no_of_station').show();  
                $('#edit_bandwidth').val(data.service.bandwidth);
                $('#edit_no_of_station').val(data.service.no_of_station);
                    jQuery.ajax({
                     url : '/ajax-select/getService/' + service,
                       type : "GET",
                       dataType : "json",
                       success:function(data) {
                          $('#ajax_suf_rates').show();
                          $('#ajax_bandwith').show();
                          $('#ajax_no_of_station').show();
                          $('#surcharge_suf').show();
                          // jQuery('select[name="edit_suf_rates"]').empty();
                          jQuery.each(data, function(key,value){
                             $('select[name="edit_suf_rates"]').append('<option value="'+ key +'">'+ value +'</option>');
                             $('#select_suf').val(suffRate);
                          });
                       },
                       error: function () {
                          $('#ajax_suf_rates').hide();
                          $('#ajax_bandwith').hide();
                          $('#ajax_no_of_station').hide();
                       }
                  });           
            }
              $('#assessmentModal').html("Edit Assesment");
              $('#btn-update').val("edit-assessment");
              $('#ajax-crud-modal').modal('show');
              $('#assessmentId').val(data.service.id);
              $('#edit_qty').val(data.service.qty);
              $('#edit_yr').val(data.service.yr);
            $('.selectpicker').selectpicker('val', data.serviceId);
              // $('#select_suf').selectpicker('val', data.service.suff_rate_id);
         })
      });
      $('#ajax-crud-modal').on('hide.bs.modal', function (e) {
          $('select[name="edit_suf_rates"]').empty();
      })
   });
   
   $("#assessForm").submit(function(e) {
     e.preventDefault(); // avoid to execute the actual submit of the form.
     $('#btn-update').html('<i class="fa fa fa-spinner fa-spin"></i> Updating..');
     var form = $(this);
     var assessmentService = $('#assessmentId').val();
       $.ajax({
           type: "PUT",
           url: '/ajax-assessments/' + assessmentService,
           data: form.serialize(), // serializes the form's elements..
           success: function(data)
           {
               toastr.info("Service has been update!");
               $('#btn-update').html('Update');
               $('#assessForm').trigger("reset");
               $('#ajax-crud-modal').modal('hide');
               location.reload();
           }
      });
   });
</script>
<script>
   jQuery(document).ready(function ()
    {
        $('#suf_rates').hide();
        $('#bandwith').hide();
        $('#no_of_station').hide();
        $('#surcharge_suf').hide();
   
            jQuery('select[name="services"]').on('change',function(){
               var id = jQuery(this).val();
               if(id)
               {
                  jQuery.ajax({
                     url : '/ajax-select/getServiceAndSuf/' + id,
                     type : "GET",
                     dataType : "json",
                     success:function(data) {
                        console.log(data)
                        $('#suf_rates').show();
                        $('#bandwith').show();
                        $('#no_of_station').show();
                        $('#surcharge_suf').show();
   
                        jQuery('select[name="suf_rates"]').empty();
                        $('#suf_rates').append('<option value="0" disable="true" selected="true">--- Select SUF ---</option>');
   
                        jQuery.each(data, function(key,value){
                           $('select[name="suf_rates"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                       
                     },
                     error: function () {
                        $('select[name="suf_rates"]').empty();
                        $('#suf_rates').append('<option value="0" disable="true" selected="true">--- Select SUF ---</option>');
                        $('#suf_rates').hide();
                        $('#bandwith').hide();
                        $('#no_of_station').hide();
                        $('#surcharge_suf').hide();
                     }
                  });
               }
               else
               {
                 //
               }
            });
     });
</script>
{{-- Surcharge Fee --}}
<script>
   $('body').on('click', '#edit-fee', function () {
       var fee = $(this).data('id');
       $.get('/ajax-surcharge-fee/' + fee, function (fee) {
           $('#assessmentFeeModal').html("Add Surcharge");
           $('#btn-update').val("edit-fee");
           $('#feeId').val(fee.id);
           $('#ajax-surcharge-modal').modal('show');
       })
   });
    $("#surchargeForm").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        $('#btn-update').html('<i class="fa fa fa-spinner fa-spin"></i> Updating..');
        var form = $(this);
        var surchargeFee = $('#feeId').val();
        $.ajax({
            type: "PUT",
            url: '/ajax-surcharge-fee/' + surchargeFee,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                toastr.info("Surcharge has been added!");
                $('#feeForm').trigger("reset");
                $('#ajax-surcharge-modal').modal('hide');
                location.reload();
            }
         });
    });
</script>
{{-- Update Fee --}}
<script>
   $('body').on('click', '#update-fee', function () {
       var fee = $(this).data('id');
       $.get('/ajax-update-fee/' + fee, function (fee) {
           $('#feeModal').html("Update Fee");
           $('#btn-update').val("update-fee");
           $('#feeId').val(fee.id);
           $('#ajax-update-modal').modal('show');
       })
   });
    $("#feeForm").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        $('#btn-update').html('<i class="fa fa fa-spinner fa-spin"></i> Updating..');
        var form = $(this);
        var updateFee = $('#feeId').val();
        $.ajax({
            type: "PUT",
            url: '/ajax-update-fee/' + updateFee,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                toastr.info("Fee has been update!");
                $('#feeForm').trigger("reset");
                $('#ajax-update-modal').modal('hide');
                location.reload();
            }
         });
    });
</script>
<script>
   $('.delete-confirm').on('click', function (event) {
     event.preventDefault();
     const url = $(this).attr('href');
     swal({
         title: 'Are you sure?',
         text: 'This record and it`s details will be permanantly deleted!',
         icon: 'warning',
         buttons: ["Cancel", "Yes!"],
     }).then(function(value) {
         if (value) {
             window.location.href = url;
         }
     });
   });
</script>
<!-- Add NOTES with Due Date-->
<script>
      $('body').on('click', '#add-details', function () {
       var applicant = $(this).data('id');
       $.get('/ajax-details/' + applicant, function (applicant) {
           $('#assessmentFeeModal').html("Add Details");
           $('#btn-update').val("add-details");
           $('#applicantId').val(applicant.id);
           $('#ajax-details-modal').modal('show');
       })
   });

   $("#applicantForm").submit(function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        $('#btn-update').html('<i class="fa fa fa-spinner fa-spin"></i> Saving..');
        var form = $(this);
        var applicant = $('#applicantId').val();
      
        $.ajax({
            type: "PATCH",
            url: '/ajax-detail/' + applicant,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
                toastr.info("Details has been added!");
                $('#feeForm').trigger("reset");
                $('#ajax-details-modal').modal('hide');
                location.reload();
            }
         });

    });


</script>

<script>
function myFunction() {
var checkBox = document.getElementById("myCheck");
var text = document.getElementById("text");
if (checkBox.checked == true){
text.style.display = "block";
} else {
text.style.display = "none";
}
}
</script>
  
{{-- <script>
   $(document).on("dblclick", ".fee-value", function () {
    const currentAmount = $(this).text().trim();

    const inputWrapper = $(`
        <div class="fee-editing" style="display: flex; align-items: center;">
            <input type="number" class="fee-input" style="width: 60px; margin-right: 5px;" value="${currentAmount}">
            <span class="edit-icon">✏️</span>
        </div>
    `);

    $(this).replaceWith(inputWrapper); 
    inputWrapper.find("input").focus();
});

$(document).on("blur", ".fee-input", function () {
    saveFeeInput($(this));
});

$(document).on("keydown", ".fee-input", function (e) {
    if (e.key === "Enter") {
        saveFeeInput($(this));
    }
});

function saveFeeInput(inputElem) {
    const input = inputElem.closest(".fee-editing").find(".fee-input");
    const newAmount = input.val();
    const td = input.closest("td");
    const rowId = td.data("row-id");

    const newSpan = $('<span class="fee-value">').text(newAmount);
    inputElem.closest(".fee-editing").replaceWith(newSpan);

    // Optional AJAX
    $.ajax({
        url: '/fees/' + rowId,
        method: 'POST',
        data: {
            amount: newAmount,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
          row.find('.fee-total').text(response.fee_total);
          $('.total-text').text(response.updated_total);
      }
    });
}
</script> --}}


<script>
$(document).ready(function () {
    // Double click to edit
    $('.editable-amount').on('dblclick', function () {
        const cell = $(this);
        cell.find('.display-amount').addClass('d-none');
        cell.find('.edit-amount, .confirm-amount, .cancel-amount').removeClass('d-none');
        cell.find('.edit-amount').focus();
    });

    // Cancel edit
    $('.cancel-amount').on('click', function () {
        const cell = $(this).closest('.editable-amount');
        cell.find('.edit-amount, .confirm-amount, .cancel-amount').addClass('d-none');
        cell.find('.display-amount').removeClass('d-none');
    });

    // Confirm edit
    $('.confirm-amount').on('click', function () {
        const container = $(this).closest('[data-id]');
        const id = container.data('id');
        const newAmount = container.find('.edit-amount').val();

        $.ajax({
            url: `/fees/${id}`,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                amount: newAmount
            },
            success: function (res) {
                if (res.success) {
                    container.find('.display-amount').text(newAmount);
                    $(`[data-total-id="${id}"] .fee-total`).text(res.fee_total);
                     $('#grand-total').text(res.updated_total);
                   swal({
                        icon: 'success',
                        title: 'Updated!',
                        text: 'Amount and total updated.',
                        timer: 1500,
                        showConfirmButton: false
                    });

                    if (res.updated_total) {
                        $('.total-text').text(res.updated_total);
                    }
                } else {
                    swal('Oops!', res.message, 'error');
                }

                container.find('.edit-amount, .confirm-amount, .cancel-amount').addClass('d-none');
                container.find('.display-amount').removeClass('d-none');
            },
            error: function () {
                swal('Error', 'Something went wrong.', 'error');
            }
        });
    });
});
</script>

@endpush