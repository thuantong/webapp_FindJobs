@extends('Admin.index')
@section('content')
    <head>
        <link href="{{URL::asset('assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.css')}}"
              rel="stylesheet">
        <link href="{{URL::asset('assets\libs\multiselect\multi-select.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\select2\select2.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.css')}}" rel="stylesheet"
              type="text/css">
        <!-- third party css -->
        <link href="{{URL::asset('assets\libs\datatables\dataTables.bootstrap4.css')}}" rel="stylesheet"
              type="text/css">
        <link href="{{URL::asset('assets\libs\datatables\responsive.bootstrap4.css')}}" rel="stylesheet"
              type="text/css">
        <link href="{{URL::asset('assets\libs\datatables\buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\datatables\select.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\sweetalert2\sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
    </head>
    @include('BaiViet.modal.xemTruoc')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box mb-1">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a>Quản lý bài đăng</a></li>
                        <li class="breadcrumb-item active">Danh sách tin chờ xét duyệt</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('Danh sách tin chờ xét duyệt')}}</h4>
            </div>
        </div>
    </div>

    <div class="row duyet-tin-container">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card-box p-1 mb-1">


                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0 nowrap" id="danh-sach-duyet-tin">
                                <thead class="thead-light">
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Tiêu đề</th>
                                    <th class="text-center">Người đăng</th>
                                    <th class="text-center">Thời gian thêm</th>
                                    <th class="text-center">Số ngày đăng</th>
                                    <th class="text-center">Trạng thái</th>
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

    <script type="text/javascript"
            src="{{URL::asset('assets\libs\date-time-picker\moment-with-locales.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets\libs\sweetalert2\sweetalert2.min.js')}}"></script>
    <script src="{{URL::asset('assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.js')}}"></script>


    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('assets\libs\date-time-picker\bootstrap-datetimepicker.css')}}">
    <script type="text/javascript"
            src="{{URL::asset('assets\libs\date-time-picker\bootstrap-datetimepicker.min.js')}}"></script>

    <script type="text/javascript" src="{{URL::asset('assets\js\date-picker-vi.js')}}"></script>
    <script type="text/javascript">
        let table = '';

        $(function () {
            // $(window).resize()
            let widthImage_search = 80;
            let heightImage_search = widthImage_search;
            $('#review-modal .iteam-click').find('img').css('width', widthImage_search).css('height', heightImage_search);
            $(window).resize(function () {
                widthImage_search = $('#review-modal .iteam-click').find('img').parent().width();
                heightImage_search = widthImage_search;
                // console.log($('.iteam-click').find('img').parent().width());
                $('#review-modal .iteam-click').find('img').css('width', widthImage_search).css('height', heightImage_search);

            });

            $('body').addClass('sidebar-enable enlarged')
            // $.ajax({
            //     method : 'get',
            //     url:'/admin/danh-sach-bai-duyet/get',
            // }).done(e=>{
            //     console.log(e)
            // });
            table = getDanhSachDuyetTin();
            $('#danh-sach-duyet-tin').on('init.dt', function () {
                $('button.them-moi-danh-sach').addClass('d-none');
            })
        });
        const getDanhSachDuyetTin = () => {
            let ajax = {
                method: 'get',
                url: '/admin/danh-sach-bai-duyet/get',
            }
            let column = [
                {
                    render: function (api, rowIdx, columns, meta) {
                        return meta.row + 1;
                    },
                    className: 'text-primary text-center'
                },

                {
                    data: 'tieu_de'
                },
                {
                    data: 'ho_ten'
                },
                {
                    data: 'created_at'
                },
                {
                    render: function (api, rowIdx, columns, meta) {
                        let soNgay = null;
                        if (columns.so_ngay_bai_dang == null){
                            soNgay = "Chưa được duyệt";
                        }else{
                            soNgay = columns.so_ngay_bai_dang + ' Ngày';
                        }
                        return soNgay;
                    },
                    className: 'text-center'
                },
                {
                    render: function (api, rowIdx, columns, meta) {
                        switch (parseInt(columns.status)) {
                            case 0:
                                return '<span class="text-warning">Chờ duyệt</span>';
                            // break;
                            case 1:
                                return '<span class="text-info">Đã được duyệt</span>';
                            // break;
                            case 2:
                                return '<span class="text-danger">Đã bị từ chối</span>';
                            // break;
                        }
                        // return columns.so_ngay_bai_dang + ' Ngày';
                    },
                    className: 'text-center'
                },
                {
                    render: function (api, rowIdx, columns, meta) {
                        let classHide = '';
                        switch (parseInt(columns.status)) {
                            case 1:
                                classHide = 'd-none'
                                break;
                            case 2:
                                classHide = 'd-none'
                                break;
                        }

                        return '<div class="d-flex center-element" data-id="' + columns.id + '">' +
                            '<a class="waves-effect text-primary mr-1 xem_noi_dung" style="text-decoration: underline">Xem Nội dung</a>' +
                            '<button class="btn btn-sm btn-primary waves-effect phe_duyet_tin '+classHide+'">Phê duyệt</button>' +
                            '<button class="btn btn-sm btn-light waves-effect tu_choi_duyet_tin '+classHide+'">Từ chối</button>' +
                            '</div>';
                    },
                    className :'text-center'
                },
            ]
            return datatableAjax($('#danh-sach-duyet-tin'), ajax, column);

        }
        $(document).on('click', '.duyet-tin-container .xem_noi_dung', function () {
            let id = $(this).parent().data('id');
            // console.log('cc',id)
            sendAjaxNoFunc('get', '/admin/duyet-tin/xem-bai-dang', {id: id}, '').then(e => {
                // console.log(e);


                $('#review-modal').find('#dia_chi').find('span').text(e.dia_chi);
                $('#review-modal').find('#dia_chi').find('a').text(e.get_dia_diem.name);
                $('#review-modal').find('#mo_ta_cong_viec').html(e.mo_ta);
                $('#review-modal').find('.chuc_vu').text(e.get_chuc_vu.name);
                let array_nganh_nghe = [];
                $.each(e.get_nganh_nghe, function (i, v) {
                    array_nganh_nghe.push(v.name);
                });

                $('#review-modal').find('.nganh_nghe').html(array_nganh_nghe.join(' - '));
                $('#review-modal').find('.kinh_nghiem').text(e.get_kinh_nghiem.name);
                $('#review-modal').find('.tieu_de,.iteam-click span:eq(0)').text(e.tieu_de);
                $('#review-modal').find('.yc_bang_cap').html(e.get_bang_cap.name);
                $('#review-modal').find('.so_luong_tuyen').html(e.so_luong_tuyen);
                $('#review-modal').find('.han_nop,.iteam-click span:eq(4)').html(e.han_tuyen);
                $('#review-modal').find('.kieu_lam_viec').html(e.get_kieu_lam_viec.name);
                let gioi_tinh = '';
                switch (e.gioi_tinh_tuyen) {
                    case '1':
                        gioi_tinh = 'Nam';
                        break;
                    case '2':
                        gioi_tinh = 'Nữ';
                        break;
                    case '3':
                        gioi_tinh = 'Tất cả';
                        break;

                }
                {{--console.log({{unserialize(''+e.luong+'')}})--}}
                $('#review-modal').find('.gioi_tinh_tuyen').text(gioi_tinh);
                $('#review-modal').find('.dia_diem,.iteam-click span:eq(3)').text(e.get_dia_diem.name);
                $('#review-modal').find('.muc_luong,.iteam-click span:eq(2)').text(e.luong.join(' - ') + ' Triệu');
                // $('#review-modal').find('#nganh_nghe').text(e.get_kieu_lam_viec.name);
                $('#review-modal').find('#yeu_cau_cong_viec').text(e.yeu_cau_cong_viec);
                $('#review-modal').find('#quyen_loi_cong_viec').text(e.quyen_loi);
                $('#review-modal').find('.iteam-click img').attr('src', '/' + e.get_cong_ty.logo);
                // $('#review-modal').find('.iteam-click img').attr('src','/'+e.get_cong_ty.logo);
                $('#review-modal').find('.cong_ty,.iteam-click span:eq(1)').text(e.get_cong_ty.name);
                $('#review-modal').find('#name_nguoi_dang').text(e.get_nha_tuyen_dung.ho_ten);
                switch (e.isHot) {
                    case '0':
                        $('#review-modal').find('.ribbon-two.ribbon-two-danger').addClass('d-none');
                        break;
                    case '1':
                        $('#review-modal').find('.ribbon-two.ribbon-two-danger').removeClass('d-none');
                        break;
                }
                $('#review-modal').modal('show');

            })


        });

        $(document).on('click', '.duyet-tin-container .phe_duyet_tin', function () {
            let __this = $(this);
            let ten_bai_viet = $(this).parents('tr').find('td').eq(1).text();
            let data = {
                title: 'Phê duyệt bài viết',
                message: 'Bạn muốn phê duyệt cho bài viết: ' + ten_bai_viet,
            }
            alertConfirm(data).then(r => {
                let idPost = __this.parent().data('id');
                // console.log(idPost)
                let ajax = {
                    method: 'post',
                    url: '/admin/duyet-tin/confirm',
                    data: {id: idPost}
                };

                if (r.value == true) {
                    sendAjaxNoFunc(ajax.method, ajax.url, ajax.data, '').done(e => {
                        // console.log(e);
                        // getResponseAjax()
                        getHtmlResponse(e);

                        if (e.status == 200) {
                            table.ajax.reload(null, false);
                        }
                    });

                }
            })
        });
    </script>
@endpush
