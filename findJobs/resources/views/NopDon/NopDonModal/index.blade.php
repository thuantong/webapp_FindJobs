<div class="modal fade" id="modal-nop-don" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalScrollableTitle">{{__('Ứng tuyển: ')}}{{$data['tieu_de']}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="progressbarwizard">

                    <ul class="nav nav-pills nav-justified form-wizard-header mb-0" id="tab-nop-don-header">
                        <li class="nav-item waves-effect">
                            <a href="#thong-tin-ca-nhan" data-toggle="tab" class="nav-link">
                                <span class="number">1.</span>
                                <span class="d-none d-sm-inline">Thông tin cá nhân</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect">
                            <a href="#profile-tab-2" data-toggle="tab" class="nav-link">
                                <span class="number">2.</span>
                                <span class="d-none d-sm-inline">Thông tin xin việc</span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect">
                            <a href="#finish-2" data-toggle="tab" class="nav-link">
                                <span class="number">3.</span>
                                <span class="d-none d-sm-inline">Hoàn tất</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content b-0 mb-0" id="tab-nop-don">

                        <div id="bar" class="progress mb-3" style="height: 7px;">
                            <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                        </div>

                        <div class="tab-pane" id="thong-tin-ca-nhan">
                            <div class="row">
                                <div class="col-12">
{{--                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i--}}
{{--                                            class="mdi mdi-account-circle mr-1"></i>{{__('Thông tin cá nhân')}}</h5>--}}

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ho_ten">{{__('Họ và tên: ')}}</label>
                                                <input type="text" class="form-control not-null" id="ho_ten" title="Họ và tên"
                                                       placeholder="Nhập họ và tên" value="{{Auth::user()->ho_ten}}">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="gioi_tinh">{{__('Giới tính')}}</label>

                                                <select class="form-control not-null" id="gioi_tinh" title="Giới tính">
                                                    <option value="" disabled selected
                                                            class="text-center">{{__('Chọn giới tính')}}</option>
                                                    <option value="1"
                                                            @if($nguoiTimViec['gioi_tinh'] != null) @if($nguoiTimViec['gioi_tinh'] == 1) selected @endif @endif>{{__('Nam')}}</option>
                                                    <option value="2"
                                                            @if($nguoiTimViec['gioi_tinh'] != null) @if($nguoiTimViec['gioi_tinh'] == 2)  selected @endif @endif>{{__('Nữ')}}</option>
                                                </select>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>

                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ngay_sinh">{{__('Ngày sinh')}}</label>
                                                <input class="form-control not-null" title="Ngày sinh"
                                                       placeholder="@if($nguoiTimViec['ngay_sinh'] == '' || $nguoiTimViec['ngay_sinh'] == null){{'Chọn ngày sinh'}}@endif"
                                                       id="ngay_sinh"
                                                       value="@if($nguoiTimViec['ngay_sinh'] == '' || $nguoiTimViec['ngay_sinh'] == null){{''}}@else{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d',$nguoiTimViec['ngay_sinh'])->format('d/m/Y')}}@endif">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

{{--                                    <div class="row">--}}
{{--                                        <div class="col-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label--}}
{{--                                                    for="muc_tieu_nghe_nghiep">{{__('Mục tiêu nghề nghiệp:')}}</label>--}}
{{--                                                <textarea class="form-control" id="muc_tieu_nghe_nghiep"--}}
{{--                                                          placeholder="Hãy viết gì đó...">@if($nguoiTimViec['gioi_thieu'] != null){{$nguoiTimViec['gioi_thieu']}}@endif</textarea>--}}
{{--                                            </div>--}}
{{--                                        </div> <!-- end col -->--}}
{{--                                        <div class="col-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="so_thich">{{__('Sở thích:')}}</label>--}}
{{--                                                <textarea class="form-control" id="so_thich"--}}
{{--                                                          placeholder="Hãy viết gì đó...">@if($nguoiTimViec['so_thich'] != null){{$nguoiTimViec['so_thich']}}@endif</textarea>--}}
{{--                                            </div>--}}
{{--                                        </div> <!-- end col -->--}}
{{--                                    </div> <!-- end row -->--}}

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dia_chi">{{__('Điện thoại')}}</label>
                                                <input type="text" class="form-control not-null" id="so_dien_thoai"
                                                       value="{{Auth::user()->phone}}" title="Điện thoại"
                                                       placeholder="Nhập địa chỉ">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                                {{--                                                <span class="form-text text-muted"><small>If you want to change email please <a--}}
                                                {{--                                                            href="javascript: void(0);">click</a> here.</small></span>--}}
                                            </div>
                                            {{--                                            <div class="form-group">--}}
                                            {{--                                                <label for="khu_vuc">{{__('Khu vực')}}</label>--}}

                                            {{--                                                <input type="text" class="form-control" id="khu_vuc"--}}
                                            {{--                                                       value="@if($nguoiTimViec['khu_vuc'] != null){{$nguoiTimViec['khu_vuc']}}@endif"--}}
                                            {{--                                                       placeholder="Nhập khu vực">--}}
                                            {{--                                                --}}{{--                                                <span class="form-text text-muted"><small>If you want to change email please <a--}}
                                            {{--                                                --}}{{--                                                            href="javascript: void(0);">click</a> here.</small></span>--}}
                                            {{--                                            </div>--}}
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dia_chi">{{__('Địa chỉ')}}</label>
                                                <input type="text" class="form-control not-null" id="dia_chi" title="Địa chỉ"
                                                       value="@if($nguoiTimViec['dia_chi'] != null){{$nguoiTimViec['dia_chi']}}@endif"
                                                       placeholder="Nhập địa chỉ">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong></strong>
                                                </span>
                                                {{--                                                <span class="form-text text-muted"><small>If you want to change email please <a--}}
                                                {{--                                                            href="javascript: void(0);">click</a> here.</small></span>--}}
                                            </div>
{{--                                            <div class="form-group">--}}
{{--                                                <label for="khu_vuc">{{__('Khu vực')}}</label>--}}

{{--                                                <input type="text" class="form-control" id="khu_vuc"--}}
{{--                                                       value="@if($nguoiTimViec['khu_vuc'] != null){{$nguoiTimViec['khu_vuc']}}@endif"--}}
{{--                                                       placeholder="Nhập khu vực">--}}
{{--                                                --}}{{--                                                <span class="form-text text-muted"><small>If you want to change email please <a--}}
{{--                                                --}}{{--                                                            href="javascript: void(0);">click</a> here.</small></span>--}}
{{--                                            </div>--}}
                                        </div>
{{--                                        <div class="col-md-6">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="vt_ung_tuyen">{{__('Vị trí ứng tuyển')}}</label>--}}
{{--                                                <input type="text" class="form-control" id="vt_ung_tuyen"--}}
{{--                                                       value="@if($nguoiTimViec['vi_tri_tim'] != null){{$nguoiTimViec['vi_tri_tim']}}@endif"--}}
{{--                                                       placeholder="Nhập vị trí ứng tuyển">--}}
{{--                                                <span class="form-text text-muted"><small>Vị trí ứng tuyển dùng để hiện cho nhà tuyển dụng thấy, hoặc để lọc bài tuyển dụng</small></span>--}}
{{--                                            </div>--}}
{{--                                        </div> <!-- end col -->--}}
                                    </div> <!-- end row -->

                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>

                        <div class="tab-pane" id="profile-tab-2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="name1"> First name</label>
                                        <div class="col-md-9">
                                            <input type="text" id="name1" name="name1" class="form-control" value="Francis">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="surname1"> Last name</label>
                                        <div class="col-md-9">
                                            <input type="text" id="surname1" name="surname1" class="form-control" value="Brinkman">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-3">
                                        <label class="col-md-3 col-form-label" for="email1">Email</label>
                                        <div class="col-md-9">
                                            <input type="email" id="email1" name="email1" class="form-control" value="cory1979@hotmail.com">
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>

                        <div class="tab-pane" id="finish-2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="text-center">
                                        <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                        <h3 class="mt-0">Bạn đã ứng tuyển thành công !</h3>

                                        <p class="w-75 mb-2 mx-auto">Nhà tuyển dụng đang xem hồ sơ của bạn, bạn sẽ nhận được phản hồi từ họ trong mục thông báo!.</p>

{{--                                        <div class="mb-3">--}}
{{--                                            <div class="custom-control custom-checkbox">--}}
{{--                                                <input type="checkbox" class="custom-control-input" id="customCheck3">--}}
{{--                                                <label class="custom-control-label" for="customCheck3">I agree with the Terms and Conditions</label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->
                        </div>

                        <ul class="list-inline mb-0 wizard">
                            <li class="previous list-inline-item">
                                <a href="javascript: void(0);" class="btn btn-secondary">Trở lại</a>
                            </li>
                            <li class="next list-inline-item float-right">
                                <button class="btn btn-secondary waves-effect" id="luu-nop-ho-so">Tiếp theo</button>
                            </li>
                        </ul>

                    </div> <!-- tab-content -->
                </div> <!-- end #progressbarwizard-->
            </div>
{{--            <div class="modal-footer">--}}

{{--                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Thoát')}}</button>--}}
{{--                <button type="button" class="btn btn-primary" id="save-exp">{{__('Cập nhật')}}</button>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
