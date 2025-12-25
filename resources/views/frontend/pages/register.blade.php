@extends('frontend.layouts.master')

@section('title','E-SHOP || Register Page')

@section('main-content')
	<!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
            
    <!-- Shop Login -->
    <section class="shop login section">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-6 offset-lg-3 col-12">
                    <div class="login-form">
                        <h2>Register</h2>
                        <p>Please register in order to checkout more quickly</p>
                        <!-- Form -->
                        <form class="form" method="post" action="{{route('register.submit')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Your Name<span>*</span></label>
                                        <input type="text" name="name" placeholder="" required="required" value="{{old('name')}}">
                                        @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Your Email<span>*</span></label>
                                        <input type="text" name="email" placeholder="" required="required" value="{{old('email')}}">
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Your Password<span>*</span></label>
                                        <input type="password" name="password" placeholder="" required="required" value="{{old('password')}}">
                                        @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Confirm Password<span>*</span></label>
                                        <input type="password" name="password_confirmation" placeholder="" required="required" value="{{old('password_confirmation')}}">
                                        @error('password_confirmation')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group login-btn social-login">
                                        <button class="btn" type="submit">Register</button>
                                        <a href="{{route('login.form')}}" class="btn">Login</a> 
                                        <span class="or-text">OR, CONTINUE WITH</span>   
                                        <a href="{{ route('login.redirect','google') }}" class="btn-google-modern">
                                            <img src="{{ asset('frontend/icons/google.svg') }}" alt="Google">
                                            <span></span>
                                        </a>
                                        <span class="or-text">OR</span> 
                                        <a href="{{ route('login.redirect','facebook') }}" class="btn-facebook-modern">
                                            <img src="{{ asset('frontend/icons/facebook.svg') }}" alt="Facebook">
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--/ End Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Login -->
@endsection

@push('styles')
<style>
    /* ================================
       BUTTON ROW
    ================================ */
    
    .shop.login .form .social-login {
        display: flex;              
        align-items: center;
        flex-wrap: wrap;
        gap: 12px;                 
    }   
    /* Remove legacy spacing */
    .shop.login .form .btn {
        margin-right: 0;
        border-radius: 4px !important;
    }  
    /* OR text */
    .social-login .or-text {
        font-size: 13px;
        color: #666;
        white-space: nowrap;
        line-height: 1;
    }  
    /* ================================
       GOOGLE BUTTON
    ================================ */
    
    .btn-google-modern {
        display: inline-flex;
        align-items: center;
        justify-content: center;
    
        height: 44px;
        width: 60px;                
        padding: 0;
    
        background: #fff;
        color: #3c4043;
    
        border: 1px solid #dadce0;
        border-radius: 4px;
    
        box-shadow: 0 1px 2px rgba(60,64,67,.15);
        text-decoration: none;
    
        transition: all 0.25s ease;
    } 
    .btn-google-modern img {
        width: 18px;
        height: 18px;
        display: block;
    }   
    .btn-google-modern:hover {
        background: #f8f9fa;
        box-shadow: 0 2px 6px rgba(60,64,67,.2);
        transform: translateY(-1px);
    }  
    /* ================================
       FACEBOOK BUTTON
    ================================ */
    
    .btn-facebook-modern {
        display: inline-flex;
        align-items: center;
        justify-content: center;
    
        height: 44px;
        width: 60px;                
        padding: 0;
    
        background: #1877F2;
        color: #fff;
    
        border: 1px solid #1877F2;
        border-radius: 4px;
    
        box-shadow: 0 1px 2px rgba(60,64,67,.15);
        text-decoration: none;
    
        transition: all 0.25s ease;
    }    
    .btn-facebook-modern img {
        width: 18px;
        height: 18px;
        display: block;
    }    
    .btn-facebook-modern:hover {
        background: #3f5c9c;
        box-shadow: 0 2px 6px rgba(60,64,67,.2);
        transform: translateY(-1px);
    }
</style>
@endpush