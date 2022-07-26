@extends('layouts.app')
@section('title')
    {{ __('messages.payment-gateway') }}
@endsection
@section('content')
    <div class="container-fluid">
        @include('flash::message')
        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => ['payment-gateway.store'], 'method' => 'post', 'files' => true, 'id' => 'createPaymentGateway']) }}
                <div class="alert alert-danger display-none hide" id="validationErrorsBox"></div>
                <div class="row">
                    <div class="form-group col-sm-5 mb-5">
                        {{ Form::label('stripe_key', __('messages.setting.stripe_key').':', ['class' => 'form-label mb-3']) }}
                        {{ Form::text('stripe_key',$paymentGateway['stripe_key'], ['class' => 'form-control  stripe-key form-control-solid','placeholder' => 'Enter Stripe Key']) }}
                    </div>
                    <div class="form-group col-sm-5 mb-5">
                        {{ Form::label('stripe_secret', __('messages.setting.stripe_secret').':', ['class' => 'form-label stripe-secret-label mb-3']) }}
                        {{ Form::text('stripe_secret',$paymentGateway['stripe_secret'], ['class' => 'form-control stripe-secret form-control-solid','placeholder' => 'Enter Stripe Secret']) }}
                    </div>
                    <div class="form-group col-sm-2 mb-5 mt-10">
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input feature" type="checkbox" value="1"
                                   name="payment_gateway[stripe_enabled]"
                                   {{$paymentGateway['stripe_enabled'] == 1 ? "checked" : ""}}  id="stripe">
                            <span class="form-check-label fw-bold" for="flexSwitchCheckDefault">Stripe</span>&nbsp;&nbsp;
                        </label>
                    </div>
                    <div class="form-group col-sm-5 mb-5">
                        {{ Form::label('paypal_client_id', __('messages.setting.paypal_client_id').':', ['class' => 'form-label paypal-client-id-label mb-3']) }}
                        {{ Form::text('paypal_client_id',$paymentGateway['paypal_client_id'], ['class' => 'form-control  paypal-client-id form-control-solid','placeholder' => 'Enter Paypal Client Id']) }}
                    </div>
                    <div class="form-group col-sm-5 mb-5">
                        {{ Form::label('paypal_secret', __('messages.setting.paypal_secret').':', ['class' => 'form-label paypal-secret-label mb-3']) }}
                        {{ Form::text('paypal_secret',$paymentGateway['paypal_secret'], ['class' => 'form-control paypal-secret form-control-solid','placeholder' => 'Enter Paypal Secret']) }}
                    </div>
                    <div class="form-group col-sm-2 mb-5 mt-10">
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input feature" type="checkbox"
                                   name="payment_gateway[paypal_enabled]"
                                   id="paypal" {{$paymentGateway['paypal_enabled'] == 1 ? "checked" : ""}}>
                            <span class="form-check-label fw-bold" for="flexSwitchCheckDefault">Paypal</span>&nbsp;&nbsp;
                        </label>
                    </div>
                    <div class="form-group col-sm-5 mb-5">
                        {{ Form::label('razorpay_key', __('messages.setting.razorpay_key').':', ['class' => 'form-label razorpay-key-label mb-3']) }}
                        {{ Form::text('razorpay_key',$paymentGateway['razorpay_key'], ['class' => 'form-control razorpay-key form-control-solid','placeholder' => 'Enter Razorpay Key']) }}
                    </div>
                    <div class="form-group col-sm-5 mb-5">
                        {{ Form::label('razorpay_secret', __('messages.setting.razorpay_secret').':', ['class' => 'form-label razorpay-secret-label mb-3']) }}
                        {{ Form::text('razorpay_secret',$paymentGateway['razorpay_secret'], ['class' => 'form-control razorpay-secret form-control-solid','placeholder' => 'Enter Razorpay Secret']) }}
                    </div>
                    <div class="form-group col-sm-2 mb-5 mt-10">
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input feature" type="checkbox" value="1"
                                   name="payment_gateway[razorpay_enabled]"
                                   id="razorpay" {{$paymentGateway['razorpay_enabled'] == 1 ? "checked" : ""}}>
                            <span class="form-check-label fw-bold" for="razorpay">Razorpay</span>&nbsp;&nbsp;
                        </label>
                    </div>
                </div>
                <div class="card-body">
                    <div class="float-end">
                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3']) }}
                            {{ Form::reset(__('messages.common.cancel'), ['class' => 'btn  btn-secondary btn-active-light-primary me-3']) }}
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    {{--    @include('flash::message')--}}
    {{--    @php $styleCss = 'style'; @endphp--}}
    {{--    <div class="card border-0">--}}
    {{--        <div class="row">--}}

    {{--            <div class="card-body">--}}
    {{--                {{ Form::open(['route' => ['payment-gateway.store'], 'method' => 'post', 'files' => true, 'id' => 'createPaymentGateway']) }}--}}
    {{--                <div class="alert alert-danger display-none hide" id="validationErrorsBox"></div>--}}
    {{--                <div class="row">--}}
    {{--                    <div class="form-group col-sm-5 mb-5">--}}
    {{--                        {{ Form::label('stripe_key', __('messages.setting.stripe_key').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
    {{--                        {{ Form::text('stripe_key',$paymentGateway['stripe_key'], ['class' => 'form-control form-control-solid']) }}--}}
    {{--                    </div>--}}
    {{--                    <div class="form-group col-sm-5 mb-5">--}}
    {{--                        {{ Form::label('stripe_secret', __('messages.setting.stripe_secret').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
    {{--                        {{ Form::text('stripe_secret',$paymentGateway['stripe_secret'], ['class' => 'form-control form-control-solid']) }}--}}
    {{--                    </div>--}}
    {{--                    <div class="form-group col-sm-2 mb-5 mt-10">--}}
    {{--                        <div class="form-check form-switch">--}}
    {{--                            <input class="form-check-input" type="checkbox" value="1"--}}
    {{--                                   name="payment_gateway[stripe_enabled]"--}}
    {{--                                   id="stripe" {{$paymentGateway['stripe_enabled'] == 1 ? "checked" : ""}}>--}}
    {{--                            <label class="form-check-label" for="flexSwitchCheckDefault">Stripe</label>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="form-group col-sm-5 mb-5">--}}
    {{--                        {{ Form::label('paypal_client_id', __('messages.setting.paypal_client_id').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
    {{--                        {{ Form::text('paypal_client_id',$paymentGateway['paypal_client_id'], ['class' => 'form-control form-control-solid']) }}--}}
    {{--                    </div>--}}
    {{--                    <div class="form-group col-sm-5 mb-5">--}}
    {{--                        {{ Form::label('paypal_secret', __('messages.setting.paypal_secret').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
    {{--                        {{ Form::text('paypal_secret',$paymentGateway['paypal_secret'], ['class' => 'form-control form-control-solid']) }}--}}
    {{--                    </div>--}}
    {{--                    <div class="form-group col-sm-2 mb-5 mt-10">--}}
    {{--                        <div class="form-check form-switch">--}}
    {{--                            <input class="form-check-input" type="checkbox" value="1"--}}
    {{--                                   name="payment_gateway[paypal_enabled]"--}}
    {{--                                   id="paypal" {{$paymentGateway['paypal_enabled'] == 1 ? "checked" : ""}}>--}}
    {{--                            <label class="form-check-label" for="flexSwitchCheckDefault">Paypal</label>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="form-group col-sm-5 mb-5">--}}
    {{--                        {{ Form::label('razorpay_key', __('messages.setting.razorpay_key').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
    {{--                        {{ Form::text('razorpay_key',$paymentGateway['razorpay_key'], ['class' => 'form-control form-control-solid']) }}--}}
    {{--                    </div>--}}
    {{--                    <div class="form-group col-sm-5 mb-5">--}}
    {{--                        {{ Form::label('razorpay_secret', __('messages.setting.razorpay_secret').':', ['class' => 'form-label fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
    {{--                        {{ Form::text('razorpay_secret',$paymentGateway['razorpay_secret'], ['class' => 'form-control form-control-solid']) }}--}}
    {{--                    </div>--}}
    {{--                    <div class="form-group col-sm-2 mb-5 mt-10">--}}
    {{--                        <div class="form-check form-switch">--}}
    {{--                            <input class="form-check-input" type="checkbox" value="1"--}}
    {{--                                   name="payment_gateway[razorpay_enabled]"--}}
    {{--                                   id="razorpay" {{$paymentGateway['razorpay_enabled'] == 1 ? "checked" : ""}}>--}}
    {{--                            <label class="form-check-label" for="flexSwitchCheckDefault">Razorpay</label>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="row">--}}
    {{--                    <!-- Submit Field -->--}}
    {{--                    <div class="form-group col-sm-12">--}}
    {{--                        {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3']) }}--}}
    {{--                        <a href="{{ route('settings.edit') }}"--}}
    {{--                           class="btn  btn-light btn-active-light-primary me-3">{{ __('messages.common.cancel') }}</a>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                {{ Form::close() }}--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
