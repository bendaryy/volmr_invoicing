@extends('layouts.app')
@section('title')
    {{__('Edit Client')}}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/inttel/css/intlTelInput.css') }}">
@endsection
@section('content')
    @php $styleCss = 'style'; @endphp
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-end mb-5">
                    <h1>@yield('title')</h1>
                    <a class="btn btn-outline-primary float-end"
                       href="{{ route('clients.index') }}">{{ __('messages.common.back') }}</a>
                </div>
                <div class="col-12">
                    @include('layouts.errors')
                </div>
                <div class="card">
                    <div class="card-body">
                        {{ Form::open(['route' => ['clients.update', $client->id], 'method' => 'put','files' => 'true','id'=>'editClientForm']) }}
                        @include('clients.edit_fields')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page_js')
    <script src="{{ asset('assets/js/inttel/js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('assets/js/inttel/js/utils.min.js') }}"></script>
    <script>
        let isEdit = true
        let phoneNo = "{{ !empty($client) ? (($client->user->region_code).($client->user->contact)) : null }}"
        let utilsScript = "{{asset('assets/js/inttel/js/utils.min.js')}}"
        let countryId = '{{ $client->country_id }}'
        let stateId = '{{ $client->state_id }}'
        let cityId = '{{ $client->city_id }}'
        let defaultAvatarImageUrl = "{{ asset('assets/images/avatar.png') }}"
    </script>
    <script src="{{ asset('assets/js/custom/phone-number-country-code.js') }}"></script>
    <script src="{{ mix('assets/js/client/create-edit.js') }}"></script>
@endsection
