@extends('master.index')
@section('content')
    <head>
        <link href="{{URL::asset('assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.css')}}"
              rel="stylesheet">
        <link href="{{URL::asset('assets\libs\multiselect\multi-select.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\select2\select2.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css">
        <!-- third party css -->
        <link href="{{URL::asset('assets\libs\datatables\dataTables.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\datatables\responsive.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\datatables\buttons.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\datatables\select.bootstrap4.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\sweetalert2\sweetalert2.min.css')}}" rel="stylesheet" type="text/css">
    </head>
    {{--    Thêm mới công ty - modal--}}
    @include('CongTy.modal.themMoi')
{{--    modal thêm mới --}}
    <div class="modal fade bs-example-modal-lg" id="them-moi-modal" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Thêm mới bài tuyển dụng</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                </div>

                <div class="modal-body">
                    @include('BaiViet.contentBaiDang')
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    @include('BaiViet.buttonDangBai')
{{--                    <button type="button" class="btn btn-primary" id="save-cong-ty">Lưu lại</button>--}}
                </div>
            </div>
        </div>
    </div>

    {{--    modal update --}}
    <div class="modal fade bs-example-modal-lg" id="cap-nhat-modal" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel">Cập nhật bài tuyển dụng</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

                </div>

                <div class="modal-body">
                    @include('BaiViet.contentCapNhatBaiDang')
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    @include('BaiViet.buttonDangBai')
                    {{--                    <button type="button" class="btn btn-primary" id="save-cong-ty">Lưu lại</button>--}}
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="page-title-box mb-1">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a>Trang chủ</a></li>
                        <li class="breadcrumb-item"><a>Quản Lý Tuyển Dụng</a></li>
                        <li class="breadcrumb-item active">Quản Lý Bài Đăng</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('Quản Lý Bài Đăng')}}</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card-box p-1 mb-1 text-center">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover mb-0" id="quan-ly-bai-dang">
                        <thead  class="thead-light">
                        <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Tên chức vụ</th>
                            <th>Tên công ty tuyển dụng</th>
                            <th>Hạn bài đăng</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                        </thead>
                    </table>
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
    <script src="{{URL::asset('assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.js')}}"></script>

    <link rel="stylesheet" type="text/css"
          href="{{URL::asset('assets\libs\date-time-picker\bootstrap-datetimepicker.css')}}">
    <script type="text/javascript"
            src="{{URL::asset('assets\libs\date-time-picker\bootstrap-datetimepicker.min.js')}}"></script>

    <script type="text/javascript">
        let table = null;
        let HTMLcongTy = null;
        let getBaseURL = '{{URL::asset('/')}}';
    </script>
    <script type="text/javascript" src="{{URL::asset('assets\js\date-picker-vi.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets\js\app\quanLyBaiDang.js')}}"></script>
    @include('BaiViet.scriptThemMoi')
    <script type="text/javascript">
        $(function () {
            getInitHtml();
        });
        $(document).on('click', '#form-update-body button#call-them-moi-cong-ty', function () {
            $('div.modal#them-moi-cong-ty').modal('show');
            $('div.modal#them-moi-cong-ty').data('type', 'cong_ty_tuyen_dung');

        });

        $(document).on('click','.them-moi-danh-sach',function () {
            $('#them-moi-modal').modal('show');
        });
        $(document).on('click','#quan-ly-bai-dang .chinh_sua',function () {
            let __this = $(this);
            let id = __this.parent().data('id');
            let ajax = {
                method: 'get',
                url : '/bai-viet/thong-tin&baiviet='+id+'&chitiet=0',
                data : {
                    action : id
                }
            }
            sendAjaxNoFunc(ajax.method,ajax.url,ajax.data,'').done(e=>{
                // console.log('dataa',e);
                let data = e;
                let __modalFormCapNhat = $('#cap-nhat-modal').find('#form-update-body');

                __modalFormCapNhat.find('#tieu_de_bai_dang_update').val(data.tieu_de);
                __modalFormCapNhat.find('#cong_ty_tuyen_dung_update').val(data.cong_ty_id).trigger('change.select2');
                __modalFormCapNhat.find('#chuc_vu_tuyen_update').val(data.chuc_vu_id).trigger('change.select2');

                __modalFormCapNhat.find('#ten_chuc_vu_update').val(data.ten_chuc_vu);
                __modalFormCapNhat.find('#so_luong_tuyen_update').val(data.so_luong_tuyen);
                __modalFormCapNhat.find('#so_kinh_nghiem_update').val(data.kinh_nghiem_id).trigger('change.select2');

                __modalFormCapNhat.find('#do_tuoi_from_update').val(data.tuoi[0]);
                __modalFormCapNhat.find('#do_tuoi_to_update').val(data.tuoi[1]);
                __modalFormCapNhat.find('#han_tuyen_dung_update').val(data.han_tuyen);

                let arrayNganhNghe = [];

                $.each(data.get_nganh_nghe,function (i,v) {
                    arrayNganhNghe.push(v.id);
                });
                __modalFormCapNhat.find('#nganh_nghe_update').val(arrayNganhNghe).trigger('change.select2');
                __modalFormCapNhat.find('#muc_luong_from_update').val(data.luong[0]);
                __modalFormCapNhat.find('#muc_luong_to_update').val(data.luong[1]);

                __modalFormCapNhat.find('#bang_cap_update').val(data.bang_cap_id).trigger('change.select2');
                __modalFormCapNhat.find('#gioi_tinh_update').val(data.gioi_tinh_tuyen).trigger('change.select2');
                __modalFormCapNhat.find('#dia_diem_lam_viec_update').val(data.dia_diem_id).trigger('change.select2');
                __modalFormCapNhat.find('#hinh_thuc_update').val(data.kieu_lam_viec_id).trigger('change.select2');
                __modalFormCapNhat.find('#mo_ta_cong_viec_update').val(data.mo_ta);
                __modalFormCapNhat.find('#yeu_cau_cong_viec_update').val(data.yeu_cau_cong_viec);
                __modalFormCapNhat.find('#quyen_loi_cong_viec_update').val(data.quyen_loi);
                __modalFormCapNhat.find('#dia_chi_cong_viec_update').val(data.dia_chi);
                __modalFormCapNhat.find('#so_ngay_ton_tai_update').val(data.so_luong_ngay_dang_tin.so_luong);
                __modalFormCapNhat.find('#dang_ky_bai_viet_hot_update').val(data.isHot);

                $('#cap-nhat-modal').modal('show');

            })

        });
    </script>

@endpush
