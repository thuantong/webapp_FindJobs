@extends('master.index')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-sm-2 mt-md-4">
                <div class="card-header bg-primary">{{ __('Đăng nhập') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('auth.login',['admin']) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Tên đăng nhập') }}</label>

                            <div class="col-md-7">
{{--                                //autocomplete="email"--}}
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email') }}" required autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mật khẩu') }}</label>

                            <div class="col-md-7">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-7 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Nhớ mật khẩu') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        @if(isset($message_register))
                            <div class="form-group row mb-1" id="show-response-dang-ky">
                                <div class="col-md-12 text-center">
                                   <span class="text-success">{{$message_register}}</span>
                                </div>
                            </div>
                        @endif
                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-primary waves-effect">
                                    {{ __('Đăng nhập') }}
                                </button>

                                <a href="{{route('auth.form.register',['admin'])}}" class="text-primary">{{ __('Tạo tài khoản') }}</a>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Bạn quên mật khẩu?') }}
                                    </a>
                                @endif
                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('scripts')
    <script type="text/javascript">
        $(function () {
            $('input').on('input',function () {
                $('#show-response-dang-ky').remove();
            })
        })
    </script>
    @endpush
