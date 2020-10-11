@extends('master.index')
@section('content')
    <head>
{{--        <link href="assets\libs\clockpicker\bootstrap-clockpicker.min.css" rel="stylesheet" type="text/css">--}}
        <link href="assets\libs\multiselect\multi-select.css" rel="stylesheet" type="text/css">
        <link href="assets\libs\select2\select2.min.css" rel="stylesheet" type="text/css">
        <link href="assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">

    </head>
    <div class="modal fade bs-example-modal-center" id="xem_anh_dai_dien" tabindex="-1" role="dialog"
         aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                {{--                <div class="modal-header">--}}
                {{--                    <h4 class="modal-title" id="myCenterModalLabel">Center modal</h4>--}}
                {{--                    --}}
                {{--                </div>--}}
                <div class="modal-body p-0">
                    <button type="button" class="close position-absolute text-danger" style="right: 1rem" data-dismiss="modal"
                            aria-hidden="true">×
                    </button>
                    <img src="" style="width: 100%">
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="modal fade bs-example-modal-center" id="doi_anh_dai_dien" tabindex="-1" role="dialog"
         aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Cập nhật ảnh đại diện')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="demo-wrap upload-demo">
                        {{--                        <div class="container">--}}
                        <div class="row">

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="upload-msg">
                                    Đang tải ảnh
                                </div>
                                <div class="upload-demo-wrap">
                                    <div id="upload-demo"></div>
                                </div>
                            </div>
                        </div>
                        {{--                        </div>--}}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect"
                            data-dismiss="modal" id="close">{{__('Thoát')}}</button>
                    <button type="button" class="btn btn-info waves-effect waves-light" id="save">
                        {{__('Chọn ảnh này')}}
                    </button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->





    <div class="row">
        <div class="col-12">
            <div class="page-title-box mb-1">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a>Minton</a></li>
                        <li class="breadcrumb-item"><a>Layouts</a></li>
                        <li class="breadcrumb-item active">Preloader</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('Phần Nhà Tuyển Dụng')}}</h4>
            </div>
        </div>
    </div>

    <div class="row" id="scroll-fixed">

        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-box p-1 mb-1 text-right">
                <div class="btn-group btn-group-sm" style="float: none;">
                    <a class="btn btn-sm btn-primary text-white mr-4" data-toggle="modal"
                       data-target="#modal-doi-mat-khau">{{__('Đổi mật khẩu')}}</a>
                    {{--                    <button class="btn btn-warning btn-sm call-save-profile">{{__('Cập nhật')}}</button>--}}
                    <button class="btn btn-success btn-sm save-profile"
                            id="save-profile">{{__('Lưu lại tất cả')}}</button>
                    <a class="btn btn-secondary btn-sm cancel-profile" href="/nha-tuyen-dung">{{__('Không lưu')}}</a>
                </div>

            </div>

        </div>
    </div>


    <div class="row center-element">
{{--        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">--}}
{{--            <div class="card-box p-1 mb-1 text-right">--}}
{{--                <div class="row">--}}
{{--                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">--}}
{{--                        <h4 class="text-uppercase bg-light p-2">{{__('Thông Tin Công Ty Tuyển Dụng')}}</h4></label>--}}
{{--                </div>--}}
{{--                <div class="row form-group">--}}
{{--                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">--}}
{{--                        <label for="ten_cong_ty"><abbr class="text-danger  font-15">* </abbr>{{__('Tên công ty: ')}}--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">--}}
{{--                        <input class="form-control not-null" id="ten_cong_ty" title="Tên công ty"--}}
{{--                               value="@if($nhaTuyenDung['ten_cong_ty'] != null){{$nhaTuyenDung['ten_cong_ty']}}@endif">--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong></strong>--}}
{{--                        </span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row form-group">--}}
{{--                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">--}}
{{--                        <label for="link_website">{{__('Website: ')}}</label>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">--}}
{{--                        <input class="form-control" id="link_website" title="Website"--}}
{{--                               value="@if($nhaTuyenDung['websites'] != null){{$nhaTuyenDung['websites']}}@endif">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row form-group">--}}
{{--                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">--}}
{{--                        <label for="email_cong_ty"><abbr class="text-danger  font-15">* </abbr>{{__('Email: ')}}</label>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">--}}
{{--                        <input class="form-control not-null" id="email_cong_ty" data-rule="email" title="Email"--}}
{{--                               value="@if($nhaTuyenDung['email_cong_ty'] != null){{$nhaTuyenDung['email_cong_ty']}}@endif">--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong></strong>--}}
{{--                        </span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row form-group">--}}
{{--                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">--}}
{{--                        <label for="dien_thoai_cong_ty"><abbr--}}
{{--                                class="text-danger  font-15">* </abbr>{{__('Điện thoại: ')}}</label>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">--}}
{{--                        <input class="form-control not-null" id="dien_thoai_cong_ty" maxlength="10" title="Điện thoại"--}}
{{--                               value="@if($nhaTuyenDung['phone_cong_ty'] != null){{$nhaTuyenDung['phone_cong_ty']}}@endif">--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong></strong>--}}
{{--                        </span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row form-group">--}}
{{--                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">--}}
{{--                        <label for="dia_chi_chinh">{{__('Địa chỉ chính: ')}}</label>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">--}}
{{--                        <input class="form-control" id="dia_chi_chinh"--}}
{{--                               value="@if($nhaTuyenDung['dia_chi'] != null){{$nhaTuyenDung['dia_chi']}}@endif">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row form-group">--}}
{{--                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">--}}
{{--                        <label>{{__('Giờ làm việc: ')}}</label>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 pr-md-0">--}}
{{--                        <div class="input-group">--}}
{{--                            <div class="input-group-append">--}}
{{--                                <span class="input-group-text pl-1 pr-1">{{__('Từ')}}</span>--}}
{{--                            </div>--}}

{{--                            <input class="form-control" style="border-left: none" id="from_time"--}}
{{--                                   value="@if($nhaTuyenDung['gio_lam_viec'] != null){{trim(substr($nhaTuyenDung['gio_lam_viec'],0,strpos($nhaTuyenDung['gio_lam_viec'],'-')))}}@else{{date('08:00')}}@endif">--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 pl-md-0">--}}
{{--                        <div class="input-group">--}}
{{--                            <div class="input-group-append">--}}
{{--                                <span class="input-group-text pl-0 pr-0">{{__('Đến')}}</span>--}}
{{--                            </div>--}}
{{--                            <input class="form-control" style="border-left: none" id="to_time"--}}
{{--                                   value="@if($nhaTuyenDung['gio_lam_viec'] != null){{trim(substr($nhaTuyenDung['gio_lam_viec'],strpos($nhaTuyenDung['gio_lam_viec'],'-')+1))}} @else{{date('17:00')}}@endif">--}}

{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row form-group">--}}
{{--                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">--}}
{{--                        <label>{{__('Ngày làm việc: ')}}</label>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 pr-md-0">--}}
{{--                        <div class="input-group">--}}
{{--                            <div class="input-group-append pl-1 pr-1" style="position: absolute;z-index: 1;left: -6px;">--}}
{{--                                <span class="input-group-text pl-1 pr-1">{{__('Từ')}}</span>--}}
{{--                            </div>--}}
{{--                            <select class="form-control" id="from_day">--}}
{{--                                <option value="" selected disabled>Chọn thứ</option>--}}
{{--                                                                <option value="1" @if($nhaTuyenDung['ngay_lam_viec_cong_ty'] != null) @if(trim(substr($nhaTuyenDung['ngay_lam_viec_cong_ty'],0,strpos($nhaTuyenDung['ngay_lam_viec_cong_ty'],'-'))) == 1) selected @endif @endif>{{__('Chủ nhật')}}</option>--}}
{{--                                                                <option value="2" @if($nhaTuyenDung['ngay_lam_viec_cong_ty'] != null)@if(trim(substr($nhaTuyenDung['ngay_lam_viec_cong_ty'],0,strpos($nhaTuyenDung['ngay_lam_viec_cong_ty'],'-'))) == 2) selected @endif @endif>{{__('Thứ hai')}}</option>--}}
{{--                                                                <option value="3" @if($nhaTuyenDung['ngay_lam_viec_cong_ty'] != null)@if(trim(substr($nhaTuyenDung['ngay_lam_viec_cong_ty'],0,strpos($nhaTuyenDung['ngay_lam_viec_cong_ty'],'-'))) == 3) selected @endif @endif>{{__('Thứ ba')}}</option>--}}
{{--                                                                <option value="4" @if($nhaTuyenDung['ngay_lam_viec_cong_ty'] != null)@if(trim(substr($nhaTuyenDung['ngay_lam_viec_cong_ty'],0,strpos($nhaTuyenDung['ngay_lam_viec_cong_ty'],'-'))) == 4) selected @endif @endif>{{__('Thứ tư')}}</option>--}}
{{--                                                                <option value="5" @if($nhaTuyenDung['ngay_lam_viec_cong_ty'] != null)@if(trim(substr($nhaTuyenDung['ngay_lam_viec_cong_ty'],0,strpos($nhaTuyenDung['ngay_lam_viec_cong_ty'],'-'))) == 5) selected @endif @endif>{{__('Thứ năm')}}</option>--}}
{{--                                                                <option value="6" @if($nhaTuyenDung['ngay_lam_viec_cong_ty'] != null)@if(trim(substr($nhaTuyenDung['ngay_lam_viec_cong_ty'],0,strpos($nhaTuyenDung['ngay_lam_viec_cong_ty'],'-'))) == 6) selected @endif @endif>{{__('Thứ sáu')}}</option>--}}
{{--                                                                <option value="7" @if($nhaTuyenDung['ngay_lam_viec_cong_ty'] != null)@if(trim(substr($nhaTuyenDung['ngay_lam_viec_cong_ty'],0,strpos($nhaTuyenDung['ngay_lam_viec_cong_ty'],'-'))) == 7) selected @endif @endif>{{__('Thứ bảy')}}</option>--}}
{{--                                                                <option value="8" @if($nhaTuyenDung['ngay_lam_viec_cong_ty'] != null)@if(trim(substr($nhaTuyenDung['ngay_lam_viec_cong_ty'],0,strpos($nhaTuyenDung['ngay_lam_viec_cong_ty'],'-'))) == 8) selected @endif @endif>{{__('Sáng - Thứ bảy')}}</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 pl-md-0">--}}
{{--                        <div class="input-group">--}}
{{--                            <div class="input-group-append pl-1 pr-1" style="position: absolute;z-index: 1;left: -6px;">--}}
{{--                                <span class="input-group-text pl-0 pr-0">{{__('Đến')}}</span>--}}
{{--                            </div>--}}
{{--                            <select class="form-control" id="to_day">--}}
{{--                                <option value="" selected disabled>Chọn thứ</option>--}}
{{--                                                                <option value="1" @if($nhaTuyenDung['ngay_lam_viec_cong_ty'] != null)@if(trim(substr($nhaTuyenDung['ngay_lam_viec_cong_ty'],strpos($nhaTuyenDung['ngay_lam_viec_cong_ty'],'-')+1)) == 1) selected @endif @endif>{{__('Chủ nhật')}}</option>--}}
{{--                                                                <option value="2" @if($nhaTuyenDung['ngay_lam_viec_cong_ty'] != null)@if(trim(substr($nhaTuyenDung['ngay_lam_viec_cong_ty'],strpos($nhaTuyenDung['ngay_lam_viec_cong_ty'],'-')+1)) == 2) selected @endif @endif>{{__('Thứ hai')}}</option>--}}
{{--                                                                <option value="3" @if($nhaTuyenDung['ngay_lam_viec_cong_ty'] != null)@if(trim(substr($nhaTuyenDung['ngay_lam_viec_cong_ty'],strpos($nhaTuyenDung['ngay_lam_viec_cong_ty'],'-')+1)) == 3) selected @endif @endif>{{__('Thứ ba')}}</option>--}}
{{--                                                                <option value="4" @if($nhaTuyenDung['ngay_lam_viec_cong_ty'] != null)@if(trim(substr($nhaTuyenDung['ngay_lam_viec_cong_ty'],strpos($nhaTuyenDung['ngay_lam_viec_cong_ty'],'-')+1)) == 4) selected @endif @endif>{{__('Thứ tư')}}</option>--}}
{{--                                                                <option value="5" @if($nhaTuyenDung['ngay_lam_viec_cong_ty'] != null)@if(trim(substr($nhaTuyenDung['ngay_lam_viec_cong_ty'],strpos($nhaTuyenDung['ngay_lam_viec_cong_ty'],'-')+1)) == 5) selected @endif @endif>{{__('Thứ năm')}}</option>--}}
{{--                                                                <option value="6" @if($nhaTuyenDung['ngay_lam_viec_cong_ty'] != null)@if(trim(substr($nhaTuyenDung['ngay_lam_viec_cong_ty'],strpos($nhaTuyenDung['ngay_lam_viec_cong_ty'],'-')+1)) == 6) selected @endif @endif>{{__('Thứ sáu')}}</option>--}}
{{--                                                                <option value="7" @if($nhaTuyenDung['ngay_lam_viec_cong_ty'] != null)@if(trim(substr($nhaTuyenDung['ngay_lam_viec_cong_ty'],strpos($nhaTuyenDung['ngay_lam_viec_cong_ty'],'-')+1)) == 7) selected @endif @endif>{{__('Thứ bảy')}}</option>--}}
{{--                                                                <option value="8" @if($nhaTuyenDung['ngay_lam_viec_cong_ty'] != null)@if(trim(substr($nhaTuyenDung['ngay_lam_viec_cong_ty'],strpos($nhaTuyenDung['ngay_lam_viec_cong_ty'],'-')+1)) == 8) selected @endif @endif>{{__('Sáng - Thứ bảy')}}</option>--}}
{{--                            </select>--}}
{{--                            --}}{{--                            <input class="form-control" id="to_day" value="{{date('D')}}">--}}

{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row form-group">--}}
{{--                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">--}}
{{--                        <label for="quy_mo_nhan_su">{{__('Quy mô nhân sự: ')}}</label>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">--}}
{{--                        <select class="form-control" id="quy_mo_nhan_su">--}}

{{--                            <option disabled selected value="">Quy mô nhân sự</option>--}}
{{--                                                        <option value="1" @if($nhaTuyenDung['so_luong_employee'] != null)@if($nhaTuyenDung['so_luong_employee'] == 1) selected @endif @endif>Dưới 20 người</option>--}}
{{--                                                        <option value="2" @if($nhaTuyenDung['so_luong_employee'] != null)@if($nhaTuyenDung['so_luong_employee'] == 2) selected @endif @endif>Từ 20 đến 50 người</option>--}}
{{--                                                        <option value="3" @if($nhaTuyenDung['so_luong_employee'] != null)@if($nhaTuyenDung['so_luong_employee'] == 3) selected @endif @endif>Từ 50 đến 75 người</option>--}}
{{--                                                        <option value="4" @if($nhaTuyenDung['so_luong_employee'] != null)@if($nhaTuyenDung['so_luong_employee'] == 4) selected @endif @endif>Trên 75 người</option>--}}
{{--                        </select>--}}

{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="row form-group">--}}
{{--                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">--}}
{{--                        <label for="linh_vuc_hoat_dong"><abbr class="text-danger  font-15">* </abbr>{{__('Lĩnh vực: ')}}--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">--}}

{{--                        <select id="linh_vuc_hoat_dong" class="form-control not-null" multiple="multiple" tabindex="-1"--}}
{{--                                title="Lĩnh vực"--}}
{{--                                aria-hidden="true">--}}
{{--                            <option value="" disabled>Ngành Nghề</option>--}}
{{--                            @foreach($nganhNghe as $row)--}}
{{--                                <option value="{{$row['id']}}" @if(unserialize($nhaTuyenDung['nganh_nghe_id']) != null) @if(in_array($row['id'],unserialize($nhaTuyenDung['nganh_nghe_id']))) selected @endif @endif>{{$row['name']}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                        <span class="invalid-feedback" role="alert">--}}
{{--                            <strong></strong>--}}
{{--                        </span>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row form-group">--}}
{{--                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">--}}
{{--                        <label for="fax_cong_ty">{{__('FAX: ')}}</label>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">--}}
{{--                        <input class="form-control" id="fax_cong_ty" value="@if($nhaTuyenDung['fax_cong_ty'] != null){{$nhaTuyenDung['fax_cong_ty']}}@endif">--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="row form-group">--}}
{{--                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">--}}
{{--                        <label for="logo_cong_ty">{{__('Logo: ')}}</label>--}}
{{--                    </div>--}}
{{--                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 center-element position-relative">--}}
{{--                        <div style="width: 8rem;height: 8rem;" id="logo_cong_ty">--}}
{{--                            <img src="{{asset($nhaTuyenDung['avatar'])}}" class="avatar-xl img-thumbnail" data-src="{{$nhaTuyenDung['avatar']}}"--}}
{{--                                 alt="profile-image" tabindex="-1" style="width: 100%;height: 100%">--}}
{{--                            <div class="position-absolute center-element"--}}
{{--                                 style="display:none;width: 8rem;height: 8rem;background-color: rgba(50, 58, 70, .55);top:0">--}}
{{--                                <div>--}}
{{--                                    <div class="row mt-1 mb-1">--}}
{{--                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">--}}
{{--                                            <button class="btn btn-success btn-sm">Đổi ảnh</button>--}}
{{--                                            <input type="file" class="d-none">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="row mt-1 mb-1">--}}
{{--                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">--}}
{{--                                            <button class="btn btn-light btn-sm">Xem ảnh</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <div class="card-box p-1 mb-1 text-right">
                <div class="row">
                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                        <h4 class="bg-light p-2 text-uppercase">{{__('Thông Tin Nhà Tuyển Dụng')}}</h4></label>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="ho_ten"><abbr class="text-danger  font-15">* </abbr>{{__('Họ tên: ')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
                        <input class="form-control not-null" id="ho_ten" title="Họ tên"
                               placeholder="@if(Auth::user()->ho_ten == null){{"Nhập email"}}@endif"
                               value="@if(Auth::user()->ho_ten != null){{Auth::user()->ho_ten}}@endif">
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="email_tuyen_dung"><abbr class="text-danger  font-15">* </abbr>{{__('Email: ')}}
                        </label>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
                        <input class="form-control not-null"
                               placeholder="@if(Auth::user()->email == null){{"Nhập email"}}@endif"
                               id="email_tuyen_dung" data-rule="email" title="Email người tuyển dụng"
                               value="@if(Auth::user()->email != null){{Auth::user()->email}}@endif">

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="gioi_tinh"><abbr class="text-danger  font-15">* </abbr>{{__('Địa chỉ')}}</label>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
                        <input class="form-control not-null" id="dia_chi" title="Địa chỉ" value="@if($nhaTuyenDung['dia_chi'] != null){{$nhaTuyenDung['dia_chi']}}@endif">

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="gioi_tinh"><abbr class="text-danger  font-15">* </abbr>{{__('Giới tính')}}</label>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
                        <select class="form-control not-null" id="gioi_tinh_tuyen_dung" title="Giới tính">
                            <option value="" disabled selected
                                    class="text-center">{{__('Chọn giới tính')}}</option>
                            <option value="1" @if($nhaTuyenDung['gioi_tinh'] != null && $nhaTuyenDung['gioi_tinh'] == 1) selected @endif>{{__('Nam')}}</option>
                            <option value="2" @if($nhaTuyenDung['gioi_tinh'] != null && $nhaTuyenDung['gioi_tinh'] == 2) selected @endif>{{__('Nữ')}}</option>
                        </select>

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="ngay_sinh_tuyen_dung"><abbr
                                class="text-danger  font-15">* </abbr>{{__('Ngày sinh')}}</label>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
                        <input class="form-control not-null" id="ngay_sinh_tuyen_dung" title="Ngày sinh" value="@if($nhaTuyenDung['nam_sinh'] != null){{\Illuminate\Support\Carbon::createFromFormat('Y-m-d',$nhaTuyenDung['nam_sinh'])->format('d/m/Y')}}@else{{date('d/m/Y')}}@endif">

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="phone_tuyen_dung"><abbr
                                class="text-danger  font-15">* </abbr>{{__('Số điện thoại: ')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
                        <input class="form-control not-null"
                               placeholder="@if(Auth::user()->phone == null){{"Nhập số điện thoại"}}@endif"
                               id="phone_tuyen_dung" title="Số điện thoại"
                               value="@if(Auth::user()->phone != null){{Auth::user()->phone}}@endif">
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="avatar_tuyen_dung">{{__('Ảnh đại diện: ')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 center-element position-relative">
                        <div style="width: 8rem;height: 8rem;" id="avatar_tuyen_dung">
                            <img src="{{asset(Session::get('avatar'))}}" class="avatar-xl img-thumbnail" data-src="{{Session::get('avatar')}}"
                                 alt="profile-image" tabindex="-1" style="width: 100%;height: 100%">
                            <div class="position-absolute center-element"
                                 style="display:none;width: 8rem;height: 8rem;background-color: rgba(50, 58, 70, .55);top:0">
                                <div>
                                    <div class="row mt-1 mb-1">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                            <button class="btn btn-success btn-sm">Đổi ảnh</button>
                                            <input type="file" class="d-none">
                                        </div>
                                    </div>
                                    <div class="row mt-1 mb-1">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                            <button class="btn btn-light btn-sm">Xem ảnh</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <label>Giới thiệu bản thân:</label>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <textarea class="form-control break-custom" id="gioi_thieu">@if($nhaTuyenDung['gioi_thieu']){{$nhaTuyenDung['gioi_thieu']}}@endif</textarea>
                    </div>
                </div>
                <h5 class="mb-3 text-uppercase bg-light p-2 text-center text-md-left"><i class="mdi mdi-earth mr-1"></i>
                    {{__('Mạng xã hội:')}}</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group text-center text-md-left">
                            <label for="social-fb">Facebook</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-facebook-official"></i></span>
                                </div>
                                {{--                                unserialize($nguoiTimViec['social'])[0]--}}
                                <input type="text" class="form-control social-link" id="social-fb" value="@if($nhaTuyenDung['mang_xa_hoi'] != null){{unserialize($nhaTuyenDung['mang_xa_hoi'])[0]}}@endif"
                                       placeholder="Url">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group text-center text-md-left">
                            <label for="social-tw">Twitter</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-twitter"></i></span>
                                </div>
                                <input type="text" class="form-control social-link" id="social-tw" value="@if($nhaTuyenDung['mang_xa_hoi'] != null){{unserialize($nhaTuyenDung['mang_xa_hoi'])[1]}}@endif"
                                       placeholder="Username">
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group text-center text-md-left">
                            <label for="social-insta">Instagram</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-instagram"></i></span>
                                </div>
                                <input type="text" class="form-control social-link" id="social-insta" value="@if($nhaTuyenDung['mang_xa_hoi'] != null){{unserialize($nhaTuyenDung['mang_xa_hoi'])[2]}}@endif"
                                       placeholder="Url">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group text-center text-md-left">
                            <label for="social-lin">Linkedin</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-linkedin"></i></span>
                                </div>
                                <input type="text" class="form-control social-link" id="social-lin" value="@if($nhaTuyenDung['mang_xa_hoi'] != null){{unserialize($nhaTuyenDung['mang_xa_hoi'])[3]}}@endif"
                                       placeholder="Url">
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group text-center text-md-left">
                            <label for="social-sky">Skype</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-skype"></i></span>
                                </div>
                                <input type="text" class="form-control social-link" id="social-sky" value="@if($nhaTuyenDung['mang_xa_hoi'] != null){{unserialize($nhaTuyenDung['mang_xa_hoi'])[4]}}@endif"
                                       placeholder="@username">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group text-center text-md-left">
                            <label for="social-gh">Github</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-github"></i></span>
                                </div>
                                <input type="text" class="form-control social-link" id="social-gh" value="@if($nhaTuyenDung['mang_xa_hoi'] != null){{unserialize($nhaTuyenDung['mang_xa_hoi'])[5]}}@endif"
                                       placeholder="Username">
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="assets\libs\multiselect\jquery.multi-select.js"></script>
    <script src="assets\libs\jquery-quicksearch\jquery.quicksearch.min.js"></script>
    <script src="assets\libs\select2\select2.min.js"></script>

    <script src="assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.js"></script>

    <script type="text/javascript" src="{{asset('assets\libs\date-time-picker\moment-with-locales.min.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{asset('assets\libs\date-time-picker\bootstrap-datetimepicker.css')}}">
    <script type="text/javascript" src="{{asset('assets\libs\date-time-picker\bootstrap-datetimepicker.min.js')}}"></script>


    <script type="text/javascript" src="{{asset('assets\js\app\nhaTuyenDung.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets\js\date-picker-vi.js')}}"></script>
    <script>
        $(function () {
            var fixedScroll = $('#scroll-fixed').offset();
            const headerTop = fixedScroll.top;
            $(window).on('scroll', function () {

                // console.log(fixedScroll.top, window.pageYOffset + 70);
                if (window.pageYOffset + 70 >= headerTop) {
                    $('#scroll-fixed').addClass('scroll-fixed-top');
                } else {
                    $('#scroll-fixed').removeClass('scroll-fixed-top');
                }
            });
        });
    </script>
@endpush
