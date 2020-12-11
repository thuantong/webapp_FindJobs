@extends('master.index')
@section('content')
    <head>
        <link href="{{URL::asset('assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.css')}}"
              rel="stylesheet">

        <link href="{{URL::asset('assets\libs\multiselect\multi-select.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\select2\select2.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.css')}}" rel="stylesheet"
              type="text/css">
        <link href="{{URL::asset('assets\libs\sweetalert2\sweetalert2.min.css')}}" rel="stylesheet" type="text/css">


    </head>
{{--    Xem trước bài đăng tuyển dụng - modal--}}
    @include('BaiViet.modal.xemTruoc')
{{--    Thêm mới công ty - modal--}}
    @include('CongTy.modal.themMoi')
{{--    Xem ảnh đại diện modal--}}
    @include('CongTy.modal.xemAnhDaiDien')

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                        <li class="breadcrumb-item"><a>Quản lý tuyển dụng</a></li>
                        <li class="breadcrumb-item active">{{__('Đăng bài tuyển dụng')}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{__('Đăng Bài Tuyển Dụng')}}</h4>
            </div>
        </div>
    </div>
{{--    Body bài viết--}}
    @include('BaiViet.contentBaiDang')
    <div class="row">
        @include('BaiViet.buttonDangBai')
    </div>
    @include('CongTy.modal.anh_dai_dien')

@endsection
@push('scripts')
    <script src="{{URL::asset('assets\libs\multiselect\jquery.multi-select.js')}}"></script>
    <script src="{{URL::asset('assets\libs\jquery-quicksearch\jquery.quicksearch.min.js')}}"></script>
    <script src="{{URL::asset('assets\libs\select2\select2.min.js')}}"></script>

    <script src="{{URL::asset('assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.js')}}"></script>

    <script type="text/javascript"
            src="{{URL::asset('assets\libs\date-time-picker\moment-with-locales.min.js')}}"></script>

    <link rel="stylesheet" type="text/css"
          href="{{asset('assets\libs\date-time-picker\bootstrap-datetimepicker.css')}}">
    <script type="text/javascript"
            src="{{URL::asset('assets\libs\date-time-picker\bootstrap-datetimepicker.min.js')}}"></script>
    <script src="{{URL::asset('assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.js')}}"></script>
{{--    <script type="text/javascript" src="{{URL::asset('assets\js\app\themMoiCongTy.js')}}"></script>--}}

    <script type="text/javascript"
            src="{{URL::asset('assets\libs\date-time-picker\moment-with-locales.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets\libs\sweetalert2\sweetalert2.min.js')}}"></script>
    <script type="text/javascript">
        let table = null;
        let HTMLcongTy = null;
        let getBaseURL = '{{URL::asset('/')}}';
        const initEventCapNhatCongTy = ()=>{
            $('#doi_anh_dai_dien').data('type','them-moi-cong-ty')
            select2Default($('select#from_day'));
            select2Default($('select#to_day'));
            select2Default($('select#quy_mo_nhan_su'));
            select2MultipleDefault($('select#linh_vuc_hoat_dong'),'Chọn Ngành nghề')
            // $('select#from_day,select#to_day,select#quy_mo_nhan_su').select2({
            //     dropdownParent: $('div#cap-nhat-cong-ty ')
            // });
            // $('select#linh_vuc_hoat_dong').select2({
            //     placeholder: ' Chọn Ngành nghề',
            //     allowClear: false
            // });

            $("#so_luong_chi_nhanh").TouchSpin({
                min: 0,
                buttondown_class: "btn btn-primary waves-effect",
                buttonup_class: "btn btn-primary waves-effect"
            });
            lichNam($('#nam_thanh_lap'));

            $('#from_time,#to_time').datetimepicker({
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
            hoverEventLogo();
        }
        const hoverEventLogo = () => {
            $("div#logo_cong_ty").hover(function () {
                if ($(window).width() >= 576) {
                    $(this).find('div.hover-me').fadeIn('fast');
                }
            }, function () {
                if ($(window).width() >= 576) {
                    $(this).find('div.hover-me').fadeOut('fast');
                }
            });
        }
    </script>
{{--    <script type="text/javascript">--}}
{{--        let HTMLcongTy = null;--}}
{{--    </script>--}}
    <script type="text/javascript" src="{{URL::asset('assets\js\date-picker-vi.js')}}"></script>
{{--    js đăng bài--}}
    @include('BaiViet.scriptThemMoi')
    <script>

    </script>
@endpush
