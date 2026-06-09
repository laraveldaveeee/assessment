@extends('layouts.master')
@section('content')
 
 
    <div class="graphic-section">
        <div class="graphic-bg"></div>
        <div class="graphic-overlay"></div>
        <div class="graphic-content">
            <h1>SOA/OP Management System</h1>
            <p>Released on November 27, 2020.</p>
            
            <div class="features">
                <div class="feature">
                    <span>National Telecommunication Commission Region III</span>
                </div>
                 
            </div>
        </div>
    </div>
    
    <div class="login-section">
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>
        
        <div class="login-container">
            <div class="logo">
                <!-- Replace with your logo -->
               
            </div>
            
            <div class="login-header">
                <h2>Sign In</h2>
                <p>Enter your credentials to access your account</p>
            </div>
            
            <form method="POST" action="{{ route('login') }}">
            @csrf
                <div class="form-group  @error('username') is-invalid @enderror">
                    <label for="username">Username</label>
                    <div class="input-field">
                        <input type="text" id="" name="username" placeholder="Enter Username" >
                        <i class="fas fa-envelope"></i>
                    </div>

                @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror

                </div>
                
                <div class="form-group @error('password') is-invalid @enderror">
                    <label for="password">Password</label>
                    <div class="input-field">
                        <input type="password" id="password" name="password" placeholder="Enter Password" >
                        <i class="fas fa-lock"></i>
                    </div>
                      @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: red;">{{ $message }}</strong>
                </span>
                @enderror
                </div>
                
               
                <button type="submit" class="login-btn">Sign In</button>
                 
            </form>
        </div>
    </div>


{{--      <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
         <form method="POST" action="{{ route('login') }}">
            @csrf
            <h2 class="title">Login</h2>
            <div class="input-field">
              <i class="fas fa-user @error('username') is-invalid @enderror"></i>
              <input type="text" name="username" placeholder="Username" />
            </div>
            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: red;">{{ $message }}</strong>
                </span>
            @enderror
            <div class="input-field @error('username') is-invalid @enderror">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" />
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong style="color: red;">{{ $message }}</strong>
                </span>
            @enderror
           <button type="submit" class="btn btn-primary">Login</button>
          </form>
       
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h1>Assessment SOA Management System</h1>
            <p>Released Nov 27, 2020</p>

         
          </div>
          <img src="img/ntc.png" class="image" alt=""  />

        </div>
       
      </div>
    </div> --}}
@endsection
 