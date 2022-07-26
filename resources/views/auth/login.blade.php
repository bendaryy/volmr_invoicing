{{--@extends('layouts.auth')--}}
{{--@section('title')--}}
{{--    Login--}}
{{--@endsection--}}
{{--@section('content')--}}
{{--    <!--begin::Main-->--}}
{{--    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">--}}
{{--        <a href="#" class="mb-12">--}}
{{--            <img alt="Logo" src="{{ getLogoUrl() }}" class="h-45px logo"/>--}}
{{--        </a>--}}
{{--        @include('flash::message')--}}
{{--        <div class="w-lg-500px">--}}
{{--            @include('layouts.errors')--}}
{{--            @if(Session::has('status'))--}}
{{--                <div class="alert alert-success  pb-3 pt-3 mb-2">--}}
{{--                    <div class="d-flex">--}}
{{--                        <span class="svg-icon svg-icon-2hx svg-icon-success me-4 mb-5 mb-sm-0">--}}
{{--                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"--}}
{{--                                 fill="none">--}}
{{--                                <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd"--}}
{{--                                      d="M5.69477 2.48932C4.00472 2.74648 2.66565 3.98488 2.37546 5.66957C2.17321 6.84372 2 8.33525 2 10C2 11.6647 2.17321 13.1563 2.37546 14.3304C2.62456 15.7766 3.64656 16.8939 5 17.344V20.7476C5 21.5219 5.84211 22.0024 6.50873 21.6085L12.6241 17.9949C14.8384 17.9586 16.8238 17.7361 18.3052 17.5107C19.9953 17.2535 21.3344 16.0151 21.6245 14.3304C21.8268 13.1563 22 11.6647 22 10C22 8.33525 21.8268 6.84372 21.6245 5.66957C21.3344 3.98488 19.9953 2.74648 18.3052 2.48932C16.6859 2.24293 14.4644 2 12 2C9.53559 2 7.31411 2.24293 5.69477 2.48932Z"--}}
{{--                                      fill="#191213"></path>--}}
{{--                                <path fill-rule="evenodd" clip-rule="evenodd"--}}
{{--                                      d="M7 7C6.44772 7 6 7.44772 6 8C6 8.55228 6.44772 9 7 9H17C17.5523 9 18 8.55228 18 8C18 7.44772 17.5523 7 17 7H7ZM7 11C6.44772 11 6 11.4477 6 12C6 12.5523 6.44772 13 7 13H11C11.5523 13 12 12.5523 12 12C12 11.4477 11.5523 11 11 11H7Z"--}}
{{--                                      fill="#121319"></path>--}}
{{--                            </svg>--}}
{{--                        </span>--}}
{{--                        <div class="d-flex flex-column">--}}
{{--                            <span>{{ Session::get('status') }}</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--        <div class="w-lg-500px bg-white rounded shadow-sm p-10 p-lg-15 mx-auto">--}}
{{--            <form class="form w-100" method="POST" action="{{ route('login') }}">--}}
{{--                @csrf--}}
{{--                <div class="text-center mb-10">--}}
{{--                    <h1 class="text-dark mb-3">Sign In to {{ getAppName() }}</h1>--}}
{{--                                        <div class="text-gray-400 fw-bold fs-4">New Here?--}}
{{--                                            <a href="{{ route('register') }}" class="link-primary fw-bolder">Create--}}
{{--                                                an Account</a>--}}
{{--                                        </div>--}}
{{--                </div>--}}
{{--                <!-- Email Address -->--}}
{{--                <div class="fv-row mb-10">--}}
{{--                    <label class="form-label fs-6 fw-bolder text-dark required" for="email">Email:</label>--}}
{{--                    <input id="email" class="form-control form-control-lg form-control-solid" value="{{ old('email') }}"--}}
{{--                           type="email" name="email" required autocomplete="off" autofocus/>--}}

{{--                    <div class="invalid-feedback">--}}
{{--                        {{ $errors->first('email') }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Password -->--}}
{{--                <div class="fv-row mb-10">--}}
{{--                    <div class="d-flex flex-stack mb-2">--}}
{{--                        <label class="form-label fw-bolder text-dark fs-6 mb-0 required"--}}
{{--                               for="password">Password:</label>--}}

{{--                        @if (Route::has('password.request'))--}}
{{--                            <a class="link-primary fs-6 fw-bolder"--}}
{{--                               href="{{ route('password.request') }}">--}}
{{--                                {{ __('Forgot your password?') }}--}}
{{--                            </a>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                    <input id="password" class="form-control form-control-lg form-control-solid"--}}
{{--                           type="password"--}}
{{--                           name="password"--}}
{{--                           required autocomplete="current-password"/>--}}
{{--                    <div class="invalid-feedback">--}}
{{--                        {{ $errors->first('password') }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!-- Remember Me -->--}}
{{--                <div class="fv-row mb-10">--}}
{{--                    <label class="form-check form-check-custom form-check-solid form-check-inline" for="remember_me">--}}
{{--                        <input class="form-check-input" id="remember_me" type="checkbox" name="remember"/>--}}
{{--                        <span class="form-check-label fw-bold text-gray-700 fs-6">{{ __('Remember me') }}</span>--}}
{{--                    </label>--}}
{{--                </div>--}}
{{--                <div class="text-center">--}}
{{--                    <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">--}}
{{--                        <span class="indicator-label">{{ __('Login') }}</span>--}}
{{--                        <span class="indicator-progress">{{ __('messages.common.please_wait') }}--}}
{{--									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!--end::Main-->--}}
{{--@endsection--}}

@extends('layouts.auth')
@section('title')
    Login
@endsection
@section('content')
    <div class="d-flex flex-column flex-column-fluid align-items-center justify-content-center p-4">
        <div class="col-12 text-center">
            <a href="{{ url('/') }}" class="image mb-7 mb-sm-10 image-medium">
                <img alt="Logo" src="{{getLogoUrl() }}" class="img-fluid object-contain">
            </a>
        </div>
        <div class="width-540">
            @include('flash::message')
            @include('layouts.errors')
        </div>
        <div class="bg-white rounded-15 shadow-md width-540 px-5 px-sm-7 py-10 mx-auto">
            <h1 class="text-center mb-7">Sign In</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-sm-7 mb-4">
                    <label for="email" class="form-label">
                        {{ __('messages.user.email').':' }}<span class="required"></span>
                    </label>
                    <input name="email" type="email" class="form-control" autofocus id="email" aria-describedby="emailHelp" required placeholder=" {{ __('messages.user.email') }}">
                </div>
                <div class="mb-sm-7 mb-4">
                    <div class="d-flex justify-content-between">
                        <label for="password" class="form-label">Password:<span
                                    class="required"></span></label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="link-info fs-6 text-decoration-none">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                    <div class="mb-3 position-relative">
                        <input name="password" type="password" class="form-control" id="password" required placeholder="{{ __('Password')}}" aria-label="Password" data-toggle="password">
                        <span class="position-absolute d-flex align-items-center top-0 bottom-0 end-0 me-4 input-icon input-password-hide cursor-pointer text-gray-600">
                                <i class="bi bi-eye-slash-fill"></i>
                            </span>
                    </div>
                </div>
                <div class="mb-sm-7 mb-4 form-check">
                    <input type="checkbox" class="form-check-input" id="remember_me" >
                    <label class="form-check-label" for="remember_me">{{ __('Remember me') }}</label>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                </div>
{{--                <div class="d-flex align-items-center mb-10 mt-4">--}}
{{--                    <span class="text-gray-700 me-2">{{ __('New Here?') }}</span>--}}
{{--                    <a href="{{ route('register') }}" class="link-info fs-6 text-decoration-none">--}}
{{--                        {{ __('Create an Account') }}--}}
{{--                    </a>--}}
{{--                </div>--}}
            </form>
        </div>
    </div>
@endsection

