<div class="left-side-menu left-side-menu-custom pt-0">
    <div id="carouselExampleIndicators" class="carousel slide m-2" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="d-block img-fluid" src="{{URL::asset('assets\images\small\img-3.jpg')}}" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="{{URL::asset('assets\images\small\img-2.jpg')}}" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block img-fluid" src="{{URL::asset('assets\images\small\img-1.jpg')}}" alt="Third slide">
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
                {{--                Phần Nhà tuyển dụng--}}
                @if(Auth::user()->loai == 2)
                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="fa fa-file-text-o"></i>
                            <span>{{__('Đăng bài tuyển dụng')}}</span>
                        </a>
                    </li>
                    <li class="menu-title">{{__('Quản lý tuyển dụng')}}</li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="fa fa-list-alt"></i>
                            <span>{{__('Quản lý bài đăng')}}</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="fa fa-users"></i>
                            <span>{{__('Quản lý ứng viên')}}</span>
                        </a>
                    </li>
                @endif
                <li class="menu-title">{{__('Dịch vụ')}}</li>

                @if(Auth::user()->loai == 2)
                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="fa fa-list-alt"></i>
                            <span>{{__('Đăng ký bài hot')}}</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="waves-effect">
                            <i class="fa fa-users"></i>
                            <span>{{__('Đăng ký bài viết tin cậy')}}</span>
                        </a>
                    </li>
                @endif

                @if(Auth::user()->loai == 2)
                    <li class="menu-title">{{__('Thông tin tuyển dụng')}}</li>

                    <li>
                        <a href="{{route('congty.index')}}" class="waves-effect">
                            <i class="fa fa-users"></i>
                            <span>{{__('Danh sách công ty')}}</span>
                        </a>
                    </li>
                @endif




                {{--                <li>--}}
{{--                    <a href="javascript: void(0);" class="waves-effect">--}}
{{--                        <i class="remixicon-layout-line"></i>--}}
{{--                        <span class="badge badge-primary float-right">New</span>--}}
{{--                        <span> Layouts </span>--}}
{{--                    </a>--}}
{{--                    <ul class="nav-second-level" aria-expanded="false">--}}
{{--                        <li>--}}
{{--                            <a href="layouts-sidebar-sm.html">Small Sidebar</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="layouts-dark-sidebar.html">Dark Sidebar</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="layouts-light-topbar.html">Light Topbar</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="layouts-preloader.html">Preloader</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="layouts-sidebar-collapsed.html">Sidebar Collapsed</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="layouts-boxed.html">Boxed</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="javascript: void(0);" class="waves-effect">--}}
{{--                        <i class="remixicon-mail-open-line"></i>--}}
{{--                        <span> Email </span>--}}
{{--                        <span class="menu-arrow"></span>--}}
{{--                    </a>--}}
{{--                    <ul class="nav-second-level" aria-expanded="false">--}}
{{--                        <li>--}}
{{--                            <a href="email-inbox.html">Inbox</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="email-read.html">Read Email</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="email-compose.html">Compose Email</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="email-templates.html">Email Templates</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="javascript: void(0);" class="waves-effect">--}}
{{--                        <i class="remixicon-file-copy-2-line"></i>--}}
{{--                        <span> Pages </span>--}}
{{--                        <span class="menu-arrow"></span>--}}
{{--                    </a>--}}
{{--                    <ul class="nav-second-level" aria-expanded="false">--}}
{{--                        <li>--}}
{{--                            <a href="pages-starter.html">Starter</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="pages-login.html">Log In</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="pages-register.html">Register</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="pages-recoverpw.html">Recover Password</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="pages-lock-screen.html">Lock Screen</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="pages-logout.html">Logout</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="pages-confirm-mail.html">Confirm Mail</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="pages-404.html">Error 404</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="pages-404-alt.html">Error 404-alt</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="pages-500.html">Error 500</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="javascript: void(0);" class="waves-effect">--}}
{{--                        <i class="remixicon-pages-line"></i>--}}
{{--                        <span> Extra Pages </span>--}}
{{--                        <span class="menu-arrow"></span>--}}
{{--                    </a>--}}
{{--                    <ul class="nav-second-level" aria-expanded="false">--}}
{{--                        <li>--}}
{{--                            <a href="extras-profile.html">Profile</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="extras-timeline.html">Timeline</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="extras-invoice.html">Invoice</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="extras-faqs.html">FAQs</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="extras-tour.html">Tour Page</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="extras-pricing.html">Pricing</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="extras-maintenance.html">Maintenance</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="extras-coming-soon.html">Coming Soon</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="extras-gallery.html">Gallery</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li class="menu-title mt-2">Components</li>--}}

{{--                <li>--}}
{{--                    <a href="javascript: void(0);" class="waves-effect">--}}
{{--                        <i class="remixicon-briefcase-5-line"></i>--}}
{{--                        <span> UI Elements </span>--}}
{{--                        <span class="menu-arrow"></span>--}}
{{--                    </a>--}}
{{--                    <ul class="nav-second-level" aria-expanded="false">--}}
{{--                        <li>--}}
{{--                            <a href="ui-buttons.html">Buttons</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-cards.html">Cards</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-portlets.html">Portlets</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-tabs-accordions.html">Tabs & Accordions</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-modals.html">Modals</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-progress.html">Progress</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-notifications.html">Notifications</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-ribbons.html">Ribbons</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-spinners.html">Spinners</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-general.html">General UI</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-typography.html">Typography</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="ui-grid.html">Grid</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="widgets.html" class="waves-effect">--}}
{{--                        <i class="remixicon-vip-crown-2-line"></i>--}}
{{--                        <span> Widgets </span>--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="javascript: void(0);" class="waves-effect">--}}
{{--                        <i class="remixicon-trophy-line"></i>--}}
{{--                        <span class="badge badge-success float-right">Hot</span>--}}
{{--                        <span> Admin UI </span>--}}
{{--                    </a>--}}
{{--                    <ul class="nav-second-level" aria-expanded="false">--}}
{{--                        <li>--}}
{{--                            <a href="admin-sweet-alert.html">Sweet Alert</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="admin-nestable.html">Nestable List</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="admin-treeview.html">Treeview</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="admin-range-slider.html">Range Slider</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="admin-carousel.html">Carousel</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="javascript: void(0);" class="waves-effect">--}}
{{--                        <i class="remixicon-vip-diamond-line"></i>--}}
{{--                        <span> Forms </span>--}}
{{--                        <span class="menu-arrow"></span>--}}
{{--                    </a>--}}
{{--                    <ul class="nav-second-level" aria-expanded="false">--}}
{{--                        <li>--}}
{{--                            <a href="forms-elements.html">General Elements</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="forms-advanced.html">Advanced</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="forms-validation.html">Validation</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="forms-pickers.html">Pickers</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="forms-wizard.html">Wizard</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="forms-summernote.html">Summernote</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="forms-quilljs.html">Quilljs Editor</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="forms-file-uploads.html">File Uploads</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="forms-x-editable.html">X Editable</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="javascript: void(0);" class="waves-effect">--}}
{{--                        <i class="remixicon-table-line"></i>--}}
{{--                        <span> Tables </span>--}}
{{--                        <span class="menu-arrow"></span>--}}
{{--                    </a>--}}
{{--                    <ul class="nav-second-level" aria-expanded="false">--}}
{{--                        <li>--}}
{{--                            <a href="tables-basic.html">Basic Tables</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="tables-datatables.html">Data Tables</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="tables-editable.html">Editable Tables</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="tables-tablesaw.html">Tablesaw Tables</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="tables-responsive.html">Responsive Tables</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="tables-footables.html">FooTables</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="javascript: void(0);" class="waves-effect">--}}
{{--                        <i class="remixicon-bar-chart-line"></i>--}}
{{--                        <span> Charts </span>--}}
{{--                        <span class="menu-arrow"></span>--}}
{{--                    </a>--}}
{{--                    <ul class="nav-second-level" aria-expanded="false">--}}
{{--                        <li>--}}
{{--                            <a href="charts-flot.html">Flot Charts</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="charts-apex.html">Apex Charts</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="charts-morris.html">Morris Charts</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="charts-chartjs.html">Chartjs Charts</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="charts-c3.html">C3 Charts</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="charts-peity.html">Peity Charts</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="charts-chartist.html">Chartist Charts</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="charts-sparklines.html">Sparklines Charts</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="charts-knob.html">Jquery Knob Charts</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="javascript: void(0);" class="waves-effect">--}}
{{--                        <i class="remixicon-honour-line"></i>--}}
{{--                        <span> Icons </span>--}}
{{--                        <span class="menu-arrow"></span>--}}
{{--                    </a>--}}
{{--                    <ul class="nav-second-level" aria-expanded="false">--}}
{{--                        <li>--}}
{{--                            <a href="icons-remix.html">Remix Icons</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="icons-feather.html">Feather Icons</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="icons-mdi.html">Material Design Icons</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="icons-font-awesome.html">Font Awesome</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="icons-themify.html">Themify</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="icons-weather.html">Weather</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="javascript: void(0);" class="waves-effect">--}}
{{--                        <i class="remixicon-map-pin-line"></i>--}}
{{--                        <span> Maps </span>--}}
{{--                        <span class="menu-arrow"></span>--}}
{{--                    </a>--}}
{{--                    <ul class="nav-second-level" aria-expanded="false">--}}
{{--                        <li>--}}
{{--                            <a href="maps-google.html">Google Maps</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="maps-vector.html">Vector Maps</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="maps-mapael.html">Mapael Maps</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <a href="javascript: void(0);" class="waves-effect">--}}
{{--                        <i class="remixicon-folder-add-line"></i>--}}
{{--                        <span> Multi Level </span>--}}
{{--                        <span class="menu-arrow"></span>--}}
{{--                    </a>--}}
{{--                    <ul class="nav-second-level nav" aria-expanded="false">--}}
{{--                        <li>--}}
{{--                            <a href="javascript: void(0);">Level 1.1</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="javascript: void(0);" aria-expanded="false">Level 1.2--}}
{{--                                <span class="menu-arrow"></span>--}}
{{--                            </a>--}}
{{--                            <ul class="nav-third-level nav" aria-expanded="false">--}}
{{--                                <li>--}}
{{--                                    <a href="javascript: void(0);">Level 2.1</a>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <a href="javascript: void(0);">Level 2.2</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
