@extends('master.index')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box mb-1">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a>Trang chủ</a></li>
                        <li class="breadcrumb-item active">Số dư</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('Số dư')}}</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-box p-1 mb-1 text-right">
                {{--                <div class="row">--}}
                {{--                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-left">--}}
                {{--                        <button class="btn btn-primary" id="them-moi">Thêm mới</button>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                        @if(Session::get('so_du') == null)
                        <button class="btn btn-light" id="dang_ky_so_du">Đăng ký số dư</button>
                            @else
                            <div class="table-responsive">
                                <table class="col-12">
                                    <thead>
                                    <tr>
                                        <th>Tài Khoản</th>
                                        <th>Số tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{$data['data']['ten_tai_khoan']}}</td>
                                        <td>{{$data['data']['tong_tien']}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endsection
@push('scripts')
    <script type="text/javascript">
        $(function () {
            $('#dang_ky_so_du').on('click',function () {
                sendAjaxNoFunc('post','/so-du-tai-khoan/dang-ky',{},$(this).attr('id')).done(e =>{
                    getHtmlResponse(e);
                    if(e.status == 200){
                        window.location.href = '{{route('sodu.index')}}';
                    }
                });
            })
        })
    </script>
    @endpush
