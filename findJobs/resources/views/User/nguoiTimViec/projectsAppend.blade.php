@if($type == 0)
    <tr>
        <td>{{$index}}</td>
        <td class="project-name">{{$data['name']}}</td>
        <td class="project-from">{{$data['fromDate']}}</td>
        <td class="project-to">{{$data['toDate']}}</td>
        <td class="project-status" style="width: 20%!important;"><span class="{{$data['status']['class']}}">{{$data['status']['text']}}</span></td>
        <td class="project-links">{{$data['links']}}</td>
        <td>
            <div class="btn-group btn-group-sm" style="float: none;">

                <button class="btn btn-warning btn-sm cap-nhat-project"><span class="fa fa-edit"></span></button>
                <button class="btn btn-danger btn-sm xoa1-project"><span class="fa fa-trash"></span></button>
            </div>

        </td>
    </tr>
@elseif($type == 1)
    @if($nguoiTimViec['projects'] != null)
        @foreach(unserialize($nguoiTimViec['projects']) as $row)
            <tr>
                <td>{{$row['id']}}</td>
                <td class="project-name">{{$row['name']}}</td>
                <td class="project-from">{{$row['from_date']}}</td>
                <td class="project-to">{{$row['to_date']}}</td>
                <td class="project-status" style="width: 20%!important;">
                    @switch($row['trang_thai'])
                        @case(1)
                        <span class="badge badge-info">{{__('Đang tiến hành')}}</span>
                        @break
                        @case(2)
                        <span class="badge badge-pink">{{__('Đang chờ xử lý')}}</span>
                        @break
                        @case(3)
                        <span class="badge badge-success">{{__('Hoàn thành')}}</span>
                        @break
                        @case(4)
                        <span class="badge badge-warning">{{__('Sắp có')}}</span>
                        @break
                    @endswitch
                </td>
                <td class="project-links">{{$row['websites']}}</td>
                <td>
                    <div class="btn-group btn-group-sm" style="float: none;">

                        <button class="btn btn-warning btn-sm cap-nhat-project"><span class="fa fa-edit"></span></button>
                        <button class="btn btn-danger btn-sm xoa1-project"><span class="fa fa-trash"></span></button>
                    </div>

                </td>
            </tr>
        @endforeach
    @endif
@endif
