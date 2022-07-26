@extends('layouts.app')
@section('title')
    {{__('messages.clients')}}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column  livewire-table">
            @include('flash::message')
            <livewire:client-table/>
        </div>
    </div>
@endsection

@section('page_js')
    <script src="{{ mix('assets/js/client/client.js') }}"></script>
@endsection
