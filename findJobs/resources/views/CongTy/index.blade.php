@extends('master.index')
@section('content')
    <head>
        <link href="{{URL::asset('assets\libs\multiselect\multi-select.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\select2\select2.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">
        <!-- third party css -->
        <link href="{{URL::asset('assets\libs\datatables\dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\datatables\responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\datatables\buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\datatables\select.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\sweetalert2\sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
        <!-- Sweet Alert-->
        <!-- third party css end -->
    </head>
    <div class="modal fade" id="cap-nhat-cong-ty" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                Đang tải....
            </div>
        </div>
    </div>
    @include('CongTy.modal.themMoi')
    @include('CongTy.modal.xemAnhDaiDien')

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
                {{--                <div class="row">--}}
                {{--                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-left">--}}
                {{--                        <button class="btn btn-primary" id="them-moi">Thêm mới</button>--}}
                {{--                    </div>--}}
                {{--                </div>--}}

                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0" id="danh-sach-cong-ty">
                                <thead class="thead-light">
                                <tr>
                                    <th class="text-center">Logo</th>
                                    <th class="text-center">Tên</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Số điện thoại</th>
                                    <th class="text-center">Websites</th>
                                    <th class="text-center">Giới thiệu công ty</th>
                                    <th class="text-center">Chức năng</th>
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
    <script src="{{URL::asset('assets\libs\multiselect\jquery.multi-select.js')}}"></script>
    <script src="{{URL::asset('assets\libs\jquery-quicksearch\jquery.quicksearch.min.js')}}"></script>
    <script src="{{URL::asset('assets\libs\select2\select2.min.js')}}"></script>

    <script src="{{URL::asset('assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets\libs\date-time-picker\moment-with-locales.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets\libs\sweetalert2\sweetalert2.min.js')}}"></script>

    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('assets\libs\date-time-picker\bootstrap-datetimepicker.css')}}">
    <script type="text/javascript"
            src="{{URL::asset('assets\libs\date-time-picker\bootstrap-datetimepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets\js\app\congTy.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets\js\date-picker-vi.js')}}"></script>
    <script>
        let datatable_table = '';

        const getDanhSachCongTy = () => {
            let ajaxDSCongTy = {
                method: 'get',
                url: '/danh-sach-cong-ty/data'
            };
            let columnDSCongTy = [
                {
                    // data: 'id',
                    render: function (data, type, row, meta) {
                        // console.log(meta)
                        return '<img src="' + row.logo + '" style="width:50px;height:50px">';
                        // return getIMGCongTy(row.logo);
                    },
                    className: 'pl-1 pr-1 text-center',
                },
                {
                    data: 'name',
                    // className : 'max-width-300px'
                    className: 'max-width-300px pl-1 pr-1'

                },
                {
                    data: 'email',
                    // className : 'max-width-200px'
                    className: 'max-width-300px pl-1 pr-1'

                },
                {
                    data: 'phone',

                    className: 'max-width-300px pl-1 pr-1'

                },
                {
                    data: 'websites',
                    className: 'max-width-300px pl-1 pr-1'
                },
                {
                    data: 'gioi_thieu',
                    className: 'max-width-300px pl-1 pr-1'

                },
                {
                    // data: 'chucnang',
                    render: function (data, type, row, meta) {
                        return '<div class="form-group">' +
                            '<button class="btn btn-warning btn-sm cap-nhat-cong-ty" data-id="' + row.id + '"><i class="fa fa-pencil"></i>' +
                            '</button>' +
                            '<button class="btn btn-danger btn-sm xoa-cong-ty ml-1" data-id="' + row.id + '"><i class="fa fa-times"></i>' +
                            '</button>' +
                            '</div>'
                    },
                    className: 'pl-1 pr-1'
                    // className : 'pl-1 pr-1'
                }
            ];
            return datatableAjax($('#danh-sach-cong-ty'), ajaxDSCongTy, columnDSCongTy);

        }
        $(function () {
            $("div#them-moi-cong-ty #logo_cong_ty").hover(function () {
                if ($(window).width() >= 576) {
                    $(this).find('div.hover-me').fadeIn('fast');
                }
            }, function () {
                if ($(window).width() >= 576) {
                    $(this).find('div.hover-me').fadeOut('fast');
                }
            });
            $(document).on('click','.logo_cong_ty_view',function () {
                $('#xem_anh_dai_dien').modal('show');
                let value = $(this).parents('#logo_cong_ty').find('img').attr('src');
                $('#xem_anh_dai_dien').find('.modal-body').find('img').attr('src', value);
            })


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
                    width: 350,
                    height: 350,
                },
                enableExif: false,
            });

            $(document).on('click','#logo_cong_ty .logo_cong_ty_change',function () {
                $(this).parents('#logo_cong_ty').find('.logo_cong_ty_file').trigger('click');
            });
            // $('#logo_cong_ty').find('.logo_cong_ty_change').on('click', function () {
            //     $('#logo_cong_ty').find('.logo_cong_ty_file').trigger('click');
            //     // $(this).parent().find('input[type="file"]').trigger('click');
            //
            // });
            $(document).on('change','#logo_cong_ty .logo_cong_ty_file',function () {
                // console.log($(this).parents('.modal').attr('id'))
                let getModal = $(this).parents('.modal').attr('id');
                // console.log('modal nè',getModal)
                $('#doi_anh_dai_dien').data('type', getModal).modal('show');
                readFile(this);
            });
            // $('#logo_cong_ty').parent().find('input[type="file"]').on('change', function () {
            //     $('#doi_anh_dai_dien').data('type', 'congty').modal('show');
            //     readFile(this);
            // });
            $('div#them-moi-cong-ty').on('shown.bs.modal',function () {
                $('div#them-moi-cong-ty #from_time,div#them-moi-cong-ty #to_time').datetimepicker({
                    format: 'HH:mm',
                    widgetPositioning: {
                        vertical: 'bottom',
                        horizontal: 'right'
                    },
                    icons: {
                        time: "icofont icofont-clock-time",
                        date: "icofont icofont-ui-calendar",
                        up: "icofont icofont-rounded-up",
                        down: "icofont icofont-rounded-down",
                        next: "icofont icofont-rounded-right",
                        previous: "icofont icofont-rounded-left"
                    },
                });

                $('div#them-moi-cong-ty select#from_day,div#them-moi-cong-ty select#to_day,div#them-moi-cong-ty select#quy_mo_nhan_su').select2({
                    dropdownParent: $('#them-moi-cong-ty')
                });

                $('div#them-moi-cong-ty select#linh_vuc_hoat_dong').select2({
                    dropdownParent: $('#them-moi-cong-ty'),
                    placeholder: ' Chọn Ngành nghề',
                    allowClear: false
                });
            })
            $('#doi_anh_dai_dien').on('hidden.bs.modal', function () {
                let type = $(this).data('type');

                switch (type) {
                    case 'them-moi-cong-ty':
                        $('#them-moi-cong-ty #logo_cong_ty').find('input[type="file"]').val('');
                        break;
                    // case 'tuyendung':
                    //     $('#avatar_tuyen_dung').parent().find('input[type="file"]').val('');
                    //     break;
                }
            });
            $('#doi_anh_dai_dien').find('.modal-footer').find('button:eq(1)#save').on('click', function () {
                let __this = $(this);
                let type = $(this).parents('.modal').data('type');
                console.log('modal nè',type)

                // console.log(type)
                let elementID = '';
                switch (type) {
                    case 'them-moi-cong-ty':
                        // elementID = ('#' + $('#logo_cong_ty').attr('id'));
                        elementID = $('#'+type).find('#logo_cong_ty');
                        break;
                    case 'cap-nhat-cong-ty':
                        elementID = $('#'+type).find('#logo_cong_ty');
                        break;
                }
                let namePicture = elementID.find('input[type="file"]')[0].files[0].name;
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
                    sendAjaxNoFunc(method, url, data, __this.attr('id')).done(function (e) {
                        console.log('data',e)
                        elementID.find('img').attr('src', e.reset[0]).data('data', e.reset[0]);
                        getHtmlResponse(e);

                        if (e.status == 200) {
                            $('#doi_anh_dai_dien').modal('hide');

                        }
                    })

                });
            });
            // $('#doi_anh_dai_dien').on('shown.bs.modal', function () {
            // if ($('#them-moi-cong-ty').hasClass('show') == true) {
            //     $('#them-moi-cong-ty').css('z-index', '1052').css('opacity', '0.4')
            //     $('#doi_anh_dai_dien').css('z-index', '1053')
            // }
            // });
            $('.modal').on('hidden.bs.modal', function () {
                // $('.modal').css('opacity', '1')
                datatable_table.ajax.reload(null, false);
            });
            $('#them-moi-cong-ty').on('hidden.bs.modal', function () {
                $('#logo_cong_ty').find('img').attr('src', 'images/default-company-logo.jpg').data('src', 'images/default-company-logo.jpg');
            });
            datatable_table = getDanhSachCongTy();
            // $.ajax({
            //     method: 'get',
            //     url: '/danh-sach-cong-ty/data',
            //     success: function (res) {
            //         console.log(res)
            //     }
            // })
        });
        $(document).on('click', '.them-moi-danh-sach', function () {
            $('#them-moi-cong-ty').modal('show')
        });
        $(document).on('click', '#them-moi-cong-ty #save-cong-ty', function () {
            let __this = $(this);
            let gio_lam_viec = [];
            let ngay_lam_viec = [];
            let error = 0;
            let getParents = $('#'+$(this).parents('.modal').attr('id'));
            error += notNullMessage(getParents.find('.not-null'));
            // console.log('error',error)
            if (error == 0) {
                gio_lam_viec.push(getParents.find('#from_time').val(), getParents.find('#to_time').val());
                ngay_lam_viec.push(getParents.find('#from_day').find('option:checked').val(), getParents.find('#to_day').find('option:checked').val());

                let dataSend = {
                    ten_cong_ty: getParents.find('#ten_cong_ty').val(),
                    link_website: getParents.find('#link_website').val(),
                    email_cong_ty: getParents.find('#email_cong_ty').val(),
                    dien_thoai_cong_ty: getParents.find('#dien_thoai_cong_ty').val(),
                    dia_chi_chinh: getParents.find('#dia_chi_chinh').val(),
                    gio_lam_viec: gio_lam_viec,
                    ngay_lam_viec: ngay_lam_viec,
                    quy_mo_nhan_su: getParents.find('#quy_mo_nhan_su').find('option:checked').val(),
                    linh_vuc_hoat_dong: getParents.find('#linh_vuc_hoat_dong').val(),
                    fax_cong_ty: getParents.find('#fax_cong_ty').val(),
                    logo_cong_ty: getParents.find('#logo_cong_ty').find('img').data('data'),
                }

                sendAjaxNoFunc('post', '/danh-sach-cong-ty/tao-moi', dataSend, __this.attr('id')).done(res => {
                    // console.log('them moi',res)
                    getHtmlResponse(res);
                    if (res.status == 200) {
                        $('#' + __this.attr('id')).attr('disabled', 'disabled');
                        getParents.modal('hide');
                        datatable_table.ajax.reload();
                    }
                })
            }
            ;

        });


        //cập nhật công ty
        $(document).on('click', 'button.cap-nhat-cong-ty', function () {
            let value = $(this).data('id');

            sendAjaxNoFunc('get', '/danh-sach-cong-ty/du-lieu-cap-nhat', {id: value}).done(res => {
                // console.log(res)
                $('div#cap-nhat-cong-ty').modal('show');
                //
                $('div#cap-nhat-cong-ty').find('.modal-content').html(res);
                $('div#cap-nhat-cong-ty select#from_day,div#cap-nhat-cong-ty select#to_day,div#cap-nhat-cong-ty  select#quy_mo_nhan_su').select2({
                    dropdownParent: $('div#cap-nhat-cong-ty ')
                });
                $('div#cap-nhat-cong-ty select#linh_vuc_hoat_dong').select2({
                    dropdownParent: $('div#cap-nhat-cong-ty'),
                    placeholder: ' Chọn Ngành nghề',
                    allowClear: false
                });
                $('div#cap-nhat-cong-ty #from_time,div#cap-nhat-cong-ty #to_time').datetimepicker({
                    format: 'HH:mm',
                    widgetPositioning: {
                        vertical: 'bottom',
                        horizontal: 'right'
                    },
                    icons: {
                        time: "icofont icofont-clock-time",
                        date: "icofont icofont-ui-calendar",
                        up: "icofont icofont-rounded-up",
                        down: "icofont icofont-rounded-down",
                        next: "icofont icofont-rounded-right",
                        previous: "icofont icofont-rounded-left"
                    },
                });

                $("div#cap-nhat-cong-ty #logo_cong_ty").hover(function () {
                    if ($(window).width() >= 576) {
                        $(this).find('div.hover-me').fadeIn('fast');
                    }
                }, function () {
                    if ($(window).width() >= 576) {
                        $(this).find('div.hover-me').fadeOut('fast');
                    }
                });
            })
        });

        $(document).on('click', 'div#cap-nhat-cong-ty #save-cong-ty', function () {
            let __this = $(this);
            let gio_lam_viec = [];
            let ngay_lam_viec = [];
            let error = 0;
            let getParents = $('#'+$(this).parents('.modal').attr('id'));

            error += notNullMessage(getParents.find('.not-null'));
            // console.log('error',error)
            if (error == 0) {
                gio_lam_viec.push(getParents.find('#from_time').val(), getParents.find('#to_time').val());
                ngay_lam_viec.push(getParents.find('#from_day').find('option:checked').val(), getParents.find('#to_day').find('option:checked').val());

                let dataSend = {
                    id: getParents.find('#id-danh-sach').val(),
                    ten_cong_ty: getParents.find('#ten_cong_ty').val(),
                    link_website: getParents.find('#link_website').val(),
                    email_cong_ty: getParents.find('#email_cong_ty').val(),
                    dien_thoai_cong_ty: getParents.find('#dien_thoai_cong_ty').val(),
                    dia_chi_chinh: getParents.find('#dia_chi_chinh').val(),
                    gio_lam_viec: gio_lam_viec,
                    ngay_lam_viec: ngay_lam_viec,
                    quy_mo_nhan_su: getParents.find('#quy_mo_nhan_su').find('option:checked').val(),
                    linh_vuc_hoat_dong: getParents.find('#linh_vuc_hoat_dong').val(),
                    fax_cong_ty: getParents.find('#fax_cong_ty').val(),
                    logo_cong_ty: getParents.find('#logo_cong_ty').find('img').data('data'),
                }

                sendAjaxNoFunc('post', '/danh-sach-cong-ty/cap-nhat', dataSend, __this.attr('id')).done(res => {
                    // console.log('cc',res)
                    getHtmlResponse(res);
                    if (res.status == 200) {
                        $('#' + __this.attr('id')).attr('disabled', 'disabled');
                        $('div#cap-nhat-cong-ty').modal('hide');
                        datatable_table.ajax.reload(null, false);
                        // window.location.href = '/danh-sach-cong-ty';
                    }
                })
            }
            ;

        });

        $(document).on('click','.xoa-cong-ty',function () {
            alertConfirm('Xóa').then(e =>{
                if(e.value == true){
                    sendAjaxNoFunc('post','/danh-sach-cong-ty/xoa',{id:$(this).data('id')},'').done(e=>{
                        getHtmlResponse(e);
                        if(e.status == 200){
                            datatable_table.ajax.reload(null, false);
                        }
                    })
                }
            });

        });
    </script>
@endpush
