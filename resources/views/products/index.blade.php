@extends('layouts.app')
@section('title')
    {{__('messages.products')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column livewire-table">
            @include('flash::message')
            <livewire:product-table/>
        </div>
    </div>
@endsection
@section('page_js')
    <script src="{{ mix('assets/js/product/product.js') }}"></script>
    <script>
        let currency = "{{ getCurrencySymbol() }}"
    </script>
@endsection
