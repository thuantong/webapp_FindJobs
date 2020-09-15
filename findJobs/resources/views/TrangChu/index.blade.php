@extends('master.index')
@section('content')
{{--                    <!-- start page title -->//header--}}
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Minton</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Layouts</a></li>
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
                                <h4 class="m-0">Công ty truyền thông</h4>
                                <label class="float-right">Nhà tuyển dụng: <span>Hoàng tân</span></label>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pt-1 pb-1">
                        <div class="row center-element text-center">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <button class="btn btn-outline-primary far fa-thumbs-up" id="trang-chu-like-post"> Like</button>
                                <button class="btn btn-outline-info fab fa-rocketchat" title="Chat với nhà tuyển dụng"> Chat</button>

{{--                                <button class="btn btn-primary far fa-eye">Quan tâm</button>--}}
                                <button class="btn btn-outline-warning far fa-file-archive"> Nộp đơn</button>
                                <button class="btn btn-outline-primary fas fa-exclamation-triangle"> Báo cáo</button>

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
                                            <label>Lập trình viên php</label>
                                    </div>
                                </div>

                                <div class="row border-bottom">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <label class="fas fa-tools"></label>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <span>Ngành nghề:</span>
                                        <p>
                                            <label>Công nghệ thông tin</label>
                                    </div>
                                </div>

                                <div class="row border-bottom">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <label class="fab fa-whmcs"></label>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <span>Kinh nghiệm:</span>
                                        <p>
                                            <label>1 năm</label>
                                    </div>
                                </div>

                                <div class="row border-bottom">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <label class="fas fa-graduation-cap"></label>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <span>Yêu cầu bằng cấp:</span>
                                        <p>
                                            <label>Đại học/Cao đẳng</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <label class=" fas fa-users"></label>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <span>Số lượng cần tuyển:</span>
                                        <p>
                                            <label>10</label>
                                    </div>
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
                                            <label>22/02/2020</label>
                                    </div>
                                </div>

                                <div class="row border-bottom">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <label class="fas fa-business-time"></label>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <span>Hình thức làm việc:</span>
                                        <p>
                                            <label>Toàn thời gian</label>
                                    </div>
                                </div>

                                <div class="row border-bottom">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <label class="fas fa-transgender"></label>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <span>Giới tính:</span>
                                        <p>
                                            <label>Nam - Nữ</label>
                                    </div>
                                </div>

                                <div class="row border-bottom">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <label class="fas fa-map-marker-alt"></label>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <span>Địa điểm tuyển dụng:</span>
                                        <p>
                                            <label>TPHCM</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                        <label class="far fa-money-bill-alt"></label>
                                    </div>
                                    <div class="col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                        <span>Mức lương:</span>
                                        <p>
                                            <label>7 triệu - 10 triệu</label>
                                    </div>
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
        function getItemsDefaults(elementResponse){
            $.ajax({
                method:'get',
                url:'/search',
                beforeSend: function() {
                    // setting a timeout
                    if(!elementResponse.find("div").hasClass('processing-input')){
                        elementResponse.append('<div class="processing-input text-center"><button class="btn btn-white" type="button" disabled="">\n' +
                            '                                                        Đang tải <span class="spinner-border spinner-border-sm mr-1" role="status" aria-hidden="true"></span>\n' +
                            '                                                        \n' +
                            '                                                    </button></div>');
                    }

                },
                success: function (res) {
                    $(elementResponse).find('.processing-input').remove();

                    elementResponse.append(res);
                    let widthImage = $('#container-items .iteam-click').find('img').parent().width();
                    let heightImage = widthImage;
                    $('#container-items .iteam-click').find('img').css('width', widthImage).css('height', heightImage);


                }
            })
        }


        $(function () {
            getItemsDefaults($('#container-items'));
            $('#container-items').parents().on('scroll',function () {
                let x = $(this).prop('scrollHeight');
                let vitri = parseFloat(x) - parseFloat(Math.abs($(this).height()));

                if(parseInt(vitri) == $(this).scrollTop()){
                    getItemsDefaults($('#container-items'));
                    return;
                }
            })
//like
            $('#trang-chu-like-post').on('click',function () {
                if($(this).hasClass('btn-outline-primary') == true){
                    $(this).removeClass('btn-outline-primary');
                    $(this).addClass('btn-primary');
                }else if($(this).hasClass('btn-primary')){
                    $(this).removeClass('btn-primary');
                    $(this).addClass('btn-outline-primary');
                }

            });
        });
    </script>
@endpush
