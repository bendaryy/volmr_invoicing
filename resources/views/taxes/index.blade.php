@extends('layouts.app')
@section('title')
    {{ __('messages.taxes') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column livewire-table">
            @include('flash::message')
            <livewire:tax-table/>
        </div>
        @include('taxes.create_modal')
        @include('taxes.edit_modal')
    </div>
@endsection
@section('page_js')
    <script src="{{mix('assets/js/tax/tax.js')}}"></script>
@endsection
