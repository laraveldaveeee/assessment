@extends('layouts.app')
@section('content')
<div id="content" class="content">

<h1 class="page-header">Show Carrier Assessment</h1>
   
<div class="row">
  
<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"></a> &nbsp;
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"></a> &nbsp;
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"></a> &nbsp;
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"></a> &nbsp;
       <h4 class="panel-title" align="right">Carrier Applicant Company</h4>
       <div class="panel-heading-btn">
       </div>
    </div>
      <div class="panel-body ">
      <div class="row">
        <div class="col-xl-3 col-md-6">
        <div class="widget widget-stats" style="background-color: #D0D3D4">
          <div class="stats-icon">
             <div class="icon-img">
             </div>
          </div>
          <div class="stats-info">
             <h4 style="color:black;">AMOUNT</h4>
             <p style="color:red;">&#8369; 
                  @php 
                    $total =    $newCarrier->license_fee  + $newCarrier->inspection_fee + 
                          $newCarrier->dst +  $newCarrier->amount;

                  @endphp

             {{ $total }}

         </p>
             <small style="color: black;">OR NO:  {{ $newCarrier->or_no }} </small>
          </div>
          <div class="stats-link">
          </div>
        </div>
        </div>
      </div>
   
     {{--  <a href="/cashier/carrier-pendings" class="btn btn-sm btn-outline-primary m-b-10"><i class="fa fa-arrow-left"></i> Back Previous Page</a> --}} 
        {{--   @if ($assessment->or_no) --}}
        <a href="/pdf-generate/new-carrier/{{ $newCarrier->id }}" class="btn btn-sm btn-outline-primary m-b-10" target="_blank" ><i class="fa fa-print"></i> Print Records</a> 

         <a href="/pdf-routing/{{ $newCarrier->id }}" class="btn btn-sm btn-outline-danger m-b-10" target="_blank" ><i class="fa fa-print"></i> Print Routing Slip</a> 


   <a href="/carrier/{{ $newCarrier->id }}/receipt" class="btn btn-sm btn-outline-warning m-b-10" target="_blank"><i class="fa fa-print"></i> Print Receipt </a>

   {{--      <a href="/pdf-generate-cashier/{{ $assessment->applicant->latestAssessment->id }}" class="btn btn-sm btn-outline-info m-b-10" target="_blank" ><i class="fa fa-print"></i> Print Records</a>  --}}
        {{--   @endif  --}}
    {{--     <a href="/pdf-generate-receipt/{{ $assessment->applicant->latestAssessment->id }}" class="btn btn-sm btn-outline-warning m-b-10" target="_blank"><i class="fa fa-print"></i> Print Receipt </a> --}}
      {{--     <form method="POST" action="/back-to-assessor/{{ $assessment->id }}" style="display: inline-block; float: right;">
            @csrf
            {{ method_field('PATCH') }}
            <button class="btn btn-sm btn-outline-danger m-b-10"><i class="fa fa-undo"></i> Back to Assessor</button>
          </form> --}}
         <table class="table table-bordered">
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
                  <td>{{ $newCarrier->soa_number }}</td>
                  <td>{{ $newCarrier->applicant_company }}</td>
                  <td>{{ $newCarrier->created_at->toFormattedDateString() }}</td>
                  <td>&#8369;  
                   @php 
                    $total =    $newCarrier->license_fee  + $newCarrier->inspection_fee + 
                          $newCarrier->dst +  $newCarrier->amount; 
                  @endphp 
                    {{ $total }} 
                </td>
               </tr>
               {{-- <tr>
                  @if ($assessment->date_validity)
                    <td colspan="4">Date on or before : {{ $assessment->date_validity->toFormattedDateString() }}</td>
                  @endif
               </tr> --}}
            </tbody>
         </table>
      </div>
   </div>
</div>

<div class="col-md-5">
   <div class="panel panel-default">
      <div class="panel-heading ">
         <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"></a> &nbsp;
         <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"></a> &nbsp;
         <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"></a> &nbsp;
         <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"></a> &nbsp;
         <h4 class="panel-title text-right" >Add Or No</h4>
         <div class="panel-heading-btn">
         </div>
      </div>
      <div class="panel-body ">
         <form method="POST" action="/new-carrier-assessments/{{ $newCarrier->id }}">
         @csrf
         {{ method_field('PATCH') }}
           <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                      <label class="text-white">OR NO:</label>
                      <input class="form-control " name="or_no" placeholder="Enter OR No." value="{{ $newCarrier->or_no }}">
                   </div>
                </div>
                 <div class="col-md-6">
                   <div class="form-group">
                      <label class="text-white">OR DATE</label>
                      <input type="date" name="or_date" class="form-control " value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
                   </div>         
                 </div>     
               </div>
              <div class="form-group">
              <button type="submit" class="btn btn-primary" > Update</button>
              </div>
         </div>
   </div>
</div>
<div class="col-md-7">
{{-- @foreach ($assessment->assessmentServices as $assessment) --}}
<div class="panel panel-default" data-sortable-id="ui-general-4">
   <!-- begin panel-heading -->
   <div class="panel-heading">
      <h4 class="panel-title">{{ $newCarrier->class_stations }} </h4>
      <div class="panel-heading-btn">
      </div>
   </div>
   <div class="panel-body">
      <div class="form-group">
      </div>
      <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Fees</th>
                <th>Amount</th>
              </tr>
              @if ($newCarrier->license_fee)
              <tr>
                <th>License Fee</th>
                <th>{{ $newCarrier->license_fee }}</th>
              </tr>
              @endif 

              @if ($newCarrier->inspection_fee)
              <tr>
                <th>Inspection Fee</th>
                <th>{{ $newCarrier->inspection_fee }}</th>
              </tr>
              @endif
              @if ($newCarrier->dst)
              <tr>
                <th>DST</th>
                <th>{{ $newCarrier->dst }}</th>
              </tr>
              @endif
              @if ($newCarrier->fees || $newCarrier->amount)
              <tr>
                <th>
                    @if ($newCarrier->class_stations == 'STORAGE')
                        STORAGE
                    @endif
                    {{ $newCarrier->fees }}</th>
                <th>{{ $newCarrier->amount }}</th>
              </tr>
              @endif
         
              <tr>
                <th></th>
                <th>Total :
                  @php 
                    $total =    $newCarrier->license_fee  + $newCarrier->inspection_fee + 
                          $newCarrier->dst +  $newCarrier->amount;

                  @endphp
                  <Strong> 
                     {{ $total }}
                  </Strong>

                </th>
              </tr>
            </thead>
          </table>
  </div>
</div>
 
@endsection

 
