@extends('Users.Layout.auth')
@section('title') Login @endsection
@section('content')
    <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out" data-aos-anchor-placement="top-bottom">
      <div class="aos-item__inner">
        <div class="container">
          <div class="content">
            <form class="d-flex-centered" action="{{ route('register.attempt') }}" method="POST">
              <div class="card login-form">
                <div class="container-header text-center mt-4">
                  <div class="subtitle"><span>Register</span></div>
                </div>
                <div class="container pt-4 pb-4">
                    <span>Name</span>
                  <div class="form-group">
                    <fieldset>
                        @csrf
                      <input type="text" id="name" placeholder="Enter your name" name="name" value="{{ old('name') }}" autofocus="autofocus"/>
                      @error('name')
                          <small style="color: red; font-size: 13px">{{ $message }}</small>
                      @enderror
                    </fieldset>
                  </div>
                  <span>Role</span>
                  <div class="form-group">
                    <fieldset>
                      <input type="text" id="Role" placeholder="Enter your role" name="role" value="{{old('role')}}"/>
                      @error('role')
                          <small style="color: red; font-size: 13px">{{ $message }}</small>
                      @enderror
                    </fieldset>
                  </div>
                  <span>Jurisdiction</span>
                  <div class="form-group">
                    <fieldset>
                      <input type="text" id="Jurisdiction" placeholder="Enter your jurisdiction" name="jurisdiction" value="{{old('jurisdiction')}}"/>
                      @error('jurisdiction')
                          <small style="color: red; font-size: 13px">{{ $message }}</small>
                      @enderror
                    </fieldset>
                  </div>
                    <span>E-mail</span>
                  <div class="form-group">
                    <fieldset>
                      <input type="text" id="login" placeholder="Enter your email" name="email" value="{{ old('email') }}"/>
                      @error('email')
                          <small style="color: red; font-size: 13px">{{ $message }}</small>
                      @enderror
                    </fieldset>
                  </div>
                  <span>Phone Number</span>
                  <div class="form-group">
                    <fieldset>
                      <input type="text" id="Phone number" placeholder="Enter your phone number" name="phone_number" value="{{old('phone_number')}}"/>
                      @error('phone_number')
                          <small style="color: red; font-size: 13px">{{ $message }}</small>
                      @enderror
                    </fieldset>
                  </div>
                  <span>Password</span>
                  <div class="form-group">
                    <fieldset>
                      <input type="password" id="password" placeholder="Enter your password" name="password" />
                      @error('password')
                          <small style="color: red; font-size: 13px">{{ $message }}</small>
                      @enderror
                    </fieldset>
                  </div>
                  <span>Confirm Password</span>
                  <div class="form-group">
                    <fieldset>
                      <input type="password" id="Password confirmation" name="password_confirmation" placeholder="Confirm your password"/>
                      @error('password_confirmation')
                          <small style="color: red; font-size: 13px">{{ $message }}</small>
                      @enderror
                    </fieldset>
                  </div>
                  <div class="form-button mt-4"><button type="submit" class="btn btn-lg btn-primary">Register</button>
                  </div>
                  <div class="text text-gray d-flex-centered mt-4">
                    <p>Already a member? <a class="text-dark" href="{{ route('login') }}">Login Now</a> </p>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
