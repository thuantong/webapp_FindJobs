@extends('master.index')
@section('content')
    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card-box text-center">
                <img src="{{URL::asset('images/62475385_1691732720970628_5551592173243203584_n.jpg')}}" class="rounded-circle avatar-xl img-thumbnail" alt="profile-image">

                <h4 class="mb-0">Tống Minh Thuận</h4>
                <p class="text-muted">Lập trình viên</p>

                <a  href="https://www.facebook.com/thuan.tong.max16/" target="_blank" class="btn btn-success btn-xs waves-effect mb-2 waves-light">Theo dõi</a>

                <div class="text-left mt-3">
                    <h4 class="font-13 text-uppercase">Giới thiệu:</h4>
                    <p class="text-muted font-13 mb-3">
                        - Là người hòa đồng, nhiệt tình và có trách nhiệm
                        cao trong công việc.<br>
                        - Luôn học hỏi để tích lũy thêm kinh nghiệm, rèn
                        luyện kỹ năng xử lý công việc một cách hiệu quả,
                        chính xác và nhanh chóng nhất để trở thành nhân
                        viên xuất sắc nhằm mục đích đóng góp cho công
                        ty.<br>
                        - Gắn bó lâu dài với công ty và có cơ hội học Cao
                        học và trở thành nhân viên cấp cao.
                    </p>

                    <p class="text-muted mb-2 font-13"><strong>SĐT :</strong><span class="ml-2">0985 400 405</span></p>

                    <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 ">tongminhthuan0405@gmail.com</span></p>

                    <p class="text-muted mb-1 font-13"><strong>Nơi ở :</strong> <span class="ml-2">Việt Nam</span></p>
                </div>

{{--                <ul class="social-list list-inline mt-3 mb-0">--}}
{{--                    <li class="list-inline-item">--}}
{{--                        <a href="javascript: void(0);" class="social-list-item border-purple text-purple"><i class="mdi mdi-facebook"></i></a>--}}
{{--                    </li>--}}
{{--                    <li class="list-inline-item">--}}
{{--                        <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>--}}
{{--                    </li>--}}
{{--                    <li class="list-inline-item">--}}
{{--                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>--}}
{{--                    </li>--}}
{{--                    <li class="list-inline-item">--}}
{{--                        <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github-circle"></i></a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </div> <!-- end card-box -->

            <div class="card-box">
                <h4 class="header-title">Kỹ năng</h4>
{{--                <p class="mb-3">Everyone realizes why a new common language would be desirable</p>--}}

                <div class="pt-1">
                    <h6 class="text-uppercase mt-0">HTML5 <span class="float-right">90%</span></h6>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                            <span class="sr-only">90% Complete</span>
                        </div>
                    </div>
                </div>

                <div class="mt-2 pt-1">
                    <h6 class="text-uppercase">CSS <span class="float-right">80%</span></h6>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                            <span class="sr-only">90% Complete</span>
                        </div>
                    </div>
                </div>

                <div class="mt-2 pt-1">
                    <h6 class="text-uppercase">PHP <span class="float-right">70%</span></h6>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                            <span class="sr-only">70% Complete</span>
                        </div>
                    </div>
                </div>

                <div class="mt-2 pt-1">
                    <h6 class="text-uppercase">Laravel <span class="float-right">80%</span></h6>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                            <span class="sr-only">80% Complete</span>
                        </div>
                    </div>
                </div>

                <div class="mt-2 pt-1">
                    <h6 class="text-uppercase">jQuery <span class="float-right">80%</span></h6>
                    <div class="progress progress-sm m-0">
                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                            <span class="sr-only">80% Complete</span>
                        </div>
                    </div>
                </div>

            </div> <!-- end card-box-->

        </div> <!-- end col-->

        <div class="col-lg-8 col-xl-8">
            <div class="card-box">
                <ul class="nav nav-pills navtab-bg">
                    <li class="nav-item">
                        <a href="#about-me" data-toggle="tab" aria-expanded="true" class="nav-link active ml-0">
                            <i class="mdi mdi-face-profile mr-1"></i>Giới thiệu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                            <i class="mdi mdi-settings-outline mr-1"></i>Thông tin cá nhân
                        </a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div class="tab-pane show active" id="about-me">

                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-briefcase mr-1"></i>
                            Kinh nghiệm làm việc</h5>

                        <ul class="list-unstyled timeline-sm">
                            <li class="timeline-sm-item">
                                <span class="timeline-sm-date">2015 - 09</span>
                                <h5 class="mt-0 mb-1">TRƯỜNG ĐẠI HỌC CÔNG NGHIỆP THÀNH PHỐ HỒ CHÍ MINH</h5>
                                <p>Chuyên ngành: Hệ Thống Thông Tin</p>
{{--                                <p class="text-muted mt-2">Chưa tốt nghiệp</p>--}}

                            </li>
                            <li class="timeline-sm-item">
                                <span class="timeline-sm-date">2020 - 03</span>
                                <h5 class="mt-0 mb-1">CÔNG TY TNHH ALOAPP</h5>
                                <p>Thực tập sinh php</p>
                                <p class="text-muted mt-2">- Lập trình web với PHP(Laravel Framework)</p>
                            </li>

                        </ul>

                        <h5 class="mb-3 mt-4 text-uppercase"><i class="mdi mdi-cards-variant mr-1"></i>
                            Projects</h5>
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th>Start Date</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Clients</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>App design and development</td>
                                    <td>01/01/2015</td>
                                    <td>10/15/2018</td>
                                    <td><span class="badge badge-info">Work in Progress</span></td>
                                    <td>Halette Boivin</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Coffee detail page - Main Page</td>
                                    <td>21/07/2016</td>
                                    <td>12/05/2018</td>
                                    <td><span class="badge badge-success">Pending</span></td>
                                    <td>Durandana Jolicoeur</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Poster illustation design</td>
                                    <td>18/03/2018</td>
                                    <td>28/09/2018</td>
                                    <td><span class="badge badge-pink">Done</span></td>
                                    <td>Lucas Sabourin</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Drinking bottle graphics</td>
                                    <td>02/10/2017</td>
                                    <td>07/05/2018</td>
                                    <td><span class="badge badge-purple">Work in Progress</span></td>
                                    <td>Donatien Brunelle</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Landing page design - Home</td>
                                    <td>17/01/2017</td>
                                    <td>25/05/2021</td>
                                    <td><span class="badge badge-warning">Coming soon</span></td>
                                    <td>Karel Auberjo</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <!-- end timeline content-->

                    <div class="tab-pane" id="settings">
                        <form>
                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i> Thông tin cơ bản</h5>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">Họ và tên</label>
                                        <input type="text" class="form-control" id="firstname" placeholder="Enter first name" readonly value="{{__('Tống')}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" id="lastname" placeholder="Enter last name"  readonly value="{{__('Minh Thuận')}}">
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="userbio">Bio</label>
                                        <textarea class="form-control" id="userbio" rows="4" placeholder="Write something..."></textarea>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="useremail">Email Address</label>
                                        <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                                        <span class="form-text text-muted"><small>If you want to change email please <a href="javascript: void(0);">click</a> here.</small></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="userpassword">Password</label>
                                        <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                        <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-office-building mr-1"></i> Company Info</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="companyname">Company Name</label>
                                        <input type="text" class="form-control" id="companyname" placeholder="Enter company name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="cwebsite">Website</label>
                                        <input type="text" class="form-control" id="cwebsite" placeholder="Enter website url">
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-earth mr-1"></i> Social</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="social-fb">Facebook</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-facebook-square"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="social-fb" placeholder="Url">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="social-tw">Twitter</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="social-tw" placeholder="Username">
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
                                            <input type="text" class="form-control" id="social-insta" placeholder="Url">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="social-lin">Linkedin</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="social-lin" placeholder="Url">
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
                                                <span class="input-group-text"><i class="fab fa-skype"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="social-sky" placeholder="@username">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="social-gh">Github</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fab fa-github"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="social-gh" placeholder="Username">
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <div class="text-right">
                                <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- end settings content-->

                </div> <!-- end tab-content -->
            </div> <!-- end card-box-->

        </div> <!-- end col -->
    </div>
    @endsection
@push('scripts')
    @endpush