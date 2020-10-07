@extends('master.index')
@section('content')
    <head>
        <link href="{{URL::asset('assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.css')}}"
              rel="stylesheet">

        <link href="{{URL::asset('assets\libs\multiselect\multi-select.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\select2\select2.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.css')}}" rel="stylesheet"
              type="text/css">

    </head>
    @include('BaiViet.modal.xemTruoc')
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

    <div class="row">
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
                        <select class="form-control not-null" id="cong_ty_tuyen_dung">
                            <option value="" disabled selected>Công ty</option>

                        @if($data['cong_ty'] != null)
                                @foreach($data['cong_ty'] as $row)
                                    <option value="{{$row['id']}}">{{$row['name']}}</option>
                                @endforeach
                            @endif

                        </select>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
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
                        <input class="form-control not-null text-center" value="0" id="so_luong_tuyen" title="Số lượng tuyển">

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Số năm kinh nghiệm:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <select class="form-control not-null" id="so_kinh_nghiem" title="Số năm kinh nghiệm">
                            <option selected disabled value="">Số năm kinh nghiệm</option>
                            <option value="1">Dưới 1 năm</option>
                            <option value="2">1 đến 2 năm</option>
                            <option value="3">2 đến 3 năm</option>
                            <option value="4">Trên 3 năm</option>
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
                            <input class="form-control not-null text-center" value="0" id="do_tuoi_from" title="Độ tuổi">
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
                        <input class="form-control not-null text-center" value="{{date('d/m/Y')}}" id="han_tuyen_dung" title="Hạn ứng tuyển">

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
{{--                            <option value="1">Hà Nội</option>--}}
{{--                            <option value="2">Hồ Chí Minh</option>--}}
{{--                            <option value="3">Đà Nẵng</option>--}}
{{--                            <option value="7">An Giang</option>--}}
{{--                            <option value="8">Bà Rịa - Vũng Tàu</option>--}}
{{--                            <option value="9">Bắc Giang</option>--}}
{{--                            <option value="10">Bắc Kạn</option>--}}
{{--                            <option value="11">Bạc Liêu</option>--}}
{{--                            <option value="12">Bắc Ninh</option>--}}
{{--                            <option value="13">Bến Tre</option>--}}
{{--                            <option value="14">Bình Định</option>--}}
{{--                            <option value="15">Bình Dương</option>--}}
{{--                            <option value="16">Bình Phước</option>--}}
{{--                            <option value="17">Bình Thuận</option>--}}
{{--                            <option value="18">Cà Mau</option>--}}
{{--                            <option value="19">Cần Thơ</option>--}}
{{--                            <option value="20">Cao Bằng</option>--}}
{{--                            <option value="21">Đắk Lắk</option>--}}
{{--                            <option value="22">Đắc Nông</option>--}}
{{--                            <option value="23">Điện Biên</option>--}}
{{--                            <option value="24">Đồng Nai</option>--}}
{{--                            <option value="25">Đồng Tháp</option>--}}
{{--                            <option value="26">Gia Lai</option>--}}
{{--                            <option value="27">Hà Giang</option>--}}
{{--                            <option value="28">Hà Nam</option>--}}
{{--                            <option value="29">Hà Tĩnh</option>--}}
{{--                            <option value="30">Hải Dương</option>--}}
{{--                            <option value="31">Hải Phòng</option>--}}
{{--                            <option value="32">Hậu Giang</option>--}}
{{--                            <option value="33">Hòa Bình</option>--}}
{{--                            <option value="34">Hưng Yên</option>--}}
{{--                            <option value="35">Khánh Hòa</option>--}}
{{--                            <option value="36">Kiên Giang</option>--}}
{{--                            <option value="37">Kon Tum</option>--}}
{{--                            <option value="38">Lai Châu</option>--}}
{{--                            <option value="39">Lâm Đồng</option>--}}
{{--                            <option value="40">Lạng Sơn</option>--}}
{{--                            <option value="41">Lào Cai</option>--}}
{{--                            <option value="42">Long An</option>--}}
{{--                            <option value="43">Nam Định</option>--}}
{{--                            <option value="44">Nghệ An</option>--}}
{{--                            <option value="45">Ninh Bình</option>--}}
{{--                            <option value="46">Ninh Thuận</option>--}}
{{--                            <option value="47">Phú Thọ</option>--}}
{{--                            <option value="48">Phú Yên</option>--}}
{{--                            <option value="49">Quảng Bình</option>--}}
{{--                            <option value="50">Quảng Nam</option>--}}
{{--                            <option value="51">Quảng Ngãi</option>--}}
{{--                            <option value="52">Quảng Ninh</option>--}}
{{--                            <option value="53">Quảng Trị</option>--}}
{{--                            <option value="54">Sóc Trăng</option>--}}
{{--                            <option value="55">Sơn La</option>--}}
{{--                            <option value="56">Tây Ninh</option>--}}
{{--                            <option value="57">Thái Bình</option>--}}
{{--                            <option value="58">Thái Nguyên</option>--}}
{{--                            <option value="59">Thanh Hóa</option>--}}
{{--                            <option value="60">Thừa Thiên Huế</option>--}}
{{--                            <option value="61">Tiền Giang</option>--}}
{{--                            <option value="62">Trà Vinh</option>--}}
{{--                            <option value="63">Tuyên Quang</option>--}}
{{--                            <option value="64">Vĩnh Long</option>--}}
{{--                            <option value="65">Vĩnh Phúc</option>--}}
{{--                            <option value="66">Yên Bái</option>--}}
{{--                            <option value="67">Nước ngoài</option>--}}
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
{{--                            <option>Thực tập sinh</option>--}}
{{--                            <option>Bán thời gian</option>--}}
{{--                            <option>Toàn thời gian</option>--}}
{{--                            <option>Cộng tác viên</option>--}}
                            {{--                            <option>Thực tập sinh</option>--}}
                            {{--                            <option value="1" @if($nguoiTimViec['gioi_tinh'] == 1) selected @endif>{{__('Nam')}}</option>--}}
                            {{--                            <option value="2" @if($nguoiTimViec['gioi_tinh'] == 2) selected @endif>{{__('Nữ')}}</option>--}}
                            {{--                            <option value="3" @if($nguoiTimViec['gioi_tinh'] == 3) selected @endif>{{__('Tất cả')}}</option>--}}
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

    <script type="text/javascript" src="{{URL::asset('assets\js\app\nhaTuyenDung_dang_bai.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets\js\date-picker-vi.js')}}"></script>

@endpush
