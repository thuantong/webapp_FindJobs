@extends('master.index')
@section('content')
    <head>
        <link href="{{URL::asset('assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.css')}}"
              rel="stylesheet">

        <link href="{{URL::asset('assets\libs\multiselect\multi-select.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\select2\select2.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.css')}}" rel="stylesheet"
              type="text/css">
        <link href="{{URL::asset('assets\libs\sweetalert2\sweetalert2.min.css')}}" rel="stylesheet" type="text/css">


    </head>
    @include('BaiViet.modal.xemTruoc')
    @include('CongTy.modal.themMoi')
    @include('CongTy.modal.xemAnhDaiDien')

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item"><a>Quản lý tuyển dụng</a></li>
                        <li class="breadcrumb-item active">{{__('Đăng bài tuyển dụng')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('Đăng Bài Tuyển Dụng')}}</h4>
            </div>
        </div>
    </div>

    <div class="row" id="form-body">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-box mb-1">
                <div class="row">
                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                        <h4 class="text-uppercase bg-light p-2">{{__('Thông Tin Cơ Bản')}}</h4></label>
                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Tiêu đề bài viết:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <input class="form-control not-null" id="tieu_de_bai_dang" title="Tiêu đề bài viết">
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Công ty tuyển dụng:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <div class="row">
                            <div class="col-sm-9 col-md-10 col-lg-10 col-xl-10 pr-0">
                                <select class="form-control not-null" id="cong_ty_tuyen_dung" title="Công ty tuyển dụng">
                                    <option value="" disabled selected>Công ty</option>

                                    @if($data['cong_ty'] != null)
                                        @foreach($data['cong_ty'] as $row)
                                            <option value="{{$row['id']}}" data-img="{{$row['logo']}}">{{$row['name']}}</option>
                                        @endforeach
                                    @endif

                                </select>
                                <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                            </div>
                            <div class="col-sm-3 col-md-2 col-lg-2 col-xl-2 pl-0">
                                <button class="btn waves-effect btn-primary" id="call-them-moi-cong-ty">Thêm</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Chức vụ tuyển dụng:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <select class="form-control not-null" id="chuc_vu_tuyen" title="Chức vụ tuyển dụng">
                            <option value="" selected disabled>Chọn chức vụ</option>
                            @if($data['chuc_vu'] != null)
                                @foreach($data['chuc_vu'] as $row)
                                    <option value="{{$row['id']}}">{{$row['name']}}</option>
                                @endforeach
                            @endif

                            {{--                            <option value="1">{{__('Nhân viên')}}</option>--}}
                            {{--                            <option value="2">{{__('Quản lý')}}</option>--}}
                            {{--                            <option value="3">{{__('Cộng tác viên')}}</option>--}}
                        </select>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Tên chức vụ:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <input class="form-control not-null" id="ten_chuc_vu" placeholder="VD: Nhân viên kế toán"
                               title="Tên chức vụ">
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Số lượng tuyển:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <input class="form-control not-null text-center" value="0" id="so_luong_tuyen"
                               title="Số lượng tuyển">

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Số năm kinh nghiệm:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <select class="form-control not-null" id="so_kinh_nghiem" title="Số năm kinh nghiệm">
                            <option selected disabled value="">Chọn kinh nghiệm</option>
                            @foreach($data['kinh_nghiem'] as $row)
                                <option value="{{$row['id']}}">{{$row['name']}}</option>
                                @endforeach

                        </select>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Độ tuổi:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="input-group">
                            <label class="form-control bg-light">Từ</label>
                            <input class="form-control not-null text-center" value="0" id="do_tuoi_from"
                                   title="Độ tuổi">
                            <label class="form-control bg-light">Đến</label>
                            <input class="form-control not-null text-center" value="0" id="do_tuoi_to" title="Độ tuổi">
                            <label class="form-control bg-light">Tuổi</label>
                            <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                        </div>

                    </div>

                    {{--                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">--}}
                    {{--                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Số năm kinh nghiệm:')}}</label>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">--}}
                    {{--                        <select class="form-control not-null" id="so_kinh_nghiem" title="Số năm kinh nghiệm">--}}
                    {{--                            <option selected disabled value="">Số năm kinh nghiệm</option>--}}
                    {{--                            <option value="1">Dưới 1 năm</option>--}}
                    {{--                            <option value="2">1 đến 2 năm</option>--}}
                    {{--                            <option value="3">2 đến 3 năm</option>--}}
                    {{--                            <option value="4">Trên 3 năm</option>--}}
                    {{--                        </select>--}}
                    {{--                        <span class="invalid-feedback" role="alert">--}}
                    {{--                            <strong></strong>--}}
                    {{--                        </span>--}}
                    {{--                    </div>--}}
                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Hạn ứng tuyển:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <input class="form-control not-null text-center" value="{{date('d/m/Y')}}" id="han_tuyen_dung"
                               title="Hạn ứng tuyển">

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Ngành nghề:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <select class="form-control not-null" multiple id="nganh_nghe" title="Ngành nghề">
                            {{--                            <option selected disabled value="">Ngành nghề</option>--}}
                            @if($data['nganh_nghe'] != null)
                                @foreach($data['nganh_nghe'] as $row)
                                    <option value="{{$row['id']}}">{{$row['name']}}</option>
                                @endforeach
                            @endif

                            {{--                            <option value="1">Dưới 1 năm</option>--}}
                            {{--                            <option value="2">1 đến 2 năm</option>--}}
                            {{--                            <option value="3">2 đến 3 năm</option>--}}
                            {{--                            <option value="4">Trên 3 năm</option>--}}
                        </select>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Mức lương: ')}}</label>
                    </div>

                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 d-md-flex">
                        <input type="text" class="form-control not-null text-center font-weight-bold text-primary"
                               id="muc_luong_from" value="0" title="Mức lương"
                               placeholder="Nhập mức lương">
                        <input type="text" class="form-control not-null text-center font-weight-bold text-primary"
                               id="muc_luong_to" value="0" title="Mức lương"
                               placeholder="Nhập mức lương">

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Bằng cấp yêu cầu:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <select class="form-control not-null" id="bang_cap" title="Bằng cấp yêu cầu">
                            <option disabled selected value="">{{__('Chọn học vấn')}}</option>
                            <option value="1">{{__('Đại học')}}</option>
                            <option value="2">{{__('Cao đẳng')}}</option>
                            <option value="3">{{__('Trung cấp')}}</option>
                            <option value="4">{{__('Thạc sĩ')}}</option>
                            <option value="5">{{__('Tiến sĩ')}}</option>
                            <option value="6">{{__('Trung cấp')}}</option>
                            <option value="7">{{__('Chứng chỉ')}}</option>
                            <option value="8">{{__('Trung học phổ thông')}}</option>
                        </select>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Yêu cầu giới tính:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <select class="form-control not-null" id="gioi_tinh" title="Yêu cầu giới tính">
                            <option disabled selected value="">{{__('Chọn giới tính')}}</option>
                            <option value="1">{{__('Nam')}}</option>
                            <option value="2">{{__('Nữ')}}</option>
                            <option value="3">{{__('Tất cả')}}</option>
                        </select>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Địa điểm làm việc:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <select class="form-control not-null" id="dia_diem_lam_viec" title="Địa điểm làm việc">
                            <option disabled selected value="">{{__('Chọn địa điểm')}}</option>
                            @if($data['dia_diem'] != null)
                                @foreach($data['dia_diem'] as $row)
                                    <option value="{{$row['id']}}">{{$row['name']}}</option>
                                @endforeach
                            @endif

                        </select>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Hình thức:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <select class="form-control not-null" id="hinh_thuc" title="Hình thức">
                            <option disabled selected value="">{{__('Chọn hình thức')}}</option>
                            @if($data['kieu_lam_viec'] != null)
                                @foreach($data['kieu_lam_viec'] as $row)
                                    <option value="{{$row['id']}}">{{$row['name']}}</option>

                                @endforeach
                            @endif

                        </select>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                        <h4 class="text-uppercase bg-light p-2">{{__('Thông Tin Chính')}}</h4></label>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Mô tả công việc:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <textarea class="form-control break-custom not-null" id="mo_ta_cong_viec"
                                  title="Mô tả công việc"></textarea>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Yêu cầu công việc:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <textarea class="form-control break-custom not-null" id="yeu_cau_cong_viec"
                                  title="Yêu cầu công việc"></textarea>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Quyền lợi được hưởng:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <textarea class="form-control break-custom not-null" id="quyen_loi_cong_viec"
                                  title="Quyền lợi được hưởng"></textarea>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Địa chỉ:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <input class="form-control not-null" id="dia_chi_cong_viec" maxlength="255" title="Địa chỉ">
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                        <h4 class="text-uppercase bg-light p-2">{{__('Đang ký dịch vụ')}}</h4></label>
                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Số ngày đăng tin:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <input class="form-control not-null text-center" value="1" id="so_ngay_ton_tai"
                               title="Số ngày đăng tin">

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                    <span class="form-text text-muted"><small>Số ngày tin được hiển thị trên mục bài đăng tìm việc! (1000đ/1 ngày,tương ứng 1 xu)</small></span>

                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Đăng ký bài viết HOT:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <input class="form-control not-null text-center" value="1" id="dang_ky_bai_viet_hot"
                               title="Số ngày đăng tin">

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                    <span class="form-text text-muted"><small>Số ngày tin được hiển thị trên mục bài đăng tìm việc! (1000đ/1 ngày,tương ứng 1 xu)</small></span>

                </div>

                <div class="row">
                    <button class="btn btn-success save" id="save">Đăng bài</button>
                    <button class="btn btn-info review" id="review">Xem trước</button>
                </div>
            </div>
        </div>

    </div>

@endsection
@push('scripts')
    <script src="{{URL::asset('assets\libs\multiselect\jquery.multi-select.js')}}"></script>
    <script src="{{URL::asset('assets\libs\jquery-quicksearch\jquery.quicksearch.min.js')}}"></script>
    <script src="{{URL::asset('assets\libs\select2\select2.min.js')}}"></script>

    <script src="{{URL::asset('assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.js')}}"></script>

    <script type="text/javascript"
            src="{{URL::asset('assets\libs\date-time-picker\moment-with-locales.min.js')}}"></script>

    <link rel="stylesheet" type="text/css"
          href="{{asset('assets\libs\date-time-picker\bootstrap-datetimepicker.css')}}">
    <script type="text/javascript"
            src="{{URL::asset('assets\libs\date-time-picker\bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{URL::asset('assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets\libs\date-time-picker\moment-with-locales.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets\libs\sweetalert2\sweetalert2.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets\js\app\nhaTuyenDung_dang_bai.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets\js\date-picker-vi.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets\js\app\themMoiCongTy.js')}}"></script>
    <script>

    </script>
@endpush
