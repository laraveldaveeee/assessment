@extends('layouts.app')

@section('content')

<div id="content" class="content">
				<!-- begin breadcrumb -->
				<ol class="breadcrumb float-xl-right">
					<li class="breadcrumb-item"><a href="/home">Home</a></li>
					 
				</ol>
				<!-- end breadcrumb -->
				<!-- begin page-header -->
				<h1 class="page-header">Edit Administrator </h1>
				<!-- end page-header -->
				<!-- begin panel -->
				<div class="panel panel-inverse">
					<div class="panel-heading">
						<h4 class="panel-title">Edit Administrator</h4>
						<div class="panel-heading-btn">
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
							<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
						</div>
					</div>
					<div class="panel-body">

						<form method="POST" action="{{ route('administrators.update', $administrator) }}">

							@csrf

							{{ method_field('PATCH') }}

							<div class="form-group">
								<label>Name</label>
								<input type="text" class="form-control" name="name" value="{{ $administrator->name }}">
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" name="username" value="{{ $administrator->username }}">
							</div>

									    
		                 <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		                    <label for="password">Password</label>
		                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
		                    @if ($errors->has('password'))
		                            <span class="help-block">
		                                <strong style="color: red;">{{ $errors->first('password') }}</strong>
		                            </span>
		                        @endif
		                    </div>

							 <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
			                    <label for="password_confirmation">Password Confirmation</label>
			                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Confirm Password">
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
							
						</form>

					</div>
				</div>
			</div>
		</div>
</div>



@endsection