@extends('layouts.app')

@section('content')
 <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/contact_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/styles/contact_responsive.css')}}">


            <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding: 20px; border-radius: 25px">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Sign In</div>

                        <form action="{{route('login')}}" id="contact_form" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-5 control-label">Email or Phone</label>
                                <div class="col-sm-10">
                                  <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                   @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-5 control-label">Password</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                     @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-info">Login</button>
                                </div>
                            </div>
                        </form>
                        <br>
                        <a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                        <br><br>
                        <button type="submit" class="btn btn-primary btn-block">
                        <i class="fab fa-facebook-f"> </i> Login with facebook</button>
                        <br><button type="submit" class="btn btn-danger btn-block"><i class="fab fa-google"> </i> Login with Google</button>

                    </div>
                </div>

                <div class="col-lg-5 offset-lg-1" style="border: 1px solid grey; padding: 20px; border-radius: 25px">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Sign Up</div>

                        <form action="{{ route('register') }}" id="contact_form" method="post">
                            @csrf
                             <div class="form-group">
                                <label for="inputEmail3" class="col-sm-5 control-label">Full Name</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Enter your full Name" name="name" required="" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-5 control-label">Phone</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Enter your Phone" required="" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-5 control-label">Email</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your Email" required="" >
                              </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-5 control-label">Password</label>
                                <div class="col-sm-5">
                                  <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your Password" name="password" required="" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-5 control-label">Confirm Password</label>
                                <div class="col-sm-5">
                                  <input type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Retype your Password" name="password_condirmation" required="" >
                                </div>
                            </div>
                            <div class="contact_form_button">
                                <div class="col-sm-5">
                                    <button type="submit" class="btn btn-info">Sign Up</button>
                                </div>
                                <br><br>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>
@endsection
