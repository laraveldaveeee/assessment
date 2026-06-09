@inject('stats','App\Stats') 
<!-- begin #page-container -->
<div id="page-container" >
<!-- begin #header -->
<div id="header" class="header navbar-inverse" style="background: #002546"> <!-- 117A65 Green--> 
   <!-- begin navbar-header -->
   <div class="navbar-header">
      <a href="#" class="navbar-brand"><span></span> <img src="{{ asset('img/ntc.png') }}"> &nbsp; <b>NTC - Assessment Management</b> &nbsp; System</a>
      <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
   </div>
   <!-- end navbar-header -->
   <!-- begin header-nav -->
   <ul class="navbar-nav navbar-right">
     {{--  <li class="navbar-form">
         <form action="" method="POST" name="search">
            <div class="form-group">
               <input type="text" class="form-control" placeholder="Search..." />
               <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
            </div>
         </form>
      </li> --}}
      <li class="dropdown">
         <div class="dropdown-menu media-list dropdown-menu-right">
          <div class="panel-body bg-light">
            <div class="notification" data-scrollbar="true" data-height="200px">
            <div class="dropdown-header">
   
            </div>
         </li>
      <li class="dropdown navbar-user">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown">
         @if (auth()->user()->isAccessor())
           <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="" style="height: 100%" style="width: 100%">
           <span class="d-none d-md-inline">{{ auth()->user()->name }}</span> <b class="caret"></b>
           @elseif (auth()->user()->isCashier())
           <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="" style="height: 100%" style="width: 100%">
           <span class="d-none d-md-inline">{{ auth()->user()->name }}</span> <b class="caret"></b>
         @elseif (auth()->user()->avatar)
             <img src="{{ auth()->user()->avatar }}" alt="" style="height: 100%" style="width: 100%">
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