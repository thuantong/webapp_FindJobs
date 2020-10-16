<div class="modal fade bs-example-modal-lg" id="review-modal" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Bài đăng</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <ul class="nav nav-pills navtab-bg nav-justified">

                        <li class="nav-item">
                            <a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                <span class="d-inline-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-inline-block">{{__('Bài đăng chi tiết')}}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#messages1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <span class="d-inline-block d-sm-none"><i class="far fa-envelope"></i></span>
                                <span class="d-none d-sm-inline-block">{{__('Bài đăng chi tiết rút gọn')}}</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#settings1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                <span class="d-inline-block d-sm-none"><i class="fas fa-cog"></i></span>
                                <span class="d-none d-sm-inline-block">{{__('Bài đăng rút gọn')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="modal-body">
                <div class="tab-content pt-0">

                    <div class="tab-pane fade show active" id="profile1">
                        <div class="card-body pb-0 pt-0">

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-center">
                                        <h3 class="tieu_de bg-light p-1 m-0" id="tieu_de">Nhân viên bảo hiểm</h3></label>

                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Mô
                                        tả công việc</label>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="mo_ta_cong_viec">
                                        Đang tải...
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Yêu
                                        cầu công việc</label>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="yeu_cau_cong_viec">
                                        Đang tải...
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Quyền
                                        lợi được hưởng</label>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="quyen_loi_cong_viec">
                                        Đang tải...
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Địa
                                        chỉ</label>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12" id="dia_chi">
                                        <span>Đang tải...</span> - <a class="text-primary">--</a>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Tính
                                        chất công việc</label>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 chuc_vu" id="chuc_vu">
                                        {{--                                        kiểu làm việc--}}
                                        Đang tải...
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Ngành
                                        nghề</label>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 nganh_nghe" id="nganh_nghe">
                                        Đang tải...
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Yêu
                                        cầu bằng cấp</label>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 yc_bang_cap" id="yc_bang_cap">
                                        Đang tải...
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-form-label text-left">Yêu
                                        cầu kinh nghiệm</label>
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 kinh_nghiem" id="kinh_nghiem">
                                        Đang tải...
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="messages1">
                        <div class="card-body pb-0 pt-0">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="row text-center">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h4 class="m-0 cong_ty bg-light p-1" id="cong_ty">Công ty truyền thông</h4>
                                        <label class="float-right">Nhà tuyển dụng: <span id="name_nguoi_dang">Đang tải...</span></label>
                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-1 pb-1">
                                <div class="row center-element text-center">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <button class="btn far fa-thumbs-up btn-outline-primary"
                                                id="trang-chu-like-post">
                                            Like
                                        </button>
                                        <button class="btn btn-outline-info fab fa-rocketchat"
                                                title="Chat với nhà tuyển dụng">
                                            Chat
                                        </button>


                                        <button class="btn btn-outline-warning far fa-file-archive"> Nộp đơn</button>
                                        <button class="btn btn-outline-primary fas fa-exclamation-triangle"> Báo cáo
                                        </button>

                                    </div>

                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-1 pb-1">
                                <div class="row pt-2 pb-0 border">
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="row border-bottom">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                <label class="far fa-address-card"></label>
                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                <span>Chức vụ:</span>
                                                <p>
                                                    <label class="chuc_vu">Đang tải...</label>
                                                </p></div>
                                        </div>

                                        <div class="row border-bottom">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                <label class="fab fa-whmcs"></label>
                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                <span>Kinh nghiệm:</span>
                                                <p>
                                                    <label class="kinh_nghiem">Đang tải...</label>
                                                </p></div>
                                        </div>

                                        <div class="row border-bottom">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                <label class="fas fa-graduation-cap"></label>
                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                <span>Yêu cầu bằng cấp:</span>
                                                <p>
                                                    <label class="yc_bang_cap">Đang tải...</label>
                                                </p></div>
                                        </div>

                                        <div class="row border-bottom">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                <label class=" fas fa-users"></label>
                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                <span>Số lượng cần tuyển:</span>
                                                <p>
                                                    <label class="so_luong_tuyen">Đang tải...</label>
                                                </p></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                <label class="fas fa-tools"></label>
                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                <span>Ngành nghề:</span>
                                                <p>
                                                    <label class="nganh_nghe">Đang tải...</label>
                                                </p></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                        <div class="row border-bottom">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                <label class="far fa-calendar-times"></label>
                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                <span>Hạn nộp hồ sơ:</span>
                                                <p>
                                                    <label class="han_nop">Đang tải...</label>
                                                </p></div>
                                        </div>

                                        <div class="row border-bottom">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                <label class="fas fa-business-time"></label>
                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                <span>Hình thức làm việc:</span>
                                                <p>
                                                    <label class="kieu_lam_viec">Đang tải...</label>
                                                </p></div>
                                        </div>

                                        <div class="row border-bottom">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                <label class="fas fa-transgender"></label>
                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                <span>Giới tính:</span>
                                                <p>
                                                    <label class="gioi_tinh_tuyen">Đang tải...</label>
                                                </p></div>
                                        </div>

                                        <div class="row border-bottom">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                <label class="fas fa-map-marker-alt"></label>
                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                <span>Địa điểm tuyển dụng:</span>
                                                <p>
                                                    <label class="dia_diem">Đang tải...</label>
                                                </p></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                                <label class="far fa-money-bill-alt"></label>
                                            </div>
                                            <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                                <span>Mức lương:</span>
                                                <p>
                                                    <label class="muc_luong">Đang tải...</label>
                                                </p></div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row pt-1 pb-0">
                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center p-0">
                                        <button class="btn btn-success float-left">Xem chi tiết</button>
                                        <button class="btn btn-info float-right">Quan tâm nhà tuyển dụng</button>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="settings1">
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 ribbon-box iteam-click">
                            <div class="row">
                                <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 p-0 center-element">
                                    <img src="">
                                </div>
                                <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10 text-center">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text"><h5 class="mb-0"><a
                                                    target="_blank"
                                                    href="{{route('trangchu.chiTietBaiDang',['post','1'])}}"><span>Tuyển dụng fresher php</span></a>
                                            </h5></div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text"><i><span>Công ty TNHH MTV Hoàng Minh Giám</span></i>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="row">
                                                <div class="col-sm-4 col-md-4 col-xl-4 text"><span>luong</span></div>
                                                <div class="col-sm-4 col-md-4 col-xl-4 text"><span>dia chi</span></div>
                                                <div class="col-sm-4 col-md-4 col-xl-4 text"><span>11/02/2020</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ribbon-two ribbon-two-danger floats-right"><span class="right-custom">Hot</span>
                            </div>
                            <div class="arrow-item d-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
