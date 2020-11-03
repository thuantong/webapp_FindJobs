@extends('master.index')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary">{{ __('Xác thực thông tin Email của bạn') }}</div>

                <div class="card-body">
{{--                    @if (session('resent'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ __('A fresh verification link has been sent to your email address.') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

                    {{ __('Để sử dụng dịch vụ của ứng đụng trang,') }}
                    {{ __('Bạn cần xác thực lại thông tin email của mình! Và sau đó,Kiểm tra lại hộp thư của emai: ')}}
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-12">
                            <div class="input-group">
                                <input class="form-control" value="{{Auth::user()->email}}">
                                <button class="btn btn-primary waves-effect">Gửi xác thực email</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
