<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice - {{ $order->order_number }}</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #000;
        }

        .header {
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .logo {
            float: left;
        }

        .company-details {
            float: right;
            text-align: right;
        }

        .clearfix { 
            clear: both; 
        }
        
        h2, h3 {
            margin: 0;
            padding: 0;
        }

        /* Invoice meta */
        .invoice-meta {
            margin-bottom: 20px;
        }

        .invoice-meta table {
            width: 100%;
        }

        .invoice-meta td {
            padding: 4px 0;
        }

        .section {
            margin-top: 25px;
        }

        /* Section title */
        .section-title {
            font-weight: bold;
            border-bottom: 1px solid #000;
            margin: 25px 0 10px;
            padding-bottom: 4px;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
        }

        th {
            background: #eee;
            font-weight: bold;
        }

        .text-right {
            text-align: right;
        }


        .no-border {
            border: none;
        }

        /* Totals */
        .totals td {
            border: none;
            padding: 4px 6px;
        }

        .totals .label {
            text-align: right;
            font-weight: bold;
        }

        /* Stamp */
        .stamp {
            position: absolute;
            top: 150px;
            right: 50px;
            color: #e0000e;
            border: 3px solid #e0000e;
            padding: 8px 16px;
            font-size: 18px;
            font-weight: bold;
            transform: rotate(-10deg);
        }

        /* Footer */
        .footer {
            margin-top: 40px;
            font-size: 11px;
            text-align: center;
            border-top: 2px solid #000;
            padding-top: 10px;
        }
    </style>
</head>
<body>

<!-- HEADER -->
<div class="header">
    <div class="logo">
        <img src="{{ public_path('backend/img/logo.png') }}" width="120">
    </div>

    <div class="company-details">
        <strong>{{ config('app.name') }}</strong><br>
        Katjuridanga, Milan-Pally Rd, Bankura, West Bengal 722102<br>
        Phone: {{ env('APP_PHONE') }}<br>
        Email: {{ env('APP_EMAIL') }}
    </div>

    <div class="clearfix"></div>
</div>

{{-- INVOICE META --}}
<div class="invoice-meta">
    <table>
        <tr>
            <td><strong>Invoice No:</strong> {{ $order->order_number }}</td>
            <td class="text-right"><strong>Date:</strong> {{ $order->created_at->format('d M Y') }}</td>
        </tr>
    </table>
</div>

{{-- CUSTOMER & SHIPPING --}}
<div class="section-title">Billing & Shipping Information</div>
<table>
    <tr>
        <td width="50%">
            <strong>Customer</strong><br>
            {{ $order->first_name }} {{ $order->last_name }}<br>
            {{ $order->email }}<br>
            {{ $order->phone }}
        </td>
        <td width="50%">
            <strong>Shipping Address</strong><br>
            {{ $order->address1 }}<br>
            @if($order->address2)
                {{ $order->address2 }}<br>
            @endif
            {{ $order->city ?? '' }}<br>
            {{ $order->state ?? '' }} {{ $order->post_code }}<br>
            India
        </td>
    </tr>
</table>

{{-- ORDER ITEMS --}}
<div class="section-title">Order Items</div>
<table>
    <thead>
        <tr>
            <th>Product</th>
            <th width="80">Qty</th>
            <th width="120">Price</th>
            <th width="120">Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->cart_info as $cart)
            <tr>
                <td>{{ $cart->product->title }}</td>
                <td class="text-right">{{ $cart->quantity }}</td>
                <td class="text-right">₹{{ number_format($cart->price,2) }}</td>
                <td class="text-right">
                    ₹{{ number_format($cart->price * $cart->quantity,2) }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{-- TOTALS --}}
<table class="totals" style="margin-top:15px;">
    <tr>
        <td class="label">Subtotal:</td>
        <td class="text-right">₹{{ number_format($order->sub_total,2) }}</td>
    </tr>
    <tr>
        <td class="label">Shipping:</td>
        <td class="text-right">
            ₹{{ number_format($order->shipping->price ?? 0,2) }}
        </td>
    </tr>
    <tr>
        <td class="label">Payment Method:</td>
        <td class="text-right">{{ strtoupper($order->payment_method) }}</td>
    </tr>
    <tr>
        <td class="label">Payment Status:</td>
        <td class="text-right">{{ strtoupper($order->payment_status) }}</td>
    </tr>
    <tr>
        <td class="label"><strong>Grand Total:</strong></td>
        <td class="text-right">
            <strong>₹{{ number_format($order->total_amount,2) }}</strong>
        </td>
    </tr>
</table>

{{-- PAID / COD STAMP --}}
@if(strtolower($order->payment_status) === 'paid')
    <div class="stamp">PAID</div>
@else
    <div class="stamp">COD</div>
@endif

{{-- FOOTER --}}
<div class="footer">
    This is a system generated invoice. No signature required.<br>
    Thank you for shopping with {{ config('app.name') }}.
</div>

</body>
</html>
