@extends('layouts.app')
@section('title')
    {{__('messages.client.add_client')}}
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
                        {{ Form::open(['route' => 'clients.store','files' => 'true','id'=>'clientForm']) }}
                        @include('clients.fields')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        let phoneNo = "{{ old('region_code').old('contact') }}"
        let isEdit = false
        let utilsScript = "{{asset('assets/js/inttel/js/utils.min.js')}}"
        let defaultAvatarImageUrl = "{{ asset('assets/images/avatar.png') }}"
    </script>
    <script src="{{ asset('assets/js/custom/phone-number-country-code.js') }}"></script>
    <script src="{{ mix('assets/js/client/create-edit.js') }}"></script>
@endsection

