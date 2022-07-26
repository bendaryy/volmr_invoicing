@extends('settings.edit')
@section('title')
    {{ __('messages.settings') }}
@endsection
@section('section')
    @php $styleCss = 'style'; @endphp
    <div class="card border-0">
        <div class="card-body">
            {{ Form::open(['route' => ['settings.update'], 'method' => 'post', 'files' => true, 'id' => 'createSetting']) }}
            <div class="alert alert-danger display-none hide" id="validationErrorsBox"></div>
            <div class="row">
                <div class="form-group col-sm-6 mb-5">
                    {{ Form::label('app_name', __('messages.setting.app_name').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                    {{ Form::text('app_name', $settings['app_name'], ['class' => 'form-control form-control-solid', 'required']) }}
                </div>
                <div class="form-group col-sm-6 mb-5">
                    {{ Form::label('company_name', __('messages.setting.company_name').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                    {{ Form::text('company_name', $settings['company_name'], ['class' => 'form-control form-control-solid', 'required']) }}
                </div>
                <div class="form-group col-sm-3 mb-5">
                    {{ Form::label('company_phone', __('messages.setting.company_phone').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                    <br>
                    {{ Form::tel('company_phone', $settings['company_phone'], ['class' => 'form-control form-control-solid','id' => 'phoneNumber', 'onkeyup' => 'if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,"")','required']) }}
                    {{ Form::hidden('prefix_code',null,['id'=>'prefix_code']) }}
                    <span id="valid-msg" class="hide">✓ &nbsp; Valid</span>
                    <span id="error-msg" class="hide"></span>
                </div>
                <div class="form-group col-sm-3 mb-5">
                    {{ Form::label('date_format', __('messages.setting.date_format').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                    {{ Form::select('date_format',$dateFormats,$settings['date_format'],['class'=>'form-select form-select-solid','id'=>'dateFormat']) }}
                </div>
                <div class="form-group col-sm-3 mb-5">
                    {{ Form::label('timezone', __('messages.setting.timezone').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                    {{ Form::select('time_zone',$timezones,getCurrentTimeZone(),['class'=>'form-select form-select-solid','id'=>'timeZone']) }}
                </div>
                <div class="form-group col-sm-3 mb-5">
                    {{ Form::label('current_currency', __('messages.setting.currencies').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                    <select id="currencyType" data-show-content="true" class="form-select form-select-solid"
                            name="current_currency">
                        @foreach($currencies as $key => $currency)
                            <option value="{{ $currency['id'] }}" {{ getSettingValue('current_currency') == $currency['id'] ? 'selected' : ''}}>
                                {{$currency['icon']}}&nbsp;&nbsp;&nbsp; {{$currency['name']}}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-3 mb-5">
                    {{ Form::label('time_format', __('messages.setting.time_format').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                    <div class="radio-button-group">
                        <div class="btn-group btn-group-toggle m-0" data-toggle="buttons">
                            <input type="radio" name="time_format" id="time_format-0"
                                   value="0" {{ isset($settings) ? ($settings['time_format'] == 0 ? 'checked' : '') : 'checked' }}>
                            <label for="time_format-0" class="me-2" role="button">12 Hour</label>

                            <input type="radio" name="time_format" id="time_format-1"
                                   value="1" {{ isset($settings) ? ($settings['time_format'] == 0 ? '' : 'checked') : '' }}>
                            <label for="time_format-1" role="button">24 Hour</label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-3 mb-5">
                    {{ Form::label('decimal_separator', __('messages.setting.decimal_separator').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                    <div class="radio-button-group">
                        <div class="btn-group btn-group-toggle m-0" data-toggle="buttons">
                            <input type="radio" class="decimal_separator-0" name="decimal_separator"
                                   id="decimal_separator-0"
                                   value="." {{ ($settings['decimal_separator'] == '.') ? 'checked' : '' }}>
                            <label for="decimal_separator-0" class="me-2" role="button">DOT(.)</label>

                            <input type="radio" class="decimal_separator-1" name="decimal_separator"
                                   id="decimal_separator-1"
                                   value="," {{ ($settings['decimal_separator'] == ',') ? 'checked' : '' }}>
                            <label for="decimal_separator-1" role="button">COMMA(,)</label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-3 mb-5">
                    {{ Form::label('thousand_separator', __('messages.setting.thousand_separator').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                    <div class="radio-button-group">
                        <div class="btn-group btn-group-toggle m-0" data-toggle="buttons">
                            <input type="radio" name="thousand_separator" id="thousand_separator-0"
                                   value="." {{ ($settings['thousand_separator'] == '.') ? 'checked' : '' }}>
                            <label for="thousand_separator-0" class="me-2" role="button">DOT(.)</label>

                            <input type="radio" name="thousand_separator" id="thousand_separator-1"
                                   value="," {{ ($settings['thousand_separator'] == ',') ? 'checked' : '' }}>
                            <label for="thousand_separator-1" role="button">COMMA(,)</label>
                        </div>
                    </div>
                </div>
                <div class="form-group col-sm-3 mb-5">
                    {{ Form::label('mail_notifications', __('messages.setting.mail_notifications').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                    <div class="radio-button-group">
                        <div class="btn-group btn-group-toggle m-0" data-toggle="buttons">
                            <input type="radio" name="mail_notification" id="mail_notification-0"
                                   value="1" {{ isset($settings) ? ($settings['mail_notification'] == 0 ? '' : 'checked') : '' }}>
                            <label for="mail_notification-0" class="me-2" role="button">Yes</label>

                            <input type="radio" name="mail_notification" id="mail_notification-1"
                                   value="0" {{ isset($settings) ? ($settings['mail_notification'] == 0 ? 'checked' : '') : 'checked' }}>
                            <label for="mail_notification-1" role="button">No</label>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('company_address', __('messages.setting.company_address').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}
                        {{ Form::textarea('company_address', $settings['company_address'], ['class' => 'form-control form-control-solid','rows'=>5,'cols'=>5, 'required','id'=>'companyAddress']) }}
                    </div>
                    <div class="form-group col-sm-6 mb-5">
                        <div class="form-group col-sm-6 mb-5">
                            <div class="mb-3" io-image-input="true">
                                <label for="appLogoPreview"
                                       class="form-label required">{{ __('messages.setting.app_logo').':'}}</label>
                                <div class="d-block">
                                    <div class="image-picker">
                                        <div class="image previewImage" id="appLogoPreview"
                                        {{ $styleCss }}="
                                        background-image: url({{ ($settings['app_logo'] !=null) ? asset($settings['app_logo']) : asset('assets/images/infyom.png') }}
                                        )">
                                    </div>
                                    <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip" title="edit">
                                            <label>
                                                <i class="fa-solid fa-pen" id="appLogoIcon"></i>
                                                <input type="file" id="appLogo" name="app_logo"
                                                       class="image-upload d-none" accept="image/*"/>
                                                {{--                                <input type="hidden" name="avatar_remove">--}}
                                            </label>
                                             </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Company Logo Field -->
                <div class="form-group col-sm-6 mb-5">
                    <div class="mb-3" io-image-input="true">
                        <label for="faviconPreview"
                               class="form-label required"> {{__('messages.setting.fav_icon').(':')}}</label>
                        <div class="d-block">
                            <div class="image-picker">
                                <div class="image previewImage" id="faviconPreview"
                                {{ $styleCss }}="
                                background-image: url({{ ($settings['favicon_icon'] !=null) ? asset($settings['favicon_icon']) : asset('assets/images/favicon.png') }}
                                );">
                            </div>
                            <span class="picker-edit rounded-circle text-gray-500 fs-small" data-bs-toggle="tooltip" title="edit">
                                    <label>
                                        <i class="fa-solid fa-pen" id="faviconImageIcon"></i>
                                        <input type="file" id="favicon_icon" name="favicon_icon"
                                               class="image-upload d-none"
                                               accept="image/*"/>
                                        {{--                            <input type="hidden" name="avatar_remove">--}}
                                    </label>
                                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <!-- Submit Field -->
        <div class="form-group col-sm-12">
            {{ Form::submit(__('messages.common.save'), ['class' => 'btn btn-primary me-3']) }}
            <a href="{{ route('settings.edit') }}"
               class="btn  btn-light btn-active-light-primary me-3">{{ __('messages.common.cancel') }}</a>
        </div>
    </div>
    {{ Form::close() }}
    </div>
    </div>
@endsection
