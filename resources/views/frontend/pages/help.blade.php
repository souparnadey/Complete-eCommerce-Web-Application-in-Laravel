@extends('frontend.layouts.master')
@section('title', 'Help & Support')
@section('main-content')

<!-- Breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bread-inner">
                    <ul class="bread-list">
                        <li>
                            <a href="{{ route('home') }}">
                                Home <i class="ti-arrow-right"></i>
                            </a>
                        </li>
                        <li class="active">
                            <a href="javascript:void(0)">Help</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<section class="help-page">
    <div class="container">
        <div class="row align-items-stretch">

            <!-- LEFT : CONTENT (65%) -->
            <div class="col-lg-8 col-12">
                <div class="help-card help-main">

                    <h1>We’re here to help 🤍</h1>
                    <p class="lead">
                        Shopping should feel simple, safe, and enjoyable.
                        If you ever feel stuck, confused, or just need guidance —
                        you’re in the right place.
                    </p>

                    <div class="help-points">
                        <div class="point">
                            <span>📦</span>
                            <div>
                                <h4>Orders & Delivery</h4>
                                <p>
                                    Track orders, understand delivery timelines,
                                    and get help with missing or delayed shipments.
                                </p>
                            </div>
                        </div>

                        <div class="point">
                            <span>💳</span>
                            <div>
                                <h4>Payments & Refunds</h4>
                                <p>
                                    Learn about UPI, COD, PayPal, refunds,
                                    and how we keep your payments secure.
                                </p>
                            </div>
                        </div>

                        <div class="point">
                            <span>🔁</span>
                            <div>
                                <h4>Returns & Exchanges</h4>
                                <p>
                                    Changed your mind? No worries.
                                    We make returns simple and transparent.
                                </p>
                            </div>
                        </div>

                        <div class="point">
                            <span>👤</span>
                            <div>
                                <h4>Account & Support</h4>
                                <p>
                                    Trouble logging in, updating details,
                                    or managing your account? We’ve got you.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="help-footer-note">
                        Still need help? Our support team is just one click away.
                        We usually respond within a few hours.
                    </div>

                </div>
            </div>

            <!-- RIGHT : VISUAL + CTA (35%) -->
            <div class="col-lg-4 col-12">
                <div class="help-card help-side">

                    <img
                        src="{{ asset('storage/photos/1/help.jpg') }}"
                        alt="Customer Support"
                        class="help-image"
                    >

                    <h3>Need personal assistance?</h3>
                    <p>
                        If you didn’t find what you were looking for,
                        reach out to us directly — we’d love to help.
                    </p>

                    <a href="{{ route('contact') }}" class="help-btn">
                        Contact Support
                    </a>

                    <div class="help-mini">
                        <div>⏱ Fast replies</div>
                        <div>🔒 Secure communication</div>
                        <div>🤝 Real humans, not bots</div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
/* ============================
   HELP PAGE – PREMIUM STYLE
============================ */

.help-page {
    padding: 70px 0;
}

/* Card base */
.help-card {
    background: #fff;
    border-radius: 18px;
    padding: 40px;
    height: 100%;
    box-shadow: 0 18px 40px rgba(0,0,0,0.06);
}

/* LEFT CARD */
.help-main h1 {
    font-size: 2.2rem;
    font-weight: 700;
    margin-bottom: 12px;
}

.help-main .lead {
    font-size: 16px;
    color: #4b5563;
    line-height: 1.7;
    margin-bottom: 30px;
}

/* Points */
.help-points .point {
    display: flex;
    gap: 16px;
    margin-bottom: 22px;
}

.help-points span {
    font-size: 22px;
}

.help-points h4 {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 4px;
}

.help-points p {
    font-size: 14.5px;
    color: #4b5563;
    line-height: 1.6;
}

/* Footer note */
.help-footer-note {
    margin-top: 25px;
    padding-top: 18px;
    border-top: 1px solid #e5e7eb;
    font-size: 14px;
    color: #374151;
}

/* RIGHT CARD */
.help-side {
    text-align: center;
}

.help-image {
    width: 100%;
    border-radius: 14px;
    margin-bottom: 22px;
}

.help-side h3 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 8px;
}

.help-side p {
    font-size: 14.5px;
    color: #4b5563;
    line-height: 1.6;
    margin-bottom: 20px;
}

/* CTA Button */
/* Contact Support Button */
.help-btn {
    display: inline-block;
    width: 100%;
    text-align: center;

    background: #000;              /* existing black */
    color: #ffffff !important;     /* force white text */
    padding: 14px 28px;
    border-radius: 999px;

    font-weight: 600;
    letter-spacing: 0.3px;

    transition: 
        background-color 0.3s ease,
        transform 0.25s ease,
        box-shadow 0.25s ease;
}

/* Hover effect – theme yellow */
.help-btn:hover {
    background: #F7941D;           /* ⚠️ replace if your theme yellow differs */
    color: #000 !important;        /* readable on yellow */

    transform: translateY(-3px);   /* subtle pop-up */
    box-shadow: 0 12px 30px rgba(250, 204, 21, 0.35);
}

/* Active / click */
.help-btn:active {
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(250, 204, 21, 0.25);
}

/* Mini points */
.help-mini {
    margin-top: 24px;
    font-size: 13.5px;
    color: #374151;
}

.help-mini div {
    margin-top: 6px;
}

/* Mobile */
@media (max-width: 768px) {
    .help-card {
        padding: 30px 24px;
        margin-bottom: 24px;
    }

    .help-main h1 {
        font-size: 1.9rem;
    }
}
</style>
@endpush
