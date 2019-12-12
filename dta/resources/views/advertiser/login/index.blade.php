
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>Login | {{$otherDetail->website_name}}</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Web font -->

    <!--begin::Base Styles -->
    <link href="{{asset('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />

    <!--RTL version:<link href="/assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
    <link href="{{asset('assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />

    <!--RTL version:<link href="/assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

    <!--begin::Favicon Icon -->
    <link rel="shortcut icon" href="{{asset('ourLogoImages/'.$otherDetail->favicon)}}" />

    <style>
        .login-button {
            color: #fff;
            background-color: #da2129 ;
            border-color: #da2129 ;
        }
        .login-button:hover {
            color: #fff;
            background-color: #000000;
            border-color: #000000;
        }
    </style>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-grid__item m-grid__item--fluid   m-grid m-grid--desktop m-grid--ver-desktop m-grid--hor-tablet-and-mobile   m-login m-login--6" id="m_login">
        <div class="m-grid__item   m-grid__item--order-tablet-and-mobile-2  m-grid m-grid--hor m-login__aside " >
            <div class="m-grid__item">
                <div class="m-login__logo text-center">

                    <img src="{{asset('ourLogoImages/image.png')}}" style="padding-top:15%;width: 100%;" >

                    <h1 style="color:white;font-size:50px;">Direct To Attorney</h1>
                </div>
            </div>
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver">
                <div class="m-grid__item m-grid__item--middle">
                    <span class="m-login__title"></span>
                    <span class="m-login__subtitle"></span>
                </div>
            </div>
        </div>
        <div class="m-grid__item m-grid__item--fluid  m-grid__item--order-tablet-and-mobile-1  m-login__wrapper" >

            <!--begin::Body-->
            <div class="m-login__body">

                <!--begin::Signin-->
                <div class="m-login__signin">
                    <div class="m-login__title">
                        <img src="{{asset('ourLogoImages/'.$otherDetail->image)}}" alt="" class="m-b-20" style="height: 100px; width: 100%; ">
                        <h3 style="margin-top: 25px;">Advertiser Portal</h3>
                    </div>

                    <!--begin::Form-->
                    <form class="m-login__form m-form" method="POST" action="{{ route('advertiser.login.sign') }}">
                        @csrf

                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show   m-alert m-alert--air" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                </button>
                                <strong>Success!</strong> {{ Session::get('success') }}
                            </div>
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                </button>
                                <strong>Error!</strong> {{ Session::get('error') }}
                            </div>
                        @endif

                        <div class="form-group m-form__group">
                            {{--<input class="form-control m-input" type="text" placeholder="Email" name="username" autocomplete="off">--}}
                            <input id="email" type="email" placeholder="Email" class="m-input form-control form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}"  autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group m-form__group">
                            {{--<input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">--}}
                            <input id="password" type="password" placeholder="Password" class="m-input form-control form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>


                        <!--begin::Action-->
                        <div class="m-login__action">

                            <a href="{{ route('advertiser.forgetPassword.index') }}" id="" class="m-link" style="color: #000000;">Forgot Password ?</a>

                            <button type="submit" id="" class="btn login-button m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">Sign In</button>

                        </div>
                        <div class="text-center ">
                            Do not have an account?
                            <br>
                            <a href="{{ route('advertiser.signUp.index') }}" class="" style="color:#da2129">Create an account</a>
                        </div>

                        <!--end::Action-->

                    </form>

                    <!--end::Form-->

                </div>

                <!--end::Signin-->
            </div>

            <!--end::Body-->
        </div>
    </div>
</div>

<!-- end:: Page -->

<!--begin::Base Scripts -->
<script src="{{asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>

<!--end::Base Scripts -->

<!--begin::Page Snippets -->
<script src="{{asset('assets/snippets/custom/pages/user/login6.js')}}" type="text/javascript"></script>
<!--end::Page Snippets -->
<script type="text/javascript">
    $( document ).ready(function() {
        $(".m-select2").select2({
            placeholder: "Select a state"
        });
    });

    var baseUrl = $('meta[name="_url"]').attr('content');
    var token  = $('meta[name="csrf-token"]').attr('content');

    $(document).ready(function() {
        $('body').removeClass('swal2-height-auto');
    } );

    /** loading overlay start */
    function showLoading() {
        $('.loading').css('display', 'block');
    }

    function hideLoading() {
        $('.loading').css('display', 'none');
    }

    /** loading overlay end */
</script>

</body>

<!-- end::Body -->
</html>