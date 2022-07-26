@extends('layouts.app')
@section('title')
    {{__('messages.invoices')}}
@endsection
{{--@section('page_css')--}}
{{--    <link href="{{ mix('assets/css/app.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--@endsection--}}
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column livewire-table">
            @include('flash::message')
            <livewire:invoice-table/>
        </div>
    </div>
    @include('invoices.templates.templates')
@endsection
@section('page_js')
    <script>
        let currency = "{{ getCurrencySymbol() }}"
        let status = "{{ $status }}"
    </script>
    <script src="{{ mix('assets/js/invoice/invoice.js') }}"></script>
@endsection
