<!DOCTYPE html>
<html lang="en" >
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />

    <title>@yield('title') | {{$otherDetail->website_name}}</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_url" content="{{ URL('') }}">
    @yield('meta')

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
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>

    <link href="{{asset('css/loader.css')}}" rel="stylesheet" type="text/css" />

    <!--begin::Page Vendors -->
    <link href="{{asset('theme/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors -->

    <!--begin::Base Styles -->
    <link href="{{asset('theme/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/demo/demo12/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--end::Base Styles -->

    <!--begin::Favicon Icon -->
    <link rel="shortcut icon" href="{{asset('ourLogoImages/'.$otherDetail->favicon)}}" />


    @yield('head-js')

    @yield('css')
</head>

<body  class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >

    <div class="loading" style="display: none;">Loading&#8230;</div>
    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">

        @include('layouts.admin.admin_top_header')

        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">

            <!-- BEGIN: Left Aside -->
            <button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn"><i class="la la-close"></i></button>

            @include('layouts.admin.admin_side_bar_menu')

            @yield('content')

        </div>

        @include('layouts.admin.admin_footer')

    </div>
    <!-- end:: Page -->

    @include('layouts.admin.admin_footer_script')

    @yield('js')
</body>
</html>