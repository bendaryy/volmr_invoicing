@extends('layouts.app')
@section('title')
    Currency
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column livewire-table">
            @include('flash::message')
            <livewire:currency-table/>
        </div>
    </div>
    @include('currencies.create_modal')
    @include('currencies.edit_modal')
@endsection
@section('page_js')
    <script src="{{mix('assets/js/currency/currency.js')}}"></script>
@endsection
