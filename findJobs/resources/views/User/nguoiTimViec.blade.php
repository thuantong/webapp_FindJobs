@extends('master.index')

@section('content')
    <head>
        <link href="assets\libs\multiselect\multi-select.css" rel="stylesheet" type="text/css">
        <link href="assets\libs\select2\select2.min.css" rel="stylesheet" type="text/css">
        <!-- ION Slider -->
        <link href="assets\libs\ion-rangeslider\ion.rangeSlider.css" rel="stylesheet" type="text/css">
        {{--        <link href="assets\libs\bootstrap-select\bootstrap-select.min.css" rel="stylesheet" type="text/css">--}}
        <link href="assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.css" rel="stylesheet">

        {{--        date picker--}}
        <link href="assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
    </head>
    <div id="update_avatar_crop" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Cập nhật ảnh đại diện')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body p-4">
                    <div class="demo-wrap upload-demo">
                        <div class="container">
                            <div class="row">

                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="upload-msg">
                                        Upload a file to start cropping
                                    </div>
                                    <div class="upload-demo-wrap m-0 text-center">
                                        <div id="upload-demo"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect"
                            data-dismiss="modal">{{__('Thoát')}}</button>
                    <button type="button" class="btn btn-info waves-effect waves-light" id="get-result-avata">
                        {{__('Lưu lại')}}
                    </button>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
    @include('User.modal.doiMatKhau')
    @include('User.modal.capNhatProject')
    @include('User.modal.capNhatExp')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="page-title-box mb-1">
                <div class="page-title-right">
                    {{--                    <ol class="breadcrumb m-0">--}}
                    {{--                        <li class="ml-0 mr-2">ddddđ--}}
                    {{--                        </li>--}}
                    {{--                        <li class="ml-2 mr-0">dddd--}}
                    {{--                        </li>--}}
                    {{--                    </ol>--}}
                    {{--                    <form id="logout-user-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">--}}
                    {{--                        @csrf--}}
                    {{--                    </form>--}}
                </div>
                <h4 class="page-title">{{__('Thông tin cá nhân')}}</h4>
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
                    <button class="btn btn-success btn-sm save-profile">{{__('Lưu lại tất cả')}}</button>
                    <button class="btn btn-secondary btn-sm cancel-profile">{{__('Không lưu')}}</button>

                </div>

            </div>

        </div>
    </div>
    <div class="row">
        {{--        <div class="col-sm-1 col-md-1 col-lg-1 col-xl-1">--}}

        {{--        </div>--}}
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="row">
                <div class="col-lg-4 col-xl-4">
                    <div class="card-box text-center">
                        <form>


                            @csrf
                            <input type="file" id="update_avatar" class="d-none">

                            <img class="rounded-circle avatar-xl img-thumbnail" src="{{asset($nguoiTimViec['avatar'])}}"
                                 id="avatar-user">

                            <h4 class="mb-0">{{Auth::user()->ho_ten}}</h4>
                            <p class="text-muted">@webdesigner</p>

                            {{--                            <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow--}}
                            {{--                            </button>--}}
                            {{--                            <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message--}}
                            {{--                            </button>--}}

                            <div class="text-left mt-3">
                                <h4 class="font-13 text-uppercase">{{__('Giới thiệu bản thân: ')}}</h4>
                                <p class="font-13 mb-2" id="user_gioi_thieu">
                                    <textarea class="form-control"
                                              placeholder="@if($nguoiTimViec['gioi_thieu'] == null || $nguoiTimViec['gioi_thieu'] == ''){{'NULL'}}@endif">{{$nguoiTimViec['gioi_thieu']}}</textarea>
                                </p>
                                <p class="mb-2 font-13"><strong>{{__('Số điện thoại :')}}</strong><span
                                        class="ml-2"><input class="form-control phone" value="{{Auth::user()->phone}}"
                                                            autocomplete="off"></span></p>

                                <p class="mb-2 font-13"><strong>{{'Email :'}}</strong> <span
                                        class="ml-2 "><input class="form-control email" value="{{Auth::user()->email}}"
                                                             autocomplete="off"></span></p>

                                {{--                                <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span--}}
                                {{--                                        class="ml-2">USA</span></p>--}}
                            </div>

                            {{--                            <ul class="social-list list-inline mt-3 mb-0">--}}
                            {{--                                <li class="list-inline-item">--}}
                            {{--                                    <a href="javascript: void(0);" class="social-list-item border-purple text-purple"><i--}}
                            {{--                                            class="mdi mdi-facebook"></i></a>--}}
                            {{--                                </li>--}}
                            {{--                                <li class="list-inline-item">--}}
                            {{--                                    <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i--}}
                            {{--                                            class="mdi mdi-google"></i></a>--}}
                            {{--                                </li>--}}
                            {{--                                <li class="list-inline-item">--}}
                            {{--                                    <a href="javascript: void(0);" class="social-list-item border-info text-info"><i--}}
                            {{--                                            class="mdi mdi-twitter"></i></a>--}}
                            {{--                                </li>--}}
                            {{--                                <li class="list-inline-item">--}}
                            {{--                                    <a href="javascript: void(0);"--}}
                            {{--                                       class="social-list-item border-secondary text-secondary"><i--}}
                            {{--                                            class="mdi mdi-github-circle"></i></a>--}}
                            {{--                                </li>--}}
                            {{--                            </ul>--}}
                        </form>

                    </div> <!-- end card-box -->

                    <div class="card-box position-relative" id="render-skill">
                        <h4 class="header-title">{{__('Kỹ năng công việc')}}
                            <button class="btn btn-sm btn-pink pt-0 pb-0 pr-1 pl-1 ml-1"
                                    id="add-new-skill">{{__('+')}}</button>

                        </h4>

                    </div> <!-- end card-box-->

                </div> <!-- end col-->

                <div class="col-lg-8 col-xl-8">
                    <div class="card-box position-relative">
                        {{--                        <button class="btn btn-primary btn-sm position-absolute" id="update-right"--}}
                        {{--                                style="top: 10px;right: 10px">{{__('Sửa')}}</button>--}}
                        <ul class="nav nav-pills navtab-bg">
                            <li class="nav-item">

                                <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                    <i class="mdi mdi-settings-outline mr-1"></i>{{__('Thông tin cơ bản')}}
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="#about-me-exp" data-toggle="tab" aria-expanded="true"
                                   class="nav-link ml-0">
                                    <i class="mdi mdi-face-profile mr-1"></i>{{__('Kinh nghiệm')}}
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane" id="about-me-exp">

                                <h5 class="mb-4 text-uppercase bg-light p-2"><i class="mdi mdi-briefcase mr-1"></i>
                                    {{__('Kinh nghiệm làm việc')}}
                                    <button class="btn btn-sm btn-pink pt-0 pb-0 pr-1 pl-1 ml-1"
                                            id="add-new-exp">{{__('+')}}</button>
                                </h5>

                                <ul class="list-unstyled timeline-sm" id="exp-list">
{{--                                    @include('User.nguoiTimViec.htmlKinhNghiemLamViec')--}}
                                </ul>
{{--{{$nguoiTimViec['gioi_thieu']}}--}}
                                <h5 class="mb-3 mt-4 text-uppercase bg-light p-2"><i
                                        class="mdi mdi-cards-variant mr-1"></i>
                                    {{__('Dự án')}}
                                    <button class="btn btn-sm btn-pink pt-0 pb-0 pr-1 pl-1 ml-1"
                                            id="add-new-project">{{__('+')}}</button>

                                </h5>
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0 table-project" id="table-project">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>{{__('Tên dự án')}}</th>
                                            <th>{{__('Thời gian bắt đầu')}}</th>
                                            <th>{{__('Ngày hoàn thành')}}</th>
                                            <th>{{__('Trạng thái')}}</th>
                                            <th>{{__('Liên kết')}}</th>
                                            <th>{{__('Chức năng')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{--                                        <tr>--}}
                                        {{--                                            <td>1</td>--}}
                                        {{--                                            <td>App design and development</td>--}}
                                        {{--                                            <td>01/01/2015</td>--}}
                                        {{--                                            <td>10/15/2018</td>--}}
                                        {{--                                            <td><span class="badge badge-info">Work in Progress</span></td>--}}
                                        {{--                                            <td>Halette Boivin</td>--}}
                                        {{--                                            <td class="d-none">button</td>--}}
                                        {{--                                        </tr>--}}
                                        {{--                                        <tr>--}}
                                        {{--                                            <td>2</td>--}}
                                        {{--                                            <td>Coffee detail page - Main Page</td>--}}
                                        {{--                                            <td>21/07/2016</td>--}}
                                        {{--                                            <td>12/05/2018</td>--}}
                                        {{--                                            <td><span class="badge badge-success">Pending</span></td>--}}
                                        {{--                                            <td>Durandana Jolicoeur</td>--}}
                                        {{--                                            <td class="d-none">button</td>--}}
                                        {{--                                        </tr>--}}
                                        {{--                                        <tr>--}}
                                        {{--                                            <td>3</td>--}}
                                        {{--                                            <td>Poster illustation design</td>--}}
                                        {{--                                            <td>18/03/2018</td>--}}
                                        {{--                                            <td>28/09/2018</td>--}}
                                        {{--                                            <td><span class="badge badge-pink">Done</span></td>--}}
                                        {{--                                            <td>Lucas Sabourin</td>--}}
                                        {{--                                            <td class="d-none">button</td>--}}
                                        {{--                                        </tr>--}}
                                        {{--                                        <tr>--}}
                                        {{--                                            <td>4</td>--}}
                                        {{--                                            <td>Drinking bottle graphics</td>--}}
                                        {{--                                            <td>02/10/2017</td>--}}
                                        {{--                                            <td>07/05/2018</td>--}}
                                        {{--                                            <td><span class="badge badge-purple">Work in Progress</span></td>--}}
                                        {{--                                            <td>Donatien Brunelle</td>--}}
                                        {{--                                            <td class="d-none">button</td>--}}
                                        {{--                                        </tr>--}}
                                        {{--                                        <tr>--}}
                                        {{--                                            <td>5</td>--}}
                                        {{--                                            <td>Landing page design - Home</td>--}}
                                        {{--                                            <td>17/01/2017</td>--}}
                                        {{--                                            <td>25/05/2021</td>--}}
                                        {{--                                            <td><span class="badge badge-warning">Coming soon</span></td>--}}
                                        {{--                                            <td>Karel Auberjo</td>--}}
                                        {{--                                            <td class="d-none">button</td>--}}
                                        {{--                                        </tr>--}}

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!-- end timeline content-->

                            <div class="tab-pane show active" id="settings">
                                <form>
                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                            class="mdi mdi-account-circle mr-1"></i>{{__('Thông tin cá nhân')}}</h5>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="ho_ten">{{__('Họ và tên: ')}}</label>
                                                <input type="text" class="form-control" id="ho_ten"
                                                       placeholder="Nhập họ và tên" value="{{Auth::user()->ho_ten}}">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="gioi_tinh">{{__('Giới tính')}}</label>

                                                <select class="form-control" id="gioi_tinh">
                                                    <option value="" disabled selected
                                                            class="text-center">{{__('Chọn giới tính')}}</option>
                                                    <option value="1" @if($nguoiTimViec['gioi_tinh'] == 1) selected @endif>{{__('Nam')}}</option>
                                                    <option value="2" @if($nguoiTimViec['gioi_tinh'] == 2) selected @endif>{{__('Nữ')}}</option>
                                                </select>

                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ngay_sinh">{{__('Ngày sinh')}}</label>
                                                <input class="form-control" placeholder="Chọn ngày sinh" id="ngay_sinh" value="{{\Illuminate\Support\Carbon::createFromFormat('Y-m-d',$nguoiTimViec['ngay_sinh'])->format('d/m/Y')}}">

                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="muc_tieu_nghe_nghiep">{{__('Mục tiêu nghề nghiệp:')}}</label>
                                                <textarea class="form-control" id="muc_tieu_nghe_nghiep"
                                                          placeholder="Hãy viết gì đó...">{{$nguoiTimViec['muc_tieu_nghe_nghiep']}}</textarea>
                                            </div>
                                        </div> <!-- end col -->
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="so_thich">{{__('Sở thích:')}}</label>
                                                <textarea class="form-control" id="so_thich"
                                                          placeholder="Hãy viết gì đó...">{{$nguoiTimViec['so_thich']}}</textarea>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dia_chi">{{__('Địa chỉ')}}</label>
                                                <input type="text" class="form-control" id="dia_chi" value="{{$nguoiTimViec['dia_chi']}}"
                                                       placeholder="Nhập địa chỉ">
                                                {{--                                                <span class="form-text text-muted"><small>If you want to change email please <a--}}
                                                {{--                                                            href="javascript: void(0);">click</a> here.</small></span>--}}
                                            </div>
                                            <div class="form-group">
                                                <label for="khu_vuc">{{__('Khu vực')}}</label>

                                                <input type="text" class="form-control" id="khu_vuc" value="{{$nguoiTimViec['khu_vuc']}}"
                                                       placeholder="Nhập khu vực">
                                                {{--                                                <span class="form-text text-muted"><small>If you want to change email please <a--}}
                                                {{--                                                            href="javascript: void(0);">click</a> here.</small></span>--}}
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="vt_ung_tuyen">{{__('Vị trí ứng tuyển')}}</label>
                                                <input type="text" class="form-control" id="vt_ung_tuyen" value="{{$nguoiTimViec['vi_tri_tim']}}"
                                                       placeholder="Nhập vị trí ứng tuyển">
                                                <span class="form-text text-muted"><small>Vị trí ứng tuyển dùng để hiện cho nhà tuyển dụng thấy, hoặc để lọc bài tuyển dụng</small></span>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                            class="mdi mdi-office-building mr-1"></i>{{__('Thông tin tìm việc')}}</h5>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <label>{{__('Mức lương mong muốn: ')}}</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex">
                                                    <input type="text" class="form-control text-center font-weight-bold text-primary"
                                                           id="muc_luong_from" value="{{trim(substr($nguoiTimViec['muc_luong'],0,strpos($nguoiTimViec['muc_luong'],'-')))}}"
                                                           placeholder="Nhập mức lương">
                                                    <input type="text" class="form-control text-center font-weight-bold text-primary"
                                                           id="muc_luong_to" value="{{trim(substr($nguoiTimViec['muc_luong'],strpos($nguoiTimViec['muc_luong'],'-')+1))}}"
                                                           placeholder="Nhập mức lương">
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                            <div class="form-group">
                                                <label for="hoc_van">{{__('Học vấn:')}}</label>
                                                <select class="form-control hoc_van" id="hoc_van">
                                                    <option disabled selected value="">{{__('Chọn học vấn')}}</option>
                                                    <option value="1" @if($nguoiTimViec['hoc_van'] == 1) selected @endif>{{__('Đại học')}}</option>
                                                    <option value="2" @if($nguoiTimViec['hoc_van'] == 2) selected @endif>{{__('Cao đẳng')}}</option>
                                                    <option value="3" @if($nguoiTimViec['hoc_van'] == 3) selected @endif>{{__('Trung cấp')}}</option>
                                                    <option value="4" @if($nguoiTimViec['hoc_van'] == 4) selected @endif>{{__('Thạc sĩ')}}</option>
                                                    <option value="5" @if($nguoiTimViec['hoc_van'] == 5) selected @endif>{{__('Tiến sĩ')}}</option>
                                                    <option value="6" @if($nguoiTimViec['hoc_van'] == 6) selected @endif>{{__('Trung cấp')}}</option>
                                                    <option value="7" @if($nguoiTimViec['hoc_van'] == 7) selected @endif>{{__('Chứng chỉ')}}</option>
                                                    <option value="8" @if($nguoiTimViec['hoc_van'] == 8) selected @endif>{{__('Trung học phổ thông')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7">
                                            <div class="form-group">
                                                <label
                                                    for="ten_truong_tot_nghiep">{{__('Tên trường tốt nghiệp: ')}}</label>
                                                <input class="form-control ten_truong_tot_nghiep" value="{{$nguoiTimViec['ten_truong_tot_nghiep']}}"
                                                       id="ten_truong_tot_nghiep" placeholder="VD: Trường Đại Học Công Nghiệp Thành Phố HCM.">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5">
                                            <div class="form-group">
                                                <label for="loai_cong_viec">{{__('Loại công việc')}}</label>
                                                <select class="form-control loai_cong_viec" id="loai_cong_viec">
                                                    <option disabled selected value="">{{__('Loại công việc')}}</option>
                                                    <option value="1" @if($nguoiTimViec['loai_cong_viec'] == 1) selected @endif>{{__('Toàn thời gian')}}</option>
                                                    <option value="2" @if($nguoiTimViec['loai_cong_viec'] == 2) selected @endif>{{__('Bán thời gian')}}</option>
                                                    <option value="3" @if($nguoiTimViec['loai_cong_viec'] == 3) selected @endif>{{__('Sinh viên - Thực tập')}}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-7 col-lg-7 col-xl-7">
                                            <div class="form-group">
                                                <label for="ten_cong_viec">{{__('Tên công việc: ')}}</label>
                                                <input class="form-control ten_cong_viec" id="ten_cong_viec" value="{{$nguoiTimViec['ten_cong_viec']}}"
                                                       placeholder="VD: Nhân viên kế toán">
                                            </div>
                                        </div>
                                    </div>

                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth mr-1"></i>
                                        {{__('Mạng xã hội:')}}</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="social-fb">Facebook</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-facebook-official"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control social-link" id="social-fb" value="{{unserialize($nguoiTimViec['social'])[0]}}"
                                                           placeholder="Url">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="social-tw">Twitter</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-twitter"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control social-link" id="social-tw" value="{{unserialize($nguoiTimViec['social'])[1]}}"
                                                           placeholder="Username">
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="social-insta">Instagram</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-instagram"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control social-link" id="social-insta" value="{{unserialize($nguoiTimViec['social'])[2]}}"
                                                           placeholder="Url">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="social-lin">Linkedin</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-linkedin"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control social-link" id="social-lin" value="{{unserialize($nguoiTimViec['social'])[3]}}"
                                                           placeholder="Url">
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="social-sky">Skype</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-skype"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control social-link" id="social-sky" value="{{unserialize($nguoiTimViec['social'])[4]}}"
                                                           placeholder="@username">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="social-gh">Github</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fa fa-github"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control social-link" id="social-gh" value="{{unserialize($nguoiTimViec['social'])[5]}}"
                                                           placeholder="Username">
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

{{--                                    <div class="text-right">--}}
{{--                                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i--}}
{{--                                                class="mdi mdi-content-save"></i> Save--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
                                </form>
                            </div>
                            <!-- end settings content-->

                        </div> <!-- end tab-content -->
                    </div> <!-- end card-box-->

                </div> <!-- end col -->
            </div>
        </div>
        {{--        <div class="col-sm-1 col-md-1 col-lg-1 col-xl-1">--}}

        {{--        </div>--}}
    </div>
@endsection

@push('scripts')
    {{--    <script src="assets\libs\bootstrap-select\bootstrap-select.min.js"></script>--}}

    <!-- Ion Range Slider-->
    <script src="assets\libs\ion-rangeslider\ion.rangeSlider.min.js"></script>

    <!-- Range slider init js-->
    <script src="assets\js\pages\range-sliders.init.js"></script>
    <script src="assets\libs\multiselect\jquery.multi-select.js"></script>
    <script src="assets\libs\jquery-quicksearch\jquery.quicksearch.min.js"></script>
    <script src="assets\libs\select2\select2.min.js"></script>

    {{--date picker--}}
    <script src="assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.js"></script>
    <script src="assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.js"></script>


    <script type="text/javascript" src="{{asset('assets\js\app\nguoiTimViec.js')}}"></script>
    <script type="text/javascript">
        var $uploadCrop;

        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.upload-demo').addClass('ready');
                    $uploadCrop.croppie('bind', {
                        url: e.target.result,
                    }).then(function () {
                        console.log('jQuery bind complete');
                    });
                };
                //
                reader.readAsDataURL(input.files[0]);
            } else {
                swal('Sorry - you\'re browser doesn\'t support the FileReader API');
            }
        }

        //
        $uploadCrop = $('#upload-demo').croppie({
            viewport: {
                width: 200,
                height: 200,
                // type: 'circle'
            },
            enableExif: true,
        });

        $(function () {
            $('body').addClass('enlarged');

            $('#avatar-user').on('click', function () {
                // alert();
                $('#update_avatar').trigger('click');
            });
            $('#update_avatar').on('change', function () {
                $('#update_avatar_crop').modal('show');
                readFile(this);
            });
            $('#get-result-avata').on('click', function (ev) {
                // $('.jq-toast-wrap .jq-toast-single').find('#message').text('Sửa ảnh đại diện');
                let namePicture = $('#update_avatar')[0].files[0].name;
                // console.log();
                $uploadCrop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport',
                }).then(function (resp) {
                    // console.log(resp);
                    $.ajax({
                        method: 'post',
                        url: '/user-set-avatar',
                        data: {
                            fileName: resp,
                            name: namePicture,
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        // beforeSend: function(xhr) {
                        //
                        // },
                        success: res => {
                            $('#avatar-user').attr('src', res);
                            // $('#toastr-three').click();
                            $.toast({
                                heading: 'Sửa thành công!',
                                hideAfter: 2000,
                                icon: 'success',
                                loaderBg: '#5ba035',
                                position: 'top-right',
                                stack: 1,
                                text: 'Thay đổi ảnh đại diện thành công',
                            });
                            $('#update_avatar_crop').modal('hide');
                            // console.log(res)
                        },
                    });
                });
            });
        });
        document.getElementById('save-doi-mat-khau').addEventListener('click', function () {
            let arraySend = {
                    password_old: $('.password-old').val(),
                    password_new: $('.password-new').val(),
                    re_password_new: $('.re-password-new').val(),
                }
            ;
            let arrayCustom =
                {
                    beforeSendElement: $(this).attr('id'),
                    resHeading: 'Đổi mật khẩu',
                    password_old: $('.password-old'),
                    password_new: $('.password-new'),
                    re_password_new: $('.re-password-new'),
                };
            getResponseAjax('post', '/doi-mat-khau', arraySend, arrayCustom);
        });

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
        // $(document).on('click', '.call-save-profile', function () {
        //     $('.save-profile,.cancel-profile').removeClass('d-none').fadeIn();
        //     $('.call-save-profile').addClass('d-none');
        // });
        // $(document).on('click', '.save-profile', function () {
        //     $('.save-profile,.cancel-profile').addClass('d-none');
        //     $('.call-save-profile').removeClass('d-none').fadeIn();
        //
        // });
        // $(document).on('click', '.cancel-profile', function () {
        //     $('.save-profile,.cancel-profile').addClass('d-none');
        //     $('.call-save-profile').removeClass('d-none').fadeIn();
        //
        // });
    </script>
@endpush
