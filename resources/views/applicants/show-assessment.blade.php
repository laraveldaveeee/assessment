@extends('layouts.app')
@section('content')
<div id="content" class="content">
   <!-- begin breadcrumb -->
   <ol class="breadcrumb float-xl-right">
      <li class="breadcrumb-item"><a href="/home">Home</a></li>
      <li class="breadcrumb-item"><a href="/applicants">Applicant</a></li>
   </ol>
   <h1 class="page-header"> Applicant</h1>
   <div class="row">
      <div class="col-lg-4 col-sm-6">
         <div class="widget widget-stats bg-gradient-blue m-b-10">
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
         <div class="panel panel-default" >
            <div class="panel-heading">
               <h4 class="panel-title"> Applicant Assesment</h4>
               <div class="panel-heading-btn">
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
               </div>
            </div>
            <div class="panel-body">
               <a href="/pdf-generate/{{ $assessment->id }}" class="btn btn-sm btn-primary m-b-10" target="_blank"><i class="fa fa-file-pdf t-plus-1 text-danger fa-fw fa-lg"></i> Print as PDF</a>  
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>Applicant</th>
                        <th>Address</th>
                        <th>Date</th>
                        <th>Grand Total</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
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
            </div>
         </div>
      </div>
      <div class="col-md-12">
         @foreach ($assessment->assessmentServices as $assessment)
         <div class="panel panel-default" data-sortable-id="ui-general-3">
            <!-- begin panel-heading -->
            <div class="panel-heading">
               <h4 class="panel-title">{{ $assessment->name }}</h4>
               <div class="panel-heading-btn">
               </div>
            </div>
            <div class="panel-body">
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
                           @else
                           {{ $assessment->qty }}
                           @endif
                        </td>
                        <td>
                           @if ($fee->enabled_licensed_fee_computation)
                           {{ $fee->amount * $assessment->no_of_station }}
                           @else
                           {{ $fee->amount }}
                           @endif
                        </td>
                        <td>{{ $fee->total }}</td>
                     </tr>
                  </tbody>
                  @endforeach
               </table>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</div>
</div>
@endsection
