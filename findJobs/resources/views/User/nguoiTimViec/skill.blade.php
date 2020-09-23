{{--{{$nguoiTimViec != null}}--}}
@if($nguoiTimViec)
    {{--    @if($ajaxCheck == '0')--}}
    @if($nguoiTimViec['ky_nang'] != '')
        @foreach(unserialize($nguoiTimViec['ky_nang']) as $row)
            {{--            {{$row['value']}}--}}
            <div class="pt-1">
                <h6 class="text-uppercase mt-0 row">
                    <label class="skill-name col-6 mb-0 non-active" data-value="{{$row['value']}}" data-prefix = "{{$row['prefix']}}" title="{{$row['name']}}">{{$row['name']}}</label>
                    <span class="float-right col-6 text-right"><span
                            class="skill_value"></span> Điểm</span></h6>
                <input type="text" class="skill_append" data-value="{{$row['value']}}" id="skill_append">
            </div>
        @endforeach
    @endif

@endif


{{--<script type="text/javascript">--}}
{{--    // $('#php_skill')--}}
{{--    --}}
{{--</script>--}}
