@extends('master.index')
@section('content')
    <head>
        <link href="assets\libs\multiselect\multi-select.css" rel="stylesheet" type="text/css">
        <link href="assets\libs\select2\select2.min.css" rel="stylesheet" type="text/css">
        <link href="assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.css" rel="stylesheet" type="text/css">
        <!-- third party css -->
        <link href="assets\libs\datatables\dataTables.bootstrap4.css" rel="stylesheet" type="text/css">
        <link href="assets\libs\datatables\responsive.bootstrap4.css" rel="stylesheet" type="text/css">
        <link href="assets\libs\datatables\buttons.bootstrap4.css" rel="stylesheet" type="text/css">
        <link href="assets\libs\datatables\select.bootstrap4.css" rel="stylesheet" type="text/css">
        <!-- third party css end -->
    </head>

    <div class="modal fade bs-example-modal-center" id="doi_anh_dai_dien" tabindex="-1" role="dialog"
         aria-labelledby="myCenterModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{__('Cập nhật ảnh đại diện')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="demo-wrap upload-demo">
                        {{--                        <div class="container">--}}
                        <div class="row">

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="upload-msg">
                                    Đang tải ảnh
                                </div>
                                <div class="upload-demo-wrap">
                                    <div id="upload-demo"></div>
                                </div>
                            </div>
                        </div>
                        {{--                        </div>--}}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect"
                            data-dismiss="modal" id="close">{{__('Thoát')}}</button>
                    <button type="button" class="btn btn-info waves-effect waves-light" id="save">
                        {{__('Lưu lại')}}
                    </button>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="modal fade" id="them-moi-cong-ty" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalScrollableTitle">Thêm mới công ty</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
{{--                    <div class="row">--}}
{{--                        <label class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">--}}
{{--                            <h4 class="text-uppercase bg-light p-2">{{__('Thông Tin Công Ty Tuyển Dụng')}}</h4></label>--}}
{{--                    </div>--}}
                    <div class="row form-group">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                            <label for="ten_cong_ty"><abbr class="text-danger  font-15">* </abbr>{{__('Tên công ty: ')}}
                            </label>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
                            <input class="form-control not-null" id="ten_cong_ty" title="Tên công ty"
                                   value="">
                            <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                            <label for="link_website">{{__('Website: ')}}</label>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <input class="form-control" id="link_website" title="Website"
                                   value="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                            <label for="email_cong_ty"><abbr class="text-danger  font-15">* </abbr>{{__('Email: ')}}</label>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <input class="form-control not-null" id="email_cong_ty" data-rule="email" title="Email"
                                   value="">
                            <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                            <label for="dien_thoai_cong_ty"><abbr
                                    class="text-danger  font-15">* </abbr>{{__('Điện thoại: ')}}</label>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <input class="form-control not-null" id="dien_thoai_cong_ty" maxlength="10" title="Điện thoại"
                                   value="">
                            <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                            <label for="dia_chi_chinh">{{__('Địa chỉ chính: ')}}</label>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
                            <input class="form-control" id="dia_chi_chinh"
                                   value="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                            <label>{{__('Giờ làm việc: ')}}</label>
                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 pr-md-0">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text pl-1 pr-1">{{__('Từ')}}</span>
                                </div>

                                <input class="form-control" style="border-left: none" id="from_time"
                                       value="">
                            </div>

                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 pl-md-0">
                            <div class="input-group">
                                <div class="input-group-append">
                                    <span class="input-group-text pl-0 pr-0">{{__('Đến')}}</span>
                                </div>
                                <input class="form-control" style="border-left: none" id="to_time"
                                       value="">

                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                            <label>{{__('Ngày làm việc: ')}}</label>
                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 pr-md-0">
                            <div class="input-group">
                                <div class="input-group-append pl-1 pr-1" style="position: absolute;z-index: 1;left: -6px;">
                                    <span class="input-group-text pl-1 pr-1">{{__('Từ')}}</span>
                                </div>
                                <select class="form-control text-center" id="from_day">
                                    <option value="" selected disabled>Chọn thứ</option>
                                    <option value="1" >{{__('Chủ nhật')}}</option>
                                    <option value="2" >{{__('Thứ hai')}}</option>
                                    <option value="3" >{{__('Thứ ba')}}</option>
                                    <option value="4" >{{__('Thứ tư')}}</option>
                                    <option value="5" >{{__('Thứ năm')}}</option>
                                    <option value="6" >{{__('Thứ sáu')}}</option>
                                    <option value="7" >{{__('Thứ bảy')}}</option>
                                    <option value="8" >{{__('Sáng - Thứ bảy')}}</option>
                                </select>
                            </div>

                        </div>
                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-3 pl-md-0">
                            <div class="input-group">
                                <div class="input-group-append pl-1 pr-1" style="position: absolute;z-index: 1;left: -6px;">
                                    <span class="input-group-text pl-0 pr-0">{{__('Đến')}}</span>
                                </div>
                                <select class="form-control" id="to_day">
                                    <option value="" selected disabled>Chọn thứ</option>
                                    <option value="1" >{{__('Chủ nhật')}}</option>
                                    <option value="2" >{{__('Thứ hai')}}</option>
                                    <option value="3" >{{__('Thứ ba')}}</option>
                                    <option value="4" >{{__('Thứ tư')}}</option>
                                    <option value="5" >{{__('Thứ năm')}}</option>
                                    <option value="6" >{{__('Thứ sáu')}}</option>
                                    <option value="7" >{{__('Thứ bảy')}}</option>
                                    <option value="8" >{{__('Sáng - Thứ bảy')}}</option>
                                </select>
                                {{--                            <input class="form-control" id="to_day" value="{{date('D')}}">--}}

                            </div>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                            <label for="quy_mo_nhan_su">{{__('Quy mô nhân sự: ')}}</label>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
                            <select class="form-control" id="quy_mo_nhan_su">

                                <option disabled selected value="">Quy mô nhân sự</option>
                                <option value="1" >Dưới 20 người</option>
                                <option value="2" >Từ 20 đến 50 người</option>
                                <option value="3" >Từ 50 đến 75 người</option>
                                <option value="4" >Trên 75 người</option>
                            </select>

                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                            <label for="linh_vuc_hoat_dong"><abbr class="text-danger  font-15">* </abbr>{{__('Lĩnh vực: ')}}
                            </label>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">

                            <select id="linh_vuc_hoat_dong" class="form-control not-null" multiple="multiple" tabindex="-1"
                                    title="Lĩnh vực"
                                    aria-hidden="true">
                                <option value="" disabled>Ngành Nghề</option>
                                @foreach($nganhNghe as $row)
                                    <option value="{{$row['id']}}">{{$row['name']}}</option>
                                @endforeach
                            </select>
                            <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                            <label for="fax_cong_ty">{{__('FAX: ')}}</label>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <input class="form-control" id="fax_cong_ty" value="">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 text-center text-md-right">
                            <label for="logo_cong_ty">{{__('Logo: ')}}</label>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 center-element position-relative">
                            <div style="width: 8rem;height: 8rem;" id="logo_cong_ty">
                                <img src="{{URL::asset('images/default-company-logo.jpg')}}" class="avatar-xl img-thumbnail" data-src="{{URL::asset('images/default-company-logo.jpg')}}"
                                     alt="profile-image" tabindex="-1" style="width: 100%;height: 100%">
                                <div class="position-absolute center-element"
                                     style="display:none;width: 8rem;height: 8rem;background-color: rgba(50, 58, 70, .55);top:0">
                                    <div>
                                        <div class="row mt-1 mb-1">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                                <button class="btn btn-success btn-sm">Đổi ảnh</button>
                                                <input type="file" class="d-none">
                                            </div>
                                        </div>
                                        <div class="row mt-1 mb-1">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                                <button class="btn btn-light btn-sm">Xem ảnh</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-12">
            <div class="page-title-box mb-1">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a>Thông tin tuyển dụng</a></li>
                        <li class="breadcrumb-item active">Danh sách công ty</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('Danh sách công ty của nhà tuyển dụng')}}</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-box p-1 mb-1 text-right">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-left">
                        <button class="btn btn-primary" id="them-moi">Thêm mới</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table class="table mb-0" id="danh-sach-cong-ty">
                                <thead class="thead-light">
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Websites</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{URL::asset('assets\libs\datatables\jquery.dataTables.min.js')}}"></script>
    <script src="{{URL::asset('assets\libs\datatables\dataTables.bootstrap4.js')}}"></script>
    <script src="{{URL::asset('assets\libs\datatables\dataTables.responsive.min.js')}}"></script>
    <script src="{{URL::asset('assets\libs\datatables\responsive.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets\libs\datatables\dataTables.buttons.min.js')}}"></script>
    <script src="{{URL::asset('assets\libs\datatables\buttons.bootstrap4.min.js')}}"></script>
    <script src="{{URL::asset('assets\libs\datatables\buttons.html5.min.js')}}"></script>
    <script src="{{URL::asset('assets\libs\datatables\buttons.flash.min.js')}}"></script>
    <script src="{{URL::asset('assets\libs\datatables\buttons.print.min.js')}}"></script>
    <script src="{{URL::asset('assets\libs\datatables\dataTables.keyTable.min.js')}}"></script>
    <script src="{{URL::asset('assets\libs\datatables\dataTables.select.min.js')}}"></script>
    <script src="assets\libs\multiselect\jquery.multi-select.js"></script>
    <script src="assets\libs\jquery-quicksearch\jquery.quicksearch.min.js"></script>
    <script src="assets\libs\select2\select2.min.js"></script>

    <script src="assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.js"></script>

    <script type="text/javascript" src="{{asset('assets\libs\date-time-picker\moment-with-locales.min.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{asset('assets\libs\date-time-picker\bootstrap-datetimepicker.css')}}">
    <script type="text/javascript" src="{{asset('assets\libs\date-time-picker\bootstrap-datetimepicker.min.js')}}"></script>


    <script type="text/javascript" src="{{asset('assets\js\date-picker-vi.js')}}"></script>
    <script>
        $(function () {
            let ajaxDSCongTy = {
                method : 'get',
                url : '/danh-sach-cong-ty/data'
            };
            let columnDSCongTy = [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'phone'},
                    {data: 'website'},
                    {
                        data: null,
                        render: function (data, type, row, meta) {
                            return '<div class="form-group"><button class="btn btn-warning btn-sm"><span class="fa fa-edit"></span></button></div>'
                        }
                    }
                ];
            datatableAjax($('#danh-sach-cong-ty'),ajaxDSCongTy,columnDSCongTy)

        });

        $('#them-moi').on('click',function () {
            $('#them-moi-cong-ty').modal('show');
        });

        $('#from_time,#to_time').datetimepicker({
            format: 'HH:mm',
            icons: {
                time: "icofont icofont-clock-time",
                date: "icofont icofont-ui-calendar",
                up: "icofont icofont-rounded-up",
                down: "icofont icofont-rounded-down",
                next: "icofont icofont-rounded-right",
                previous: "icofont icofont-rounded-left"
            },
        });

        $('select#from_day,select#to_day').select2();
        $('select#quy_mo_nhan_su').select2();
        $('select#linh_vuc_hoat_dong').select2({
            placeholder: ' Chọn Ngành nghề',
            allowClear: false
        });
        $("#logo_cong_ty").hover(function () {
            $(this).find('div').fadeIn('fast');

        }, function () {
            $(this).find('div').fadeOut('fast');
        });

        $('#logo_cong_ty').find('button').eq(1).on('click', function () {
            $('#xem_anh_dai_dien').modal('show');
            let value = $(this).parents('#logo_cong_ty').find('img').attr('src');
            $('#xem_anh_dai_dien').find('.modal-body').find('img').attr('src', value);
        });

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

        $uploadCrop = $('#upload-demo').croppie({
            viewport: {
                width: 400,
                height: 400,
            },
            enableExif: false,
        });
        $('#logo_cong_ty').find('button').eq(0).on('click', function () {
            $(this).parent().find('input[type="file"]').trigger('click');

        });
        $('#logo_cong_ty').parent().find('input[type="file"]').on('change', function () {
            $('#doi_anh_dai_dien').data('type','congty').modal('show');
            readFile(this);
        });
        $('#doi_anh_dai_dien').on('hidden.bs.modal',function () {
            let type = $(this).data('type');
            switch (type) {
                case 'congty':
                    $('#logo_cong_ty').parent().find('input[type="file"]').val('');
                    break;
                case 'tuyendung':
                    $('#avatar_tuyen_dung').parent().find('input[type="file"]').val('');
                    break;
            }
        });
        $('#doi_anh_dai_dien').find('.modal-footer').find('button:eq(1)#save').on('click',function () {
            let __this = $(this);
            let elementID = '';
            switch ($('#doi_anh_dai_dien').data('type')) {
                case 'congty': elementID = '#'+ $('#logo_cong_ty').attr('id');
                    break;
                case 'tuyendung': elementID = '#'+ $('#avatar_tuyen_dung').attr('id');
                    break;
            }
            let namePicture = $(elementID).parent().find('input[type="file"]')[0].files[0].name;
            $uploadCrop.croppie('result', {
                type: 'canvas',
                size: 'viewport',
            }).then(function (resp) {
                let method = 'post';
                let url = '/nha-tuyen-dung/set-logo-company';
                let data = {
                    fileName: resp,
                    name: namePicture,
                };
                sendAjaxNoFunc(method,url,data,__this.attr('id')).done(function (e) {
                    $(elementID).find('img').attr('src', e).data('src',e);
                    $.toast({
                        heading: 'Vừa thay đổi ảnh!',
                        hideAfter: 2000,
                        icon: 'success',
                        loaderBg: '#5ba035',
                        position: 'top-right',
                        stack: 1,
                        text: 'Thay đổi Logo',
                    });
                    $('#doi_anh_dai_dien').modal('hide');
                })

            });
        });
        $('#doi_anh_dai_dien').on('shown.bs.modal',function () {
            if($('#them-moi-cong-ty').hasClass('show') == true){
                $('#them-moi-cong-ty').css('z-index','1052').css('opacity','0.4')
                $('#doi_anh_dai_dien').css('z-index','1053')
            }
        });
        $('.modal').on('hidden.bs.modal',function () {
            $('.modal').css('opacity','1')
        })

    </script>
@endpush
