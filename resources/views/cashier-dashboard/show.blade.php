@extends('layouts.app')
@section('content')
<div id="content" class="content">

<h1 class="page-header">Show Assessment</h1>
<div class="row">
  
<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-gray" data-click="panel-expand"></a> &nbsp;
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"></a> &nbsp;
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"></a> &nbsp;
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"></a> &nbsp;
       <h4 class="panel-title" align="right">Applicant Company</h4>
       <div class="panel-heading-btn">
       </div>
    </div>
      <div class="panel-body">
      <div class="row">
        <div class="col-xl-3 col-md-6">
        <div class="widget widget-stats" style="background-color: #D0D3D4">
          <div class="stats-icon">
             <div class="icon-img">
             </div>
          </div>
          <div class="stats-info">
             <h4 style="color: black;">AMOUNT</h4>
             <p style="color: black;" data-animation="number" data-value="{{ $assessment->grandTotal() }}">&#8369;</p>
             <small style="color: black;">OR NO: {{ $assessment->or_no }}</small>
          </div>
          <div class="stats-link">
          </div>
        </div>
        </div>
      </div>
     {{--  <div class="note note-warning note-with-right-icon">
        <div class="note-icon"><i class="fa fa-lightbulb"></i></div>
        <div class="note-content text-left">
          <h4><b>Note!</b></h4>
          <p> If the assessments date is expired during the date on or before you need to cancel it. Then back to the assessor to re-assess the assessments. </p>
        </div>
      </div> --}}
      <a href="/cashier/home" class="btn btn-sm btn-outline-primary m-b-10"><i class="fa fa-arrow-left"></i> Back Previous Page</a> 
        {{--   @if ($assessment->or_no) --}}
  {{--       <a href="/pdf-generate/{{ $assessment->applicant->latestAssessment->id }}" class="btn btn-sm btn-success m-b-10" target="_blank" ><i class="fa fa-print"></i> Print Records</a>  --}}
        <a href="/pdf-generate-cashier/{{ $assessment->id }}" class="btn btn-sm btn-outline-info m-b-10" target="_blank" ><i class="fa fa-print"></i> Print Records</a> 
        {{--   @endif  --}} 

          <a href="/assessment/{{ $assessment->id }}/suf" class="btn btn-sm btn-outline-success m-b-10" target="_blank"><i class="fa fa-file-pdf t-plus-1 text-danger fa-fw fa-lg"></i> Print as SUF</a>  

         <a href="/assessment/{{ $assessment->id }}/dst" class="btn btn-sm btn-outline-success m-b-10" target="_blank"><i class="fa fa-file-pdf t-plus-1 text-danger fa-fw fa-lg"></i> Print as DST</a> 

        <a href="/pdf-generate-routing/{{ $assessment->id }}" class="btn btn-sm btn-outline-danger m-b-10" target="_blank" ><i class="fa fa-print"></i> Print Routing Slip</a>  

        <a href="/pdf-generate-receipt/{{ $assessment->id }}" class="btn btn-sm btn-outline-warning m-b-10" target="_blank"><i class="fa fa-print"></i> Print Receipt </a> 
        
        <a href="/pdf-generate-receipt/{{ $assessment->id }}/dst" class="btn btn-sm btn-outline-warning m-b-10" target="_blank"><i class="fa fa-print"></i> Print Receipt DST </a>

        <a href="/pdf-generate-receipt/{{ $assessment->id }}/suf" class="btn btn-sm btn-outline-warning m-b-10" target="_blank"><i class="fa fa-print"></i> Print Receipt SUF </a>

          <form method="POST" action="/back-to-assessor/{{ $assessment->id }}" style="display: inline-block; float: right;">
            @csrf
            {{ method_field('PATCH') }}
            <button class="btn btn-sm btn-outline-danger m-b-10"><i class="fa fa-undo"></i> Back to Assessor</button>
          </form>
         <table class="table table-bordered ">
            <thead>
               <tr>
                  <th>SOA NO</th>
                  <th>Applicant</th>
                  <th>Date</th>
                  <th>Grand Total</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>{{ $assessment->soa_no }}</td>
                  <td>{{ $assessment->applicant->applicant_company }}</td>
                  <td>{{ $assessment->applicant->created_at->toFormattedDateString() }}</td>
                  <td>&#8369; {{ $assessment->grandTotal() }}</td>
               </tr>
               <tr>
                  @if ($assessment->date_validity)
                    <td colspan="4">Date on or before : {{ $assessment->date_validity->toFormattedDateString() }}</td>
                  @endif
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</div>

<div class="col-md-5">
   <div class="panel panel-default">
      <div class="panel-heading ">
         <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-gray" data-click="panel-expand"></a> &nbsp;
         <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"></a> &nbsp;
         <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"></a> &nbsp;
         <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"></a> &nbsp;
         <h4 class="panel-title text-right" >Add Or No</h4>
         <div class="panel-heading-btn">
         </div>
      </div>
      <div class="panel-body">
      {{--    <form method="POST" action="/cashier/applicant-assessments/{{ $assessment->applicant->latestAssessment->id }}"> --}}
         <form method="POST" action="/cashier/applicant-assessments/{{ $assessment->id }}">
         @csrf
         {{ method_field('PATCH') }}
           <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                      <label class="text-black">OR NO:</label>
                      <input class="form-control " name="or_no" placeholder="Enter OR No." value="{{ $assessment->or_no }}">
                   </div>
                </div>
                 <div class="col-md-6">
                   <div class="form-group">
                      <label class="text-black">OR NO DST (Optional):</label>
                      <input class="form-control " name="or_no_dst" placeholder="Enter OR No." value="{{ $assessment->or_no_dst }}">
                   </div>
                </div>

                 <div class="col-md-6">
                   <div class="form-group">
                      <label class="text-black">OR NO SUF (Optional):</label>
                      <input class="form-control " name="or_no_suf" placeholder="Enter OR No." value="{{ $assessment->or_no_suf }}">
                   </div>
                </div>

                 <div class="col-md-6">
                   <div class="form-group">
                      <label class="text-black">OR DATE</label>
                      <input type="date" name="or_date" class="form-control " value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                   </div>         
                 </div>     
{{--                  <div class="col-md-12">
                 <div class="form-group">
                    <div class="note note-warning note-with-right-icon">
                      <div class="note-icon"><i class="fa fas fa-exclamation-triangle"></i></div>
                        <div class="note-content text-left">
                          <h4><b>Note!</b></h4>
                           <p class="">It is under maintenance. Please skip the <b>(Treasury Warrant etc & Date of Treasury).</b> <br> Continues Developed of Printing Receipt.</p>
                        </div>
                      </div>
                    </div>
                 </div>
                 <div class="col-md-6">    
                   <div class="form-group">
                      <label class="text-white">Treasury Warrant / Check / Money Order Number</label>
                      <input type="text" name="" class="form-control bg-dark text-white" placeholder="Optional">
                   </div>
                 </div>
                 <div class="col-md-6">
                  <label class="text-white">Date of Treasury Warrant, Check, Money Order</label>
                  <input type="date" name="" class="form-control bg-dark text-white">
                 </div>
               </div>
               <div class="form-group">
                 <label class="text-white">Recieved</label><br>
                 <select class="form-control bg-dark text-white" name="recieved">
                  <option disabled="" selected="">Select Received</option>
                   <option value="Cash">Cash</option>
                   <option value="Treasury Warrant">Treasury Warrant</option>
                   <option value="Check">Check</option>
                   <option value="Check">Money Order</option>
                 </select> --}}
              {{--    <input type="checkbox" name="" > Cash
                 <input type="checkbox" name="" > Treasury Warrant
                 <input type="checkbox" name="" > Check
                 <input type="checkbox" name="" > Money Order --}}
               {{-- </div> --}}
{{-- 
                 <div class="col-md-12">
                 <div class="form-group">
                    <div class="note note-warning note-with-right-icon">
                      <div class="note-icon"><i class="fa fas fa-exclamation-triangle"></i></div>
                        <div class="note-content text-left">
                          <h4><b>Note!</b></h4>
                           <p class="">It is under maintenance. Please skip the <b>(Treasury Warrant etc & Date of Treasury).</b> <br> Continues Developed of Printing Receipt.</p>
                        </div>
                      </div>
                    </div>
                 </div> --}}
                 <div class="col-md-6">    
                   <div class="form-group">
                      <label >Treasury Warrant / Check / Money Order Number</label>
                      <input type="text" name="treasury" class="form-control" placeholder="Optional" value="{{ $assessment->treasury }}">
                   </div>
                 </div>
                 <div class="col-md-6">
                  <label >Date of Treasury Warrant, Check, Money Order</label>
                  <input type="date" name="date_of_treasury" class="form-control " value="{{ $assessment->date_of_treasury }}">
                 </div>
               </div>
               <div class="form-group">
                 <label>Recieved</label><br>
                 <select class="form-control" name="recieved">
                  <option disabled="" selected="">Select Received</option>
                   <option value="Cash" {{ $assessment->recieved == 'Cash' ? 'selected' : '' }}>Cash</option>
                   <option value="Treasury Warrant" {{ $assessment->recieved == 'Treasury Warrant' ? 'selected' : '' }}>Treasury Warrant</option>
                   <option value="Check" {{ $assessment->recieved == 'Check' ? 'selected' : '' }}>Check</option>
                   <option value="Money Order" {{ $assessment->recieved == 'Money Order' ? 'selected' : '' }}>Money Order</option>
                 </select>
              {{--    <input type="checkbox" name="" > Cash
                 <input type="checkbox" name="" > Treasury Warrant
                 <input type="checkbox" name="" > Check
                 <input type="checkbox" name="" > Money Order --}}
               {{-- </div> --}}
             
             </div>
              <div class="form-group">
               <button type="submit" class="btn btn-primary"> Update</button>
              </div>
         </div>
   </div>
</div>
<div class="col-md-7">
@foreach ($assessment->assessmentServices as $assessment)
<div class="panel panel-default" data-sortable-id="ui-general-4">
   <!-- begin panel-heading -->
   <div class="panel-heading">
      <h4 class="panel-title">{{ $assessment->name }}</h4>
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
      </div>
       <table class="table table-bordered ">
        <thead>
          <tr>
            <th>CODE</th>
            <th>YR</th>
            <th>%</th>
            <th>QTY</th>
            <th>FEE</th>
            <th>TOTAL</th>
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
                  {{ $fee->surcharge_amount  * 100 . '%' }}
                @endif
              </td>
                
             <td>
                  @if ($fee->enabled_portable_computation)
                    {{ ceil($assessment->qty / 25) }}
                  @elseif ($dstDefault = $fee->enabled_dst_default)
                    {{ $dstDefault }}
                  @else
                    {{ $assessment->qty }}
                  @endif
              </td>
              <td>{{ $fee->amount }}</td>
              <td>{{ $fee->total }}</td>
            </tr>
          </tbody>
         @endforeach
      </table>
  </div>
</div>
@endforeach
@endsection

@push('scripts')

<script type="text/javascript">
// the selector will match all input controls of type :checkbox
// and attach a click event handler 
  $("input:checkbox").on('click', function() {
    // in the handler, 'this' refers to the box clicked on
    var $box = $(this);
    if ($box.is(":checked")) {
      // the name of the box is retrieved using the .attr() method
      // as it is assumed and expected to be immutable
      var group = "input:checkbox[name='" + $box.attr("name") + "']";
      // the checked state of the group/box on the other hand will change
      // and the current value is retrieved using .prop() method
        $(group).prop("checked", false);
        $box.prop("checked", true);
      } else {
        $box.prop("checked", false);
      }
  });
</script>

@endpush

 