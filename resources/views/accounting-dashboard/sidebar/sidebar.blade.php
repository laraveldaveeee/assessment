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
					<li class="has-sub {{ Request::is('accounting/home') ? 'active' : '' }}">
						<a href="/accounting/home">
							<b class="caret"></b>
							<div class="icon-img">
								<i class="fa fa-file"></i>
							</div>
							<span>Pending</span>
						</a>
						<ul class="sub-menu">
							<li class="{{ Request::is('accounting/home') ? 'active' : '' }}  "><a href="/accounting/home">Pending</a></li>
						</ul>
					</li>

					<li class="has-sub {{ Request::is('accounting') ? 'active' : '' }}"  style="border-bottom: 1px solid #46505a;
    border-top: 1px solid #46505a;">
						<a href="javascript:;">
							<b class="caret"></b>
							<div class="icon-img">
				 				<i class="fa fa-users"></i>
							</div>
							<span>Accounting Account</span>
						</a>
						<ul class="sub-menu">
							<li class="{{ Request::is('accounting') ? 'active' : '' }}"><a href="/accounting">Accounting lists</a></li>
						</ul>
					</li>

					 
{{-- 					 <li class="has-sub {{ Request::is('applicants') ? 'active' : '' }} " style="border-bottom: 1px solid #46505a;
    border-top: 1px solid #46505a;">
						<a href="javascript:;">
							<b class="caret"></b>
							<div class="icon-img">
								<img src="{{ asset('img/applicant.png') }}" alt="" />
							</div>
							<span>Application</span>
						</a>
						<ul class="sub-menu">
							<li class="{{ Request::is('applicants') ? 'active' : '' }}  "><a href="#">Applicant lists</a></li>
						</ul>
					</li> --}}
  
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