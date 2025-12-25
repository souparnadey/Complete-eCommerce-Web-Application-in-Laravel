@extends('frontend.layouts.master')

@section('title','E-SHOP || About Us')

@section('main-content')

	<style>
	    .play-btn {
	        position:absolute;
	        top:50%;
	        left:50%;
	        transform:translate(-50%, -50%);
	        width:75px;
	        height:75px;
	        background:white;
	        border-radius:50%;
	        display:flex;
	        align-items:center;
	        justify-content:center;
	        box-shadow:0 6px 18px rgba(0,0,0,0.25);
	        font-size:30px;
	        color:#ff6600;
	        z-index:5;
	        transition:0.25s ease;
	    }

	    /* Floating pulse ring */
	    .play-btn::before {
	        content:"";
	        position:absolute;
	        width:125px;
	        height:125px;
	        border:3px solid rgba(255, 102, 0, 0.35);
	        border-radius:50%;
	        top:50%;
	        left:50%;
	        transform:translate(-50%, -50%);
	        animation:pulse 2s infinite ease-out;
	        z-index:-1;
	    }

	    @keyframes pulse {
	        0% {
	            transform:translate(-50%, -50%) scale(0.5);
	            opacity:1;
	        }
	        70% {
	            transform:translate(-50%, -50%) scale(1.2);
	            opacity:0;
	        }
	        100% {
	            opacity:0;
	        }
	    }

	    /* Hover effect */
	    .play-btn:hover {
	        transform:translate(-50%, -50%) scale(1.08);
	        box-shadow:0 10px 25px rgba(0,0,0,0.35);
	    }
	</style>

	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="blog-single.html">About Us</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- About Us -->
	<section class="about-us section">
	    <div class="container">
	        <div class="row">
	            <!-- Left Text Section -->
	            <div class="col-lg-6 col-12">
	                <div class="about-content">
	                    @php
	                        $settings = DB::table('settings')->get();
	                    @endphp
	                    <h3>Welcome To <span>{{ config('app.name') }}</span></h3>
	                    <p>@foreach($settings as $data) {{$data->description}} @endforeach</p>

	                    <div class="button">
	                        <a href="{{route('blog')}}" class="btn">Our Blog</a>
	                        <a href="{{route('contact')}}" class="btn primary">Contact Us</a>
	                    </div>
	                </div>
	            </div>

	            <!-- Right Image + Play Button Section -->
				<div class="col-lg-6 col-12">
				    <div class="about-img overlay" style="position: relative;">
				
				        @php
				            $settings = DB::table('settings')->first();
				        @endphp
				
				        <img src="{{ asset($settings->photo ?? 'frontend/img/default.jpg') }}"
				             alt="About Image"
				             style="width: 100%; height: 380px; object-fit: cover; border-radius: 12px;">
				
				        <!-- Play Button -->
				        <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ"
				           class="video video-popup mfp-iframe play-btn">
				            <i class="fa fa-play"></i>
				        </a>
				
				    </div>
				</div>
	        </div>
	    </div>
	</section>

	<!-- End About Us -->


	<!-- Start Shop Services Area -->
	<section class="shop-services section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>All over India</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Price</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->
	<br><br>
@endsection
