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
    <div class="modal fade bs-example-modal-lg" id="review-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-pills navtab-bg nav-justified">

                        <li class="nav-item">
                            <a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                <span class="d-inline-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-inline-block">{{__('Bài đăng chi tiết')}}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#messages1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <span class="d-inline-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-inline-block">{{__('Bài đăng chi tiết rút gọn')}}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#settings1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <span class="d-inline-block d-sm-none"><i class="fas fa-cog"></i></span>
                                <span class="d-none d-sm-inline-block">{{__('Bài đăng rút gọn')}}</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="profile1">
                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left"><h3>Nhân viên bảo hiểm</h3></label>

                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Mô tả công việc</label>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            - a
                                            <br>- a
                                            <br>- a
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Yêu cầu công việc</label>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            - a
                                            <br>- a
                                            <br>- a
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Quyền lợi được hưởng</label>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            - a
                                            <br>- a
                                            <br>- a
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Địa chỉ</label>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <span>Nguyễn oanh gò vấp phung 13 quan 33</span> - <a class="text-primary">Tphcm</a>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Tính chất công việc</label>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            toàn thời gian
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Ngành nghề</label>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            Đi bộ - kim - chạy
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Yêu cầu bằng cấp</label>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            Đại học
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Yêu cầu kinh nghiệm</label>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            1 - 2 năm
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="messages1">
                            <div class="card-body pb-0">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="row text-center">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <h4 class="m-0">Công ty truyền thông</h4>
                                            <label class="float-right">Nhà tuyển dụng: <span>Hoàng tân</span></label>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-1 pb-1">
                                    <div class="row center-element text-center">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <button class="btn far fa-thumbs-up btn-outline-primary" id="trang-chu-like-post">
                                                Like
                                            </button>
                                            <button class="btn btn-outline-info fab fa-rocketchat" title="Chat với nhà tuyển dụng">
                                                Chat
                                            </button>


                                            <button class="btn btn-outline-warning far fa-file-archive"> Nộp đơn</button>
                                            <button class="btn btn-outline-primary fas fa-exclamation-triangle"> Báo cáo</button>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-1 pb-1">
                                    <div class="row pt-2 pb-0 border">
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                            <div class="row border-bottom">
                                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                    <label class="far fa-address-card"></label>
                                                </div>
                                                <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                    <span>Chức vụ:</span>
                                                    <p>
                                                        <label>Lập trình viên php</label>
                                                    </p></div>
                                            </div>

                                            <div class="row border-bottom">
                                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                    <label class="fas fa-tools"></label>
                                                </div>
                                                <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                    <span>Ngành nghề:</span>
                                                    <p>
                                                        <label>Công nghệ thông tin</label>
                                                    </p></div>
                                            </div>

                                            <div class="row border-bottom">
                                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                    <label class="fab fa-whmcs"></label>
                                                </div>
                                                <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                    <span>Kinh nghiệm:</span>
                                                    <p>
                                                        <label>1 năm</label>
                                                    </p></div>
                                            </div>

                                            <div class="row border-bottom">
                                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                    <label class="fas fa-graduation-cap"></label>
                                                </div>
                                                <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                    <span>Yêu cầu bằng cấp:</span>
                                                    <p>
                                                        <label>Đại học/Cao đẳng</label>
                                                    </p></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                    <label class=" fas fa-users"></label>
                                                </div>
                                                <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                    <span>Số lượng cần tuyển:</span>
                                                    <p>
                                                        <label>10</label>
                                                    </p></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                            <div class="row border-bottom">
                                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                    <label class="far fa-calendar-times"></label>
                                                </div>
                                                <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                    <span>Hạn nộp hồ sơ:</span>
                                                    <p>
                                                        <label>22/02/2020</label>
                                                    </p></div>
                                            </div>

                                            <div class="row border-bottom">
                                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                    <label class="fas fa-business-time"></label>
                                                </div>
                                                <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                    <span>Hình thức làm việc:</span>
                                                    <p>
                                                        <label>Toàn thời gian</label>
                                                    </p></div>
                                            </div>

                                            <div class="row border-bottom">
                                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                    <label class="fas fa-transgender"></label>
                                                </div>
                                                <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                    <span>Giới tính:</span>
                                                    <p>
                                                        <label>Nam - Nữ</label>
                                                    </p></div>
                                            </div>

                                            <div class="row border-bottom">
                                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                    <label class="fas fa-map-marker-alt"></label>
                                                </div>
                                                <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                    <span>Địa điểm tuyển dụng:</span>
                                                    <p>
                                                        <label>TPHCM</label>
                                                    </p></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                    <label class="far fa-money-bill-alt"></label>
                                                </div>
                                                <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                    <span>Mức lương:</span>
                                                    <p>
                                                        <label>7 triệu - 10 triệu</label>
                                                    </p></div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="row pt-1 pb-0">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center p-0">
                                            <button class="btn btn-success float-left">Xem chi tiết</button>
                                            <button class="btn btn-info float-right">Quan tâm nhà tuyển dụng</button>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="settings1">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ribbon-box iteam-click">
                                <div class="row">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 p-0 center-element">
                                        <img src="">
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 text-center">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text"><h5 class="mb-0"><a class="text-primary"><span>Tuyển dụng fresher php</span></a>
                                                </h5></div>
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text"><i><span>Công ty TNHH MTV Hoàng Minh Giám</span></i>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="row">
                                                    <div class="col-sm-4 col-md-4 col-xl-4 text"><span>luong</span></div>
                                                    <div class="col-sm-4 col-md-4 col-xl-4 text"><span>dia chi</span></div>
                                                    <div class="col-sm-4 col-md-4 col-xl-4 text"><span>11/02/2020</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ribbon-two ribbon-two-danger floats-right"><span class="right-custom">Hot</span>
                                </div>
                                <div class="arrow-item d-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

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
                        <input class="form-control" id="tieu_de_bai_dang" title="Tiêu đề bài viết">
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
                        <select class="form-control" id="chuc_vu_tuyen" title="Chức vụ tuyển dụng">
                            <option value="" selected disabled>Chọn chức vụ</option>
                            <option value="1">{{__('Nhân viên')}}</option>
                            <option value="2">{{__('Quản lý')}}</option>
                            <option value="3">{{__('Cộng tác viên')}}</option>
                        </select>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Tên chức vụ:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <input class="form-control" id="ten_chuc_vu" placeholder="VD: Nhân viên kế toán" title="Tên chức vụ">
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
                        <input type="text" class="form-control text-center font-weight-bold text-primary"
                               id="muc_luong_from" value="0" title="Mức lương"
                               placeholder="Nhập mức lương">
                        <input type="text" class="form-control text-center font-weight-bold text-primary"
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
                        <select class="form-control" id="bang_cap" title="Bằng cấp yêu cầu">
                            <option disabled selected value="">{{__('Chọn học vấn')}}</option>
{{--                            <option value="1" @if($nguoiTimViec['hoc_van'] == 1) selected @endif>{{__('Đại học')}}</option>--}}
{{--                            <option value="2" @if($nguoiTimViec['hoc_van'] == 2) selected @endif>{{__('Cao đẳng')}}</option>--}}
{{--                            <option value="3" @if($nguoiTimViec['hoc_van'] == 3) selected @endif>{{__('Trung cấp')}}</option>--}}
{{--                            <option value="4" @if($nguoiTimViec['hoc_van'] == 4) selected @endif>{{__('Thạc sĩ')}}</option>--}}
{{--                            <option value="5" @if($nguoiTimViec['hoc_van'] == 5) selected @endif>{{__('Tiến sĩ')}}</option>--}}
{{--                            <option value="6" @if($nguoiTimViec['hoc_van'] == 6) selected @endif>{{__('Trung cấp')}}</option>--}}
{{--                            <option value="7" @if($nguoiTimViec['hoc_van'] == 7) selected @endif>{{__('Chứng chỉ')}}</option>--}}
{{--                            <option value="8" @if($nguoiTimViec['hoc_van'] == 8) selected @endif>{{__('Trung học phổ thông')}}</option>--}}
                        </select>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Yêu cầu giới tính:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <select class="form-control hoc_van" id="gioi_tinh" title="Yêu cầu giới tính">
                            <option disabled selected value="">{{__('Chọn giới tính')}}</option>
{{--                            <option value="1" @if($nguoiTimViec['gioi_tinh'] == 1) selected @endif>{{__('Nam')}}</option>--}}
{{--                            <option value="2" @if($nguoiTimViec['gioi_tinh'] == 2) selected @endif>{{__('Nữ')}}</option>--}}
{{--                            <option value="3" @if($nguoiTimViec['gioi_tinh'] == 3) selected @endif>{{__('Tất cả')}}</option>--}}
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
                        <select class="form-control" id="dia_diem_lam_viec" title="Địa điểm làm việc">
                            <option disabled selected value="">{{__('Chọn địa điểm')}}</option>
                            <option value="1">Hà Nội</option>
                            <option value="2">Hồ Chí Minh</option>
                            <option value="3">Đà Nẵng</option>
                            <option value="7">An Giang</option>
                            <option value="8">Bà Rịa - Vũng Tàu</option>
                            <option value="9">Bắc Giang</option>
                            <option value="10">Bắc Kạn</option>
                            <option value="11">Bạc Liêu</option>
                            <option value="12">Bắc Ninh</option>
                            <option value="13">Bến Tre</option>
                            <option value="14">Bình Định</option>
                            <option value="15">Bình Dương</option>
                            <option value="16">Bình Phước</option>
                            <option value="17">Bình Thuận</option>
                            <option value="18">Cà Mau</option>
                            <option value="19">Cần Thơ</option>
                            <option value="20">Cao Bằng</option>
                            <option value="21">Đắk Lắk</option>
                            <option value="22">Đắc Nông</option>
                            <option value="23">Điện Biên</option>
                            <option value="24">Đồng Nai</option>
                            <option value="25">Đồng Tháp</option>
                            <option value="26">Gia Lai</option>
                            <option value="27">Hà Giang</option>
                            <option value="28">Hà Nam</option>
                            <option value="29">Hà Tĩnh</option>
                            <option value="30">Hải Dương</option>
                            <option value="31">Hải Phòng</option>
                            <option value="32">Hậu Giang</option>
                            <option value="33">Hòa Bình</option>
                            <option value="34">Hưng Yên</option>
                            <option value="35">Khánh Hòa</option>
                            <option value="36">Kiên Giang</option>
                            <option value="37">Kon Tum</option>
                            <option value="38">Lai Châu</option>
                            <option value="39">Lâm Đồng</option>
                            <option value="40">Lạng Sơn</option>
                            <option value="41">Lào Cai</option>
                            <option value="42">Long An</option>
                            <option value="43">Nam Định</option>
                            <option value="44">Nghệ An</option>
                            <option value="45">Ninh Bình</option>
                            <option value="46">Ninh Thuận</option>
                            <option value="47">Phú Thọ</option>
                            <option value="48">Phú Yên</option>
                            <option value="49">Quảng Bình</option>
                            <option value="50">Quảng Nam</option>
                            <option value="51">Quảng Ngãi</option>
                            <option value="52">Quảng Ninh</option>
                            <option value="53">Quảng Trị</option>
                            <option value="54">Sóc Trăng</option>
                            <option value="55">Sơn La</option>
                            <option value="56">Tây Ninh</option>
                            <option value="57">Thái Bình</option>
                            <option value="58">Thái Nguyên</option>
                            <option value="59">Thanh Hóa</option>
                            <option value="60">Thừa Thiên Huế</option>
                            <option value="61">Tiền Giang</option>
                            <option value="62">Trà Vinh</option>
                            <option value="63">Tuyên Quang</option>
                            <option value="64">Vĩnh Long</option>
                            <option value="65">Vĩnh Phúc</option>
                            <option value="66">Yên Bái</option>
                            <option value="67">Nước ngoài</option>
                        </select>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                        <label><abbr class="text-danger  font-15">* </abbr>{{__('Hình thức:')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                        <select class="form-control hoc_van" id="hinh_thuc" title="Hình thức">
                            <option disabled selected value="">{{__('Chọn hình thức')}}</option>
                            <option>Thực tập sinh</option>
                            <option>Bán thời gian</option>
                            <option>Toàn thời gian</option>
                            <option>Cộng tác viên</option>
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
                        <textarea class="form-control break-custom" id="mo_ta_cong_viec" title="Mô tả công việc"></textarea>
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
                        <textarea class="form-control break-custom" id="yeu_cau_cong_viec" title="Yêu cầu công việc"></textarea>
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
                        <textarea class="form-control break-custom" id="quyen_loi_cong_viec" title="Quyền lợi được hưởng"></textarea>
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
                        <input class="form-control" id="dia_chi_cong_viec" maxlength="255" title="Địa chỉ">
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
