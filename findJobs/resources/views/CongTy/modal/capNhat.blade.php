{{--<div class="modal fade" id="them-moi-cong-ty" tabindex="-1" role="dialog"--}}
{{--     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-scrollable" role="document">--}}
{{--        <div class="modal-content">--}}
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalScrollableTitle">Cập nhật công ty</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{--                    <div class="row">--}}
                {{--                        <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">--}}
                {{--                            <h4 class="text-uppercase bg-light p-2">{{__('Thông Tin Công Ty Tuyển Dụng')}}</h4></label>--}}
                {{--                    </div>--}}
                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="ten_cong_ty"><abbr class="text-danger  font-15">* </abbr>{{__('Tên công ty: ')}}
                        </label>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 text-left">
                        <input type="hidden" id="id-danh-sach" value="{{$id}}">
                        <input class="form-control not-null" id="ten_cong_ty" title="Tên công ty"
                               value="@if($congTy['name'] != null){{$congTy['name']}}@endif">
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="link_website">{{__('Website: ')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <input class="form-control" id="link_website" title="Website"
                               value="@if($congTy['websites'] != null){{$congTy['websites']}}@endif">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="email_cong_ty"><abbr class="text-danger  font-15">* </abbr>{{__('Email: ')}}
                        </label>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <input class="form-control not-null" id="email_cong_ty" data-rule="email" title="Email"
                               value="@if($congTy['email'] != null){{$congTy['email']}}@endif">
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="dien_thoai_cong_ty"><abbr
                                class="text-danger  font-15">* </abbr>{{__('Điện thoại: ')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <input class="form-control not-null" id="dien_thoai_cong_ty" maxlength="10"
                               title="Điện thoại"
                               value="@if($congTy['phone'] != null){{$congTy['phone']}}@endif">
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="dia_chi_chinh">{{__('Địa chỉ chính: ')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 text-left">
                        <input class="form-control" id="dia_chi_chinh"
                               value="@if($congTy['dia_chi'] != null){{$congTy['dia_chi']}}@endif">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label>{{__('Giờ làm việc: ')}}</label>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 pr-md-0">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text pl-1 pr-1">{{__('Từ')}}</span>
                            </div>

                            <input class="form-control not-null" style="border-left: none" id="from_time"
                                   value="@if($congTy['gio_lam_viec'] != null){{unserialize($congTy['gio_lam_viec'])[0]}}@endif">
                            <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                        </div>

                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 pl-md-0">
                        <div class="input-group">
                            <div class="input-group-append">
                                <span class="input-group-text pl-0 pr-0">{{__('Đến')}}</span>
                            </div>
                            <input class="form-control not-null" style="border-left: none" id="to_time"
                                   value="@if($congTy['gio_lam_viec'] != null){{unserialize($congTy['gio_lam_viec'])[1]}}@endif">
                            <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>

                        </div>

                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label>{{__('Ngày làm việc: ')}}</label>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 pr-md-0 text-center">
                        <div class="input-group">
                            <div class="input-group-append pl-1 pr-1"
                                 style="position: absolute;z-index: 1;left: -6px;">
                                <span class="input-group-text pl-1 pr-1">{{__('Từ')}}</span>
                            </div>
                            <select class="form-control text-center not-null" id="from_day" title="Ngày làm việc">
                                <option value="" selected disabled>Chọn thứ</option>
                                <option value="1" @if($congTy['ngay_lam_viec'] != null && unserialize($congTy['ngay_lam_viec'])[0] == 1) selected @endif>{{__('Chủ nhật')}}</option>
                                <option value="2" @if($congTy['ngay_lam_viec'] != null && unserialize($congTy['ngay_lam_viec'])[0] == 2) selected @endif>{{__('Thứ hai')}}</option>
                                <option value="3" @if($congTy['ngay_lam_viec'] != null && unserialize($congTy['ngay_lam_viec'])[0] == 3) selected @endif>{{__('Thứ ba')}}</option>
                                <option value="4" @if($congTy['ngay_lam_viec'] != null && unserialize($congTy['ngay_lam_viec'])[0] == 4) selected @endif>{{__('Thứ tư')}}</option>
                                <option value="5" @if($congTy['ngay_lam_viec'] != null && unserialize($congTy['ngay_lam_viec'])[0] == 5) selected @endif>{{__('Thứ năm')}}</option>
                                <option value="6" @if($congTy['ngay_lam_viec'] != null && unserialize($congTy['ngay_lam_viec'])[0] == 6) selected @endif>{{__('Thứ sáu')}}</option>
                                <option value="7" @if($congTy['ngay_lam_viec'] != null && unserialize($congTy['ngay_lam_viec'])[0] == 7) selected @endif>{{__('Thứ bảy')}}</option>
                                <option value="8" @if($congTy['ngay_lam_viec'] != null && unserialize($congTy['ngay_lam_viec'])[0] == 8) selected @endif>{{__('Sáng - Thứ bảy')}}</option>
                            </select>
                            <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                        </div>

                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 col-xl-4 pl-md-0 text-center">
                        <div class="input-group">
                            <div class="input-group-append pl-1 pr-1"
                                 style="position: absolute;z-index: 1;left: -6px;">
                                <span class="input-group-text pl-0 pr-0">{{__('Đến')}}</span>
                            </div>
                            <select class="form-control not-null" id="to_day" title="Ngày làm việc">
                                <option value="" selected disabled>Chọn thứ</option>
                                <option value="1" @if($congTy['ngay_lam_viec'] != null && unserialize($congTy['ngay_lam_viec'])[1] == 1) selected @endif>{{__('Chủ nhật')}}</option>
                                <option value="2" @if($congTy['ngay_lam_viec'] != null && unserialize($congTy['ngay_lam_viec'])[1] == 2) selected @endif>{{__('Thứ hai')}}</option>
                                <option value="3" @if($congTy['ngay_lam_viec'] != null && unserialize($congTy['ngay_lam_viec'])[1] == 3) selected @endif>{{__('Thứ ba')}}</option>
                                <option value="4" @if($congTy['ngay_lam_viec'] != null && unserialize($congTy['ngay_lam_viec'])[1] == 4) selected @endif>{{__('Thứ tư')}}</option>
                                <option value="5" @if($congTy['ngay_lam_viec'] != null && unserialize($congTy['ngay_lam_viec'])[1] == 5) selected @endif>{{__('Thứ năm')}}</option>
                                <option value="6" @if($congTy['ngay_lam_viec'] != null && unserialize($congTy['ngay_lam_viec'])[1] == 6) selected @endif>{{__('Thứ sáu')}}</option>
                                <option value="7" @if($congTy['ngay_lam_viec'] != null && unserialize($congTy['ngay_lam_viec'])[1] == 7) selected @endif>{{__('Thứ bảy')}}</option>
                                <option value="8" @if($congTy['ngay_lam_viec'] != null && unserialize($congTy['ngay_lam_viec'])[1] == 8) selected @endif>{{__('Sáng - Thứ bảy')}}</option>
                            </select>
                            {{--                            <input class="form-control" id="to_day" value="{{date('D')}}">--}}
                            <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                        </div>

                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="quy_mo_nhan_su">{{__('Quy mô nhân sự: ')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 text-left">
                        <select class="form-control not-null" id="quy_mo_nhan_su" title="Quy mô nhân sự">

                            <option disabled selected value="">Quy mô nhân sự</option>
                            <option value="1" @if($congTy['so_nhan_vien'] != null && $congTy['so_nhan_vien'] == 1) selected @endif>Dưới 20 người</option>
                            <option value="2" @if($congTy['so_nhan_vien'] != null && $congTy['so_nhan_vien'] == 2) selected @endif>Từ 20 đến 50 người</option>
                            <option value="3" @if($congTy['so_nhan_vien'] != null && $congTy['so_nhan_vien'] == 3) selected @endif>Từ 50 đến 75 người</option>
                            <option value="4" @if($congTy['so_nhan_vien'] != null && $congTy['so_nhan_vien'] == 4) selected @endif>Trên 75 người</option>
                        </select>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="linh_vuc_hoat_dong"><abbr
                                class="text-danger  font-15">* </abbr>{{__('Lĩnh vực: ')}}
                        </label>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 text-left">
{{--                    {{count($layNganhNghe)}}--}}
{{--                        {{in_array(3,$layNganhNghe,true)}}--}}
{{--                        @foreach($layNganhNghe as $row)--}}
{{--                            {{'cc'.$row}}--}}
{{--                            @endforeach--}}
                        <select id="linh_vuc_hoat_dong" class="form-control not-null" multiple="multiple"
                                tabindex="-1"
                                title="Lĩnh vực"
                                aria-hidden="true">
                            <option value="" disabled>Ngành Nghề</option>
                            @foreach($nganhNghe as $row)
                                <option value="{{$row['id']}}" @if(count($layNganhNghe) != 0 && in_array($row['id'],$layNganhNghe) == true) selected @endif>{{$row['name']}}</option>
                            @endforeach
                        </select>
                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>

                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="fax_cong_ty">{{__('FAX: ')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <input class="form-control" id="fax_cong_ty" value="@if($congTy['fax'] != null){{$congTy['fax']}}@endif">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                        <label for="logo_cong_ty">{{__('Logo: ')}}</label>
                    </div>
                    <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8 center-element position-relative">
                        <div style="width: 8rem;height: 8rem;" id="logo_cong_ty">
                            <img src="@if($congTy['logo'] != null){{URL::asset(''.$congTy['logo'].'')}}@else{{URL::asset('images/default-company-logo.jpg')}}@endif"
                                 class="avatar-xl img-thumbnail"
                                 data-src="@if($congTy['logo'] != null){{URL::asset(''.$congTy['logo'].'')}}@else{{URL::asset('images/default-company-logo.jpg')}}@endif"
                                 alt="profile-image" tabindex="-1" style="width: 100%;height: 100%">
                            <div class="position-absolute hover-me"
                                 style="display:none;width: 8rem;height: 8rem;top:0">
                                <div class="position-relative center-element" style="width: 100%;height: 100%;background-color: rgba(50, 58, 70, .55)">
                                    <div>
                                        <div class="row mt-1 mb-1">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                                <button class="btn btn-success btn-sm logo_cong_ty_change">Đổi ảnh</button>
                                                <input type="file" class="d-none logo_cong_ty_file">
                                            </div>
                                        </div>
                                        <div class="row mt-1 mb-1">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                                <button class="btn btn-light btn-sm logo_cong_ty_view">Xem ảnh</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row mt-1 mb-1 d-block d-md-none">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                    <button class="btn btn-success btn-sm logo_cong_ty_change">Đổi ảnh</button>
                                </div>
                            </div>
                            <div class="row mt-1 mb-1 d-block d-md-none">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                    <button class="btn btn-light btn-sm logo_cong_ty_view">Xem ảnh</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="save-cong-ty">Lưu lại</button>
            </div>
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
