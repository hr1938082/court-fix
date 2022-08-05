@extends('Users.Layout.auth')
@section('title')
    Login
@endsection
@section('content')
    <div class="aos-item" data-aos="fade-up" data-aos-duration="350" data-aos-delay="0" data-aos-easing="ease-out"
        data-aos-anchor-placement="top-bottom">
        <div class="aos-item__inner">
            <div class="container">
                <div class="content">
                    <form class="d-flex-centered" action="{{ route('login.attempt') }}" method="POST">
                        <div class="card login-form">
                            <div class="container-header text-center mt-4">
                                <div class="subtitle"><span>Login</span></div>
                            </div>
                            <div class="container pt-4 pb-4">
                                <span>E-mail</span>
                                <div class="form-group">
                                    <fieldset>
                                        @csrf
                                        <input type="text" id="login" placeholder="Enter your email" name="email"
                                            value="{{ old('email') }}" autofocus="autofocus" />
                                        @error('email')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </fieldset>
                                </div><span>Password</span>
                                <div class="form-group">
                                    <fieldset>
                                        <input type="password" id="password" placeholder="Enter your password" name="password" />
                                        @error('password')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </fieldset>
                                </div>
                                <div class="form-button mt-4">
                                    <button type="submit" class="btn btn-lg btn-primary">login</button>
                                </div>
                                <div class="text text-gray d-flex-centered mt-4">
                                    <p>Not a member yet? <a class="text-dark" href="{{ route('register') }}">Register Now</a> </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
