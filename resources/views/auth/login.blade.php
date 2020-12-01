@extends('layouts.master-without-nav')

@section('title') Login @endsection

@section('body')

<body>
    @endsection

    @section('content')
    
    <div class="form-body without-side">
        <div class="website-logo">
            <a href="index">
                <div class="logo">
                    <img class="logo-size" src="images/site-icon-white.png" alt="">
                </div>
            </a>
        </div>
        <div class="row">
            <div class="img-holder">
                <div class="bg"></div>
                <div class="info-holder">
                    <img src="images/graphic3.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Welcome Educate!!</h3>
                        <p>Sign in to continue to Educate Tutoring.</p>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" @if(old('email')) value="{{ old('email') }}" @else value="kameku01@gmail.com" @endif required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="maicon25" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            <div class="form-button">
                                <button id="login" type="submit" class="ibtn" {{ __('Login') }}>Login</button> <a href="{{ route('password.request') }}">Forget password?</a>
                            </div>
                        </form>
                        <br><br>
                        <div class="page-links">
                            <a href="register">Register new account</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="home-btn d-none d-sm-block">
        <a href="welcome" class="text-dark"><i class='bx bxs-left-arrow-square h1' style="color:#fff"></i></a>
    </div>
        <span class="colombia text">
            ©<script>document.write(new Date().getFullYear())</script> Educate Tutoring. Crafted with <i class="mdi mdi-heart text-primary"></i> by Kameku Creative and Nettic - Colombia
        </span>
    </div>
    
    <!-- JAVASCRIPT -->
    <script src="{{ URL::asset('libs/jquery/jquery.min.js')}}"></script>
    <script src="{{ URL::asset('libs/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('libs/metismenu/metismenu.min.js')}}"></script>
    <script src="{{ URL::asset('libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{ URL::asset('libs/node-waves/node-waves.min.js')}}"></script>

    <script src="{{ URL::asset('js/app.min.js')}}"></script>
    @endsection