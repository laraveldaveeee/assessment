@extends('layouts.app')
@section('content')


<div id="content" class="content">
		<!-- begin breadcrumb -->
		<ol class="breadcrumb float-xl-right">
			<li class="breadcrumb-item"><a href="/home">Home</a></li>
			 
		</ol>
		<!-- end breadcrumb -->
		<!-- begin page-header -->
		<h1 class="page-header">Licensing For Release </h1>
		<!-- end page-header -->
		<!-- begin panel -->

		<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Licensing Release lists</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
					</div>
				</div>
				<div class="table-responsive">
				<div class="panel-body">
					<table class="table table-bordered" id="licensing-release-table">
						<thead>
							<tr>
								{{-- <th>Date of Distribution</th> --}}
								<th>Name of Applicant</th>
								<th>Processor</th>
								<th>Remarks</th>
								<th>Date of Processed</th>
								<th>Options</th>
								 
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</form>
		</div>
		</div>
		</div>
		</div>
							 

 
@endsection


@push('scripts')
<script type="text/javascript">
     $(document).ready(function () {
	    $.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
    });

  
	 $('#licensing-release-table').DataTable({
	      	"ordering":'true',
			"order": [0, 'desc'],
	        processing: true,
	        serverSide: true,

	        ajax: '{!! route('licensing-release') !!}',
	        columns: [
				{ data: 'date_of_distribution', name: 'date_of_distribution' },
				{ data: 'applicant_company',},
			 
				{ data: 'processor_licensing.code_name'},
				{ data: 'remarks',},
				{ data: 'date_processed',},
			 

	            { data: 'action', name: 'action', orderable: false, searchable: false },
	        ]
	  });
});

</script>

@endpush