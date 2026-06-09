<div id="sidebar" class="sidebar">
   <!-- begin sidebar scrollbar -->
   <div data-scrollbar="true" data-height="100%">
      <!-- begin sidebar user -->
      <ul class="nav">
         <li class="nav-profile">
            <a href="javascript:;" data-toggle="nav-profile">
               <div class="cover with-shadow"></div>
               
               @if (auth()->user()->avatar)
                  <div class="image">
                     <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="" /> 
                  </div>
               @else
                  <div class="image">
                     <img src="{{ asset('img/default.jpg') }}" alt="" /> 
                  </div>
               @endif

               <div class="info">
                  {{ auth()->user()->name }}
                  <small>{{ Auth::user()->role->name }}</small>
               </div>
            </a>
         </li>
      </ul>
      <!-- end sidebar user -->
      <!-- begin sidebar nav -->
      <ul class="nav">
         <li class="nav-header">Navigation</li>
         <li class="has-sub {{ Request::is('home') ? 'active' : '' }}">
            <a href="/home">
               <div class="icon-img">
                  <i class="fa fa-th-large"></i>
               </div>
               <span>Dashboard</span>
            </a>
         </li>
         <li class="has-sub {{ Request::is('administrators') ? 'active' : '' }}   {{ Request::is('processors') ? 'active' : '' }}  {{ Request::is('accessors') ? 'active' : '' }} {{ Request::is('cashiers') ? 'active' : '' }}  {{ Request::is('chief-engineers') ? 'active' : '' }}  {{ Request::is('accountings') ? 'active' : '' }}  {{ Request::is('admin-aide') ? 'active' : '' }} {{ Request::is('users') ? 'active' : '' }}  {{ Request::is('employees') ? 'active' : '' }} "  style="border-bottom: 1px solid #46505a;
            border-top: 1px solid #46505a;">
            <a href="javascript:;">
               <b class="caret"></b>
               <div class="icon-img">
               {{--    <img src="{{ asset('img/app.png') }}" alt="" class="round bg-inverse" /> --}}
               <i class="fa fa-users"></i>
               </div>
               <span>Users</span>
            </a>
            <ul class="sub-menu">
               <li class="{{ Request::is('administrators') ? 'active' : '' }}"><a href="{{ route('administrators') }}">Administrator lists</a></li>
               <li class="{{ Request::is('chief-engineers') ? 'active' : '' }}"><a href="{{ route('chief-engineers') }}">Chief Engineer lists</a></li>
               <li class="{{ Request::is('accessors') ? 'active' : '' }}"><a href="{{ route('accessors') }}">Assessor lists</a></li>
               <li class="{{ Request::is('processors') ? 'active' : '' }}"><a href="{{ route('processors') }}">Processor lists</a></li>
               <li class="{{ Request::is('cashiers') ? 'active' : '' }}"><a href="{{ route('cashiers') }}">Cashier lists</a></li>
               <li class="{{ Request::is('accountings') ? 'active' : '' }}"><a href="{{ route('accountings') }}">Accounting lists</a></li>
               <li class="{{ Request::is('admin-aide') ? 'active' : '' }}"><a href="{{ url('admin-aide') }}">Admin Aide lists</a></li>
               <li class="{{ Request::is('users') ? 'active' : '' }}"><a href="{{ route('users') }}">User lists</a></li>
               <li class="{{ Request::is('employees') ? 'active' : '' }}"><a href="{{ route('employees') }}">Employees list</a></li>
            </ul>
         </li>
         <li class="has-sub {{ Request::is('services') ? 'active' : '' }} {{ Request::is('suf-rates') ? 'active' : '' }} {{ Request::is('service-with-fees') ? 'active' : '' }} " style="border-bottom: 1px solid #46505a;
            border-top: 1px solid #46505a;">
            <a href="javascript:;">
               <b class="caret"></b>
               <div class="icon-img">
                  <i class="fa fa-file"></i>
               </div>
               <span>Services</span>
            </a>
            <ul class="sub-menu">
               <li class="{{ Request::is('service-with-fees') ? 'active' : '' }}  "><a href="/service-with-fees">Service Fees</a></li>
              {{--  <li class="{{ Request::is('services') ? 'active' : '' }}  "><a href="/services">Services</a></li> --}}
               <li class="{{ Request::is('suf-rates') ? 'active' : '' }}  "><a href="/suf-rates">Suf Rates</a></li>
            </ul>
         </li>
         <li class="has-sub {{ Request::is('create/applicant') ? 'active' : '' }} {{ Request::is('soa-or-details') ? 'active' : '' }} {{ Request::is('applicants') ? 'active' : '' }} {{ Request::is('application-for-leavel') ? 'active' : '' }} {{ Request::is('assessments*') ? 'active' : '' }} " style="border-bottom: 1px solid #46505a;
            border-top: 1px solid #46505a;">
            <a href="javascript:;">
               <b class="caret"></b>
               <div class="icon-img">
                 <i class="fa fa-list"></i>
               </div>
               <span>Application</span>
            </a>
            <ul class="sub-menu">
             {{--   <li class="{{ Request::is('create/applicant') ? 'active' : '' }}  "><a href="/create/applicant">Add Applicant</a></li> --}}
               <li class="{{ Request::is('applicants') ? 'active' : '' }} {{ Request::is('assessments*') ? 'active' : '' }}  "><a href="/applicants">Applicant lists</a></li>  
               <li class="{{ Request::is('soa-or-details') ? 'active' : '' }}   "><a href="/soa-or-details">Soa and OR #</a></li>  
               <li class="{{ Request::is('application-for-leave') ? 'active' : '' }} {{ Request::is('application-for-leave*') ? 'active' : '' }}  "><a href="/application-for-leave">Application for leave</a></li>
            </ul>
         </li>

          <li class="has-sub {{ Request::is('carriers') ? 'active' : '' }} {{ Request::is('new-carrier') ? 'active' : '' }} {{ Request::is('filter-new-carrier') ? 'active' : '' }} {{ Request::is('carrier-lists') ? 'active' : '' }} " style="border-bottom: 1px solid #46505a;
            border-top: 1px solid #46505a;">
            <a href="javascript:;">
               <b class="caret"></b>
               <div class="icon-img">
                   <i class="fa fa-book"></i>
               </div>
               <span>Carrier</span>
            </a>
            <ul class="sub-menu">
             {{--   <li class="{{ Request::is('create/applicant') ? 'active' : '' }}  "><a href="/create/applicant">Add Applicant</a></li> --}}
               <li class="{{ Request::is('carriers') ? 'active' : '' }} "><a href="/carriers">Add Carrier</a></li>
               <li class="{{ Request::is('carrier-lists') ? 'active' : '' }} "><a href="/carrier-lists">Carriers</a></li>
               <li class="{{ Request::is('new-carrier') ? 'active' : '' }} "><a href="/new-carrier">New Carrier</a></li>
               <li class="{{ Request::is('filter-new-carrier') ? 'active' : '' }} "><a href="/filter-new-carrier">Filter Carrier</a></li>
            </ul>
         </li>

         <li class="has-sub {{ Request::is('logs-history') ? 'active' : '' }} " style="border-bottom: 1px solid #46505a;
            border-top: 1px solid #46505a;">
            <a href="javascript:;">
               <b class="caret"></b>
               <div class="icon-img">
             <i class="fa fa-cogs" aria-hidden="true"></i>

               </div>
               <span>Logs History</span>
            </a>
            <ul class="sub-menu">
               <li class="{{ Request::is('logs-history') ? 'active' : '' }}  "><a href="/logs-history">Logs History</a></li>
            </ul>
         </li>
{{-- 
            <li class="has-sub {{ Request::is('processing/roc') ? 'active' : '' }} " style="border-bottom: 1px solid #46505a;
               border-top: 1px solid #46505a;">
               <a href="javascript:;">
                  <b class="caret"></b>
                  <div class="icon-img">
                     <i class="fa fa-bar-chart"></i>
                  </div>
                  <span>Processing</span>
               </a>
               <ul class="sub-menu">
                  <li class="{{ Request::is('processing/roc') ? 'active' : '' }}  "><a href="/processing/roc">Roc</a></li>
               </ul>
            </li>
 --}}
         <li class="has-sub {{ Request::is('licensing-processing') ? 'active' : '' }} {{ Request::is('processors-licensing') ? 'active' : '' }} {{ Request::is('licensing-release') ? 'active' : '' }} " style="border-bottom: 1px solid #46505a;
            border-top: 1px solid #46505a;">
            <a href="javascript:;">
               <b class="caret"></b>
               <div class="icon-img">
                  <i class="fa fa-file"></i>
               </div>
               <span>Licensing</span>
            </a>
            <ul class="sub-menu">
               <li class="{{ Request::is('licensing-processing') ? 'active' : '' }}  "><a href="/licensing-processing">Licensing Processing</a></li>
               <li class="{{ Request::is('licensing-release') ? 'active' : '' }}  "><a href="/licensing-release">License For Release</a></li>
               <li class="{{ Request::is('processors-licensing') ? 'active' : '' }}  "><a href="/processors-licensing">Processors</a></li>
            </ul>
         </li>
         </li>
         <!-- begin sidebar minify button -->
         <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="ion-ios-arrow-back"></i> <span>Collapse</span></a></li>
         <!-- end sidebar minify button -->
      </ul>
      <!-- end sidebar nav -->
   </div>
   <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>