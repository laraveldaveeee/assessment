@inject('stats','App\Stats') 
<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image">
								@if (auth()->user()->isCashier())
								 <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="" style="height: 100%" style="width: 100%">
								 @elseif (auth()->user()->avatar)
									<img src="{{ auth()->user()->avatar }}" alt="" />
								@endif
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
					<li class="has-sub {{ Request::is('cashier/home') ? 'active' : '' }} {{ Request::is('cashier/applicant-list') ? 'active' : '' }} {{ Request::is('cashier/*/applicant-assessments') ? 'active' : '' }} {{ Request::is('cashier/carrier-pendings') ? 'active' : '' }} {{ Request::is('cashier/carrier-list') ? 'active' : '' }}">	 
						<a href="javascript:;">
							<b class="caret"></b>
							<div class="icon-img">
								{{-- <img src="{{ asset('img/money-bag.png') }}" alt="" /> --}}
								<i class="fa fa-money"></i>
							</div>
							<span>Payment </span>
						</a>
						<ul class="sub-menu">
							<li class="{{ Request::is('cashier/home') ? 'active' : '' }} {{ Request::is('cashier/*/applicant-assessments') ? 'active' : '' }}"><a href="/cashier/home">Pending lists</a></li>
						{{-- 	<li class="{{ Request::is('cashier/carrier-pendings') ? 'active' : '' }} {{ Request::is('cashier/*/carrier-pendings') ? 'active' : '' }}"><a href="/cashier/carrier-pendings">Pending Carrier lists</a></li> --}}
							<li class="{{ Request::is('cashier/applicant-list') ? 'active' : '' }}"><a href="/cashier/applicant-list">Applicant lists</a></li>
						</ul>
					</li>

					<li class="has-sub {{ Request::is('cashier/home') ? 'in-active' : '' }} {{ Request::is('cashier/pendings') ? 'in-active' : '' }} {{ Request::is('cashier/applicant-list') ? 'active' : '' }} {{ Request::is('cashier/*/applicant-assessments') ? 'active' : '' }} {{ Request::is('cashier/carrier-pendings') ? 'active' : '' }} {{ Request::is('cashier/carrier-list') ? 'active' : '' }} {{ Request::is('cashier/*/carrier-pendings') ? 'active' : '' }}  {{ Request::is('cashier/new-carrier-lists') ? 'active' : '' }}   {{ Request::is('cashier/pendings') ? 'active' : '' }} {{ Request::is('cashier/*/pendings') ? 'active' : '' }}">	 
						<a href="javascript:;">
							<b class="caret"></b>
							<div class="icon-img">
								<i class="fa fa-file"></i>
							</div>
							<span>Carriers </span>
						</a>

						<ul class="sub-menu">
							<li class="{{ Request::is('cashier/carrier-pendings') ? 'active' : '' }} {{ Request::is('cashier/*/carrier-pendings') ? 'active' : '' }} "><a href="/cashier/carrier-pendings">Pending Carrier lists</a></li>
							<li class="{{ Request::is('/cashier/carrier-list') ? 'active' : '' }}"><a href="/cashier/carrier-list">Carrier lists</a></li>
							<li class="{{ Request::is('cashier/pendings') ? 'active' : '' }} {{ Request::is('cashier/*/pendings') ? 'active' : '' }} "><a href="/cashier/pendings">Pending New Carrier </a></li>
							<li class="{{ Request::is('cashier/new-carrier-lists') ? 'active' : '' }}  "><a href="/cashier/new-carrier-lists">New Carrier lists</a></li>
						</ul>
						 
					</li>

							<li class="has-sub {{ Request::is('pending-application-for-leave') ? 'active' : '' }} ">	 
						<a href="javascript:;">
							<b class="caret"></b>
							<div class="icon-img">
								<i class="fa fa-list"></i>
							</div>
							<span>Applications </span>
						</a>

						<ul class="sub-menu">
							<li class="{{ Request::is('pending-application-for-leave') ? 'active' : '' }} {{ Request::is('application-for-leave*') ? 'active' : '' }}  "><a href="/pending-application-for-leave">Pending Application</a></li>
							<li class="{{ Request::is('application-for-leave') ? 'active' : '' }} {{ Request::is('application-for-leave*') ? 'active' : '' }}  "><a href="/application-for-leave">Application for leave</a></li>
						</ul>
						 
					</li>


						{{-- 	<div class="icon-img">
								<img src="{{ asset('img/home.png') }}" alt="" />
							</div>
								<span class="label label-danger pull-right">{{ $stats->counts() }}</span>
							<span>Home</span>
						</a>
					</li> --}}

				<li class="has-sub {{ Request::is('cashiers') ? 'active' : '' }} {{ Request::is('users') ? 'active' : '' }} "  style="border-bottom: 1px solid #46505a;
    border-top: 1px solid #46505a;">
						<a href="javascript:;">
							<b class="caret"></b>
							<div class="icon-img">
								<i class="fa fa-users"></i>
							</div>
							<span>Cashier Account</span>
						</a>
						<ul class="sub-menu">
							{{-- <li class="{{ Request::is('users') ? 'active' : '' }}"><a href="/users">User lists</a></li> --}}
							<li class="{{ Request::is('cashiers') ? 'active' : '' }}"><a href="/cashiers">Cashier lists</a></li>
						</ul>
					</li>
					</li>				

					<li class="has-sub {{ Request::is('monthly-report') ? 'active' : '' }}" style="border-bottom: 1px solid #46505a; border-top: 1px solid #46505a;">
						<a href="javascript:;">
							<b class="caret"></b>
							<div class="icon-img">
								<i class="fa fa-bar-chart"></i>
							</div>
							<span>Reports</span>
						</a>
						<ul class="sub-menu">
							<li class="{{ Request::is('monthly-report') ? 'active' : '' }}"><a href="/monthly-report">Monthly Report</a></li>
							<li class="{{ Request::is('deposit-list') ? 'active' : '' }}"><a href="/deposit-list">Deposit lists</a></li>
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