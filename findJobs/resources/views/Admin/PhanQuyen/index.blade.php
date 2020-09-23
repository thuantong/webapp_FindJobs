@extends('Admin.index')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="card">
                <div class="card-body bg-white">
                    <div class="table-responsive">
                        <form method="post" action="{{route('phanquyen.setter')}}">
                            @csrf
{{--                            <button type="submit">Caapj nhaatj</button>--}}
                            <table class="table mb-0">
                                <thead>
                                <tr>
                                    <th class="d-none"></th>
                                    <th>{{__('Tên đăng nhập')}}</th>
                                    <th>{{__('Loại tài khoản')}}</th>
                                    <th>{{__('Xem Bài Đăng')}}</th>
                                    <th>{{__('Sửa Bài Đăng')}}</th>
                                    <th>{{__('Xóa Bài Đăng')}}</th>
                                    <th>{{__('Lưu cập nhật')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($taiKhoan as $row)

                                    <tr>
                                        {{--                                    @if(in_array($row, \Illuminate\Support\Facades\Session::get('role')))--}}
                                        <td data-id="{{$row['id']}}">{{$row['email']}}</td>
                                        @if($row['loai'] == 1)
                                            <td>{{__('Người tìm việc')}}</td>
                                        @elseif($row['loai'] == 2)
                                            <td>{{__('Nhà tuyển dụng')}}</td>
                                        @elseif($row['loai'] == 3)
                                        <td>{{__('ADMIN')}}</td>
                                            @endif

                                        <td><input type="checkbox" @if($row['loai'] == 3) disabled @endif @foreach($row['phan_quyens'] as $rowChil)@if($rowChil['id'] == 1) checked="checked" @endif @endforeach value="1"></td>
                                        <td><input type="checkbox" @if($row['loai'] == 3) disabled @endif @foreach($row['phan_quyens'] as $rowChil)@if($rowChil['id'] == 2) checked="checked" @endif @endforeach value="2"></td>
                                        <td><input type="checkbox" @if($row['loai'] == 3) disabled @endif @foreach($row['phan_quyens'] as $rowChil)@if($rowChil['id'] == 3) checked="checked" @endif @endforeach value="3"></td>
                                        @if($row['loai'] == 3)
                                        <td>{{__('Không thể chỉnh sửa')}}</td>
                                            @else <td><button class="btn btn-success btn-sm" type="button" class="save-phan-quyen">Cap nhat</button> </td>
                                        @endif
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>

                        </form>

                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection
@push('scripts')
    <script>
        $(function () {
            $('.save-phan-quyen').on('click',function () {
                let id = $(this).parents('tr').find('td').eq(0).data('id');
                let roleArray = [];

                $(this).parents('tr').find('td').each(function () {
                    // console.log(i++)
                    if($(this).find('input').is(':checked')){
                        roleArray.push(($(this).find('input').val()));
                    }

                });
                // getResponseAjax();
                $.ajax({
                    method:'post',
                    url:'/phan-quyen-setter',
                    data: {
                        id : id,
                        roles : roleArray
                    },
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success:function (res) {
                        location.href= '/phan-quyen'
                    }
                });
            })
        })
    </script>
    @endpush
