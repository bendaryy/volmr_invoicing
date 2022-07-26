<div id="editModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h2>{{__('messages.category.edit_category')}}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>

            </div>
            {{ Form::open(['id'=>'editForm']) }}
            <div class="modal-body scroll-y">
                <div class="alert alert-danger display-none hide" id="editValidationErrorsBox"></div>
                {{ Form::hidden('categoryId',null,['id'=>'categoryId']) }}
                <div class="row">
                    <div class="form-group col-sm-12 mb-5">
                        {{ Form::label('name',__('messages.common.name').':', ['class' => 'form-label required mb-3']) }}
                        {{ Form::text('name', null, ['id'=>'editCategoryName','class' => 'form-control form-control-solid','required','placeholder' => 'Enter Category']) }}
                    </div>
                </div>
            </div>
            <div class="modal-footer pt-0">
                {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-2','id' => 'btnEditSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}
                <button type="button" class="btn btn-secondary btn-active-light-primary me-3"
                        data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>


{{--<div id="editModal" class="modal fade" role="dialog" tabindex="-1" aria-hidden="true">--}}
{{--    <div class="modal-dialog">--}}
{{--        <!-- Modal content-->--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h2>{{__('messages.category.edit_category')}}</h2>--}}
{{--                <button type="button" aria-label="Close" class="btn btn-sm btn-icon btn-active-color-primary"--}}
{{--                        data-bs-dismiss="modal">--}}
{{--                    <span class="svg-icon svg-icon-1">--}}
{{--						<svg xmlns="https://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"--}}
{{--                             version="1.1">--}}
{{--							<g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"--}}
{{--                               fill="#000000">--}}
{{--								<rect fill="#000000" x="0" y="7" width="16" height="2" rx="1"/>--}}
{{--								<rect fill="#000000" opacity="0.5"--}}
{{--                                      transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"--}}
{{--                                      x="0" y="7" width="16" height="2" rx="1"/>--}}
{{--							</g>--}}
{{--						</svg>--}}
{{--					</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            {{ Form::open(['id'=>'editForm']) }}--}}
{{--            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">--}}
{{--                <div class="alert alert-danger display-none hide" id="editValidationErrorsBox"></div>--}}
{{--                {{ Form::hidden('categoryId',null,['id'=>'categoryId']) }}--}}
{{--                <div class="row">--}}
{{--                    <div class="form-group col-sm-12 mb-5">--}}
{{--                        {{ Form::label('name',__('messages.common.name').':', ['class' => 'form-label required fs-6 fw-bolder text-gray-700 mb-3']) }}--}}
{{--                        {{ Form::text('name', null, ['id'=>'editCategoryName','class' => 'form-control form-control-solid','required']) }}--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="text-right mt-5">--}}
{{--                    {{ Form::button(__('messages.common.save'), ['type' => 'submit','class' => 'btn btn-primary me-2','id' => 'btnEditSave','data-loading-text' => "<span class='spinner-border spinner-border-sm'></span> Processing..."]) }}--}}
{{--                    <button type="button" class="btn btn-light btn-active-light-primary me-2"--}}
{{--                            data-bs-dismiss="modal">{{ __('messages.common.cancel') }}</button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            {{ Form::close() }}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
