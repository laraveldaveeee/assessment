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
             <p style="color:red;">&#8369; {{ $assessment->grandTotalCarrier() }}</p>
             <small style="color: black;">OR NO:  {{ $assessment->or_no }} </small>
          </div>
          <div class="stats-link">
          </div>
        </div>
        </div>
      </div>
   
      <a href="/cashier/carrier-pendings" class="btn btn-sm btn-outline-primary m-b-10"><i class="fa fa-arrow-left"></i> Back Previous Page</a> 
        {{--   @if ($assessment->or_no) --}}
        <a href="/pdf-generate/carrier/{{ $assessment->id }}" class="btn btn-sm btn-outline-primary m-b-10" target="_blank" ><i class="fa fa-print"></i> Print Records</a> 
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
                  <td>{{ $assessment->soa_number }}</td>
                  <td>{{ $assessment->carrier->applicant }}</td>
                  <td>{{ $assessment->carrier->created_at->toFormattedDateString() }}</td>
                  <td>&#8369; {{ $assessment->grandTotalCarrier() }}</td>
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
         <form method="POST" action="/cashier/carrier-assessments/{{ $assessment->id }}">
         @csrf
         {{ method_field('PATCH') }}
           <div class="row">
                <div class="col-md-6">
                   <div class="form-group">
                      <label class="text-white">OR NO:</label>
                      <input class="form-control " name="or_no" placeholder="Enter OR No." value="{{ $assessment->or_no }}">
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
      <h4 class="panel-title">{{ $assessment->class_station }} {{ $assessment->remarks }}</h4>
      <div class="panel-heading-btn">
      </div>
   </div>
   <div class="panel-body">
      <div class="form-group">
      </div>
       <table class="table table-bordered ">
        <thead>
          <tr>
            <th>CODE</th>
            <th>AMOUNT</th>
          </tr>
        </thead>
        <tbody>
         @foreach ($assessment->categories as $category)
         <tr>
            <td>{{ $category->description }}</td>
            <td>{{ $category->amount }}</td>
         </tr>
         @endforeach
         </tbody>
      </table>
  </div>
</div>
 
@endsection

 
