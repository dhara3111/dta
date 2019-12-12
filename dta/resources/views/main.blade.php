 <!DOCTYPE html>
<html lang="en" >
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />

    <title>@yield('title') | EOI 360</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_url" content="{{ URL('') }}">
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->

    <!--begin::Base Styles -->


    <!--begin::Page Vendors -->
    <link href="/theme/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" /><!--RTL version:<link href="/theme/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

    <!--end::Page Vendors -->


    <link href="/theme/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" /><!--RTL version:<link href="/theme/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

    <link href="/theme/demo/demo12/base/style.bundle.css" rel="stylesheet" type="text/css" /><!--RTL version:<link href="/theme/demo/demo12/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

    <!--end::Base Styles -->

    <link rel="shortcut icon" href="/theme/demo/demo12/media/img/logo/favicon.ico" />

    @yield('head-js')

    @yield('css')



</head>

    <body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >

    <div class="loading" style="display: none;">Loading&#8230;</div>
        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            @include('../header')

            @yield('content')


    @include('../footer')
        </div>

        @yield('js')
    </body>


</html>