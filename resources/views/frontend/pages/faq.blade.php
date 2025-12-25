@extends('frontend.layouts.master')
@section('title', 'Frequently Asked Questions')
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
                            <a href="javascript:void(0)">FAQ</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Breadcrumbs -->

<section class="faq-page">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-12">

                <div class="faq-card">

                    <div class="faq-header text-center">
                        <h1>Frequently Asked Questions</h1>
                        <p class="subtitle">
                            Got questions? We’ve got answers.
                            If you need more help, feel free to contact us anytime.
                        </p>
                    </div>

                    <hr>

                    @php
                        $faqs = [
                            ['q' => 'How do I place an order?', 'a' => 'Simply browse our products, add items to your cart, and proceed to checkout.'],
                            ['q' => 'What payment methods do you accept?', 'a' => 'We accept UPI, Cash on Delivery (COD), and PayPal.'],
                            ['q' => 'Is Cash on Delivery available everywhere?', 'a' => 'COD is available in most serviceable areas.'],
                            ['q' => 'How long does delivery take?', 'a' => 'Delivery usually takes around 3–7 business days, but highly depends on location.'],
                            ['q' => 'Can I return or exchange a product?', 'a' => 'Yes, returns are accepted as per our return policy.'],
                            ['q' => 'How do I track my order?', 'a' => 'You can track orders from your dashboard or tracking page.'],
                            ['q' => 'How can I contact support?', 'a' => 'Reach us via the Contact Us page or email.'],
                        ];
                    @endphp
                    @foreach($faqs as $faq)
                        <div class="faq-item">
                            <button class="faq-question" type="button">
                                <span class="question-text">{{ $faq['q'] }}</span>
                                <span class="icon"></span>
                            </button>
                            <div class="faq-answer">
                                <p>{{ $faq['a'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
/* ================================
   FAQ PAGE – fully isolated
================================ */

.faq-page {
    padding-top: 0px;
    padding-bottom: 60px;
}

.faq-page hr {
    margin: 24px 0;
}

/* Kill rogue theme pseudo elements */
/* Kill only theme layout lines, NOT icons */
.faq-page > ::before,
.faq-page > ::after {
    content: none !important;
    display: none !important;
}

/* Card */
.faq-page .faq-card {
    background: #fff;
    padding: 48px 44px;
    margin-top: 0;
    border-radius: 16px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.06);
}

/* Header */
.faq-page .faq-header h1 {
    font-size: 2.2rem;
    font-weight: 700;
}

.faq-page .subtitle {
    font-size: 15px;
    color: #4b5563;
    max-width: 620px;
    margin: 8px auto 0;
}

/* Item */
.faq-page .faq-item {
    border-bottom: 1px solid #e5e7eb;
}

/* Question row */
.faq-page .faq-question {
    width: 100%;
    background: none;
    border: none;
    padding: 18px 0;

    display: grid;
    grid-template-columns: 1fr 24px;
    align-items: center;
    gap: 16px;

    cursor: pointer;
}

/* Question text */
.faq-page .question-text {
    font-size: 16px;
    font-weight: 600;
    color: #111827;
    text-align: left;
}

.icon {
    transition: opacity 0.15s ease !important;
}

/* Icon Container ( + / − ) */
.faq-page .icon {
    width: 24px;
    height: 24px;
    font-size: 22px;
    line-height: 24px;

    transform: none !important;

    display: flex;
    align-items: center;
    justify-content: center;

    font-family: system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
    color: #111827;

    transition: opacity 0.2s ease;
}

/* Default: + */
.faq-page .icon::before {
    content: "+";
}

/* Active: − */
.faq-page .faq-item.active .icon::before {
    content: "−";
}

.faq-page .faq-item.active .icon {
    opacity: 0.7;
}

/* Answer */
.faq-page .faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.35s ease;
}

.faq-page .faq-answer p {
    font-size: 15px;
    color: #374151;
    line-height: 1.7;
    padding: 0 0 14px 0;
}

/* Active */
.faq-page .faq-item.active .faq-answer {
    max-height: 300px;
}

/* Mobile */
@media (max-width: 768px) {
    .faq-page .faq-card {
        padding: 32px 24px;
    }
}
.faq-page .faq-question:hover {
    color: #111;
}

.faq-page .faq-question:hover .icon {
    opacity: 0.7;
}

</style>
@endpush

@push('scripts')
<script>
document.querySelectorAll('.faq-question').forEach(button => {
    button.addEventListener('click', () => {
        const current = button.closest('.faq-item');

        document.querySelectorAll('.faq-item').forEach(item => {
            if (item !== current) {
                item.classList.remove('active');
            }
        });

        current.classList.toggle('active');
    });
});
</script>
@endpush
