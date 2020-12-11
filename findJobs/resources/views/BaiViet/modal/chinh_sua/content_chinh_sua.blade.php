<div class="row" id="form-update-body">
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
                    <input class="form-control not-null tieu_de_bai_dang_update" id="tieu_de_bai_dang_update" title="Tiêu đề bài viết" value="{{$data['data']['tieu_de']}}">
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                    <label><abbr class="text-danger  font-15">* </abbr>{{__('Ngành nghề:')}}</label>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <select class="form-control not-null nganh_nghe_update" id="nganh_nghe_update" title="Ngành nghề">
                        {{--                            <option selected disabled value="">Ngành nghề</option>--}}
                        @if($data['nganh_nghe'] != null)
                            <option value="" disabled selected>Chọn ngành nghề</option>
                            @foreach($data['nganh_nghe'] as $row)

                                <option value="{{$row['id']}}" @if(isset($data['data']['get_nganh_nghe']) && $data['data']['get_nganh_nghe'] != null) @if($row['id'] == $data['data']['get_nganh_nghe']){{'selected'}}@endif @endif>{{$row['name']}}</option>
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
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <select class="form-control not-null chuc_vu_tuyen_update" id="chuc_vu_tuyen_update" title="Chức vụ tuyển dụng">
                        <option value="" selected disabled>Chọn chức vụ</option>
                        @if($data['chuc_vu'] != null)
                            @foreach($data['chuc_vu'] as $row)
                                <option value="{{$row['id']}}">{{$row['name']}}</option>
                            @endforeach
                        @endif
                    </select>
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>

                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                    <label><abbr class="text-danger  font-15">* </abbr>{{__('Tên chức vụ:')}}</label>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <input class="form-control not-null ten_chuc_vu" id="ten_chuc_vu" placeholder="VD: Nhân viên kế toán"
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
                    <input class="form-control not-null text-center so_luong_tuyen_update" value="0" id="so_luong_tuyen_update"
                           title="Số lượng tuyển">

                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>

                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                    <label><abbr class="text-danger  font-15">* </abbr>{{__('Số năm kinh nghiệm:')}}</label>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <select class="form-control not-null so_kinh_nghiem_update" id="so_kinh_nghiem_update" title="Số năm kinh nghiệm">
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
                        <input class="form-control not-null text-center do_tuoi_from_update" value="0" id="do_tuoi_from_update"
                               title="Độ tuổi">
                        <label class="form-control bg-light">Đến</label>
                        <input class="form-control not-null text-center do_tuoi_to_update" value="0" id="do_tuoi_to_update" title="Độ tuổi">
                        <label class="form-control bg-light">Tuổi</label>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>

                </div>

            </div>

            <div class="row form-group">
                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                    <label><abbr class="text-danger  font-15">* </abbr>{{__('Hạn ứng tuyển:')}}</label>
                </div>
                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                    <input class="form-control not-null text-center han_tuyen_dung_update" value="{{date('d/m/Y')}}" id="han_tuyen_dung_update"
                           title="Hạn ứng tuyển">

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
                    <input type="text" class="form-control not-null text-center font-weight-bold text-primary muc_luong_from_update"
                           id="muc_luong_from_update" value="0" title="Mức lương"
                           placeholder="Nhập mức lương">
                    <input type="text" class="form-control not-null text-center font-weight-bold text-primary muc_luong_to_update"
                           id="muc_luong_to_update" value="0" title="Mức lương"
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
                    <select class="form-control not-null bang_cap_update" id="bang_cap_update" title="Bằng cấp yêu cầu">
                        <option disabled selected value="">{{__('Chọn học vấn')}}</option>
                        @if($data['bang_cap'] != null)
                            @foreach($data['bang_cap'] as $row)
                                <option value="{{$row['id']}}">{{$row['name']}}</option>
                            @endforeach
                        @endif
                    </select>
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>

                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">
                    <label><abbr class="text-danger  font-15">* </abbr>{{__('Yêu cầu giới tính:')}}</label>
                </div>
                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
                    <select class="form-control not-null gioi_tinh_update" id="gioi_tinh_update" title="Yêu cầu giới tính">
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
                    <select class="form-control not-null dia_diem_lam_viec_update" id="dia_diem_lam_viec_update" title="Địa điểm làm việc">
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
                    <select class="form-control not-null hinh_thuc_update" id="hinh_thuc_update" title="Hình thức">
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
                        <textarea class="form-control break-custom not-null mo_ta_cong_viec_update" id="mo_ta_cong_viec_update"
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
                        <textarea class="form-control break-custom not-null yeu_cau_cong_viec_update" id="yeu_cau_cong_viec_update"
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
                        <textarea class="form-control break-custom not-null quyen_loi_cong_viec_update" id="quyen_loi_cong_viec_update"
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
                    <input class="form-control not-null dia_chi_cong_viec_update" id="dia_chi_cong_viec_update" maxlength="255" title="Địa chỉ">
                    <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>

{{--            <div class="row">--}}
{{--                <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">--}}
{{--                    <h4 class="text-uppercase bg-light p-2">{{__('Đang ký dịch vụ')}}</h4></label>--}}
{{--            </div>--}}

{{--            <div class="row form-group">--}}
{{--                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">--}}
{{--                    <label><abbr class="text-danger  font-15">* </abbr>{{__('Số ngày đăng tin:')}}</label>--}}
{{--                </div>--}}
{{--                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">--}}
{{--                    <input class="form-control not-null text-center so_ngay_ton_tai" value="1" id="so_ngay_ton_tai"--}}
{{--                           title="Số ngày đăng tin">--}}

{{--                    <span class="invalid-feedback" role="alert">--}}
{{--                            <strong></strong>--}}
{{--                        </span>--}}
{{--                </div>--}}
{{--                <span class="form-text text-muted"><small>Số ngày tin được hiển thị trên mục bài đăng tìm việc! (1000đ/1 ngày,tương ứng 1 xu)</small></span>--}}

{{--            </div>--}}

{{--            <div class="row form-group">--}}
{{--                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2 text-center text-md-right">--}}
{{--                    <label><abbr class="text-danger  font-15">* </abbr>{{__('Đăng ký bài viết HOT:')}}</label>--}}
{{--                </div>--}}
{{--                <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">--}}
{{--                    <input class="form-control not-null text-center dang_ky_bai_viet_hot" value="1" id="dang_ky_bai_viet_hot"--}}
{{--                           title="Số ngày đăng tin">--}}

{{--                    <span class="invalid-feedback" role="alert">--}}
{{--                            <strong></strong>--}}
{{--                        </span>--}}
{{--                </div>--}}
{{--                <span class="form-text text-muted"><small>Số ngày tin được hiển thị trên mục bài đăng tìm việc! (1000đ/1 ngày,tương ứng 1 xu)</small></span>--}}

{{--            </div>--}}


        </div>
    </div>

</div>
