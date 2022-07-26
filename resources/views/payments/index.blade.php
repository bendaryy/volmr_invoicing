@extends('layouts.app')
@section('title')
    {{__('messages.payments')}}
@endsection
{{--@section('page_css')--}}
{{--    <link href="{{ mix('assets/css/app.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--@endsection--}}
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column  livewire-table">
            @include('flash::message')
            <livewire:admin-payment-table/>
        </div>
    </div>
    @include('payments.payment_modal')
    @include('payments.edit_payment_modal')
@endsection
@section('page_js')
    <script>
        let currency = "{{ getCurrencySymbol() }}"
    </script>
    <script src="{{ mix('assets/js/payment/payment.js') }}"></script>
@endsection
