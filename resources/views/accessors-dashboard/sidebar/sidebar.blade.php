 <div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image">
								<img src="{{ Storage::url(auth()->user()->avatar) }}" alt="" style="height: 100%" style="width: 100%">	
							</div>
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
				{{-- 	<li class="has-sub">
						<a href="/accessor/home">
							<div class="icon-img">
								<img src="{{ asset('img/home.png') }}" alt="" />
							</div>
							<span>Home</span>
						</a>
					</li> --}}
						 <li class="has-sub {{ Request::is('applicants') ? 'active' : '' }} {{ Request::is('soa-or-details') ? 'active' : '' }} " style="border-bottom: 1px solid #46505a; border-top: 1px solid #46505a;">
						<a href="javascript:;">
							<b class="caret"></b>
							<div class="icon-img">
								<img src="{{ asset('img/applicant.png') }}" alt="" />
							</div>
							<span>Application</span>
						</a>
						<ul class="sub-menu">
							{{--  <li class="{{ Request::is('create/applicant') ? 'active' : '' }}"><a href="/create/applicant">Add Applicant</a></li> --}}
							<li class="{{ Request::is('applicants') ? 'active' : '' }}  "><a href="/applicants">Applicant lists</a></li>
							 <li class="{{ Request::is('soa-or-details') ? 'active' : '' }}   "><a href="/soa-or-details">Soa and OR #</a></li>  
						</ul>
					</li>

  <li class="has-sub {{ Request::is('carriers') ? 'active' : '' }} {{ Request::is('new-carrier') ? 'active' : '' }} {{ Request::is('filter-new-carrier') ? 'active' : '' }} {{ Request::is('carrier-lists') ? 'active' : '' }} " style="border-bottom: 1px solid #46505a;
            border-top: 1px solid #46505a;">
            <a href="javascript:;">
               <b class="caret"></b>
               <div class="icon-img">
                  <img src="{{ asset('img/applicant.png') }}" alt="" />
               </div>
               <span>Carrier</span>
            </a>
            <ul class="sub-menu">
             {{--   <li class="{{ Request::is('create/applicant') ? 'active' : '' }}  "><a href="/create/applicant">Add Applicant</a></li> --}}
               {{-- <li class="{{ Request::is('carriers') ? 'active' : '' }} "><a href="/carriers">Add Carrier</a></li> --}}
               <li class="{{ Request::is('carriers') ? 'active' : '' }} "><a href="/carriers">Add Carrier</a></li>
               <li class="{{ Request::is('carrier-lists') ? 'active' : '' }} "><a href="/carrier-lists">Carriers</a></li>
               <li class="{{ Request::is('new-carrier') ? 'active' : '' }} "><a href="/new-carrier">New Carrier</a></li>
               <li class="{{ Request::is('filter-new-carrier') ? 'active' : '' }} "><a href="/filter-new-carrier">Filter Carrier</a></li>
            </ul>
         </li>


				<li class="has-sub {{ Request::is('accessors') ? 'active' : '' }}"  style="border-bottom: 1px solid #46505a;
    border-top: 1px solid #46505a;">
						<a href="javascript:;">
							<b class="caret"></b>
							<div class="icon-img">
								<img src="{{ asset('img/user.png') }}" alt="" />
							</div>
							<span>Assessor Account</span>
						</a>
						<ul class="sub-menu">
							<li class="{{ Request::is('accessors') ? 'active' : '' }}"><a href="/accessors">Assessor lists</a></li>
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