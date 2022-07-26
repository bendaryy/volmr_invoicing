@extends('layouts.app')
@section('title')
    {{ __('messages.dashboard') }}
@endsection
@section('page_css')
    <link rel="stylesheet" href="{{ asset('assets/css/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ mix('assets/css/dashboard.css') }}"  type="text/css"/>
@endsection
@section('content')
{{--    <div class="post d-flex flex-column-fluid" id="kt_post">--}}
{{--        <div id="kt_content_container" class="container">--}}
{{--            <div class="row g-5 gx-xxl-8 mb-5 justify-content-center">--}}
{{--                --}}{{-- Clients Widget --}}
{{--                <div class="col-xl-3 col-md-6">--}}
{{--                    <a href="{{ route('clients.index') }}"--}}
{{--                       class="card bg-warning hoverable card-xl-stretch mb-xl-8">--}}
{{--                        <div class="card-body card-6">--}}
{{--                                <span class="rotate">--}}
{{--                                    <i class="fas fa-user display-4 card-icon text-white"></i>--}}
{{--                                </span>--}}
{{--                            <div class="text-inverse-primary fw-bolder card-count fs-2 mb-2 mt-5">--}}
{{--                                {{ $total_clients }}--}}
{{--                            </div>--}}
{{--                            <div class="fw-bold text-inverse-danger fs-7">--}}
{{--                                {{ __('messages.admin_dashboard.total_clients') }}--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                --}}{{-- Total Invoices Amount Widget --}}
{{--                <div class="col-xl-3 col-md-6">--}}
{{--                    <a href="{{ route('invoices.index') }}"--}}
{{--                       class="card bg-primary hoverable card-xl-stretch mb-xl-8">--}}
{{--                        <div class="card-body card-1">--}}
{{--                                <span class="rotate"><i--}}
{{--                                            class="fa fa-money-check fa-4x display-4 card-icon text-white"></i></span>--}}
{{--                            <div class="text-inverse-primary fw-bolder card-count fs-2 mb-2 mt-5 amount-position">--}}
{{--                                <span>{{ getCurrencySymbol() }}</span> {{ numberFormat($invoice_amount) }}</div>--}}
{{--                            <div--}}
{{--                                    class="fw-bold text-inverse-primary fs-7">{{ __('messages.admin_dashboard.total_amount') }}</div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                --}}{{-- Recieved Amount Widget --}}
{{--                <div class="col-xl-3 col-md-6">--}}
{{--                    <a href="{{ route('invoices.index',['status'=>2]) }}"--}}
{{--                       class="card bg-success hoverable card-xl-stretch mb-xl-8 ">--}}
{{--                        <div class="card-body card-3">--}}
{{--                                <span class="rotate"><i--}}
{{--                                            class="fas fa-money-bill-wave fa-4x display-4 card-icon text-white"></i></span>--}}
{{--                            <div--}}
{{--                                    class="text-inverse-info fw-bolder card-count fs-2 mb-2 mt-5 amount-position">{{getCurrencySymbol()}} {{ numberFormat($paid_amount) }} </div>--}}
{{--                            <div--}}
{{--                                    class="fw-bold text-inverse-info fs-7">{{ __('messages.admin_dashboard.total_paid') }}</div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                --}}{{--Partially Paid Widget --}}
{{--                <div class="col-xl-3 col-md-6">--}}
{{--                    <a href="{{ route('invoices.index',['status'=>3]) }}"--}}
{{--                       class="card bg-orangered hoverable card-xl-stretch mb-xl-8">--}}
{{--                        <div class="card-body card-8">--}}
{{--                                <span class="rotate"><i--}}
{{--                                            class="fas fa-credit-card fa-4x display-4 card-icon text-white"></i></span>--}}
{{--                            <div--}}
{{--                                    class="text-inverse-danger fw-bolder card-count fs-2 mb-2 mt-5 amount-position">{{getCurrencySymbol()}} {{ numberFormat($due_amount) }}</div>--}}
{{--                            <div--}}
{{--                                    class="fw-bold text-inverse-danger fs-7">{{ __('messages.admin_dashboard.total_due') }}</div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                --}}{{-- Products Widget --}}
{{--                <div class="col-xl-3 col-md-6">--}}
{{--                    <a href="{{ route('products.index') }}"--}}
{{--                       class="card bg-warning hoverable card-xl-stretch mb-xl-8">--}}
{{--                        <div class="card-body card-4">--}}
{{--                                <span class="rotate"><i--}}
{{--                                            class="fas fa-cube fa-4x display-4 card-icon text-white"></i></span>--}}
{{--                            <div--}}
{{--                                    class="text-inverse-warning fw-bolder card-count fs-2 mb-2 mt-5 amount-position"> {{ $total_products }}</div>--}}
{{--                            <div--}}
{{--                                    class="fw-bold text-inverse-warning fs-7">{{ __('messages.admin_dashboard.total_products') }}</div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                --}}{{-- Total Invoices Widget --}}
{{--                <div class="col-xl-3 col-md-6">--}}
{{--                    <a href="{{ route('invoices.index') }}"--}}
{{--                       class="card bg-primary hoverable card-xl-stretch mb-xl-8">--}}
{{--                        <div class="card-body card-6">--}}
{{--                                <span class="rotate">--}}
{{--                                    <i class="fas fa-file-invoice fa-4x display-4 card-icon text-white"></i>--}}
{{--                                </span>--}}
{{--                            <div--}}
{{--                                    class="text-inverse-primary fw-bolder card-count fs-2 mb-2 mt-5 amount-position">{{ $total_invoices }}</div>--}}
{{--                            <div--}}
{{--                                    class="fw-bold text-inverse-primary fs-7">{{ __('messages.admin_dashboard.total_invoices') }}</div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                --}}{{--Paid Widget --}}
{{--                <div class="col-xl-3 col-md-6">--}}
{{--                    <a href="{{ route('invoices.index',['status'=>2]) }}"--}}
{{--                       class="card bg-success hoverable card-xl-stretch mb-xl-8">--}}
{{--                        <div class="card-body card-7">--}}
{{--                                <span class="rotate"><i--}}
{{--                                            class="fas fa-clipboard-check fa-4x display-4 card-icon text-white"></i></span>--}}
{{--                            <div--}}
{{--                                    class="text-inverse-dark fw-bolder card-count fs-2 mb-2 mt-5 amount-position">{{ $paid_invoices }}</div>--}}
{{--                            <div class="fw-bold text-inverse-dark fs-7">{{ __('messages.admin_dashboard.total_paid_invoices') }}</div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                --}}{{--Unapid Widget --}}
{{--                <div class="col-xl-3 col-md-6">--}}
{{--                    <a href="{{ route('invoices.index',['status'=>1]) }}"--}}
{{--                       class="card bg-orangered hoverable card-xl-stretch mb-xl-8 ">--}}
{{--                        <div class="card-body card-5">--}}
{{--                            <span class="rotate"><i--}}
{{--                                        class="fas fa-exclamation-triangle fa-4x display-4 card-icon text-white"></i></span>--}}
{{--                            <div--}}
{{--                                    class="text-inverse-primary fw-bolder card-count fs-2 mb-2 mt-5 amount-position">{{ $unpaid_invoices }}</div>--}}
{{--                            <div--}}
{{--                                    class="fw-bold text-inverse-primary fs-7">{{ __('messages.admin_dashboard.total_unpaid_invoices') }}</div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row row g-5 g-xl-8">--}}
{{--                <div class="col-xl-12">--}}
{{--                    <div class="card card-xxl-stretch mb-5 mb-xxl-8">--}}
{{--                        <div class="card-header border-0 pt-5">--}}
{{--                            <h3 class="card-title align-items-start flex-column">--}}
{{--                                <span class="card-label fw-bolder fs-3 mb-1">{{  __('messages.admin_dashboard.income_overview') }}</span>--}}
{{--                            </h3>--}}
{{--                            <div class="col-lg-5 col-xl-3 col-md-4 col-sm-4">--}}
{{--                                <div id="rightData">--}}
{{--                                        <input class="form-control form-control-solid" id="time_range">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="card-body py-3">--}}
{{--                            <div id="yearly_income_overview-container" class="pt-2">--}}
{{--                                <canvas id="yearly_income_chart_canvas"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-6">--}}
{{--                    <div class="card card-xxl-stretch mb-5 mb-xxl-8">--}}
{{--                        <div class="card-header border-0 pt-5">--}}
{{--                            <h3 class="card-title align-items-start flex-column">--}}
{{--                                <span class="card-label fw-bolder fs-3 mb-1">{{  __('messages.admin_dashboard.payment_overview') }}</span>--}}
{{--                            </h3>--}}
{{--                        </div>--}}
{{--                        <div class="card-body py-3">--}}
{{--                            <div id="payment-overview-container" class="pt-2">--}}
{{--                                <canvas id="payment_overview"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-6">--}}
{{--                    <div class="card card-xxl-stretch mb-5 mb-xxl-8">--}}
{{--                        <div class="card-header border-0 pt-5">--}}
{{--                            <h3 class="card-title align-items-start flex-column">--}}
{{--                                <span class="card-label fw-bolder fs-3 mb-1">{{  __('messages.admin_dashboard.invoice_overview') }}</span>--}}
{{--                            </h3>--}}
{{--                        </div>--}}
{{--                        <div class="card-body py-3">--}}
{{--                            <div id="invoice-overview-container" class="pt-2">--}}
{{--                                <canvas id="invoice_overview"></canvas>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
<div class="container-fluid">
    <div class="d-flex flex-column">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="row">
                    {{-- Clients Widget --}}
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <a href="{{ route('clients.index') }}"
                           class="mb-xl-8 text-decoration-none">

                            <div
                                class="bg-primary shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                <div
                                    class="bg-cyan-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-user display-4 card-icon text-white"></i>
                                </div>
                                <div class="text-end text-white">
                                    <h2 class="fs-2-xxl fw-bolder text-white">{{ $total_clients }}</h2>
                                    <h3 class="mb-0 fs-4 fw-light"> {{ __('messages.admin_dashboard.total_clients') }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- Total Invoices Amount Widget --}}
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <a href="{{ route('invoices.index') }}"
                           class="mb-xl-8 text-decoration-none">

                            <div
                                class="bg-success shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                <div
                                    class="bg-cyan-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                    <i class="fa fa-money-check display-4 card-icon text-white"></i>
                                </div>
                                <div class="text-end text-white">
                                    <h2 class="fs-2-xxl fw-bolder text-white">
                                        <span>{{ getCurrencySymbol() }}</span> {{ numberFormat($invoice_amount) }}
                                    </h2>
                                    <h3 class="mb-0 fs-4 fw-light">{{ __('messages.admin_dashboard.total_amount') }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- Recieved Amount Widget --}}
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <a href="{{route('invoices.index',['status'=>2]) }}"
                           class="mb-xl-8 text-decoration-none">

                            <div
                                class="bg-info shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                <div
                                    class="bg-cyan-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-money-bill-wave display-4 card-icon text-white"></i>

                                </div>
                                <div class="text-end text-white">
                                    <h2 class="fs-2-xxl fw-bolder text-white">{{getCurrencySymbol()}} {{ numberFormat($paid_amount) }}</h2>
                                    <h3 class="mb-0 fs-4 fw-light">{{ __('messages.admin_dashboard.total_paid') }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{--Partially Paid Widget --}}
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <a href="{{ route('invoices.index',['status'=>3]) }}"
                           class="mb-xl-8 text-decoration-none">

                            <div
                                class="bg-warning shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                <div
                                    class="bg-cyan-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-credit-card display-4 card-icon text-white"></i>

                                </div>
                                <div class="text-end text-white">
                                    <h2 class="fs-2-xxl fw-bolder text-white">{{getCurrencySymbol()}} {{ numberFormat($due_amount) }}</h2>
                                    <h3 class="mb-0 fs-4 fw-light">{{ __('messages.admin_dashboard.total_due') }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- Products Widget --}}
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <a href="{{ route('products.index') }}"
                           class="mb-xl-8 text-decoration-none">

                            <div
                                class="bg-secondary shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                <div
                                    class="bg-cyan-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-cube display-4 card-icon text-dark"></i>

                                </div>
                                <div class="text-end text-dark">
                                    <h2 class="fs-2-xxl fw-bolder text-dark">{{ $total_products }}</h2>
                                    <h3 class="mb-0 fs-4 fw-light">{{ __('messages.admin_dashboard.total_products') }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- Total Invoices Widget --}}
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <a href="{{ route('invoices.index') }}"
                           class="mb-xl-8 text-decoration-none">

                            <div
                                class="bg-danger shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                <div
                                    class="bg-cyan-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-file-invoice display-4 card-icon text-white"></i>

                                </div>
                                <div class="text-end text-white">
                                    <h2 class="fs-2-xxl fw-bolder text-white">{{ $total_invoices }}</h2>
                                    <h3 class="mb-0 fs-4 fw-light">{{ __('messages.admin_dashboard.total_invoices') }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{--Paid Widget --}}
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <a href="{{ route('invoices.index',['status'=>2]) }}"
                           class="mb-xl-8 text-decoration-none">

                            <div
                                class="bg-dark shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                <div
                                    class="bg-cyan-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-clipboard-check display-4 card-icon {{\Illuminate\Support\Facades\Auth::user()->dark_mode ? 'text-black' : 'text-white'}}"></i>

                                </div>
                                <div
                                    class="text-end {{\Illuminate\Support\Facades\Auth::user()->dark_mode ? 'text-black' : 'text-white'}}">
                                    <h2 class="fs-2-xxl fw-bolder {{\Illuminate\Support\Facades\Auth::user()->dark_mode ? 'text-black' : 'text-white'}}">{{ $paid_invoices }}</h2>
                                    <h3 class="mb-0 fs-4 fw-light">{{ __('messages.admin_dashboard.total_paid_invoices') }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{--Unapid Widget --}}
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <a href="{{ route('invoices.index',['status'=>1]) }}"
                           class="mb-xl-8 text-decoration-none">

                            <div
                                class="bg-primary shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                <div
                                    class="bg-cyan-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-exclamation-triangle display-4 card-icon text-white"></i>

                                </div>
                                <div class="text-end text-white">
                                    <h2 class="fs-2-xxl fw-bolder text-white">{{ $unpaid_invoices }}</h2>
                                    <h3 class="mb-0 fs-4 fw-light">{{ __('messages.admin_dashboard.total_unpaid_invoices') }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-4">
                <div class="row">
                    <div class="card mt-3">
                        <div class="card-body p-5">
                            <div class="card-header border-0 pt-5">
                                <h3 class="mb-0">{{  __('messages.admin_dashboard.income_overview') }}</h3>
                                <div class="ms-auto">
                                    <div id="rightData" class="date-picker-space">
                                        <input class="form-control form-control-solid" id="time_range">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-lg-6 p-0">
                                <div class="">
                                    <div id="yearly_income_overview-container" class="pt-2">
                                        <canvas id="yearly_income_chart_canvas" height="200" width="905"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-12">
                <div class="card">
                    <div class="card-header pb-0 px-10">
                        <h3 class="mb-0">{{  __('messages.admin_dashboard.payment_overview') }}</h3>
                    </div>
                    <div class="card-body pt-7">
                        <div id="payment-overview-container" class="justify-align-center">
                            <canvas id="payment_overview"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-12 ">
                <div class="card">
                    <div class="card-header pb-0 px-10">
                        <h3 class="mb-0">{{  __('messages.admin_dashboard.invoice_overview') }}</h3>
                    </div>
                    <div class="card-body pt-7">
                        <div id="invoice-overview-container" class="justify-align-center">
                            <canvas id="invoice_overview"></canvas>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        let currency = "{{ getCurrencySymbol() }}";
    </script>
    <script src="{{ asset('assets/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/js/chart.min.js') }}"></script>
    <script src="{{ mix('assets/js/dashboard/dashboard.js') }}"></script>
@endsection
