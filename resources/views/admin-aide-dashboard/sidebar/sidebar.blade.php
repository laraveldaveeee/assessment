<div id="sidebar" class="sidebar">
   <!-- begin sidebar scrollbar -->
   <div data-scrollbar="true" data-height="100%">
      <!-- begin sidebar user -->
      <ul class="nav">
         <li class="nav-profile">
            <a href="javascript:;" data-toggle="nav-profile">
               <div class="cover with-shadow"></div>
               <div class="image">
                  <img src="{{ asset('img/user/user-13.jpg') }}" alt="" />
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
         <li class="has-sub {{ Request::is('admin-aide/home') ? 'active' : '' }}">
            <a href="/admin-aide/home">
               <div class="icon-img">
                  <img src="{{ asset('img/home.png') }}" alt="" />
               </div>
               <span>Dashboard</span>
            </a>
         </li>
         <li class="has-sub {{ Request::is('admin-aide') ? 'active' : '' }}  "  style="border-bottom: 1px solid #46505a;
            border-top: 1px solid #46505a;">
            <a href="javascript:;">
               <b class="caret"></b>
               <div class="icon-img">
                  <img src="{{ asset('img/app.png') }}" alt="" />
               </div>
               <span>Users</span>
            </a>
            <ul class="sub-menu">
               <li class="{{ Request::is('admin-aide') ? 'active' : '' }}"><a href="/admin-aide">Admin Aide lists</a></li>
            </ul>
         </li>
         <li class="has-sub {{ Request::is('licensing-processing') ? 'active' : '' }} {{ Request::is('processors-licensing') ? 'active' : '' }} {{ Request::is('licensing-release') ? 'active' : '' }} " style="border-bottom: 1px solid #46505a;
            border-top: 1px solid #46505a;">
            <a href="javascript:;">
               <b class="caret"></b>
               <div class="icon-img">
                  <img src="{{ asset('img/files.png') }}" alt="" />
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