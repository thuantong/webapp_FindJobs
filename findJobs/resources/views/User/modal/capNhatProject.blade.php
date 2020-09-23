<div class="modal fade" id="modal-cap-nhat-project" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalScrollableTitle">{{__('Cập nhật dự án')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
{{--                <form id="post-mat-khau-moi" method="post" action="{{route('user.doiMatKhau')}}">--}}
{{--                    @csrf--}}
{{--                    <div class="form-group row">--}}
{{--                        <label for="password-old"--}}
{{--                               class="col-sm-12 col-md-5 col-lg-5 col-xl-5 col-form-label text-sm-center text-md-right">{{ __('Nhập mật khẩu cũ') }}</label>--}}

{{--                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">--}}
{{--                            <input id="password-old" type="password"--}}
{{--                                   class="password-old form-control @error('password-old') is-invalid @enderror" name="password-old"--}}
{{--                                   value="" required autofocus title="{{ __('Nhập mật khẩu cũ') }}">--}}

{{--                                                        @error('password-old')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong></strong>--}}
{{--                                    </span>--}}
{{--                                                        @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group row">--}}
{{--                        <label for="password-new"--}}
{{--                               class="col-sm-12 col-md-5 col-lg-5 col-xl-5 col-form-label text-sm-center text-md-right">{{ __('Nhập mật khẩu mới') }}</label>--}}

{{--                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">--}}
{{--                            <input id="password-new" type="password"--}}
{{--                                   class="password-new form-control @error('password-new') is-invalid @enderror" name="password-new"--}}
{{--                                   value="" required autofocus title="{{ __('Nhập mật khẩu mới') }}">--}}

{{--                                                        @error('password-new')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong></strong>--}}
{{--                                    </span>--}}
{{--                                                        @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="form-group row">--}}
{{--                        <label for="re-password-new"--}}
{{--                               class="col-sm-12 col-md-5 col-lg-5 col-xl-5 col-form-label text-sm-center text-md-right">{{ __('Nhập lại mật khẩu mới') }}</label>--}}

{{--                        <div class="col-md-6 col-lg-6 col-xl-6">--}}
{{--                            <input id="re-password-new" type="password"--}}
{{--                                   class="re-password-new form-control @error('re-password-new') is-invalid @enderror"--}}
{{--                                   name="re-password-new" value="" required autofocus title="{{ __('Nhập lại mật khẩu mới') }}">--}}

{{--                                                        @error('re-password-new')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong></strong>--}}
{{--                                    </span>--}}
{{--                                                        @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-form-label text-sm-center text-md-right">{{ __('Tên dự án') }}</label>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <input type="hidden" id="project-index" value="">
                        <input type="text"
                               class="form-control"
                               value="" required autofocus title="{{ __('Nhập tên dự án') }}">
                    </div>
                    <div class="col-sm-12 d-sm-none col-md-2 col-lg-2 col-xl-2">

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-form-label text-sm-center text-md-right">{{ __('Thời gian bắt đầu') }}</label>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <input type="text"
                               class="form-control"
                               value="" required autofocus title="{{ __('Nhập thời gian bắt đầu') }}">
                    </div>
                    <div class="col-sm-12 d-sm-none col-md-2 col-lg-2 col-xl-2">

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-form-label text-sm-center text-md-right">{{ __('Thời gian hoàn thành') }}</label>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <input type="text"
                               class="form-control"
                               value="" required autofocus title="{{ __('Thời gian hoàn thành') }}">
                    </div>
                    <div class="col-sm-12 d-sm-none col-md-2 col-lg-2 col-xl-2">

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-form-label text-sm-center text-md-right">{{ __('Trạng thái') }}</label>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <input type="text"
                               class="form-control"
                               value="" required autofocus title="{{ __('Trạng thái') }}">
                    </div>
                    <div class="col-sm-12 d-sm-none col-md-2 col-lg-2 col-xl-2">

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-12 col-md-4 col-lg-4 col-xl-4 col-form-label text-sm-center text-md-right">{{ __('Liên kết') }}</label>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <textarea class="form-control" value="" required autofocus title="{{ __('Liên kết') }}"></textarea>
                    </div>
                    <div class="col-sm-12 d-sm-none col-md-2 col-lg-2 col-xl-2">

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Thoát')}}</button>
                <button type="button" class="btn btn-primary" id="save-doi-mat-khau">{{__('Cập nhật')}}</button>
            </div>
        </div>
    </div>
</div>
