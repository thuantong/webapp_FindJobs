{{--{{$nguoiTimViec != null}}--}}
@if($nguoiTimViec)
{{--    @if($ajaxCheck == '0')--}}
@foreach(unserialize($nguoiTimViec['ky_nang']) as $row)
<div class="pt-1">
    <h6 class="text-uppercase mt-0 row">
        <label class="skill-name col-6 mb-0 non-active" title="{{$row['name']}}">{{$row['name']}}</label>
        <span class="float-right col-6 text-right"><span
                class="skill_value">{{$row['value']}}</span>%</span></h6>
    <input type="text" class="skill_append" id="skill_append">
</div>
@endforeach
{{--        @else--}}

{{--        @endif--}}
{{--@else--}}
{{--    {{__('cc')}}--}}
{{--    <div class="pt-1">--}}
{{--        <h6 class="text-uppercase mt-0 row">--}}
{{--            <label class="skill-name col-6 mb-0 non-active" title="{{__('Nhập tên kỹ năng')}}">{{__('Nhập tên kỹ năng')}}</label>--}}
{{--            <span class="float-right col-6 text-right"><span--}}
{{--                    class="skill_value"></span>%</span></h6>--}}
{{--        <input type="text" class="skill_append" id="skill_append">--}}
{{--    </div>--}}
@endif


{{--<script type="text/javascript">--}}
{{--    // $('#php_skill')--}}
{{--    --}}
{{--</script>--}}
