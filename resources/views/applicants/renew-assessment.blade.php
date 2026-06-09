@extends('layouts.app')
@section('content')
<div id="content" class="content">
<!-- begin breadcrumb -->
<ol class="breadcrumb float-xl-right">
   <li class="breadcrumb-item"><a href="/home">Home</a></li>
   <li class="breadcrumb-item"><a href="/applicants">Applicant</a></li>
</ol>

<h1 class="page-header">New Applicant</h1>
<div class="row">
  <div class="col-lg-4 col-sm-6">
    <div class="widget widget-stats bg-gradient-red m-b-10">
    <div class="stats-icon stats-icon-lg"><i class="fa fa-dollar-sign fa-fw"></i></div>
    <div class="stats-content">
    <div class="stats-title">AMOUNT</div>
    <div class="stats-number">&#8369; {{ $assessment->grandTotal() }}.00</div>
    <div class="stats-progress progress">
    <div class="progress-bar" style="width: 40.5%;"></div>
    </div>
    <div class="stats-desc"><br></div>
    </div>
    </div>
  </div>

   <div class="col-md-12">
   <div class="panel panel-inverse" >
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

         <a href="javascript;;" class="btn btn-sm btn-primary m-b-10" data-toggle="modal" data-target="#generateNewAssessmentwithSOA" style="float: right;">New Assessment with SOA-NO</a>
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
                  <td>{{ $assessment->applicant->created_at->toFormattedDateString() }}</td>
                  <td><b>&#8369; {{ $assessment->grandTotal() }}</b></td>
               </tr>
            </tbody>
            <tfoot>
               <tr>
                  <td colspan="5"> 
                     Remarks: {{ optional($assessment)->messages }}
                  </td>
               </tr>
            </tfoot>
         </table>

        <form method="POST" action="/assesments-status/{{ $assessment->id }}">
         @csrf 
         {{ method_field('PATCH') }}

         <div class="form-group">
            <label>Notes: (Optional)</label>
            <textarea class="form-control" name="notes"></textarea>
         </div>
          <div class="form-group">
             <label>Date on or before:</label>
             <input type="date" name="date_validity" class="form-control" value="">
          </div>

            @if ($assessment->status == 'Pending' || $assessment->status == 'Approved' || $assessment->status == 'For Payment' || $assessment->status == 'Paid')
              <button type="submit" class="btn btn-block btn-primary" disabled="">Proceed</button>
           @endif

          @if ($assessment->status == 'Verified')
           <button type="submit" class="btn btn-block btn-primary">Proceed</button>
          @endif
        </form>
      </div>
   </div>
</div>
<div class="col-md-5">
   <div class="panel panel-inverse">
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
                <label >Classifications</label>
                   
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
                    <label>No. Of Station</label>
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
  </div>

<div class="col-md-7"> 
@include ('applicants.modal.surcharge-modal')
@foreach ($assessment->assessmentServices as $assessment)
<div class="panel panel-inverse" data-sortable-id="ui-general-3">
   <!-- begin panel-heading -->
   <div class="panel-heading">
      <h4 class="panel-title">{{ $assessment->name }}</h4>
      <div class="panel-heading-btn">
      </div>
   </div>
   <div class="panel-body">
      
      <a  href="javascript:void(0)" id="edit-assessment" data-id="{{ $assessment->id }}" class="btn btn-xs btn-primary m-b-10"><i class="fa fa-edit"></i> Edit</a>
  {{--     <form method="POST" action="/assessments-delete/{{ $assessment->id }}" style="display: inline-block;">
        @csrf --}}
   {{--      {{ method_field('DELETE') }} --}}
      <a href="/assessments-delete/{{ $assessment->id }}" class="btn btn-danger btn btn-xs m-b-10 button #delete-confirm" ><i class="fa fa-trash"></i> Delete</a>
    {{--   </form> --}}

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
                      <td>{{ $fee->surcharge_amount }}</td>
                      <td>
                        @if ($fee->enabled_portable_computation)
                          {{ ceil($assessment->qty / 25) }}
                        @elseif ($fee->enabled_dst_default)
                          {{ 1 }}
                        @else
                          {{ $assessment->qty }}
                        @endif
                      </td>
                      <td>{{ $fee->amount }}</td>
                      <td>{{ $fee->total }}</td>
                      <td>  
                        @if ($fee->enabled_surcharge || $fee->enabled_suf_surcharge)
                          <a href="javascript:void(0)" data-id="{{ $fee->id }}" id="edit-fee" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                        @endif
                        <form method="POST" action="/assessments/serviceFee/{{ $fee->id }}" style="display: inline-block;">
                          @csrf
                          {{ method_field('DELETE') }}
                           {{--  <a href="" class="btn btn-danger btn-xs delete-confirm"><i class="fa fa-times"></i></a> --}}
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


@endpush