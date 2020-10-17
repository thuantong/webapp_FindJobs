@extends('master.index')
@section('content')
    {{--                    <!-- start page title -->//header--}}
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a>Minton</a></li>
                        <li class="breadcrumb-item"><a>Layouts</a></li>
                        <li class="breadcrumb-item active">Preloader</li>
                    </ol>
                </div>
                <h4 class="page-title">Preloader</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
            <div class="card overflow-auto-scroll">
                <div class="card-body" id="container-items">
                    {{--                    <div class="processing-input d-none">Đang tìm kiếm...</div>--}}

                </div>
            </div>
        </div>
        <div class="d-none d-md-block col-md-6 col-xl-6">
            <div class="card">
                <div class="card-body pb-0">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="row text-center">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <h4 class="m-0 tieu_de bg-light p-1">Đang tải...</h4>
                                <label class="float-left">Công ty: <span class="cong_ty">Đang tải...</span></label><label class="float-right">Nhà tuyển dụng: <span id="name_nguoi_dang">Đang tải...</span></label>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-1 pb-1">
                        <div class="row center-element text-center">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <button class="btn btn-outline-primary"
                                        id="trang-chu-like-post">
                                    <i class="icofont icofont-thumbs-up"></i> Like
                                </button>
                                <button class="btn btn-outline-info"
                                        title="Chat với nhà tuyển dụng">
                                    <i class="icofont icofont-ui-text-loading "></i> Chat
                                </button>


                                <button class="btn btn-outline-warning"><i class="fa fa-send"></i> Nộp đơn</button>
                                <button class="btn btn-outline-primary"><i class="fa fa-exclamation"></i> Báo cáo
                                </button>

                            </div>

                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-1 pb-1">
                        <div class="row pt-0 pb-0 border">
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6">
                                <div class="row border-bottom pt-1">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                        <label class="fa fa-street-view"></label>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <span>Chức vụ:</span>
                                        <p class="mb-0">
                                            <label class="chuc_vu">Đang tải...</label>
                                        </p></div>
                                </div>

                                <div class="row border-bottom pt-1">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                        <label class="icofont icofont-brainstorming"></label>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <span>Kinh nghiệm:</span>
                                        <p class="mb-0">
                                            <label class="kinh_nghiem">Đang tải...</label>
                                        </p></div>
                                </div>

                                <div class="row border-bottom pt-1">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                        <label class="fa fa-graduation-cap"></label>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <span>Yêu cầu bằng cấp:</span>
                                        <p class="mb-0">
                                            <label class="yc_bang_cap">Đang tải...</label>
                                        </p></div>
                                </div>

                                <div class="row border-bottom pt-1">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                        <label class="fa fa-user-plus"></label>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <span>Số lượng cần tuyển:</span>
                                        <p class="mb-0">
                                            <label class="so_luong_tuyen">Đang tải...</label>
                                        </p></div>
                                </div>

                                <div class="row pt-1">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                        <label class="icofont icofont-chart-histogram"></label>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <span>Ngành nghề:</span>
                                        <p class="mb-0">
                                            <label class="nganh_nghe">Đang tải...</label>
                                        </p></div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 border-left">
                                <div class="row border-bottom pt-1">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                        <label class="fa fa-calendar-plus-o"></label>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <span>Hạn nộp hồ sơ:</span>
                                        <p class="mb-0">
                                            <label class="han_nop">Đang tải...</label>
                                        </p></div>
                                </div>

                                <div class="row border-bottom pt-1">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                        <label class="fa fa-briefcase"></label>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <span>Hình thức làm việc:</span>
                                        <p class="mb-0">
                                            <label class="kieu_lam_viec">Đang tải...</label>
                                        </p></div>
                                </div>

                                <div class="row border-bottom pt-1">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                        <label class="fa fa-transgender"></label>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <span>Giới tính:</span>
                                        <p class="mb-0">
                                            <label class="gioi_tinh_tuyen">Đang tải...</label>
                                        </p></div>
                                </div>

                                <div class="row border-bottom pt-1">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                        <label class="icofont icofont-location-pin"></label>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <span>Địa điểm tuyển dụng:</span>
                                        <p class="mb-0">
                                            <label class="dia_diem">Đang tải...</label>
                                        </p></div>
                                </div>

                                <div class="row pt-1">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2 center-element">
                                        <label class="icofont icofont-money"></label>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <span>Mức lương:</span>
                                        <p class="mb-0">
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
        </div>
    </div>


@endsection
@push('scripts')
    <script>
        let currenPage = null;
        let nextPage = null;
        let next_page_check = null;
        // var body = document.body;
        //
        // body.classList.add("enlarged");
        // $('body').addClass('enlarged');
        function getItemsDefaults(elementResponse,newPage) {
            $(elementResponse).find('.processing-input:last').removeClass('d-none');

            let ajax = {
                method: 'get',
                url: '/tuyen-dung',
                data : {page :newPage}
            };
            sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(e =>{
                // console.log('data day',e)
                elementResponse.append(e);
                $(elementResponse).find('.processing-input').not(':last').addClass('d-none');


                currenPage = parseInt($('.item-container-page:last').data('current'));
                nextPage = currenPage + parseInt(1);
                next_page_check = $('.item-container-page:last').data('pageurl');

                let widthImage = $('#container-items .iteam-click').find('img').parent().width();
                let heightImage = widthImage;
                $('#container-items .iteam-click').find('img').css('width', widthImage).css('height', heightImage);
            })

        }


        $(function () {

            getItemsDefaults($('#container-items'), 1);
            $('#container-items').parents().on('scroll', function (e) {
                let x = $(this).prop('scrollHeight');
                let vitri = parseFloat(x) - parseFloat(Math.abs($(this).height()));

                if (parseInt(vitri) == $(this).scrollTop()) {
                    console.log(next_page_check)
                    if (next_page_check != ''){
                        getItemsDefaults($('#container-items'),nextPage);
                    }

                }
            })
//like
            $('#trang-chu-like-post').on('click', function () {
                if ($(this).hasClass('btn-outline-primary') == true) {
                    $(this).removeClass('btn-outline-primary');
                    $(this).addClass('btn-primary');
                } else if ($(this).hasClass('btn-primary')) {
                    $(this).removeClass('btn-primary');
                    $(this).addClass('btn-outline-primary');
                }

            });

        });
    </script>
@endpush
