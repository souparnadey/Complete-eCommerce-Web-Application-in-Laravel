@extends('frontend.layouts.master')

@section('title', 'Terms & Conditions')

@section('main-content')

<!-- Breadcrumbs -->
<div class="breadcrumbs boutique-breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="bread-list">
                    <li>
                        <a href="{{ route('home') }}">
                            Home <i class="ti-arrow-right"></i>
                        </a>
                    </li>
                    <li class="active">Terms & Conditions</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="terms section boutique-terms">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-12">

                <div class="terms-card">

                    <!-- Header -->
                    <div class="terms-header text-center">
                        <span class="badge">Legal</span>
                        <h1>Terms & Conditions</h1>
                        <p class="updated">
                            Last updated • {{ date('F d, Y') }}
                        </p>
                        <p class="subtitle">
                            These terms govern your use of
                            <strong>{{ config('app.name') }}</strong>.
                            By accessing our boutique, you agree to them.
                        </p>
                    </div>

                    <!-- Content -->
                    <div class="terms-content">

                        <div class="terms-section">
                            <h4>1. Introduction</h4>
                            <p>
                                Welcome to <strong>{{ config('app.name') }}</strong>.
                                By accessing or using our website, you agree to comply
                                with these Terms & Conditions. If you do not agree,
                                please discontinue use immediately.
                            </p>
                        </div>

                        <div class="terms-section">
                            <h4>2. Account Responsibility</h4>
                            <p>
                                You are responsible for maintaining the confidentiality
                                of your account credentials and for all activities
                                carried out under your account.
                            </p>
                        </div>

                        <div class="terms-section">
                            <h4>3. Orders & Payments</h4>
                            <p>
                                All orders are subject to availability and confirmation.
                                We reserve the right to refuse or cancel any order
                                at our discretion.
                            </p>
                        </div>

                        <div class="terms-section">
                            <h4>4. Pricing & Availability</h4>
                            <p>
                                Prices may change without notice. While we strive for
                                accuracy, errors may occur and will be corrected
                                when identified.
                            </p>
                        </div>

                        <div class="terms-section">
                            <h4>5. Shipping & Delivery</h4>
                            <p>
                                Delivery timelines are estimates and may vary due to
                                logistics or unforeseen circumstances.
                            </p>
                        </div>

                        <div class="terms-section">
                            <h4>6. Returns & Refunds</h4>
                            <p>
                                Returns are accepted according to our return policy.
                                Refunds are processed only after inspection and approval.
                            </p>
                        </div>

                        <div class="terms-section">
                            <h4>7. Prohibited Activities</h4>
                            <ul class="styled-list">
                                <li>Misuse or abuse of our platform</li>
                                <li>Fraudulent or misleading activities</li>
                                <li>Unauthorized access or data manipulation</li>
                            </ul>
                        </div>

                        <div class="terms-section">
                            <h4>8. Limitation of Liability</h4>
                            <p>
                                {{ config('app.name') }} shall not be liable for any
                                indirect, incidental, or consequential damages
                                arising from use of this website.
                            </p>
                        </div>

                        <div class="terms-section">
                            <h4>9. Updates to These Terms</h4>
                            <p>
                                We may update these Terms at any time. Continued use
                                of the website constitutes acceptance of the changes.
                            </p>
                        </div>

                        <div class="terms-section">
                            <h4>10. Contact Us</h4>
                            <p>
                                For questions regarding these Terms & Conditions,
                                please contact our support team.
                            </p>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
/* Boutique Breadcrumb */
.boutique-breadcrumbs {
    background: #fafafa;
    border-bottom: 1px solid #eee;
}

.bread-list li a {
    color: #6b7280;
    font-weight: 500;
}

/* Card */
.terms-card {
    background: #ffffff;
    padding: 56px 52px;
    border-radius: 18px;
    border: 1px solid #f0f0f0;
    box-shadow: 0 30px 60px rgba(0, 0, 0, 0.06);
}

/* Header */
.terms-header .badge {
    display: inline-block;
    padding: 6px 14px;
    border-radius: 999px;
    background: rgba(59, 130, 246, 0.1);;
    color: #2563eb;
    font-size: 12px;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    margin-bottom: 14px;
}

.terms-header h1 {
    font-size: 2.4rem;
    font-weight: 700;
    letter-spacing: -0.02em;
    margin-bottom: 6px;
}

.terms-header .updated {
    font-size: 13px;
    color: #9ca3af;
    margin-bottom: 14px;
}

.terms-header .subtitle {
    font-size: 15px;
    color: #4b5563;
    max-width: 640px;
    margin: 0 auto 36px;
}

/* Sections */
.terms-section {
    padding: 26px 0;
    border-top: 1px dashed #e5e7eb;
}

.terms-section:first-child {
    border-top: none;
}

.terms-section h4 {
    font-size: 17px;
    font-weight: 600;
    color: #111827;
    margin-bottom: 10px;
}

.terms-section p,
.terms-section li {
    font-size: 15px;
    line-height: 1.8;
    color: #374151;
}

/* List */
.styled-list {
    padding-left: 18px;
    margin-top: 12px;
}

.styled-list li {
    margin-bottom: 8px;
}

/* Mobile */
@media (max-width: 768px) {
    .terms-card {
        padding: 36px 24px;
    }

    .terms-header h1 {
        font-size: 1.9rem;
    }
}
</style>
@endpush

