@extends('Admin.index')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tr>
                                <th class="d-none"></th>
                                <th>{{__('Tên đăng nhập')}}</th>
                                <th>{{__('Xem Bài Đăng')}}</th>
                                <th>{{__('Sửa Bài Đăng')}}</th>
                                <th>{{__('Xóa Bài Đăng')}}</th>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
    @endsection
