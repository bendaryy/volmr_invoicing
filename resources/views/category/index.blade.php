@extends('layouts.app')
@section('title')
    {{ __('messages.categories') }}
@endsection
{{--@section('page_css')--}}
{{--    <link href="{{ mix('assets/css/app.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--@endsection--}}
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column livewire-table">
            @include('flash::message')
            <livewire:category-table/>
        </div>
    </div>
    @include('category.create_modal')
    @include('category.edit_modal')
@endsection
@section('page_js')
    <script src="{{mix('assets/js/category/category.js')}}"></script>
@endsection
