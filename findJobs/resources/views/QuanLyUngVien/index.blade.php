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

        <!-- ION Slider -->
        <link href="{{URL::asset('assets\libs\ion-rangeslider\ion.rangeSlider.css')}}" rel="stylesheet" type="text/css">
    </head>

    <div id="chi-tiet-ung-cu-vien-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="full-width-modalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-full modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="full-width-modalLabel">{{__('Thông tin ứng viên')}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                        Đang tải...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="page-title-box mb-1">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Quản Lý Ứng Viên</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('Quản Lý Ứng Viên')}}</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="card-box p-1 mb-1 text-center">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="table-responsive">
                            <table class="table datatable-check table-bordered table-hover mb-0" id="ung-vien-cho-xu-ly">
                                <thead  class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Avatar</th>
                                    <th>Tên ứng viên</th>
                                    <th>Công việc ứng tuyển</th>
                                    <th>Chức năng</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0" id="ung-vien-phong-van">
                                <thead  class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Avatar</th>
                                    <th>Tên ứng viên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Trạng thái</th>
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
    <script src="{{URL::asset('assets\libs\multiselect\jquery.multi-select.js')}}"></script>
    <script src="{{URL::asset('assets\libs\jquery-quicksearch\jquery.quicksearch.min.js')}}"></script>
    <script src="{{URL::asset('assets\libs\select2\select2.min.js')}}"></script>

    <script src="{{URL::asset('assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.js')}}"></script>
    <!-- Ion Range Slider-->
    <script src="{{URL::asset('assets\libs\ion-rangeslider\ion.rangeSlider.min.js')}}"></script>

    <!-- Range slider init js-->
    <script src="{{URL::asset('assets\js\pages\range-sliders.init.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets\libs\date-time-picker\moment-with-locales.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets\libs\sweetalert2\sweetalert2.min.js')}}"></script>
    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('assets\libs\date-time-picker\bootstrap-datetimepicker.css')}}">
    <script type="text/javascript"
            src="{{URL::asset('assets\libs\date-time-picker\bootstrap-datetimepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets\js\date-picker-vi.js')}}"></script>

    <script type="text/javascript">
        let table = null;
        let table2 = null;

        $(function () {
            table = getDanhSachUngVien();
            table2 = getDanhSachPhongVan();
            $('#ung-vien-cho-xu-ly tbody').on('click','.xem-ung-vien',function () {
                let table_row = $(this).parents('tr');
                let data = getDataRow_dt(table,table_row);
                let idNguoiTimViec = data.get_nguoi_tim_viec.id;
                // console.log(data)
                let ajax = {
                    method:'get',
                    url:'/nguoi-tim-viet/chi-tiet',
                    data : {
                        id : idNguoiTimViec
                    }
                }
                $('#chi-tiet-ung-cu-vien-modal').modal('show');
                sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(e=>{
                    // console.log(e)modal-content

                    $('#chi-tiet-ung-cu-vien-modal .modal-content .modal-body').html(e)

                    $('.skill_append').ionRangeSlider({
                        skin: 'round',
                        from: $(this).data('value'),
                        from_fixed: true,
                    });

                });
            });
            $('#ung-vien-cho-xu-ly tbody').on('click','.chon-ung-vien',function () {
                let table_row = $(this).parents('tr');
                let data = getDataRow_dt(table,table_row);
                let idNguoiTimViec = data.get_nguoi_tim_viec.id;
                let idRecord = data.id;
                let nameNguoiTimViec = data.get_nguoi_tim_viec.get_tai_khoan.ho_ten;
                let alertNotify = {
                    title : 'Xác nhận chọn ứng viên '+nameNguoiTimViec,
                    message : 'Chọn ứng viên vào danh sách phỏng vấn?'
                }
                alertConfirm(alertNotify).then(res =>{
                    if(res.value == true){
                        let ajax = {
                            method:'get',
                                url:'/nha-tuyen-dung/quan-ly-ung-vien/confirm-danh-sach-phong-van',
                                data : {
                                    id : idRecord,
                                    name: nameNguoiTimViec
                                }
                        }
                        sendAjaxNoFunc(ajax.method, ajax.url,ajax.data,'').done(r=>{
                            getHtmlResponse(r);
                            if(r.status == 200){
                                db_ajax_reload_page(table);
                                db_ajax_reload_all(table2);
                            }
                        });

                    }
                });

            });

            $('.them-moi-danh-sach').addClass('d-none')
        });
        const getDanhSachUngVien = () => {
            let ajax = {
                method:'get',
                url:'/nha-tuyen-dung/lay-danh-sach-ung-vien'
            }
            let column = [
                {
                    render: function (api, rowIdx, columns, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    render: function (api, rowIdx, columns, meta) {
                        return '<img src="/'+columns.get_nguoi_tim_viec.avatar+'" style="width:50px;height:50px">';
                    },
                    className: 'pr-1 pl-1 text-center'
                },
                {
                    data:'get_nguoi_tim_viec.get_tai_khoan.ho_ten'
                },

                {
                    data:'get_bai_tuyen_dung.tieu_de'
                },

                {
                    render: function (api, rowIdx, columns, meta) {
                        return '<div class="" style="display: block">' +
                            '<button class="btn btn-warning btn-sm waves-effect xem-ung-vien">Xem chi tiết' +
                            '</button>' +
                            '<button class="btn btn-primary btn-sm waves-effect chon-ung-vien text-center"><span>Chọn</span>' +
                            '</button>' +
                            '<button class="btn btn-light btn-sm waves-effect tu-choi-ung-vien">Từ chối' +
                            '</button>' +
                            '</div>'
                    },
                    className: 'pl-1 pr-1'
                }
            ];
            return datatableAjax($('#ung-vien-cho-xu-ly'), ajax, column);
        }

        const getDanhSachPhongVan = () => {
            let ajax = {
                method:'get',
                url:'/nha-tuyen-dung/lay-danh-sach-phong-van'
            }
            let column = [
                {
                    render: function (api, rowIdx, columns, meta) {
                        return meta.row + 1;
                    }
                },
                {
                    render: function (api, rowIdx, columns, meta) {
                        return '<img src="/'+columns.get_nguoi_tim_viec.avatar+'" style="width:50px;height:50px">';
                    },
                    className: 'pr-1 pl-1 text-center'
                },
                {
                    data:'get_nguoi_tim_viec.get_tai_khoan.ho_ten'
                },

                {
                    data:'get_bai_tuyen_dung.tieu_de'
                },
                {
                    data:'get_bai_tuyen_dung.tieu_de'
                },
                {
                    data:'get_bai_tuyen_dung.tieu_de'
                },
                {
                    render: function (api, rowIdx, columns, meta) {
                        return '<div class="" style="display: block">' +
                            '<button class="btn btn-primary btn-sm waves-effect chon-ung-vien text-center">Đậu' +
                            '</button>' +
                            '<button class="btn btn-light btn-sm waves-effect tu-choi-ung-vien">Rớt' +
                            '</button>' +
                            '</div>'
                    },
                    className: 'pl-1 pr-1'
                }
            ];
            return datatableAjax($('#ung-vien-phong-van'), ajax, column);
        }
    </script>
@endpush
