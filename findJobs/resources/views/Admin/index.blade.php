<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tìm việc làm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets\images\animat-diamond-color.gif')}}">

    <!-- plugin css -->
    <link href="{{asset('assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css">

    <!-- App css -->
    <link href="{{asset('assets\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    {{--    <link href="{{asset('assets\icon\font-awesome\font-awesome.min.css')}}" rel="stylesheet" type="text/css">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets\icon\themify-icons\themify-icons.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets\icon\font-awesome\css\font-awesome.min.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets\icon\icofont\css\icofont.css')}}">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets\icon\feather\css\feather.css')}}">
    {{--        <link href="{{asset('assets\css\icons.min.css')}}" rel="stylesheet" type="text/css">--}}
    <link href="{{asset('assets\css\app.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets\css\style-customs.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets\css\croppie\croppie.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets\css\croppie\demo.css')}}" rel="stylesheet" type="text/css">

</head>
<body>
trang quan tri
    @yield('content')
</body>
<!-- Vendor js -->
<script src="{{asset('assets\js\vendor.min.js')}}"></script>

<script src="{{asset('assets\libs\apexcharts\apexcharts.min.js')}}"></script>
<script src="{{asset('assets\libs\jquery-sparkline\jquery.sparkline.min.js')}}"></script>
{{--<script src="{{asset('assets\libs\jquery-vectormap\jquery-jvectormap-1.2.2.min.js')}}"></script>--}}
{{--<script src="{{asset('assets\libs\jquery-vectormap\jquery-jvectormap-world-mill-en.js')}}"></script>--}}

<!-- Peity chart-->
<script src="{{asset('assets\libs\peity\jquery.peity.min.js')}}"></script>
<script src="{{asset('assets\js\chat-js-customs.js')}}"></script>

<!-- init js -->
{{--<script src="{{asset('assets\js\pages\dashboard-2.init.js')}}"></script>chart--}}

<!-- App js -->
<script src="{{asset('assets\js\app.min.js')}}"></script>
<script src="{{asset('assets\js\customs-js-mine.js')}}"></script>
<script src="{{asset('assets\js\croppie\croppie.js')}}"></script>
</html>
