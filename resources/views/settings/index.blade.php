@extends('layouts.app')
@section('content')

<div id="content" class="content content-full-width">

<div class="profile">
<div class="profile-header">

<div class="profile-header-cover"  id="particles-js"></div>
  <form method="POST" action="{{ route('settings') }}" enctype="multipart/form-data">
   @csrf
   {{ method_field('PATCH') }}
<div class="profile-header-content" id="particles-js">
@if (auth()->user()->avatar)
<div class="profile-header-img" >
  @if (auth()->user()->isAccessor() || auth()->user()->isAccounting() || auth()->user()->isChiefEngineer() || auth()->user()->isAdmin())
      <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="" style="height: 100%" style="width: 100%">
  @elseif (auth()->user()->isCashier())
     <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="" style="height: 100%" style="width: 100%">
  @elseif (auth()->user()->avatar)
    <img src="{{ auth()->user()->avatar }}" align="" style="height: 100%; widows: 100%;">
  @endif
</div>
@else
   <div class="profile-header-img" >
      <img src="{{ asset('img/user.png') }}" alt="" style="height: 100%" style="width: 100%">
   </div>
@endif
<div class="profile-header-info" >
<h4 class="mt-0 mb-1">{{ auth()->user()->name }}</h4>
<p class="mb-2">{{ auth()->user()->role->name }}</p>
<input type="file" name="avatar" class="btn btn-xs">
</div>
</div>
<ul class="profile-header-tab nav nav-tabs" style="background: #f0f8ff21">
<li class="nav-item"><a class="nav-link active" data-toggle="tab" style="color: #fff;">Profile</a></li>
<li class="nav-item"><a  class="nav-link" data-toggle="tab">&nbsp;</a></li>
<li class="nav-item"><a class="nav-link" data-toggle="tab">&nbsp;</a></li>
<li class="nav-item"><a  class="nav-link" data-toggle="tab">&nbsp;</a></li>
<li class="nav-item"><a  class="nav-link" data-toggle="tab">&nbsp;</a></li>
</ul>
</div>
</div>
<div class="profile-content">
<div class="tab-content p-0">
<div class="tab-pane fade show active" id="profile-post">
 <div class="panel panel-default">
      <div class="panel-heading">
         <h4 class="panel-title">Settings </h4>
         <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-gray" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
         </div>
      </div>
      <div class="panel-body">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
               <label >Name:</label>
               <input type="text" name="name" class="form-control " value="{{ auth()->user()->name }}">
               @if ($errors->has('name'))
               <span class="help-block">
               <strong>{{ $errors->first('name') }}</strong>
               </span>
               @endif
            </div>
            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
               <label >Username:</label>
               <input type="text" name="username" class="form-control " value="{{ auth()->user()->username }}">
               @if ($errors->has('username'))
               <span class="help-block">
               <strong>{{ $errors->first('username') }}</strong>
               </span>
               @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
               <label >Password:</label>
               <input type="password" name="password" class="form-control " value=""  placeholder="Enter Password">
               @if ($errors->has('password'))
               <span class="help-block" >
               <strong style="color: red;" >{{ $errors->first('password') }}</strong>
               </span>
               @endif
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
               <label for="password_confirmation" >Password Confirmation</label>
               <input type="password" class="form-control " id="password_confirmation" name="password_confirmation" placeholder="Enter Confirmation Password">
               @if ($errors->has('password_confirmation'))
               <span class="help-block">
               <strong>{{ $errors->first('password_confirmation') }}</strong>
               </span>
               @endif
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-primary">Update</button>
            </div>
         </form>
</div>
</div>
</div>
</div>
</div>

 
@endsection

@push('scripts')
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


@endpush