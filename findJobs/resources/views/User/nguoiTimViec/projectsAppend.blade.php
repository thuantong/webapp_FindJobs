@if($type == 1)
    <tr>
        <td>{{$index}}</td>
        <td class="project-name">{{__('NULL')}}</td>
        <td class="project-from">{{__('NULL')}}</td>
        <td class="project-to">{{__('NULL')}}</td>
        <td class="project-status" style="width: 20%!important;">{{__('NULL')}}</td>
        <td class="project-links">{{__('NULL')}}</td>
        <td>
            <div class="btn-group btn-group-sm" style="float: none;">

                <button class="btn btn-warning btn-sm cap-nhat-project">Cập nhật</button>
                <button class="btn btn-danger btn-sm xoa1-project">Xóa</button>
            </div>

        </td>
    </tr>
@elseif($type == 0)
    <tr>
        <td>{{$index}}</td>
        <td>{{__('Nhập tên dự án')}}<button class="btn btn-sm btn-success pl-1 pr-1">+</button></td>
        <td>{{__('Chọn ngày')}}<button class="btn btn-sm btn-success pl-1 pr-1">+</button></td>
        <td>{{__('Chọn ngày')}}<button class="btn btn-sm btn-success pl-1 pr-1">+</button></td>
        <td style="width: 20%!important;">
{{--            @if()--}}
            <select class="form-control select2" style="text-overflow: ellipsis">
                <option disabled selected value="">{{__('-- Chưa chọn --')}}</option>
                <option><span class="badge badge-info">Đang tiến hành</span></option>
                <option><span class="badge badge-pink">Đang chờ xử lý</span></option>
                <option><span class="badge badge-success">Hoàn thành</span></option>
                <option><span class="badge badge-warning">Sắp có</span></option>
            </select>
        </td>
        {{--    <td><a href="+url+" style="max-width: 40px;text-overflow: ellipsis">+url+</a></td>--}}
        <td><a href="" target="_blank"></a></td>
        <td>
            <button class="btn btn-danger btn-sm xoa1-project">Xóa</button>
        </td>
    </tr>
@endif
