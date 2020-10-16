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
    {{--        {{'Số dư'.Session::get('so_du')}}--}}

    <!--- Sidemenu -->
        <div id="sidebar-menu">
            {{--{{Session::get('loai_tai_khoan')}}--}}
            {{--{{json_encode(Session::get('role'))}}--}}
            <ul class="metismenu" id="side-menu">
                @if(Auth::user() != null)
                    <li class="">
                        @if(Session::get('loai_tai_khoan') != 'admin3')
                            @if(Session::get('so_du') == null)
                                <a href="{{route('sodu.index')}}" class="waves-effect text-center">
                                    <span>{{__('Chưa đăng ký số dư')}}</span>
                                </a>
                            @else
                                <div class="input-group center-element">
                                    <span class="text-center"><b>{{__('Số dư: ')}}&nbsp;</b></span>
                                    <a class="waves-effect" href="{{route('sodu.index')}}">@money_xu(Session::get('so_du'))</a>
                                    {{--                        <span class="text-center"></span>--}}
                                    <span class="text-center"><b>&nbsp;Xu</b></span>
                                </div>

                            @endif
                    </li>
                @endif
                {{--                Phần Nhà tuyển dụng--}}
                @if(Session::get('loai_tai_khoan') == 2)
                    <li>
                        <a href="{{route('baiviet.index')}}" class="waves-effect">
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

                @if(Session::get('loai_tai_khoan') == 2)
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

                @if(Session::get('loai_tai_khoan') == 2)
                    <li class="menu-title">{{__('Thông tin tuyển dụng')}}</li>

                    <li>
                        <a href="{{route('congty.index')}}" class="waves-effect">
                            <i class="fa fa-users"></i>
                            <span>{{__('Danh sách công ty')}}</span>
                        </a>
                    </li>

                @endif

                @if(Session::get('loai_tai_khoan') == 'admin3')
                    <li class="menu-title">{{__('Quản lý bài đăng')}}</li>

                    <li>
                        <a href="{{route('admin.duyetbaiviet')}}" class="waves-effect">
                            <i class="fa fa-users"></i>
                            <span>{{__('Duyệt bài viết')}}</span>
                        </a>
                    </li>
                @endif
                @endif
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
