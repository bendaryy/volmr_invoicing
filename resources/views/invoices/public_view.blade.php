<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice | {{ getAppName() }}</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset(getSettingValue('favicon_icon')) }}" type="image/png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    @yield('page_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/third-party.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins.css') }}">
    <link href="{{ mix('assets/css/infy-loader.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ mix('assets/css/custom.css') }}" rel="stylesheet" type="text/css"/>
{{--    <link href="{{ mix('assets/css/full-screen.css') }}" rel="stylesheet" type="text/css"/>--}}
    @yield('css')
</head>
@php $styleCss = 'style'; @endphp
<body>
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-row flex-column-fluid">
        <div class="container">
            <div class="d-flex flex-column flex-lg-row">
                <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-7 me-xl-10">
                    <div class="p-12">
                        @include('flash::message')
                        @include('invoices.show_fields',['isPublicView'=> false])
                        @include('invoices.payment_modal')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    let invoiceStripePaymentUrl = '{{ route('client.stripe-payment') }}';
    @if(!empty($stripeKey))
    let stripe = Stripe('{{  $stripeKey ?? config('services.stripe.key') }}');
    @endif
    let currency = "{{ getCurrencySymbol() }}";
    let status = "{{ $status }}";
    let options = {
        'key': "{{ config('payments.razorpay.key') }}",
        'amount': 0, //  100 refers to 1
        'currency': 'INR',
        'name': "{{getAppName()}}",
        'order_id': '',
        'description': '',
        'image': '{{ asset(getLogoUrl()) }}', // logo here
        'callback_url': "{{ route('razorpay.success') }}",
        'prefill': {
            'email': '', // client email here
            'name': '', // client name here
            'invoiceId': '', //invoice id
        },
        'readonly': {
            'name': 'true',
            'email': 'true',
            'invoiceId': 'true',
        },
        'theme': {
            'color': '#4FB281',
        },
        'modal': {
            'ondismiss': function () {
                $('#paymentForm').modal('hide');
                displayErrorMessage('Payment not completed.');
                setTimeout(function () {
                    location.reload();
                }, 1000);
            },
        },
    };
</script>
<script src="{{ asset('assets/js/third-party.js') }}"></script>
<script src="{{ mix('assets/js/custom/payment.js') }}"></script>
<script src="{{ mix('assets/js/custom/custom.js') }}"></script>
@routes
</body>
</html>
