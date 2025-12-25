@extends('frontend.layouts.master')

@section('title','Checkout page')

@section('main-content')

    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0)">Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
            
    <!-- Start Checkout -->
    <section class="shop checkout section">
        <div class="container">
                <form class="form" method="POST" action="{{route('cart.order')}}">
                    @csrf
                    {{-- GLOBAL VALIDATION ERROR MESSAGE --}}
                    @if ($errors->any())
                        <div class="alert alert-danger" style="border-radius:8px; margin-bottom:20px;">
                            <strong>Oopsiee!</strong> Please fix the highlighted fields below 🙂
                        </div>
                    @endif
                    @if ($errors->any())
                    <script>
                        window.onload = () => {
                            document.querySelector('.form-error')?.scrollIntoView({
                                behavior: 'smooth',
                                block: 'center'
                            });
                        };
                    </script>
                    @endif
                    <div class="row"> 
                        <div class="col-lg-8 col-12">
                            <div class="checkout-form">
                                <h2>Make Your Checkout Here</h2>
                                <p>Please register in order to checkout more quickly</p>
                                <!-- Form -->
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>First Name<span>*</span></label>
                                            <input type="text" name="first_name" placeholder="" value="{{old('first_name')}}">
                                            @error('first_name')
                                                <span class='form-error'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Last Name<span>*</span></label>
                                            <input type="text" name="last_name" placeholder="" value="{{old('last_name')}}">
                                            @error('last_name')
                                                <span class='form-error'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Email Address<span>*</span></label>
                                            <input type="email" name="email" placeholder="" value="{{old('email')}}" required>
                                            @error('email')
                                                <span class='form-error'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Contact Number <span>*</span></label>
                                            <input type="tel" name="phone" placeholder="" value="{{ old('phone') }}" inputmode="numeric" pattern="[6-9][0-9]{9}" maxlength="10" required>
                                            @error('phone')
                                                <span class='form-error'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12"> 
                                        <div class="form-group">
                                            <label>State <span>*</span></label>
                                            <select name="state" id="state" required>

                                                <option value="">Select Your State</option>

                                                <option value="NRI" {{ old('state') == 'NRI' ? 'selected' : '' }}>Outside India</option>
                                                <option value="AN" {{ old('state') == 'AN' ? 'selected' : '' }}>Andaman & Nicobar</option>
                                                <option value="AP" {{ old('state') == 'AP' ? 'selected' : '' }}>Andhra Pradesh</option>
                                                <option value="AR" {{ old('state') == 'AR' ? 'selected' : '' }}>Arunachal Pradesh</option>
                                                <option value="AS" {{ old('state') == 'AS' ? 'selected' : '' }}>Assam</option>
                                                <option value="BR" {{ old('state') == 'BR' ? 'selected' : '' }}>Bihar</option>
                                                <option value="CG" {{ old('state') == 'CG' ? 'selected' : '' }}>Chhattisgarh</option>
                                                <option value="CH" {{ old('state') == 'CH' ? 'selected' : '' }}>Chandigarh</option>
                                                <option value="DN" {{ old('state') == 'DN' ? 'selected' : '' }}>Dadra & Nagar Haveli</option>
                                                <option value="DD" {{ old('state') == 'DD' ? 'selected' : '' }}>Daman & Diu</option>
                                                <option value="DL" {{ old('state') == 'DL' ? 'selected' : '' }}>Delhi</option>
                                                <option value="GA" {{ old('state') == 'GA' ? 'selected' : '' }}>Goa</option>
                                                <option value="GJ" {{ old('state') == 'GJ' ? 'selected' : '' }}>Gujarat</option>
                                                <option value="HR" {{ old('state') == 'HR' ? 'selected' : '' }}>Haryana</option>
                                                <option value="HP" {{ old('state') == 'HP' ? 'selected' : '' }}>Himachal Pradesh</option>
                                                <option value="JK" {{ old('state') == 'JK' ? 'selected' : '' }}>Jammu & Kashmir</option>
                                                <option value="JH" {{ old('state') == 'JH' ? 'selected' : '' }}>Jharkhand</option>
                                                <option value="KA" {{ old('state') == 'KA' ? 'selected' : '' }}>Karnataka</option>
                                                <option value="KL" {{ old('state') == 'KL' ? 'selected' : '' }}>Kerala</option>
                                                <option value="LD" {{ old('state') == 'LD' ? 'selected' : '' }}>Lakshadweep</option>
                                                <option value="MP" {{ old('state') == 'MP' ? 'selected' : '' }}>Madhya Pradesh</option>
                                                <option value="MH" {{ old('state') == 'MH' ? 'selected' : '' }}>Maharashtra</option>
                                                <option value="MN" {{ old('state') == 'MN' ? 'selected' : '' }}>Manipur</option>
                                                <option value="ML" {{ old('state') == 'ML' ? 'selected' : '' }}>Meghalaya</option>
                                                <option value="MZ" {{ old('state') == 'MZ' ? 'selected' : '' }}>Mizoram</option>
                                                <option value="NL" {{ old('state') == 'NL' ? 'selected' : '' }}>Nagaland</option>
                                                <option value="OD" {{ old('state') == 'OD' ? 'selected' : '' }}>Odisha</option>
                                                <option value="PB" {{ old('state') == 'PB' ? 'selected' : '' }}>Punjab</option>
                                                <option value="PY" {{ old('state') == 'PY' ? 'selected' : '' }}>Puducherry</option>
                                                <option value="RJ" {{ old('state') == 'RJ' ? 'selected' : '' }}>Rajasthan</option>
                                                <option value="SK" {{ old('state') == 'SK' ? 'selected' : '' }}>Sikkim</option>
                                                <option value="TN" {{ old('state') == 'TN' ? 'selected' : '' }}>Tamil Nadu</option>
                                                <option value="TS" {{ old('state') == 'TS' ? 'selected' : '' }}>Telangana</option>
                                                <option value="TR" {{ old('state') == 'TR' ? 'selected' : '' }}>Tripura</option>
                                                <option value="UP" {{ old('state') == 'UP' ? 'selected' : '' }}>Uttar Pradesh</option>
                                                <option value="UK" {{ old('state') == 'UK' ? 'selected' : '' }}>Uttarakhand</option>
                                                <option value="WB" {{ old('state') == 'WB' ? 'selected' : '' }}>West Bengal</option>
                                            </select>
                                            @error('state')
                                                <div class="form-error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Full Address<span>*</span></label>
                                            <input type="text" name="address1" placeholder="" required value="{{old('address1')}}">
                                            @error('address1')
                                                <span class='form-error'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Landmark</label>
                                            <input type="text" name="address2" placeholder="" value="{{old('address2')}}">
                                            @error('address2')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Postal Code<span>*</span></label>
                                            <input type="text" name="post_code" placeholder="" required value="{{old('post_code')}}">
                                            @error('post_code')
                                                <span class='form-error'>{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>
                                <!--/ End Form -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <div class="order-details">
                                <!-- Order Widget -->
                                <div class="single-widget">
                                    <h2>CART  TOTALS</h2>
                                    <div class="content">
                                        <ul>
										    <li class="order_subtotal" data-price="{{Helper::totalCartPrice()}}">
                                                Cart Subtotal
                                                <span>₹{{number_format(Helper::totalCartPrice(),2)}}</span>
                                            </li>
                                            <li class="shipping">
                                                Shipping Cost<span>*</span>

                                                @if(count(Helper::shipping())>0 && Helper::cartCount()>0)
                                                    <select name="shipping" class="nice-select">
                                                        <option value="">Select your shipping method</option>
                                                        @foreach(Helper::shipping() as $shipping)
                                                            <option value="{{$shipping->id}}" data-price="{{$shipping->price}}">
                                                                {{$shipping->type}}: ₹{{$shipping->price}}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error('shipping')
                                                        <div class="form-error">{{ $message }}</div>
                                                    @enderror
                                                @else
                                                    <span>Free</span>
                                                @endif
                                            </li>

                                            @if(session('coupon'))
                                            <li class="coupon_price" data-price="{{session('coupon')['value']}}">
                                                You Save
                                                <span>₹{{number_format(session('coupon')['value'],2)}}</span>
                                            </li>
                                            @endif
                                            @php
                                                $total_amount=Helper::totalCartPrice();
                                                if(session('coupon')){
                                                    $total_amount=$total_amount-session('coupon')['value'];
                                                }
                                            @endphp
                                            @if(session('coupon'))
                                                <li class="last"  id="order_total_price">Total
                                                    <span>₹{{number_format($total_amount,2)}}</span>
                                                </li>
                                            @else
                                                <li class="last"  id="order_total_price">Total
                                                    <span>₹{{number_format($total_amount,2)}}</span>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <!--/ End Order Widget -->
                                <!-- Order Widget -->
                                <div class="single-widget">
                                    <h2>Payments</h2>
                                    <div class="content">
                                        <div class="checkbox">
                                            {{-- <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label> --}}
                                            <form-group>
                                                <input name="payment_method"  type="radio" value="upi" required> <label> UPI</label><br>
                                                <input name="payment_method"  type="radio" value="cod"> <label> Cash On Delivery</label><br>
                                                <input name="payment_method"  type="radio" value="paypal"> <label> PayPal</label> 
                                            </form-group>
                                            @error('payment_method')
                                                <div class="form-error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Order Widget -->
                                <!-- Payment Method Widget -->
                                <div class="single-widget payement">
                                    <div class="content">
                                        <img src="{{('backend/img/payment-method.png')}}" alt="#">
                                    </div>
                                </div>
                                <!--/ End Payment Method Widget -->
                                <!-- Button Widget -->
                                <div class="single-widget get-button">
                                    <div class="content">
                                        <div class="button">
                                            <button type="submit"
                                                    class="btn"
                                                    onclick="this.disabled=true;this.form.submit();">
                                                proceed to checkout
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!--/ End Button Widget -->
                            </div>
                        </div>
                    </div>

                </form>
        </div>
    </section>
    <!--/ End Checkout -->
    
    <!-- Start Shop Services Area  -->
    <section class="shop-services section home">
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
    <!-- End Shop Services -->
    
@endsection
@push('styles')
	<style>
		li.shipping{
			display: inline-flex;
			width: 100%;
			font-size: 14px;
		}
		li.shipping .input-group-icon {
			width: 100%;
			margin-left: 10px;
		}
		.input-group-icon .icon {
			position: absolute;
			left: 20px;
			top: 0;
			line-height: 40px;
			z-index: 3;
		}
		.form-select {
			height: 30px;
			width: 100%;
		}
		.form-select .nice-select {
			border: none;
			border-radius: 0px;
			height: 40px;
			background: #f6f6f6 !important;
			padding-left: 45px;
			padding-right: 40px;
			width: 100%;
		}
        .form-error {
            margin-top: 6px;
            font-size: 13px;
            color: #b91c1c;
            background: #fee2e2;
            padding: 6px 10px;
            border-radius: 6px;
            display: inline-block;
        }
		.list li{
			margin-bottom:0 !important;
		}
		.list li:hover{
			background:#F7941D !important;
			color:white !important;
		}
		.form-select .nice-select::after {
			top: 14px;
		}
        input:invalid,
        select:invalid {
            border-color: #dc2626;
        }
	</style>
@endpush
@push('scripts')
	<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
	<script>
		$(document).ready(function() { $("select.select2").select2(); });
  		$('select.nice-select').niceSelect();
	</script>
	<script>
		function showMe(box){
			var checkbox=document.getElementById('shipping').style.display;
			// alert(checkbox);
			var vis= 'none';
			if(checkbox=="none"){
				vis='block';
			}
			if(checkbox=="block"){
				vis="none";
			}
			document.getElementById(box).style.display=vis;
		}
	</script>
	<script>
		$(document).ready(function(){
			$('.shipping select[name=shipping]').change(function(){
				let cost = parseFloat( $(this).find('option:selected').data('price') ) || 0;
				let subtotal = parseFloat( $('.order_subtotal').data('price') ); 
				let coupon = parseFloat( $('.coupon_price').data('price') ) || 0; 
				// alert(coupon);
				$('#order_total_price span').text('₹'+(subtotal + cost-coupon).toFixed(2));
			});

		});

	</script>

@endpush
