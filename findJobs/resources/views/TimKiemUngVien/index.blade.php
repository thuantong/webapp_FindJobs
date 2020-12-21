@extends('master.index')
@section('content')
    <head>
{{--        <link href="{{URL::asset('assets\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.css')}}"--}}
{{--              rel="stylesheet">--}}

        <link href="{{URL::asset('assets\libs\multiselect\multi-select.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('assets\libs\select2\select2.min.css')}}" rel="stylesheet" type="text/css">
{{--        <link href="{{URL::asset('assets\libs\bootstrap-datepicker\bootstrap-datepicker.min.css')}}" rel="stylesheet"--}}
{{--              type="text/css">--}}
{{--        <link href="{{URL::asset('assets\libs\sweetalert2\sweetalert2.min.css')}}" rel="stylesheet" type="text/css">--}}


    </head>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Tìm kiếm ứng viên</li>
                    </ol>
                </div>
                <h4 class="page-title">Tìm kiếm ứng viên</h4>
            </div>
        </div>
    </div>

    <div class="card-box">
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <div class="row">
                    <select class="col-sm-12 col-md-12 form-control" id="nganh_nghe">
                        <option disabled selected value="">Chọn ngành nghề</option>
                    </select>
                </div>

            </div>
            <div class="col-sm-4 col-md-4">
                <div class="row">
                    <select class="col-sm-12 col-md-12 form-control" id="dia_diem">
                        <option disabled selected value="">Chọn địa điểm</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <button class="btn btn-primary">Tìm kiếm ứng viên</button>
            </div>
        </div>
    </div>
    @endsection
@push('scripts')
    <script src="{{URL::asset('assets\libs\multiselect\jquery.multi-select.js')}}"></script>
    <script src="{{URL::asset('assets\libs\jquery-quicksearch\jquery.quicksearch.min.js')}}"></script>
    <script src="{{URL::asset('assets\libs\select2\select2.min.js')}}"></script>
    <script>
        $(function () {
            select2Default($('#nganh_nghe'));
            select2Default($('#dia_diem'));
        })
    </script>
    @endpush
