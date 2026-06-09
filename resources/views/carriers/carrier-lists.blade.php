@extends('layouts.app')
@section('content')

<div id="content" class="content">
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
	  {{--  <li class="breadcrumb-item"><a href="/home">Home</a></li>
	   <li class="breadcrumb-item"><a href="/applicants">Applicant</a></li> --}}
	</ol>

	<h1 class="page-header">Carrier lists</h1>

	<div class="row">
		   <div class="col-md-12">
		   	<div class="panel panel-default" >
		      <div class="panel-heading">
		         <h4 class="panel-title">Carrier lists</h4>
		         <div class="panel-heading-btn">
		            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
		            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
		            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
		            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
		         </div>
		      </div>
		      <div class="panel-body">
      	         <table class="table table-bordered" id="carrier-lists-tables">
      	         	<thead>
      	         		<tr>
      	         			<th>ID</th>
      	         			<th>Carrier Company</th>
      	         			<th>Address</th>
      	         			<th>Status</th>
      	         			<th>Options</th>
      	         		</tr>
      	         	</thead>
      	         </table>
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
   $('#carrier-lists-tables').DataTable({
          //"ordering":'true',
          "order": [0, 'desc'],
          processing: true,
          serverSide: true,
          ajax: '{!! route('carrier-lists.carriers') !!}',
          columns: [
              { data: 'soa_number'}, //Get the latest of SOA NO
              { data: 'carrier.applicant'},
              { data: 'carrier.address'},
              {
           			"data": "carrier_status", // can be null or undefined
           			"defaultContent": "<i>Not set</i>"		
   		        },
              { data: 'action', name: 'action', orderable: false, searchable: false },
          	]
    	});
    });
</script>
@endpush