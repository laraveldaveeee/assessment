<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image">
								<img src="{{ Storage::url(auth()->user()->avatar) }}" alt="" />
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
					<li class="has-sub {{ Request::is('chief-engineer/home') ? 'active' : '' }}">
						<a href="/chief-engineer/home">
							 
							<div class="icon-img">
								<img src="{{ asset('img/home.png') }}" alt="" />

							</div>

							<span>Home </span>

						</a>

						 
					</li>

					<li class="has-sub {{ Request::is('chief-engineers') ? 'active' : '' }} "  style="border-bottom: 1px solid #46505a;
    border-top: 1px solid #46505a;">
						<a href="javascript:;">
							<b class="caret"></b>
							<div class="icon-img">
								<img src="{{ asset('img/engineer.png') }}" alt="" />
							</div>
							<span>Chief Engineer</span>
						</a>
						<ul class="sub-menu">
							<li class="{{ Request::is('chief-engineers') ? 'active' : '' }}"><a href="/chief-engineers">Chief Engineer lists</a></li>
						</ul>
					</li>

					<li class="has-sub {{ Request::is('pending-applicants') ? 'active' : '' }} "  style="border-bottom: 1px solid #46505a;
    border-top: 1px solid #46505a;">
						<a href="javascript:;">
							<b class="caret"></b>
							<div class="icon-img">
								<img src="{{ asset('img/applicant.png') }}" alt="" />
							</div>
							<span>Applicant list</span>
						</a>
						<ul class="sub-menu">
							<li class="{{ Request::is('applicant-list') ? 'active' : '' }}"><a href="/applicant-list">Pending Applicant lists</a></li>
						</ul>
					</li>

 					 
{{-- 

					 
					 <li class="has-sub {{ Request::is('applicants') ? 'active' : '' }} " style="border-bottom: 1px solid #46505a;
    border-top: 1px solid #46505a;">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-file"></i>
							<span>Application</span>
						</a>
						<ul class="sub-menu">
							<li class="{{ Request::is('applicants') ? 'active' : '' }}  "><a href="/applicants">Applicant lists</a></li>
						</ul>
					</li>
 --}}

  
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