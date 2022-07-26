@extends('layouts.app')
@section('title')
    {{ __('messages.settings') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            @include('flash::message')
            @yield('section')
        </div>
    </div>
    @include('settings.invoices.templates')
@endsection
@section('page_js')
    <script>
        let utilsScript = "{{asset('assets/js/int-tel/js/utils.min.js')}}";
        let isEdit = true;
        let imageValidation = '{{  __('messages.setting.image_validation') }}';
        let companyImageValidation = '{{ __('messages.setting.company_image_validation') }}';
    </script>
    <script src="{{ mix('assets/js/settings/setting.js') }}"></script>
    <script src="{{ asset('assets/js/custom/phone-number-country-code.js') }}"></script>
@endsection
