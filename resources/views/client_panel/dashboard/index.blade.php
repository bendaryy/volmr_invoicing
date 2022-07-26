@extends('client_panel.layouts.app')
@section('title')
    {{__('messages.dashboard')}}
@endsection
{{--@section('css')--}}
{{--    <link href="{{ mix('assets/css/dashboard.css') }}" rel="stylesheet" type="text/css"/>--}}
{{--@endsection--}}
@section('content')
{{--    <div class="post d-flex flex-column-fluid" id="kt_post">--}}
{{--        <div id="kt_content_container" class="container">--}}
{{--            <div class="row g-5 gx-xxl-8 justify-content-center">--}}
{{--                --}}{{-- Payments Widget --}}
{{--                <div class="col-xl-4 col-md-6">--}}
{{--                    <a href="{{ route('client.invoices.index') }}"--}}
{{--                       class="card bg-primary hoverable card-xl-stretch mb-xl-8">--}}
{{--                        <div class="card-body card-3">--}}
{{--                                <span class="rotate"><i--}}
{{--                                            class="fa fa-money-check fa-4x display-4 card-icon text-white"></i></span>--}}
{{--                            <div--}}
{{--                                    class="text-inverse-info fw-bolder card-count fs-2 mb-2 mt-5 amount-position">{{getCurrencySymbol()}} {{ numberFormat($total_payments) }} </div>--}}
{{--                            <div--}}
{{--                                    class="fw-bold text-inverse-info fs-7">{{ __('messages.admin_dashboard.total_payments') }}</div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                --}}{{-- Paid Widget --}}
{{--                <div class="col-xl-4 col-md-6">--}}
{{--                    <a href="{{ route('client.invoices.index',['status'=>2]) }}"--}}
{{--                       class="card bg-success hoverable card-xl-stretch mb-xl-8">--}}
{{--                        <div class="card-body card-8">--}}
{{--                                <span class="rotate"><i--}}
{{--                                            class="fas fa-money-bill-wave fa-4x display-4 card-icon text-white"></i></span>--}}
{{--                            <div--}}
{{--                                    class="text-inverse-dark fw-bolder card-count fs-2 mb-2 mt-5 amount-position">{{ getCurrencySymbol() }}--}}
{{--                                &nbsp;{{ numberFormat($paid_amount) }}</div>--}}
{{--                            <div--}}
{{--                                    class="fw-bold text-inverse-dark fs-7">{{ __('messages.admin_dashboard.total_paid') }}</div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                --}}{{-- Due Widget --}}
{{--                <div class="col-xl-4 col-md-6">--}}
{{--                    <a href="{{ route('client.invoices.index',['status'=>3]) }}"--}}
{{--                       class="card bg-orangered hoverable card-xl-stretch mb-xl-8">--}}
{{--                        <div class="card-body card-4">--}}
{{--                                <span class="rotate"><i--}}
{{--                                            class="fas fa-credit-card fa-4x display-4 card-icon text-white"></i></span>--}}
{{--                            <div--}}
{{--                                    class="text-inverse-danger fw-bolder card-count fs-2 mb-2 mt-5 amount-position">{{ getCurrencySymbol() }}--}}
{{--                                &nbsp;{{ numberFormat($due_amount) }}</div>--}}
{{--                            <div--}}
{{--                                    class="fw-bold text-inverse-danger fs-7">{{ __('messages.admin_dashboard.total_due') }}</div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                --}}{{-- Invoices Widget --}}
{{--                <div class="col-xl-4 col-md-6">--}}
{{--                    <a href="{{ route('client.invoices.index') }}"--}}
{{--                       class="card bg-primary hoverable card-xl-stretch mb-xl-8">--}}
{{--                        <div class="card-body card-1">--}}
{{--                            <span class="rotate"><i--}}
{{--                                        class="fas fa-file-invoice fa-4x display-4 card-icon text-white"></i></span>--}}
{{--                            <div--}}
{{--                                    class="text-inverse-primary fw-bolder card-count fs-2 mb-2 mt-5 amount-position">{{ $total_invoices }}</div>--}}
{{--                            <div--}}
{{--                                    class="fw-bold text-inverse-primary fs-7">{{ __('messages.admin_dashboard.total_invoices') }}</div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                --}}{{--Paid Widget --}}
{{--                <div class="col-xl-4 col-md-6">--}}
{{--                    <a href="{{ route('client.invoices.index',['status'=>2]) }}"--}}
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
{{--                <div class="col-xl-4 col-md-6">--}}
{{--                    <a href="{{ route('client.invoices.index',['status'=>1]) }}"--}}
{{--                       class="card bg-orangered hoverable card-xl-stretch mb-xl-8">--}}
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
{{--        </div>--}}
{{--    </div>--}}
<div class="container-fluid">
    <div class="d-flex flex-column">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="row">
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <a href="{{ route('client.invoices.index') }}"
                           class="mb-xl-8 text-decoration-none">

                            <div
                                class="bg-primary shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                <div
                                    class="bg-cyan-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                    <i class="fa fa-money-check display-4 card-icon text-white"></i>
                                </div>
                                <div class="text-end text-white">
                                    <h2 class="fs-2-xxl fw-bolder text-white">{{getCurrencySymbol()}} {{ numberFormat($total_payments) }}</h2>
                                    <h3 class="mb-0 fs-4 fw-light">{{ __('messages.admin_dashboard.total_payments') }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <a href="{{ route('client.invoices.index',['status'=>2]) }}"
                           class="mb-xl-8 text-decoration-none">

                            <div
                                class="bg-success shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                <div
                                    class="bg-cyan-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-money-bill-wave display-4 card-icon text-white"></i>
                                </div>
                                <div class="text-end text-white">
                                    <h2 class="fs-2-xxl fw-bolder text-white">{{getCurrencySymbol() }}
                                        &nbsp;{{ numberFormat($paid_amount) }}
                                    </h2>
                                    <h3 class="mb-0 fs-4 fw-light">{{ __('messages.admin_dashboard.total_paid') }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <a href="{{ route('client.invoices.index',['status'=>3]) }}"
                           class="mb-xl-8 text-decoration-none">

                            <div
                                class="bg-info shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                <div
                                    class="bg-cyan-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-credit-card display-4 card-icon text-white"></i>

                                </div>
                                <div class="text-end text-white">
                                    <h2 class="fs-2-xxl fw-bolder text-white">{{ getCurrencySymbol() }}
                                        &nbsp;{{ numberFormat($due_amount) }}
                                    </h2>
                                    <h3 class="mb-0 fs-4 fw-light">{{ __('messages.admin_dashboard.total_due') }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <a href="{{ route('client.invoices.index') }}"
                           class="mb-xl-8 text-decoration-none">

                            <div
                                class="bg-warning shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                <div
                                    class="bg-cyan-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-file-invoice display-4 card-icon text-white"></i>

                                </div>
                                <div class="text-end text-white">
                                    <h2 class="fs-2-xxl fw-bolder text-white">{{ $total_invoices }}
                                    </h2>
                                    <h3 class="mb-0 fs-4 fw-light">{{ __('messages.admin_dashboard.total_invoices') }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <a href="{{ route('client.invoices.index',['status'=>2]) }}"
                           class="mb-xl-8 text-decoration-none">

                            <div
                                class="bg-secondary shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                <div
                                    class="bg-cyan-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-clipboard-check display-4 card-icon text-dark"></i>

                                </div>
                                <div class="text-end text-dark">
                                    <h2 class="fs-2-xxl fw-bolder text-dark">{{ $paid_invoices }}
                                    </h2>
                                    <h3 class="mb-0 fs-4 fw-light">{{ __('messages.admin_dashboard.total_paid_invoices') }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xxl-3 col-xl-4 col-sm-6 widget">
                        <a href="{{ route('client.invoices.index',['status'=>1]) }}"
                           class="mb-xl-8 text-decoration-none">

                            <div
                                class="bg-danger shadow-md rounded-10 p-xxl-10 px-7 py-10 d-flex align-items-center justify-content-between my-3">
                                <div
                                    class="bg-cyan-300 widget-icon rounded-10 d-flex align-items-center justify-content-center">
                                    <i class="fas fa-exclamation-triangle display-4 card-icon text-white"></i>

                                </div>
                                <div class="text-end text-white">
                                    <h2 class="fs-2-xxl fw-bolder text-white">{{ $unpaid_invoices }}
                                    </h2>
                                    <h3 class="mb-0 fs-4 fw-light">{{ __('messages.admin_dashboard.total_unpaid_invoices') }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
