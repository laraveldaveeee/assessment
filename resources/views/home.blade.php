@extends('layouts.app')
@inject('stats','App\Stats') 
@section('content')
<div id="content" class="content content-full-width">
   <div class="profile">
      <div class="profile-header">
         <div class="profile-header-cover " id="particles-js"></div>
         <div class="profile-header-content ">
            @if (auth()->user()->avatar)
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
         <ul class="profile-header-tab nav nav-tabs" style="background: #4e5c6869" id="hero">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" style="color: #fff;">&nbsp;<small>I am a FullStack Web Developer. At your service. :) </small> <span class="typed"></span>
               </a>
            </li>
            <li class="nav-item"><a  class="nav-link" data-toggle="tab">&nbsp;</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab">&nbsp;</a></li>
            <li class="nav-item"><a  class="nav-link" data-toggle="tab">&nbsp;</a></li>
            <li class="nav-item"><a  class="nav-link" data-toggle="tab">&nbsp;</a></li>
         </ul>
      </div>
   </div>
</div>
<div id="content" class="content">
<!-- begin breadcrumb -->
 
<div class="row">
<div class="col-xl-6">
   <div class="card border-0 mb-3 overflow-hidden bg-inverse text-white">
      <div class="card-body">
         <div class="row">
            <div class="col-xl-7 col-lg-8">
               <div class="mb-3 text-grey">
                  <b>TOTAL USERS</b>
                  <span class="ml-2">
                  <i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Total sales" data-placement="top" data-content="Net sales (gross sales minus discounts and returns) plus taxes and shipping. Includes orders from all sales channels."></i>
                  </span>
               </div>
               <div class="d-flex mb-1">
                  <h2 class="mb-0"><span data-animation="number" data-value="{{ $stats->totalUsers() }}">0.00</span></h2>
                  <div class="ml-auto mt-n1 mb-n1">
                     <div id="total-sales-sparkline"></div>
                  </div>
               </div>
               <div class="mb-3 text-grey">
                  {{-- <i class="fa fa-caret-up"></i> <span data-animation="number" data-value="33.21">0.00</span>% compare to last week --}}
                  <div>&nbsp;</div>
               </div>
               <hr class="bg-white-transparent-2" />
               <div class="row text-truncate">
                  <div class="col-6">
                     <div class="f-s-12 text-grey">Total Services</div>
                     <div class="f-s-18 m-b-5 f-w-600 p-b-1" data-animation="number" data-value="{{ $stats->totalServices() }}">0</div>
                     <div class="progress progress-xs rounded-lg bg-dark-darker m-b-5">
                        <div class="progress-bar progress-bar-striped rounded-right bg-teal" data-animation="width" data-value="55%" style="width: 0%"></div>
                     </div>
                  </div>
                  <div class="col-6">
                     <div class="f-s-12 text-grey">Total Applicant</div>
                     <div class="f-s-18 m-b-5 f-w-600 p-b-1"><span data-animation="number" data-value="{{ $stats->totalApplicants() }}">0.00</span></div>
                     <div class="progress progress-xs rounded-lg bg-dark-darker m-b-5">
                        <div class="progress-bar progress-bar-striped rounded-right" data-animation="width" data-value="55%" style="width: 0%"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-5 col-lg-4 align-items-center d-flex justify-content-center">
               <img src="{{ asset('img/img-1.svg') }}" height="150px" class="d-none d-lg-block" />
            </div>
         </div>
      </div>

   </div>
   <div class="row">

<div class="col-xl-12 col-lg-6">

<div class="panel panel-inverse" data-sortable-id="index-4">
<div class="panel-heading">
<h4 class="panel-title">Registered Users</h4>
<span class="label bg-teal">24 new users</span>
</div>
   <ul class="registered-users-list">
   @foreach ($users as $user)
   <li>
   <a href="javascript:;"><img src="{{ Storage::url($user->avatar) }}" style="width: 50px;"  alt="" /></a>
      <h4 class="username text-ellipsis">
      {{ $user->name }}
      <small>{{ $user->role->label }}</small>
      </h4>
   </li>
   @endforeach
  {{--  <li>
   <a href="javascript:;"><img src="../assets/img/user/user-3.jpg" alt="" /></a>
   <h4 class="username text-ellipsis">
   Ancient Caviar
   <small>Korean</small>
   </h4>
   </li>
   <li>
   <a href="javascript:;"><img src="../assets/img/user/user-1.jpg" alt="" /></a>
   <h4 class="username text-ellipsis">
   Marble Lungs
   <small>Indian</small>
   </h4>
   </li>
   <li>
   <a href="javascript:;"><img src="../assets/img/user/user-8.jpg" alt="" /></a>
   <h4 class="username text-ellipsis">
   Blank Bloke
   <small>Japanese</small>
   </h4>
   </li>
   <li>
   <a href="javascript:;"><img src="../assets/img/user/user-2.jpg" alt="" /></a>
   <h4 class="username text-ellipsis">
   Hip Sculling
   <small>Cuban</small>
   </h4>
   </li>
   <li>
   <a href="javascript:;"><img src="../assets/img/user/user-6.jpg" alt="" /></a>
   <h4 class="username text-ellipsis">
   Flat Moon
   <small>Nepalese</small>
   </h4>
   </li>
   <li>
   <a href="javascript:;"><img src="../assets/img/user/user-4.jpg" alt="" /></a>
   <h4 class="username text-ellipsis">
   Packed Puffs
   <small>Malaysian</small>
   </h4>
   </li>
   <li>
   <a href="javascript:;"><img src="../assets/img/user/user-9.jpg" alt="" /></a>
   <h4 class="username text-ellipsis">
   Clay Hike
   <small>Swedish</small>
   </h4>
   </li> --}}
 
   </ul>
<div class="panel-footer text-center">
<a href="javascript:;" class="text-inverse">View All</a>
</div>
</div>

</div>

</div>

</div>
<div class="col-xl-6">

<div class="row">

<div class="col-sm-6">

<div class="card border-0 text-truncate mb-3 bg-dark text-white">

<div class="card-body">

<div class="mb-3 text-grey">
<b class="mb-3">TOTAL ASSESSMENTS</b>
<span class="ml-2"><i class="fa fa-info-circle" data-toggle="popover" data-trigger="hover" data-title="Conversion Rate" data-placement="top" data-content="Percentage of sessions that resulted in orders from total number of sessions." data-original-title="" title=""></i></span>
</div>
<div class="d-flex align-items-center mb-1">
<h2 class="text-white mb-0"><span data-animation="number" data-value="{{ $stats->totalAssessments() }}">0.00</span></h2>
<div class="ml-auto">
<div id="conversion-rate-sparkline"></div>
</div>
</div>
<div class="mb-4 text-grey">
</div>

<div class="d-flex mb-2">
<div class="d-flex align-items-center">
<i class="fa fa-circle text-red f-s-8 mr-2"></i>
TOTAL ASSESSMENT SERVICES
</div>
<div class="d-flex align-items-center ml-auto">
<div class="width-50 text-right pl-2 f-w-600"><span data-animation="number" data-value="{{ $stats->assessmentServices() }}">0.00</span></div>
</div>
</div>


<div class="d-flex mb-2">
<div class="d-flex align-items-center">
<i class="fa fa-circle text-warning f-s-8 mr-2"></i>
TOTAL FEES
</div>
<div class="d-flex align-items-center ml-auto">

<div class="width-50 text-right pl-2 f-w-600"><span data-animation="number" data-value="{{ $stats->totalFees() }}">0.00</span></div>
</div>
</div>


<div class="d-flex">
<div class="d-flex align-items-center">
<i class="fa fa-circle text-lime f-s-8 mr-2"></i>
TOTAL SERVICE FEES
</div>
<div class="d-flex align-items-center ml-auto">
<div class="width-50 text-right pl-2 f-w-600"><span data-animation="number" data-value="{{ $stats->totalServiceFees() }}">0.00</span></div>
</div>
</div>
<div class="d-flex">
<div class="d-flex align-items-center">
<i class="fa fa-circle text-lime f-s-8 mr-2"></i>
TOTAL CARRIERS
</div>
<div class="d-flex align-items-center ml-auto">
<div class="width-50 text-right pl-2 f-w-600"><span data-animation="number" data-value="0">0.00</span></div>
</div>
</div>

</div>


</div>


</div>


</div>
</div>
<!-- end breadcrumb -->
<!-- begin page-header -->

<!-- begin col-3 -->
{{--    <div class="col-xl-3 col-md-6">
      
      <div class="panel panel-inverse" data-sortable-id="index-10">
      <div class="panel-heading">
      <h4 class="panel-title">Calendar</h4>
      <div class="panel-heading-btn">
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
      <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
      </div>
      </div>
      <div class="panel-body">
      <div id="datepicker-inline" class="datepicker-full-width overflow-y-scroll position-relative"><div></div></div>
      </div>
      </div>

      </div>
   </div> --}}

 

<!-- end col-3 -->
<!-- begin col-3 -->
{{--    <div class="col-xl-3 col-md-6">
      <div class="widget widget-stats bg-inverse">
         <div class="stats-icon">
            <div class="icon-img">
               <img src="{{ asset('img/applicant.png') }}" alt="" />
            </div>
         </div>
         <div class="stats-info">
            <h4>TOTAL APPLICANTS COMPANY</h4>
            <p><span data-animation="number" data-value="{{ $stats->totalApplicants() }}">0.00</span></p>
         </div>
         <div class="stats-link">
            <a href="/applicants">View Detail</i></a>
         </div>
      </div>
   </div>
   <div class="col-xl-3 col-md-6">
      <div class="widget widget-stats bg-danger">
         <div class="stats-icon">
            <div class="icon-img">
               <img src="{{ asset('img/case.png') }}" alt="" />
            </div>
         </div>
         <div class="stats-info">
            <h4>TOTAL SERVICES</h4>
            <p>{{ $stats->totalServices() }}</p>
         </div>
         <div class="stats-link">
            <a href="/service-with-fees">View Detail</i></a>
         </div>
      </div>
   </div>
   <div class="col-xl-3 col-md-6">
      <div class="widget widget-stats bg-danger">
         <div class="stats-icon">
            <div class="icon-img">
               <img src="{{ asset('img/files.png') }}" alt="" style="width: 52px;">
            </div>
         </div>
         <div class="stats-info">
            <h4>TOTAL LICENSE</h4>
            <p>{{ $stats->totalLicenses() }}</p>
         </div>
         <div class="stats-link">
            <a href="#">View Detail</i></a>
         </div>
      </div>
   </div> --}}

<!-- end #content -->


@endsection
{{-- @push('scripts')
<script type="text/javascript">
   new TypeIt("#hero", {
   speed: 50,
   startDelay: 900
   })
   .type("the mot versti", {delay: 100})
   .move(-8, {speed: 25, delay: 100})
   .type('s')
   .move('START')
   .move(1, {delay: 200})
   .delete(1)
   .type('T')
   .move(12, {delay: 200})
   .type('a', {delay: 250})
   .move('END')
   .type('le animated typing utlity')
   .move(-4)
   .type('i')
   .move('END')
   .type(' on the internet', {delay: 400})
   .delete(8, {delay: 600})
   .type('<em><strong>planet.</strong></em>');
   .go();
</script>
@endpush --}}