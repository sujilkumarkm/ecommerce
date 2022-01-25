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
                    </div>
                </div>

                <div class="col-lg-5" style="border: 1px solid grey; padding: 20px; border-radius: 25px">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Shipping Address</div>
                         <form action="{{ route('register') }}" id="contact_form" method="post">
                            @csrf
                           <div class="form-group">
                                <label for="inputEmail3" class="col-sm-5 control-label">Full Name</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Enter your full Name" name="name" required="" >
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>
@endsection
    