<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tìm việc làm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
        <link href="{{asset('assets\css\croppie\croppie.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('assets\css\croppie\demo.css')}}" rel="stylesheet" type="text/css">

<!-- Jquery Toast css -->
    <link href="assets\libs\jquery-toast\jquery.toast.min.css" rel="stylesheet" type="text/css">
{{--        <link href="{{asset('assets\css\icons.min.css')}}" rel="stylesheet" type="text/css">--}}
    <link href="{{asset('assets\css\app.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets\css\style-customs.css')}}" rel="stylesheet" type="text/css">

</head>
{{--@if(Route::currentRouteName() == 'user.nguoiTimViec')--}}
{{--<body class="enlarged">--}}
{{--@else--}}
<body>
{{--@endif--}}
<!-- Pre-loader -->
<div id="preloader">
    <div id="status">
        <div class="bouncingLoader">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
</div>
<!-- End Preloader-->

<!-- Begin page -->
<div id="wrapper">

    <!-- Topbar Start -->
    <div class="navbar-custom">

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
                    <span class="badge badge-danger rounded-circle noti-icon-badge">4</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                                    <span class="float-right">
                                        <a href="" class="text-dark">
                                            <small>Clear All</small>
                                        </a>
                                    </span>Notification
                        </h5>
                    </div>

                    <div class="slimscroll noti-scroll">

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item active">
                            <div class="notify-icon bg-soft-primary text-primary">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">Doug Dukes commented on Admin Dashboard
                                <small class="text-muted">1 min ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon">
                                <img src="assets\images\users\avatar-2.jpg" class="img-fluid rounded-circle" alt="">
                            </div>
                            <p class="notify-details">Mario Drummond</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>Hi, How are you? What about our next meeting</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon">
                                <img src="assets\images\users\avatar-4.jpg" class="img-fluid rounded-circle" alt="">
                            </div>
                            <p class="notify-details">Karen Robinson</p>
                            <p class="text-muted mb-0 user-msg">
                                <small>Wow ! this admin looks good and awesome design</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-soft-warning text-warning">
                                <i class="mdi mdi-account-plus"></i>
                            </div>
                            <p class="notify-details">New user registered.
                                <small class="text-muted">5 hours ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">Caleb Flakelar commented on Admin
                                <small class="text-muted">4 days ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-secondary">
                                <i class="mdi mdi-heart"></i>
                            </div>
                            <p class="notify-details">Carlos Crouch liked
                                <b>Admin</b>
                                <small class="text-muted">13 days ago</small>
                            </p>
                        </a>
                    </div>

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item text-center text-primary notify-item notify-all">
                        View all
                        <i class="fi-arrow-right"></i>
                    </a>

                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                   href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="assets\images\users\avatar-1.jpg" alt="user-image" class="rounded-circle">
                    <span class="pro-user-name ml-1">
                                {{Auth::user()->ho_ten}} <i class="icofont icofont-caret-down"></i>
                            </span>
                </a>

                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow text-center m-0">{{Auth::user()->ho_ten}}</h6>
                    </div>

                    <!-- item-->
                    <a href="{{route('user.nguoiTimViec')}}" class="dropdown-item notify-item">
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

                    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
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


        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <a href="/" class="nav-link logo text-center">
                        <span class="logo-lg">
                            <img src="assets\images\logo-sm.png" alt="" height="24">
{{--                            <img src="assets\images\logo-light.png" alt="" height="20">--}}
                        <!-- <span class="logo-lg-text-light">Xeria</span> -->
                        </span>
                    <span class="logo-sm">
                            <!-- <span class="logo-sm-text-dark">X</span> -->
                            <img src="assets\images\logo-sm.png" alt="" height="24">
                        </span>
                </a>
            </li>
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="icofont icofont-navigation-menu"></i>
                </button>
            </li>


            <li class="dropdown dropdown-mega d-block">

                <a class="nav-link center-element search-field" data-search="search-field">
                    <span>Tìm kiếm</span>
                </a>
                <div class="dropdown-menu dropdown-megamenu">
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="row">
                                <div class="col-md-4">
                                    <h5 class="text-dark mt-0">UI Components</h5>
                                    <ul class="list-unstyled megamenu-list">
                                        <li>
                                            <a href="javascript:void(0);">Widgets</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Nestable List</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Range Sliders</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Masonry Items</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Sweet Alerts</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Treeview Page</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Tour Page</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4">
                                    <h5 class="text-dark mt-0">Applications</h5>
                                    <ul class="list-unstyled megamenu-list">
                                        <li>
                                            <a href="javascript:void(0);">eCommerce Pages</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">CRM Pages</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Email</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Calendar</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Team Contacts</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Task Board</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Email Templates</a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="col-md-4">
                                    <h5 class="text-dark mt-0">Extra Pages</h5>
                                    <ul class="list-unstyled megamenu-list">
                                        <li>
                                            <a href="javascript:void(0);">Left Sidebar with User</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Menu Collapsed</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Small Left Sidebar</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">New Header Style</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Search Result</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Gallery Pages</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);">Maintenance & Coming Soon</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-center mt-3">
                                <h3 class="text-dark">Special Discount Sale!</h3>
                                <h4>Save up to 70% off.</h4>
                                <button class="btn btn-primary mt-3">Download Now <i
                                        class="ml-1 mdi mdi-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>

                </div>
            </li>
        </ul>
    </div>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu left-side-menu-custom pt-0">
        <div id="carouselExampleIndicators" class="carousel slide m-2" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="assets\images\small\img-3.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="assets\images\small\img-2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="assets\images\small\img-1.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="slimscroll-menu">

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">

                    <li class="menu-title">Navigation</li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="remixicon-dashboard-line"></i>
                            <span class="badge badge-pink badge-pill float-right">2</span>
                            <span> Dashboards </span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="index.html">Dashboard 1</a>
                            </li>
                            <li>
                                <a href="dashboard-2.html">Dashboard 2</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="remixicon-stack-line"></i>
                            <span> Apps </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="apps-kanbanboard.html">Kanban Board</a>
                            </li>
                            <li>
                                <a href="apps-companies.html">Companies</a>
                            </li>
                            <li>
                                <a href="apps-calendar.html">Calendar</a>
                            </li>
                            <li>
                                <a href="apps-filemanager.html">File Manager</a>
                            </li>
                            <li>
                                <a href="apps-tickets.html">Tickets</a>
                            </li>
                            <li>
                                <a href="apps-team.html">Team Members</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="remixicon-layout-line"></i>
                            <span class="badge badge-primary float-right">New</span>
                            <span> Layouts </span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="layouts-sidebar-sm.html">Small Sidebar</a>
                            </li>
                            <li>
                                <a href="layouts-dark-sidebar.html">Dark Sidebar</a>
                            </li>
                            <li>
                                <a href="layouts-light-topbar.html">Light Topbar</a>
                            </li>
                            <li>
                                <a href="layouts-preloader.html">Preloader</a>
                            </li>
                            <li>
                                <a href="layouts-sidebar-collapsed.html">Sidebar Collapsed</a>
                            </li>
                            <li>
                                <a href="layouts-boxed.html">Boxed</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="remixicon-mail-open-line"></i>
                            <span> Email </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="email-inbox.html">Inbox</a>
                            </li>
                            <li>
                                <a href="email-read.html">Read Email</a>
                            </li>
                            <li>
                                <a href="email-compose.html">Compose Email</a>
                            </li>
                            <li>
                                <a href="email-templates.html">Email Templates</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="remixicon-file-copy-2-line"></i>
                            <span> Pages </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="pages-starter.html">Starter</a>
                            </li>
                            <li>
                                <a href="pages-login.html">Log In</a>
                            </li>
                            <li>
                                <a href="pages-register.html">Register</a>
                            </li>
                            <li>
                                <a href="pages-recoverpw.html">Recover Password</a>
                            </li>
                            <li>
                                <a href="pages-lock-screen.html">Lock Screen</a>
                            </li>
                            <li>
                                <a href="pages-logout.html">Logout</a>
                            </li>
                            <li>
                                <a href="pages-confirm-mail.html">Confirm Mail</a>
                            </li>
                            <li>
                                <a href="pages-404.html">Error 404</a>
                            </li>
                            <li>
                                <a href="pages-404-alt.html">Error 404-alt</a>
                            </li>
                            <li>
                                <a href="pages-500.html">Error 500</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="remixicon-pages-line"></i>
                            <span> Extra Pages </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="extras-profile.html">Profile</a>
                            </li>
                            <li>
                                <a href="extras-timeline.html">Timeline</a>
                            </li>
                            <li>
                                <a href="extras-invoice.html">Invoice</a>
                            </li>
                            <li>
                                <a href="extras-faqs.html">FAQs</a>
                            </li>
                            <li>
                                <a href="extras-tour.html">Tour Page</a>
                            </li>
                            <li>
                                <a href="extras-pricing.html">Pricing</a>
                            </li>
                            <li>
                                <a href="extras-maintenance.html">Maintenance</a>
                            </li>
                            <li>
                                <a href="extras-coming-soon.html">Coming Soon</a>
                            </li>
                            <li>
                                <a href="extras-gallery.html">Gallery</a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-title mt-2">Components</li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="remixicon-briefcase-5-line"></i>
                            <span> UI Elements </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="ui-buttons.html">Buttons</a>
                            </li>
                            <li>
                                <a href="ui-cards.html">Cards</a>
                            </li>
                            <li>
                                <a href="ui-portlets.html">Portlets</a>
                            </li>
                            <li>
                                <a href="ui-tabs-accordions.html">Tabs & Accordions</a>
                            </li>
                            <li>
                                <a href="ui-modals.html">Modals</a>
                            </li>
                            <li>
                                <a href="ui-progress.html">Progress</a>
                            </li>
                            <li>
                                <a href="ui-notifications.html">Notifications</a>
                            </li>
                            <li>
                                <a href="ui-ribbons.html">Ribbons</a>
                            </li>
                            <li>
                                <a href="ui-spinners.html">Spinners</a>
                            </li>
                            <li>
                                <a href="ui-general.html">General UI</a>
                            </li>
                            <li>
                                <a href="ui-typography.html">Typography</a>
                            </li>
                            <li>
                                <a href="ui-grid.html">Grid</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="widgets.html" class="waves-effect">
                            <i class="remixicon-vip-crown-2-line"></i>
                            <span> Widgets </span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="remixicon-trophy-line"></i>
                            <span class="badge badge-success float-right">Hot</span>
                            <span> Admin UI </span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="admin-sweet-alert.html">Sweet Alert</a>
                            </li>
                            <li>
                                <a href="admin-nestable.html">Nestable List</a>
                            </li>
                            <li>
                                <a href="admin-treeview.html">Treeview</a>
                            </li>
                            <li>
                                <a href="admin-range-slider.html">Range Slider</a>
                            </li>
                            <li>
                                <a href="admin-carousel.html">Carousel</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="remixicon-vip-diamond-line"></i>
                            <span> Forms </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="forms-elements.html">General Elements</a>
                            </li>
                            <li>
                                <a href="forms-advanced.html">Advanced</a>
                            </li>
                            <li>
                                <a href="forms-validation.html">Validation</a>
                            </li>
                            <li>
                                <a href="forms-pickers.html">Pickers</a>
                            </li>
                            <li>
                                <a href="forms-wizard.html">Wizard</a>
                            </li>
                            <li>
                                <a href="forms-summernote.html">Summernote</a>
                            </li>
                            <li>
                                <a href="forms-quilljs.html">Quilljs Editor</a>
                            </li>
                            <li>
                                <a href="forms-file-uploads.html">File Uploads</a>
                            </li>
                            <li>
                                <a href="forms-x-editable.html">X Editable</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="remixicon-table-line"></i>
                            <span> Tables </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="tables-basic.html">Basic Tables</a>
                            </li>
                            <li>
                                <a href="tables-datatables.html">Data Tables</a>
                            </li>
                            <li>
                                <a href="tables-editable.html">Editable Tables</a>
                            </li>
                            <li>
                                <a href="tables-tablesaw.html">Tablesaw Tables</a>
                            </li>
                            <li>
                                <a href="tables-responsive.html">Responsive Tables</a>
                            </li>
                            <li>
                                <a href="tables-footables.html">FooTables</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="remixicon-bar-chart-line"></i>
                            <span> Charts </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="charts-flot.html">Flot Charts</a>
                            </li>
                            <li>
                                <a href="charts-apex.html">Apex Charts</a>
                            </li>
                            <li>
                                <a href="charts-morris.html">Morris Charts</a>
                            </li>
                            <li>
                                <a href="charts-chartjs.html">Chartjs Charts</a>
                            </li>
                            <li>
                                <a href="charts-c3.html">C3 Charts</a>
                            </li>
                            <li>
                                <a href="charts-peity.html">Peity Charts</a>
                            </li>
                            <li>
                                <a href="charts-chartist.html">Chartist Charts</a>
                            </li>
                            <li>
                                <a href="charts-sparklines.html">Sparklines Charts</a>
                            </li>
                            <li>
                                <a href="charts-knob.html">Jquery Knob Charts</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="remixicon-honour-line"></i>
                            <span> Icons </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="icons-remix.html">Remix Icons</a>
                            </li>
                            <li>
                                <a href="icons-feather.html">Feather Icons</a>
                            </li>
                            <li>
                                <a href="icons-mdi.html">Material Design Icons</a>
                            </li>
                            <li>
                                <a href="icons-font-awesome.html">Font Awesome</a>
                            </li>
                            <li>
                                <a href="icons-themify.html">Themify</a>
                            </li>
                            <li>
                                <a href="icons-weather.html">Weather</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="remixicon-map-pin-line"></i>
                            <span> Maps </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li>
                                <a href="maps-google.html">Google Maps</a>
                            </li>
                            <li>
                                <a href="maps-vector.html">Vector Maps</a>
                            </li>
                            <li>
                                <a href="maps-mapael.html">Mapael Maps</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="remixicon-folder-add-line"></i>
                            <span> Multi Level </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level nav" aria-expanded="false">
                            <li>
                                <a href="javascript: void(0);">Level 1.1</a>
                            </li>
                            <li>
                                <a href="javascript: void(0);" aria-expanded="false">Level 1.2
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-third-level nav" aria-expanded="false">
                                    <li>
                                        <a href="javascript: void(0);">Level 2.1</a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);">Level 2.2</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
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


{{--    </div> <!-- end slimscroll-menu-->--}}
{{--</div>--}}
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- Vendor js -->
<script src="{{asset('assets\js\vendor.min.js')}}"></script>

<script src="{{asset('assets\libs\apexcharts\apexcharts.min.js')}}"></script>
<script src="{{asset('assets\libs\jquery-sparkline\jquery.sparkline.min.js')}}"></script>
{{--<script src="{{asset('assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.min.js')}}"></script>--}}
{{--<script src="{{asset('assets\libs\jquery-vectormap\jquery-jvectormap-world-mill-en.js')}}"></script>--}}

<!-- Peity chart-->
<script src="{{asset('assets\libs\peity\jquery.peity.min.js')}}"></script>
<script src="{{asset('assets\js\chat-js-customs.js')}}"></script>

<!-- Tost-->
<script src="assets\libs\jquery-toast\jquery.toast.min.js"></script>

<!-- toastr init js-->
<script src="assets\js\pages\toastr.init.js"></script>
<!-- init js -->
{{--<script src="{{asset('assets\js\pages\dashboard-2.init.js')}}"></script>chart--}}
<!-- Modal-Effect -->
<script src="{{asset('assets\libs\custombox\custombox.min.js')}}"></script>

<script src="{{asset('assets\js\croppie\croppie.js')}}"></script>
<!-- App js -->
<script src="{{asset('assets\js\app.min.js')}}"></script>
<script src="{{asset('assets\js\customs-js-mine.js')}}"></script>
@stack('scripts')
<script type="text/javascript">
    $(document).on('click', function (e) {

        if (!$(e.target).hasClass('left-search') && $(e.target).parents('.left-search').length == 0) {
            $('.exit-search').trigger('click');
        }
        if ($(e.target).hasClass('search-field') || $(e.target).parents('.search-field').length > 0) {
            $('.left-search').removeClass('d-none').fadeIn('slow');
            if ($(document).width()) {
                $('.left-search').css('width', $(document).width() + 'px');
                if ($(document).width() < 500) {
                    $('.left-search').css('width', $(document).width() + 'px');
                } else if ($(document).width() > 500) {
                    $('.left-search').css('width', ($(document).width() * 0.5) + 'px');
                }
            }
            $('.value-search').focus();
        }
    });
    $(function () {

        $('.left-search').css('width', '0px');
        $('.left-search').css('min-height', ($(document).height() * 0.8) + 'px');
        $('.left-search-header').css('min-height', $('.navbar-custom').height() + 'px');

//exit search container
        $('.exit-search').on('click', function () {
            $('.left-search').addClass('d-none').fadeOut().css('width', '0px');
            $('.value-search').val('');

        });


        $(window).resize(function () {
            if ($(document).width()) {
                $('.left-search').css('width', $(document).width() + 'px');
                if ($(document).width() < 769) {
                    $('.left-search').css('width', $(document).width() + 'px');
                } else if ($(document).width() > 768) {
                    $('.left-search').css('width', ($(document).width() * 0.5) + 'px');
                }
            }
        });

        //event
        $('#txt-search-master').on('input', function () {
            // $('.processing-input').
            // $('#response-search').html('');
            $.ajax({
                method: 'get',
                url: '/search',
                data: {
                    text: $(this).val(),
                },
                beforeSend: function () {
                    // setting a timeout
                    $('#response-search').html('<div class="processing-input">Đang tìm kiếm...</div>');
                },
                success: function (res) {
                    $('#response-search').html(res);
                },
            });
        });

    });
</script>
</body>
</html>
