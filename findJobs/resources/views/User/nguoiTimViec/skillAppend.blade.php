@if($typeSend == 0)

    <div class="pt-1 skill">
        <h6 class="text-uppercase mt-0 mb-1 row">
            <label class="col-6 mb-0 d-flex"><input class="skill-name check-null" data-value="" data-prefix="" title=""
                                                    value="" placeholder="{{__('VD: Java')}}"><abbr
                    class="text-danger font-15 pl-1">{{__('*')}}</abbr></label>

            <span class="float-right col-6 text-right"><span
                    class="skill_value"></span> Điểm<button
                    class="btn btn-sm btn-danger pt-0 pb-0 pr-1 pl-1 ml-1 remove-skill">{{__('-')}}</button></span>

        </h6>
        <input type="text" class="skill_append" data-value="{{__('NULL')}}">
    </div>
@elseif($typeSend == 1)
    @if($nguoiTimViec['ky_nang'] != null)

        @foreach(unserialize($nguoiTimViec['ky_nang']) as $row)
            <div class="pt-1 skill">
                <h6 class="text-uppercase mt-0 mb-1 row">
                    <label class="col-6 mb-0 d-flex"><input class="skill-name check-null" data-value="" data-prefix=""
                                                            title="" value="{{$row['name']}}" placeholder="{{__('VD: Java')}}"><abbr
                            class="text-danger font-15 pl-1">{{__('*')}}</abbr></label>

                    <span class="float-right col-6 text-right"><span
                            class="skill_value">{{$row['diem']}}</span> Điểm<button
                            class="btn btn-sm btn-danger pt-0 pb-0 pr-1 pl-1 ml-1 remove-skill">{{__('-')}}</button></span>

                </h6>
                <input type="text" class="skill_append" value="{{$row['diem']}}" data-value="{{$row['diem']}}">
            </div>
        @endforeach
    @endif
@endif
