@extends('layouts.app')

@section('content')
<div id="app">
<div id="content" class="content content-full-width">
<div class="profile">
   <div class="profile-header">
      <div class="profile-header-cover " id="particles-js"></div>
      <div class="profile-header-content ">
         @if (auth()->user()->isCashier())
         <div class="profile-header-img">
         	<img src="{{ Storage::url(auth()->user()->avatar) }}" alt="" style="height: 100%" style="width: 100%">
         </div>
         @else
         <div class="profile-header-img">
            <img src="{{ asset('img/user.png') }}" alt="" style="height: 100%" style="width: 100%">
         </div>
         @endif
         <div class="profile-header-info">
            <h4 class="mt-0 mb-1">{{ auth()->user()->name }}</h4>
            <p class="mb-2">{{ ucfirst(auth()->user()->role->name) }}</p>
            <a href="/settings" class="btn btn-primary btn-xs">Edit Profile</a>
           <div>
           </div>
         </div>
      </div>
      <ul class="profile-header-tab nav nav-tabs" style="background: #f0f8ff21">
         <li class="nav-item"><a class="nav-link active" data-toggle="tab" style="color: #fff;">&nbsp;I am Cashier</a></li>
         <li class="nav-item"><a  class="nav-link" data-toggle="tab">&nbsp;</a></li>
         <li class="nav-item"><a class="nav-link" data-toggle="tab">&nbsp;</a></li>
         <li class="nav-item"><a  class="nav-link" data-toggle="tab">&nbsp;</a></li>
         <li class="nav-item"><a  class="nav-link" data-toggle="tab">&nbsp;</a></li>
      </ul>
   </div>
</div>
</div>	

	<cashier-payment></cashier-payment>
	{{-- <div id="content" class="content ">
		<div class="panel panel-inverse">
			<div class="panel-heading">
				<h4 class="panel-title">Pending Applicant</h4>
				<div class="panel-heading-btn">
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
				</div>
			</div>
			<div class="table-responsive">
			<div class="panel-body bg-dark">
				<table class="table table-bordered text-white" id="applicant-table" style="text-color:white;">
					<thead>
						<tr>
							<th>ID</th>
							<th>Applicant Company Name</th>
							<th>Address</th>
							<th>Status</th>
							<th>Options</th>
						</tr>
					</thead>
					 <tbody>
					 </tbody>
				</table>
			</div>
		</div>
	</div> --}}
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

	$('#applicant-table').DataTable({
	  	"ordering":'true',
		"order": [0, 'desc'],
	    processing: true,
	    serverSide: true,

	    ajax: '{!! route('cashier/home.index') !!}',
	    columns: [
	    	  { data: 'id'},
	        { data: 'soa_no'}, //Get the latest of SOA NO
	        { data: 'applicant.applicant_company',},
	        { data: 'applicant.address',}, 	
	         {

				//"data": "latest_assessment.status", // can be null or undefined
				"defaultContent": "<span class='label label-warning'>Pending </span>"		
			},

	        { data: 'action', name: 'action', orderable: false, searchable: false },
	    ]
		  });
	  });
</script>

{{-- 
<script>
  var count_particles, stats, update;
  stats = new Stats;
  stats.setMode(0);
  stats.domElement.style.position = 'absolute';
  stats.domElement.style.left = '0px';
  stats.domElement.style.top = '0px';
  document.body.appendChild(stats.domElement);
  count_particles = document.querySelector('.js-count-particles');
  update = function() {
    stats.begin();
    stats.end();
    if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
      count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
    }
    requestAnimationFrame(update);
  };
  requestAnimationFrame(update);
</script>
 --}}
@endpush