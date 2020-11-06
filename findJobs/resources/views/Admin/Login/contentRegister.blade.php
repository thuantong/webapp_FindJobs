{{--<form method="POST" action="{{ route('auth.register',['admin']) }}">--}}
{{--    @csrf--}}

{{--    <div class="form-group row">--}}
{{--        --}}{{--                            <input type="hidden" id="roleRegister" name="roleRegister" value="{{$role}}">--}}
{{--        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Họ và tên') }}</label>--}}

{{--        <div class="col-md-6">--}}
{{--            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>--}}

{{--            @error('name')--}}
{{--            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="form-group row">--}}
{{--        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Tên tài khoản hoặc Email:') }}</label>--}}

{{--        <div class="col-md-6">--}}
{{--            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">--}}

{{--            @error('email')--}}
{{--            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="form-group row">--}}
{{--        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Số điện thoại') }}</label>--}}

{{--        <div class="col-md-6">--}}
{{--            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="off">--}}

{{--            @error('phone')--}}
{{--            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="form-group row">--}}
{{--        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>--}}

{{--        <div class="col-md-6">--}}
{{--            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">--}}

{{--            @error('password')--}}
{{--            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--            @enderror--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="form-group row">--}}
{{--        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Nhập lại mật khẩu') }}</label>--}}

{{--        <div class="col-md-6">--}}
{{--            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    --}}{{--                        <div class="form-group row">--}}
{{--    --}}{{--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __(' ') }}</label>--}}

{{--    --}}{{--                            <div class="col-md-6">--}}
{{--    --}}{{--                                <div class="custom-control custom-radio">--}}
{{--    --}}{{--                                    <input type="radio" id="customRadio1" name="loai_tai_khoan" class="custom-control-input" value="1" checked>--}}
{{--    --}}{{--                                    <label class="custom-control-label" for="customRadio1">{{__('Tài khoản tìm việc')}}</label>--}}
{{--    --}}{{--                                </div>--}}
{{--    --}}{{--                                <div class="custom-control custom-radio">--}}
{{--    --}}{{--                                    <input type="radio" id="customRadio2" name="loai_tai_khoan" class="custom-control-input" value="2">--}}
{{--    --}}{{--                                    <label class="custom-control-label" for="customRadio2">{{__('Tài khoản tuyển dụng')}} </label>--}}
{{--    --}}{{--                                </div>--}}
{{--    --}}{{--                            </div>--}}
{{--    --}}{{--                        </div>--}}

{{--    <div class="form-group row mb-0">--}}
{{--        <div class="col-md-6 offset-md-4">--}}
{{--            <button type="submit" class="btn btn-primary">--}}
{{--                {{ __('Đăng ký') }}--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</form>--}}
<form method="POST" action="{{ route('auth.register',['admin']) }}">
    @csrf

    <div class="form-group row">
        {{--                            <input type="hidden" id="roleRegister" name="roleRegister" value="{{$role}}">--}}
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Họ và tên') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email-confirmed" class="col-md-4 col-form-label text-md-right">{{ __('Địa chỉ E-Mail') }}</label>

        <div class="col-md-6">
            <input id="email-confirmed" type="email" class="form-control @error('email_confirmed') is-invalid @enderror" name="email_confirmed" value="{{ old('email_confirmed') }}" required autocomplete="off">

            @error('email_confirmed')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="user-name" class="col-md-4 col-form-label text-md-right">{{ __('Tên tài khoản') }}</label>

        <div class="col-md-6">
            <input id="user-name" type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" value="{{ old('user_name') }}" required autocomplete="off">

            @error('user_name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Số điện thoại') }}</label>

        <div class="col-md-6">
            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="off">

            @error('phone')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Nhập lại mật khẩu') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Đăng ký') }}
            </button>
        </div>
    </div>
</form>
