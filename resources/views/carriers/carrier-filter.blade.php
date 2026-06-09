@extends('layouts.app') 
@section('content') 
<div id="content" class="content">
  <h1 class="page-header ">Filter Carrier</h1>
  <div class="row">
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">-</h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand">
              <i class="fa fa-expand"></i>
            </a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload">
              <i class="fa fa-redo"></i>
            </a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse">
              <i class="fa fa-minus"></i>
            </a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove">
              <i class="fa fa-times"></i>
            </a>
          </div>
        </div>
        <div class="panel-body ">
          <form class="form-horizontal" method="GET" action="/filter-new-carrier">

            <div class="form-group{{ $errors->has('applicant') ? ' has-error' : '' }}">
              <label for="applicant" class="col-md-6 control-label t">Applicant Company </label>
              <input id="applicant" type="text" class="form-control bg-" name="applicant_company" value="{{ request('applicant_company') }}"> @if ($errors->has('applicant')) <span class="help-block">
                <strong style="color: #ff5b57;">{{ $errors->first('applicant') }}</strong>
              </span> 
              @endif
            </div> 

            <div class="form-group{{ $errors->has('from') ? ' has-error' : '' }}">
              <label for="from" class="col-md-4 control-label t">From </label>
              <input id="from" type="date" class="form-control bg-" name="from" value="{{ request('from') }}"> @if ($errors->has('from')) <span class="help-block">
                <strong style="color: #ff5b57;">{{ $errors->first('from') }}</strong>
              </span> 
              @endif
            </div>

            <div class="form-group{{ $errors->has('to') ? ' has-error' : '' }}">
              <label for="to" class="col-md-4 control-label ">To </label>
              <input id="to" type="date" class="form-control b" name="to" value="{{ request('to') }}"> @if ($errors->has('to')) <span class="help-block">
                <strong style="color: #ff5b57;">{{ $errors->first('to') }}</strong>
              </span> 
              @endif
            </div>
            <div class="form-group">
              <label>Option Select</label>
              <select class="form-control" id="mySelect" onchange="myFunction()">
                <option selected="" disabled="">Option Select</option>
                <option value="Select Categories"> Class Stations</option>
                <option value="Select Suf"> SUF</option>
              </select> 
              @if ($errors->has('class_stations')) <span class="help-block">
                <strong style="color: #ff5b57;">{{ $errors->first('class_stations') }}</strong>
              </span> 
              @endif
            </div>
            <div class="form-group" id="categories"> @if ($errors->has('categories')) <span class="help-block">
                <strong style="color: #ff5b57;">{{ $errors->first('categories') }}</strong>
              </span> @endif </div>
            <div class="form-group" id="Suf"> @if ($errors->has('fees')) <span class="help-block">
                <strong style="color: #ff5b57;">{{ $errors->first('fees') }}</strong>
              </span> @endif </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Filter</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">-</h4>
          <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand">
              <i class="fa fa-expand"></i>
            </a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload">
              <i class="fa fa-redo"></i>
            </a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse">
              <i class="fa fa-minus"></i>
            </a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove">
              <i class="fa fa-times"></i>
            </a>
          </div>
        </div>
        <div class="form-group"></div>
        <div class="panel-body ">
          {{-- <a href="{{ route('filtering-carrier-reports',['from' => request('from'), 'to'	=> request('to'), 'class_stations' => request('class_stations'), 'fees' => request('fees') ]) }}" class="btn btn-sm btn-outline-info m-b-10" target="_blank"> --}}
          <a href="{{ route('export.new_carriers', [
        'from' => request('from'),
        'to' => request('to'),
        'applicant_company' => request('applicant_company'),
        'class_stations' => request('class_stations'),
              'fees' => request('fees'),
          ]) }}" class="btn btn-primary">
          Export Data
      </a>


        
          <table class="table table-bordered">
            <thead>
              <tr >

                <th colspan="9">Collection From @if (request('from'))
                   {{ Carbon\Carbon::parse(request('from'))->format('F, d Y') }} to {{ \Carbon\Carbon::parse(request('to'))->format('F, d Y') }}@endif</th>
              </tr>
              <tr>
                <th>Or Date</th>
                <th>Or No</th>
                <th>Soa No</th> 
                <th>Company</th>

                @if (request('class_stations'))
                  <th>Class Stations</th>
                @endif

                @if (request('class_stations'))
                  <th>License Fee</th>
                @endif


                @if (request('class_stations'))
                  <th>Inspection Fee</th>
                @endif
 

                @if (request('class_stations'))
                  <th>Dst</th>
                @endif

                  @if (request('class_stations'))
                  <th>Assessor</th>
                @endif
               
               

                  @if (request('fees'))
                  <th>SUF </th>
                  @endif


                {{-- @if (request('fees'))
                  <th>SUF</th>
                  @endif --}}
                  @if (request('fees'))
                    <th>Suf Amount</th>
                  @endif


                  @if (request('class_stations'))
                  <th>Amount</th>
                  @endif
              </tr>
            </thead>
            <tbody> 
            	@if (request('class_stations') || request('fees')) 

             {{--  @foreach ($classStations as $classStation)  --}}
              @foreach ($classStations as  $assessment) 
              {{--  @php 
                    $total    = $assessment->license_fee + $assessment->inspection_fee + $assessment->dst;
                  
               @endphp  --}}

              <tr>
                
                <td>{{ $assessment->or_date }}</td>
                <td>{{ $assessment->or_no }}</td>
                <td>{{ $assessment->soa_number }}</td>
                <td>{{ $assessment->applicant_company }}</td>

                <td>{{ $assessment->class_stations }}</td>

                @if (request('class_stations'))
                <td>{{ $assessment->license_fee }}</td>
                <td>{{ $assessment->inspection_fee }}</td>
                <td>{{ $assessment->dst }}</td>
                <td>{{ $assessment->assessed_by }}</td>
                @endif
                @if (request('fees'))
                  <td>{{ number_format( $assessment->amount, 2) }} </td>
                @endif
                
                <td> 
                  {{ number_format($assessment->total_class, 2) }} 
           	   </td>

              </tr> 
                @endforeach  
              <tr>
                @if (request('class_stations'))
                  <td colspan="8"></td>
                  @if ($assessment->sumClass('FB'))
                   <td><strong>{{ number_format($assessment->sumClass('FB'),2) }}</strong></td>
                  @endif

                   @if ($assessment->sumClass('FB-BWA'))
                    <td><strong>{{ number_format($assessment->sumClass('FB-BWA'),2) }}</strong></td>
                   @endif

                   @if ($assessment->sumClass('FX-WDN'))
                    <td><strong>{{ number_format($assessment->sumClass('FX-WDN'),2) }}</strong></td>
                   @endif

                   @if ($assessment->sumClass('FX-MW'))
                   <td><strong>{{ number_format($assessment->sumClass('FX-MW'),2) }}</strong></td>
                   @endif

                   @if ($assessment->sumClass('TC'))
                   <td><strong>{{ number_format($assessment->sumClass('TC'),2) }}</strong></td>
                   @endif

                   @if ($assessment->sumClass('FB-BWA-5G'))
                   <td><strong>{{ number_format($assessment->sumClass('FB-BWA-5G'),2) }}</strong></td>
                   @endif

                   @else 
                    <td>Empty</td>
                @endif

                @if (request('fees'))
                    <td>
                        <strong>Suf Total: </strong> P
                        @php
                            $sufTypes = ['SUF-BWA','SUF-WDN','SUF-MW'];
                        @endphp

                        @foreach($sufTypes as $suf)
                            @php
                                // Compute sum safely from collection
                                $amount = $classStations->where('fees', $suf)->sum(function($item){
                                    return floatval($item->amount ?? 0);
                                });
                            @endphp

                            @if($amount > 0)
                                {{ $suf }}: {{ number_format($amount, 2) }}<br>
                            @endif
                        @endforeach
                    </td>
                @endif



                                       
                       
    				
                </td>
              </tr>
               @endif 
           </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    function myFunction() {
      var selected = document.getElementById("mySelect").value;
      if (selected === 'Select Categories') {
        document.getElementById("Suf").innerHTML = ``;
        document.getElementById("categories").innerHTML = `	
				<label>Select Class Stations</label>
				<select class="form-control" name="class_stations" id="class_stations">
					<option  selected="" disabled="">Select Class Stations</option>
					<option value="FB">FB</option>
					<option value="FB-BWA">FB-BWA-LTE</option>
          <option value="FB-BWA-5G">FB-BWA-5G</option>
					<option value="FX-WDN">FX-WDN</option>
					<option value="FX-MW">FX-MW</option>
          <option value="TC">TC</option>
				</select>`;
      }
      if (selected === 'Select Suf') {
        document.getElementById("categories").innerHTML = ``;
        document.getElementById("Suf").innerHTML = `
				<label>Select SUF</label>
				<select class="form-control" name="fees" id="fees">
					<option  selected="" disabled="">Select SUF</option>
					<option value="SUF-BWA">SUF-BWA</option>
          <option value="SUF-BWA-5G">SUF-BWA-5G</option>
					<option value="SUF-WDN">SUF-WDN</option>
					<option value="SUF-MW">SUF-MW</option>
				</select>`;
      }
    }   
  </script> @endsection
