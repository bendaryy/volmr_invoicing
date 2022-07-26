@extends('layouts.app')
@section('title')
    Transactions
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column  livewire-table">
            @include('flash::message')
            <livewire:transaction-table/>
        </div>
    </div>
@endsection
@section('page_js')
    <script>
        let currency = "{{ getCurrencySymbol() }}"
    </script>
    <script src="{{ mix('assets/js/transaction/transaction.js') }}"></script>
@endsection
