@extends('layouts.app')
@section('title')
    {{ __('messages.invoice.edit_invoice') }}
@endsection
@section('header_toolbar')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="d-flex flex-column">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-end mb-5">
                    <h1>@yield('title')</h1>
                    <a class="btn btn-outline-primary float-end"
                       href="{{ url()->previous() }}">{{ __('messages.common.back') }}</a>
                </div>
                <div class="col-12">
                    @include('layouts.errors')
                </div>
                <div class="card">
                    <div class="card-body">
                        {{ Form::model($invoice, ['route' => ['invoices.update', $invoice->id], 'id' => 'invoiceEditForm']) }}
                        @include('invoices.edit_fields')
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('invoices.templates.templates')
@endsection
@section('page_scripts')
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
@endsection
@section('page_js')
    <script>
        let invoiceUpdateUrl = "{{ route('invoices.update', ['invoice' => $invoice->id]) }}"
        let invoiceUrl = "{{ route('invoices.index') }}"
        let invoiceId = '{{ $invoice->id }}'
        let clients = JSON.parse('@json($clients)')
        let products = JSON.parse('@json($associateProducts)');
        let taxes = JSON.parse('@json($associateTaxes)');
        let uniqueId = "{{ $invoice->invoiceItems->count() + 1 }}";
        let invoiceNote = "{{ isset($invoice->note) ? true: false}}";
        let invoiceTerm = "{{ isset($invoice->term) ? true: false }}";
        let invoiceRecurring = "{{ isset($invoice->recurring) ? true:false }}";
        let thousandSeparator = "{{ getSettingValue('thousand_separator') }}";
        let decimalSeparator = "{{ getSettingValue('decimal_separator') }}";
        let defaultTax = JSON.parse('@json($defaultTax)');
        let editDueDate = "{{ $invoice->due_date }}";
    </script>
    <script src="{{mix('assets/js/invoice/create-edit.js')}}"></script>
@endsection
