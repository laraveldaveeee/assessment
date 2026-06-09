@extends('layouts.app')
@section('content')
<div id="content" class="content">
<!-- begin breadcrumb -->
{{-- <ol class="breadcrumb float-xl-right">
   <li class="breadcrumb-item"><a href="/home">Home</a></li>
   <li class="breadcrumb-item"><a href="#">Assessment</a></li>
</ol> --}}
<h1 class="page-header">Show Assessment</h1>
    {{--   <div class="col-xl-3 col-md-6">
         <div class="widget widget-stats bg-inverse">
            <div class="stats-icon">
               <div class="icon-img">
               </div>
            </div>
            <div class="stats-info">
               <h4>AMOUNT</h4>
               <p>&#8369; {{ $assessment->grandTotal() }}.00</p>
               <small>OR NO: {{ $assessment->or_no }}</small>
            </div>
            <div class="stats-link">
            </div>
         </div>
      </div> --}}
       {{-- <div class="note note-warning note-with-right-icon">
        <div class="note-icon"><i class="fa fa-lightbulb"></i></div>
        <div class="note-content text-left">
          <h4><b>Note!</b></h4>
          <p> If the assessments date is expired during the date on or before you need to cancel it. Then back to the assessor to re-assess the assessments. </p>
        </div>
    </div> --}}
<div class="row">
<div class="col-md-12">
  <div class="panel panel-default">
    <div class="panel-heading">
       <h4 class="panel-title">Applicant Company</h4>
       <div class="panel-heading-btn">
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
       </div>
    </div>
      <div class="panel-body">
      <div class="row">
       <div class="col-xl-3 col-md-6">
         <div class="widget widget-stats bg-primary">
            <div class="stats-icon">
               <div class="icon-img">
               </div>
            </div>
            <div class="stats-info">
               <h4>AMOUNT</h4>
               <p>&#8369; {{ $assessment->grandTotal() }}.00</p>
               <small>OR NO: {{ $assessment->or_no }}</small>
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
      <a href="/cashier/home" class="btn btn-sm btn-primary m-b-10"><i class="fa fa-arrow-left"></i> Back Previous Page</a> 
        {{--   @if ($assessment->or_no) --}}
  {{--       <a href="/pdf-generate/{{ $assessment->applicant->latestAssessment->id }}" class="btn btn-sm btn-success m-b-10" target="_blank" ><i class="fa fa-print"></i> Print Records</a>  --}}
        <a href="/pdf-generate/{{ $assessment->id }}" class="btn btn-sm btn-info m-b-10" target="_blank" ><i class="fa fa-print"></i> Print Records</a> 
        {{--   @endif  --}}
         <a href="/pdf-generate-routing/{{ $assessment->id }}" class="btn btn-sm btn-outline-danger m-b-10" target="_blank" ><i class="fa fa-print"></i> Print Routing Slip</a> 
        <a href="/pdf-generate-receipt/{{ $assessment->applicant->latestAssessment->id }}" class="btn btn-sm btn-warning m-b-10" target="_blank"><i class="fa fa-print"></i> Print Receipt </a>
          <form method="POST" action="/back-to-assessor/{{ $assessment->id }}" style="display: inline-block; float: right;">
            @csrf
            {{ method_field('PATCH') }}
            <button class="btn btn-sm btn-danger m-b-10"><i class="fa fa-undo"></i> Back to Assessor</button>
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
      <div class="panel-heading">
         <h4 class="panel-title">Add Or No</h4>
         <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
         </div>
      </div>
      <div class="panel-body">
      {{--    <form method="POST" action="/cashier/applicant-assessments/{{ $assessment->applicant->latestAssessment->id }}"> --}}
         <form method="POST" action="/cashier/applicant-assessments/{{ $assessment->id }}">
         @csrf
         {{ method_field('PATCH') }}
         <div class="form-group">
            <label class="text-white">OR NO:</label>
            <input class="form-control " name="or_no" placeholder="Enter OR No." value="{{ $assessment->or_no }}">
         </div>
         <div class="form-group">
            <label class="text-white">OR DATE</label>
            <input type="date" name="or_date" class="form-control " value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">
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
            </tr>
          </tbody>
         @endforeach
      </table>
  </div>
</div>
@endforeach
@endsection

 