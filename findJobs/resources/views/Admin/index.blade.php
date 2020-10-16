<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tìm việc làm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets\images\animat-diamond-color.gif')}}">

    <!-- plugin css -->
    <link href="{{asset('assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="{{asset('assets\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    {{--    <link href="{{asset('assets\icon\font-awesome\font-awesome.min.css')}}" rel="stylesheet" type="text/css">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets\icon\themify-icons\themify-icons.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets\icon\font-awesome\css\font-awesome.min.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets\icon\icofont\css\icofont.css')}}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets\icon\feather\css\feather.css')}}">
    {{--        <link href="{{asset('assets\css\icons.min.css')}}" rel="stylesheet" type="text/css">--}}
    <link href="{{asset('assets\css\app.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets\css\style-customs.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets\css\croppie\croppie.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets\css\croppie\demo.css')}}" rel="stylesheet" type="text/css">

</head>
<body>
<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
    <div class="navbar-custom">
        @if(Auth::user() != null)
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle  waves-effect waves-light fab fa-rocketchat font-20 call-chat">
                    {{--                    <i class="fe-bell noti-icon"></i>--}}
                    {{--                    <span class="badge badge-danger rounded-circle noti-icon-badge">4</span>--}}
                </a>

            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#"
                   role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="icofont icofont-bell-alt noti-icon"></i>
                    <span class="badge badge-danger rounded-circle noti-icon-badge" id="so-tin-moi-dang">0</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                                    <span class="float-right">
                                        <a href="" class="text-dark">
{{--                                            <small>Clear All</small>--}}
                                        </a>
                                    </span>Thông báo
                        </h5>
                    </div>

                    <div class="slimscroll noti-scroll" id="tab-thong-bao">

                    </div>

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                        Xem thêm
                        <i class="fi-arrow-right"></i>
                    </a>

                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                   href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img
                        src="@if(Session::get('avatar') != null){{URL::asset(Session::get('avatar'))}}@elseif(Session::get('avatar') == null){{URL::asset('images\default-user-icon-8.jpg')}}@endif"
                        alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                                @if(Auth::user() != null){{Auth::user()->ho_ten}}@endif <i
                            class="icofont icofont-caret-down"></i>
                            </span>
                </a>

                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow text-center m-0">@if(Auth::user() != null){{Auth::user()->ho_ten}}@endif</h6>
                    </div>

                    <!-- item-->
                    <a href="@if(Session::get('loai_tai_khoan') == 1 && Session::get('loai_tai_khoan') != null){{route('user.nguoiTimViec')}}@elseif(Session::get('loai_tai_khoan') == 2 && Session::get('loai_tai_khoan') != null){{route('user.nhaTuyenDung')}}@endif"
                       class="dropdown-item notify-item">
                        <i class="remixicon-account-circle-line"></i>
                        <span>Thông tin tài khoản</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="remixicon-settings-3-line"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="remixicon-wallet-line"></i>
                        <span>My Wallet <span class="badge badge-success float-right">3</span> </span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="remixicon-lock-line"></i>
                        <span>Lock Screen</span>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item  notify-item"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="remixicon-logout-box-line"></i>
                        <span>Đăng xuất</span>
                        {{--                        {{ __('Logout') }}--}}
                    </a>

                    <form id="logout-form" action="{{ route('auth.logout') }}" method="get" class="d-none">
                        @csrf
                    </form>
                    <!-- item-->
                    {{--                    <a href=""  class="dropdown-item notify-item">--}}
                    {{--                        <i class="remixicon-logout-box-line"></i>--}}
                    {{--                        <span>Logout</span>--}}
                    {{--                    </a>--}}

                </div>
            </li>


        </ul>

        @endif
        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                @if(Auth::user() == null)
                    <a href="" class="nav-link logo text-center">Tìm việc làm</a>
                @else
                <a href="/" class="nav-link logo text-center">
                        <span class="logo-lg">
                            <img src="assets\images\logo-light.png" alt="" height="20">
                        <!-- <span class="logo-lg-text-light">Xeria</span> -->
                        </span>
                    <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">X</span> -->
                            <img src="assets\images\logo-sm.png" alt="" height="24">
                        </span>
                </a>
                    @endif
            </li>
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="icofont icofont-navigation-menu"></i>
                </button>
            </li>


{{--            <li class="dropdown dropdown-mega d-block">--}}

{{--                <a class="nav-link center-element search-field" data-search="search-field">--}}
{{--                    <span>Tìm kiếm</span>--}}
{{--                </a>--}}
{{--                <div class="dropdown-menu dropdown-megamenu">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-sm-6">--}}

{{--                            <div class="row">--}}
{{--                                <div class="col-md-4">--}}
{{--                                    <h5 class="text-dark mt-0">UI Components</h5>--}}
{{--                                    <ul class="list-unstyled megamenu-list">--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">Widgets</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">Nestable List</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">Range Sliders</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">Masonry Items</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">Sweet Alerts</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">Treeview Page</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">Tour Page</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <div class="col-md-4">--}}
{{--                                    <h5 class="text-dark mt-0">Applications</h5>--}}
{{--                                    <ul class="list-unstyled megamenu-list">--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">eCommerce Pages</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">CRM Pages</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">Email</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">Calendar</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">Team Contacts</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">Task Board</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">Email Templates</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <div class="col-md-4">--}}
{{--                                    <h5 class="text-dark mt-0">Extra Pages</h5>--}}
{{--                                    <ul class="list-unstyled megamenu-list">--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">Left Sidebar with User</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">Menu Collapsed</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">Small Left Sidebar</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">New Header Style</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">Search Result</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">Gallery Pages</a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="javascript:void(0);">Maintenance & Coming Soon</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-sm-4">--}}
{{--                            <div class="text-center mt-3">--}}
{{--                                <h3 class="text-dark">Special Discount Sale!</h3>--}}
{{--                                <h4>Save up to 70% off.</h4>--}}
{{--                                <button class="btn btn-primary mt-3">Download Now <i--}}
{{--                                        class="ml-1 mdi mdi-arrow-right"></i></button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </li>--}}
        </ul>
    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
@include('master.nav')
<!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
        <div class="content">

            <!-- Start Content-->
            <div class="container-fluid">

            {{--                <!-- start page title -->//header--}}
            {{--                <div class="row">--}}
            {{--                    <div class="col-12">--}}
            {{--                        <div class="page-title-box">--}}
            {{--                            <div class="page-title-right">--}}
            {{--                                <ol class="breadcrumb m-0">--}}
            {{--                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Minton</a></li>--}}
            {{--                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>--}}
            {{--                                    <li class="breadcrumb-item active">Preloader</li>--}}
            {{--                                </ol>--}}
            {{--                            </div>--}}
            {{--                            <h4 class="page-title">Preloader</h4>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            <!-- end page title -->
            @yield('content')

            <!-- end row -->
                @include('Chat.index')
            </div> <!-- container -->

        </div> <!-- content -->

        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        Tống Minh Thuận - 15020551
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript:void(0);">About Us</a>
                            <a href="javascript:void(0);">Help</a>
                            <a href="javascript:void(0);">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->
<div class="left-search d-none position-absolute bg-white border">
    <div class="left-search-header border" style="display: flex">
        <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
            <button class="btn btn-default text-left text-dark exit-search fas fa-arrow-left"></button>
        </div>
        <div class="col-sm-7 col-md-7 col-lg-7 col-xl-7 center-element">
            <div class="input-group">
                <input type="search" class="form-control value-search">
                <button class="btn btn-primary text-left"> lúp</button>
            </div>

        </div>
        <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 center-element">
            Tìm Kiếm
        </div>
    </div>
    <div class="left-search-content overflow-auto-scroll p-2">
        @include('TrangChu.items')
    </div>
</div>
</body>
<!-- Vendor js -->
<script src="{{asset('assets\js\vendor.min.js')}}"></script>

<script src="{{asset('assets\libs\apexcharts\apexcharts.min.js')}}"></script>
<script src="{{asset('assets\libs\jquery-sparkline\jquery.sparkline.min.js')}}"></script>
{{--<script src="{{asset('assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.min.js')}}"></script>--}}
{{--<script src="{{asset('assets\libs\jquery-vectormap\jquery-jvectormap-world-mill-en.js')}}"></script>--}}

<!-- Peity chart-->
<script src="{{asset('assets\libs\peity\jquery.peity.min.js')}}"></script>
<script src="{{asset('assets\js\chat-js-customs.js')}}"></script>

<!-- init js -->
{{--<script src="{{asset('assets\js\pages\dashboard-2.init.js')}}"></script>chart--}}

<!-- App js -->
<script src="{{asset('assets\js\app.min.js')}}"></script>
<script src="{{asset('assets\js\customs-js-mine.js')}}"></script>
<script src="{{asset('assets\js\croppie\croppie.js')}}"></script>
<script>
    $(function () {
        getThongBao()
    });

    const getThongBao = () => {
        let ajax = {
            method: 'get',
            url: '/admin/get-thong-bao'
        };
        sendAjaxNoFunc(ajax.method, ajax.url, {}, '').done(e => {
            // console.log('cc',e)
            let html = '';
            $.each(e.duyet_tin, function (i, v) {
                // console.log(v.status)
                var status = '';
                if(v.trang_thai_xem_tin.status == 0){
                    status = 'active'
                }else if(v.trang_thai_xem_tin.status == 1){
                    status = ''
                }
                html = html + '<a class="dropdown-item notify-item '+status+' border-bottom" id="xem-thong-bao">' +
                    '                                <div class="text-primary">' +
                    '                                    <img class="notify-icon bg-soft-primary" src="' + v.get_nha_tuyen_dung.avatar + '" data-id="'+v.id+'" style="height: 100%">' +
                    '                                    <i class="mdi mdi-comment-account-outline"></i>' +
                    '                                </div>' +
                    '                                <p class="notify-details">' +
                    '                                    <small class="text-muted text-left">Bài viết cần xét duyệt:</small>' +
                    '                                    ' + v.tieu_de + '' +
                    '                                    <small class="text-muted text-right">' + v.get_nha_tuyen_dung.tai_khoan.ho_ten + '</small>' +
                    '                                    <small class="text-info">' + v.created_at + '</small>' +
                    '                                </p>' +
                    '    ' +
                    '                            </a>'
            });
            $('#so-tin-moi-dang').html(e.tin_chua_doc);
            $('#tab-thong-bao').css('height', 'auto').html(html);
        })
    }

    $(document).on('click','#xem-thong-bao',function () {
        if($(this).hasClass('active')){
            let ajax = {
                method:'post',
                url:'/admin/thong-bao/chuyen-trang-thai',
                data : {
                    id:$(this).find('img').data('id')
                }
            };
            sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(e=> {
                if(e == 200){
                    getThongBao()
                }
            });
        }

    })
</script>
@stack('scripts')
</html>
