@if($typeSend == 0)
    <li class="timeline-sm-item">
        <span class="timeline-sm-date time-exp"><b>01/2020</b><br>đến<br><b>01/2020</b></span>
        <div class="btn-group btn-group-sm mb-1" style="float: none;">

            <button class="btn btn-sm btn-warning mr-1 cap-nhat-exp">{{__('Cập nhật')}}</button>
            <button class="btn btn-sm btn-danger ml-1 mr-1 xoa1-exp">{{__('Xóa')}}</button>
        </div>

        <h5 class="mt-0 mb-1 company-name-exp"></h5>

        <p class="company-link-exp"></p>
        <p class="text-muted mt-2 description-exp"></p>
    </li>
@elseif($typeSend == 1)
    @if($nguoiTimViec['exp_lam_viec'] != null)
        @foreach(unserialize($nguoiTimViec['exp_lam_viec']) as $row)
            <li class="timeline-sm-item">
                <span class="timeline-sm-date time-exp"><b>{{$row['from_date']}}</b><br>đến<br><b>{{$row['to_date']}}</b></span>
                <div class="btn-group btn-group-sm mb-1" style="float: none;">
{{----}}
                    <button class="btn btn-sm btn-warning mr-1 cap-nhat-exp">{{__('Cập nhật')}}</button>
                    <button class="btn btn-sm btn-danger ml-1 mr-1 xoa1-exp">{{__('Xóa')}}</button>
                </div>
{{----}}
                <h5 class="mt-0 mb-1 company-name-exp">{{$row['tenCtyVaChucVu']}}</h5>
{{----}}
                <p class="company-link-exp">{{$row['websites']}}</p>
                <p class="text-muted mt-2 description-exp">{{$row['mo_ta']}}</p>
            </li>
        @endforeach
    @endif
@endif
