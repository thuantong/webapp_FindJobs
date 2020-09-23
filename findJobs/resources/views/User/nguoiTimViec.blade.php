@extends('master.index')

@section('content')
    <head>
        <link href="assets\libs\multiselect\multi-select.css" rel="stylesheet" type="text/css">
        <link href="assets\libs\select2\select2.min.css" rel="stylesheet" type="text/css">
        <!-- ION Slider -->
        <link href="assets\libs\ion-rangeslider\ion.rangeSlider.css" rel="stylesheet" type="text/css">
        {{--        <link href="assets\libs\bootstrap-select\bootstrap-select.min.css" rel="stylesheet" type="text/css">--}}

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
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="ml-0 mr-2"><a class="text-primary" data-toggle="modal"
                                                 data-target="#modal-doi-mat-khau">{{__('Đổi mật khẩu')}}</a>
                        </li>
                        <li class="ml-2 mr-0"><a class="text-bold" onclick="event.preventDefault();
                                                     document.getElementById('logout-user-form').submit();">{{__('Đăng xuất')}}</a>
                        </li>
                    </ol>
                    <form id="logout-user-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
                <h4 class="page-title">{{__('Thông tin cá nhân')}}</h4>
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

                            <button type="button" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Follow
                            </button>
                            <button type="button" class="btn btn-danger btn-xs waves-effect mb-2 waves-light">Message
                            </button>

                            <div class="text-left mt-3">
                                <h4 class="font-13 text-uppercase">{{__('Mục tiêu nghề nghiệp: ')}}</h4>
                                <p class="text-muted font-13 mb-3" id="user_gioi_thieu">
                                    {{($nguoiTimViec['gioi_thieu'] == null || $nguoiTimViec['gioi_thieu'] == '') ? 'NULL' : $nguoiTimViec['gioi_thieu']}}
                                </p>
                                {{--                            <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2">Nik G. Patel</span></p>--}}

                                <p class="text-muted mb-2 font-13"><strong>{{'Số điện thoại :'}}</strong><span
                                        class="ml-2">{{Auth::user()->phone}}</span></p>

                                <p class="text-muted mb-2 font-13"><strong>{{'Email :'}}</strong> <span
                                        class="ml-2 ">{{Auth::user()->email}}</span></p>

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

                    <div class="card-box position-relative">
                        <h4 class="header-title">{{__('Kỹ năng công việc')}}
                            <button class="btn btn-sm btn-pink pt-0 pb-0 pr-1 pl-1 ml-1 d-none"
                                    id="add-new-skill">{{__('+')}}</button>
                            <button class="btn btn-sm btn-primary position-absolute btn-top-right" id="update-skill">
                                {{__('Sửa')}}
                            </button>
                        </h4>
                        {{--                        {{$ccc}}--}}
                        {{--                        <p class="mb-3">Everyone realizes why a new common language would be desirable</p>--}}

                        {{--                        @include('User.nguoiTimViec.skill')--}}



                        {{--                        <div class="pt-1">--}}
                        {{--                            <h6 class="text-uppercase">PHP <span class="float-right">67%</span></h6>--}}
                        {{--                            <div class="progress progress-sm m-0">--}}
                        {{--                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="67"--}}
                        {{--                                     aria-valuemin="0" aria-valuemax="100" style="width: 67%">--}}
                        {{--                                    <span class="sr-only">67% Complete</span>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="mt-2 pt-1">--}}
                        {{--                            <h6 class="text-uppercase">WordPress <span class="float-right">48%</span></h6>--}}
                        {{--                            <div class="progress progress-sm m-0">--}}
                        {{--                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="48"--}}
                        {{--                                     aria-valuemin="0" aria-valuemax="100" style="width: 48%">--}}
                        {{--                                    <span class="sr-only">48% Complete</span>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="mt-2 pt-1">--}}
                        {{--                            <h6 class="text-uppercase">Laravel <span class="float-right">95%</span></h6>--}}
                        {{--                            <div class="progress progress-sm m-0">--}}
                        {{--                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="95"--}}
                        {{--                                     aria-valuemin="0" aria-valuemax="100" style="width: 95%">--}}
                        {{--                                    <span class="sr-only">95% Complete</span>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="mt-2 pt-1">--}}
                        {{--                            <h6 class="text-uppercase">ReactJs <span class="float-right">72%</span></h6>--}}
                        {{--                            <div class="progress progress-sm m-0">--}}
                        {{--                                <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="72"--}}
                        {{--                                     aria-valuemin="0" aria-valuemax="100" style="width: 72%">--}}
                        {{--                                    <span class="sr-only">72% Complete</span>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                    </div> <!-- end card-box-->

                </div> <!-- end col-->

                <div class="col-lg-8 col-xl-8">
                    <div class="card-box position-relative">
                        <button class="btn btn-primary btn-sm position-absolute" id="update-right"
                                style="top: 10px;right: 10px">{{__('Sửa')}}</button>
                        <ul class="nav nav-pills navtab-bg">
                            <li class="nav-item">
                                <a href="#about-me" data-toggle="tab" aria-expanded="true" class="nav-link active ml-0">
                                    <i class="mdi mdi-face-profile mr-1"></i>Giới thiệu
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                    <i class="mdi mdi-settings-outline mr-1"></i>Settings
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane show active" id="about-me">

                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-briefcase mr-1"></i>
                                    {{__('Kinh nghiệm làm việc')}}
                                    <button class="btn btn-sm btn-pink pt-0 pb-0 pr-1 pl-1 ml-1 d-none"
                                            id="add-new-exp">{{__('+')}}</button>
                                </h5>

                                <ul class="list-unstyled timeline-sm">
                                    <li class="timeline-sm-item">
                                        <span class="timeline-sm-date">10 - 2020</span>
                                        <h5 class="mt-0 mb-1">Tên công ty - Chức vụ</h5>
                                        <p>websitename.com</p>
                                        <p class="text-muted mt-2">Mô tả ngắn</p>

                                    </li>
                                    <li class="timeline-sm-item">
                                        <span class="timeline-sm-date">04 - 2020</span>
                                        <h5 class="mt-0 mb-1">Tên công ty - Chức vụ</h5>
                                        <p>websitename.com</p>
                                        <p class="text-muted mt-2">Mô tả ngắn</p>

                                    </li>
                                    {{--                                    <li class="timeline-sm-item">--}}
                                    {{--                                        <span class="timeline-sm-date">2012 - 15</span>--}}
                                    {{--                                        <h5 class="mt-0 mb-1">Senior Graphic Designer</h5>--}}
                                    {{--                                        <p>Software Inc.</p>--}}
                                    {{--                                        <p class="text-muted mt-2">If several languages coalesce, the grammar--}}
                                    {{--                                            of the resulting language is more simple and regular than that of--}}
                                    {{--                                            the individual languages. The new common language will be more--}}
                                    {{--                                            simple and regular than the existing European languages.</p>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li class="timeline-sm-item">--}}
                                    {{--                                        <span class="timeline-sm-date">2010 - 12</span>--}}
                                    {{--                                        <h5 class="mt-0 mb-1">Graphic Designer</h5>--}}
                                    {{--                                        <p>Coderthemes LLP</p>--}}
                                    {{--                                        <p class="text-muted mt-2 mb-0">The European languages are members of--}}
                                    {{--                                            the same family. Their separate existence is a myth. For science--}}
                                    {{--                                            music sport etc, Europe uses the same vocabulary. The languages--}}
                                    {{--                                            only differ in their grammar their pronunciation.</p>--}}
                                    {{--                                    </li>--}}
                                </ul>

                                <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant mr-1"></i>
                                    {{__('Dự án')}}
                                    <button class="btn btn-sm btn-pink pt-0 pb-0 pr-1 pl-1 ml-1 d-none"
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
                                            <th class="d-none">{{__('Chức năng')}}</th>
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

                            <div class="tab-pane" id="settings">
                                <form>
                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                            class="mdi mdi-account-circle mr-1"></i> Personal Info</h5>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="firstname">First Name</label>
                                                <input type="text" class="form-control" id="firstname"
                                                       placeholder="Enter first name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="lastname">Last Name</label>
                                                <input type="text" class="form-control" id="lastname"
                                                       placeholder="Enter last name">
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="userbio">Bio</label>
                                                <textarea class="form-control" id="userbio" rows="4"
                                                          placeholder="Write something..."></textarea>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="useremail">Email Address</label>
                                                <input type="email" class="form-control" id="useremail"
                                                       placeholder="Enter email">
                                                <span class="form-text text-muted"><small>If you want to change email please <a
                                                            href="javascript: void(0);">click</a> here.</small></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="userpassword">Password</label>
                                                <input type="password" class="form-control" id="userpassword"
                                                       placeholder="Enter password">
                                                <span class="form-text text-muted"><small>If you want to change password please <a
                                                            href="javascript: void(0);">click</a> here.</small></span>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i
                                            class="mdi mdi-office-building mr-1"></i> Company Info</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="companyname">Company Name</label>
                                                <input type="text" class="form-control" id="companyname"
                                                       placeholder="Enter company name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cwebsite">Website</label>
                                                <input type="text" class="form-control" id="cwebsite"
                                                       placeholder="Enter website url">
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth mr-1"></i>
                                        Social</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="social-fb">Facebook</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i
                                                                class="fab fa-facebook-square"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="social-fb"
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
                                                                class="fab fa-twitter"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="social-tw"
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
                                                        <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="social-insta"
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
                                                                class="fab fa-linkedin"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="social-lin"
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
                                                                class="fab fa-skype"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="social-sky"
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
                                                                class="fab fa-github"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" id="social-gh"
                                                           placeholder="Username">
                                                </div>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row -->

                                    <div class="text-right">
                                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                                class="mdi mdi-content-save"></i> Save
                                        </button>
                                    </div>
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
            // .on('start',function () {
            // $(this).parent().find('.skill_value').text($(this).val())
            // })
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
        $(document).on('click', '#save-doi-mat-khau', function () {


        });
    </script>
@endpush
