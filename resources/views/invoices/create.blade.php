@extends('layouts.app')
@section('title')
    {{ __('messages.invoice.new_invoice') }}
@endsection
@section('header_toolbar')
    <div class="container-fluid">
        <div class="d-md-flex align-items-center justify-content-between mb-5">
            <h1 class="mb-0">@yield('title')</h1>
            <div class="text-end mt-4 mt-md-0">
                <a class="btn btn-outline-primary float-end"
                   href="{{ url()->previous() }}">{{ __('messages.common.back') }}</a>
            </div>
        </div>
    </div>
@endsection
@section('content')

    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="row">
                <div class="col-12">
                    @include('layouts.errors')
                    <div class="alert alert-danger display-none hide" id="validationErrorsBox"></div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    {{ Form::open(['route' => 'invoices.store', 'id' => 'invoiceForm', 'name' => 'invoiceForm']) }}
                    @include('invoices.fields')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    @include('invoices.templates.templates')
@endsection
@section('page_js')
    <script>
        let clients = JSON.parse('@json($clients)');
        let products = JSON.parse('@json($associateProducts)');
        let taxes = JSON.parse('@json($associateTaxes)');
        let invoiceNote = "{{ isset($invoice->note) }}";
        let invoiceTerm = "{{ isset($invoice->term) }}";
        let invoiceRecurring = "{{ isset($invoice->recurring) }}";
        let thousandSeparator = "{{ getSettingValue('thousand_separator') }}";
        let decimalSeparator = "{{ getSettingValue('decimal_separator') }}";
        let defaultTax = JSON.parse('@json($defaultTax)');
    </script>
    <script src="{{ mix('assets/js/invoice/create-edit.js') }}"></script>
@endsection
