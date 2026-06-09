@inject('stats','App\Stats') 
<!-- begin #page-container -->
<div id="page-container" >
<!-- begin #header -->
<div id="header" class="header navbar-inverse" style="background: linear-gradient(to right, #1D87CE  0%,  #1D87CE 100%)"> <!-- 117A65 Green--> 
   <!-- begin navbar-header -->
   <div class="navbar-header" >
      @if (auth()->user()->isAdmin())
      <a href="/home" class="navbar-brand"><span></span> <img src="{{ asset('img/ntc.png') }}"> &nbsp; <b>SOA-OP Management</b> &nbsp; System</a>
    @elseif (auth()->user()->isCashier())
      <a href="/cashier/home" class="navbar-brand"><span></span> <img src="{{ asset('img/ntc.png') }}"> &nbsp; <b>SOA-OP Management</b> &nbsp; System</a>
    @elseif (auth()->user()->isChiefEngineer())
      <a href="/chief-engineer/home" class="navbar-brand"><span></span> <img src="{{ asset('img/ntc.png') }}"> &nbsp; <b>SOA-OP Management</b> &nbsp; System</a>
    @elseif (auth()->user()->isAccounting())
      <a href="/accounting/home" class="navbar-brand"><span></span> <img src="{{ asset('img/ntc.png') }}"> &nbsp; <b>SOA-OP Management</b> &nbsp; System</a>
     @elseif (auth()->user()->isAccessor())
      <a href="/applicants" class="navbar-brand"><span></span> <img src="{{ asset('img/ntc.png') }}"> &nbsp; <b>SOA-OP Management</b> &nbsp; System</a>
     @elseif (auth()->user()->isAdminAide()) 
     <a href="#" class="navbar-brand"><span></span> <img src="{{ asset('img/ntc.png') }}"> &nbsp; <b>SOA-OP Management</b> &nbsp; System</a>
    @endif
      <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
   </div>
   <!-- end navbar-header -->
   <!-- begin header-nav -->
   <ul class="navbar-nav navbar-right"> 
{{--       @if (auth()->user()->isAdmin() || auth()->user()->isCashier() || auth()->user()->isAccounting() || auth()->user()->isAccessor() || auth()->user()->isChiefEngineer())
         <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle f-s-14">
            <i class="fa fa-bell"></i>
            <span class="label">
            @if (auth()->user()->isAdmin() || auth()->user()->isCashier() || auth()->user()->isAccounting() || auth()->user()->isAccessor() || auth()->user()->isChiefEngineer())
               {{ $stats->counts() }}
            @endif
            </span>
            </a>
               <div class="dropdown-menu media-list dropdown-menu-right">
                  <div class="panel-body bg-light">
                     <div class="notification" data-scrollbar="true" data-height="200px">
                     <div class="dropdown-header">
                        NOTIFICATIONS  
                        @if (auth()->user()->isAdmin() || auth()->user()->isCashier() || auth()->user()->isAccounting() || auth()->user()->isAccessor() || auth()->user()->isChiefEngineer())
                        {{ $stats->counts() }}
                        @endif
                     </div>
                     
                     @forelse  ($assessments as $assessment)
                        @if (auth()->user()->isAdmin() || auth()->user()->isAccessor())
                           <a href="/assessments/{{ $assessment->id }}" class="dropdown-item media">
                        @elseif (auth()->user()->isChiefEngineer())
                           <a href="/applicant/assessments/{{ $assessment->id }}" class="dropdown-item media">
                        @elseif (auth()->user()->isAccounting())
                           <a href="/accounting/{{ $assessment->id }}/applicant-assessments" class="dropdown-item media">
                        @elseif (auth()->user()->isCashier())
                           <a href="/cashier/{{ $assessment->id }}/applicant-assessments" class="dropdown-item media">
                        @endif
                        <div class="media-left" > 
                        </div>
                        <div class="media-body">
                           <h6 class="media-heading">
                              {{ substr(optional($assessment->applicant)->applicant_company, 0, 35)."..." }}
                           </h6>
                           <div class="text-muted f-s-10">{{ $assessment->created_at->diffForHumans() }}</div>
                        </div>
                     @empty
                     <p class="text-muted f-s-10" > &nbsp; No data available!</p>
                     @endforelse
                     </a>
                  </div>
                  <div class="dropdown-footer text-center">
                  <a href="/view-notifications">View more</a>
                  </div>
                </div>
            </li>
      @endif --}}
      <li class="dropdown navbar-user">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown">
         @if (auth()->user()->isAccessor())
           <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="" style="height: 100%" style="width: 100%">
           <span class="d-none d-md-inline">{{ auth()->user()->name }}</span> <b class="caret"></b>
           @elseif (auth()->user()->isCashier() || auth()->user()->isAccounting() || auth()->user()->isChiefEngineer())
           <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="" style="height: 100%" style="width: 100%">
           <span class="d-none d-md-inline">{{ auth()->user()->name }}</span> <b class="caret"></b>
         @elseif (auth()->user()->avatar)
             <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="" style="height: 100%" style="width: 100%">
         <span class="d-none d-md-inline">{{ auth()->user()->name }}</span> <b class="caret"></b>
         @else 
         <img src="{{ asset('img/user.png') }}" alt="" /> 
         <span class="d-none d-md-inline">{{ auth()->user()->name }}</span> <b class="caret"></b>
         @endif
         </a>
         <div class="dropdown-menu dropdown-menu-right">
            <a href="/settings" class="dropdown-item">Edit Profile</a>
            <div class="dropdown-divider"></div>
            <a href="/logout" onclick="event.preventDefault(); 
               document.getElementById('logout-form').submit();" class="dropdown-item">
               Logout
            </a>
            <form id="logout-form" action="/logout" method="POST" style="display: none;">
               {{ csrf_field() }}
            </form>
         </div>
      </li>
   </ul>
   <!-- end header-nav -->
</div>
<!-- end #header -->