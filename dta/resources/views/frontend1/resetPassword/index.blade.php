
<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | {{$otherDetail->website_name}} </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{asset('ourLogoImages/'.$otherDetail->favicon)}}" type="image/x-icon">
    <!-- GOOGLE FONT -->

    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">
    <!-- ALL CSS FILES -->
    <link href="{{asset('frontend/css/materialize.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />

    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
<!--PRE LOADING-->

{{--<div id="preloader">--}}
{{--<div id="status">&nbsp;</div>--}}
{{--</div>--}}

<section>
    <div class="v3-top-menu">
        <div class="container">
            <div class="row">
                <div class="v3-menu">
                    <div class="v3-m-1">
                        <a href="{{route('frontend.home.index')}}">
                            <span class="color_fff">
                                <img alt="" src="{{asset('ourLogoImages/'.$otherDetail->image)}}" style="margin-top: -8px;"/>
                            </span>
                        </a>
                    </div>
                    <div class="v3-m-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="v3-mob-top-menu">
        <div class="container">
            <div class="row">
                <div class="v3-mob-menu">
                    <div class="v3-mob-m-1">
                        <a href="{{route('frontend.home.index')}}"><span class="color_fff">Direct To Attorney</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="tz-register">
    <div class="log-in-pop">
        <div class="log-in-pop-left" style="height: 388px;">
            <h1>Hello Attorney... <span></span></h1>
            <p>Don't have an account? Create your account. It's take less then a minutes</p>
            <h4>New User ?</h4>
            <ul>
                <li>
                    <a href="{{route('frontend.register.index')}}" class="v3-add-bus">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Register
                    </a>
                </li>
            </ul>
        </div>
        <div class="log-in-pop-right">
            <h4>Reset Password</h4>
            <p>Please enter your new password and confirm password.</p>

            <form id="resetPassword" class="s12" action="{{route('frontend.resetPassword.reset',['key'=>$key,'id'=>$id])}}" method="get">
                {{ csrf_field() }}
                @if(Session::has('error'))
                    <div class="alert alert-danger wow fadeInRight delay-03s" role="alert" style="visibility: visible; animation-name: fadeInRight;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>Error!</strong> {{ Session::get('error') }}
                    </div>
                @endif
                <div>
                    <div class="input-field s12">
                        <input type="text" name="new_password" id="new_password" class="input-text" placeholder="Enter new password">
                        @if ($errors->has('new_password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('new_password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="input-field s12">
                        <input type="text" name="confirm_password" id="confirm_password" class="input-text" placeholder="Enter confirm password">
                        @if ($errors->has('confirm_password'))
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('confirm_password') }}</strong>
                                </span>
                        @endif
                    </div>
                </div>
                <div class="checkbox">
                    <a href="{{ route('frontend.login.index') }}" class="link-not-important pull-right">Are you a already member ? Login </a>
                    <br>
                </div>
                <div>
                    <div class="input-field s4">
                        <input type="submit" value="submit" class="waves-effect waves-light log-in-btn">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!--MOBILE APP-->
<!--FOOTER SECTION-->
<footer id="colophon" class="site-footer clearfix" style="padding: 0px 0 50px !important;">
    <div id="quaternary" class="sidebar-container " role="complementary">
        <div class="sidebar-inner">
            <div class="widget-area clearfix">
                <div id="azh_widget-2" class="widget widget_azh_widget">
                    <div data-section="section" class="foot-sec2">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4 col-md-3 foot-logo">
                                    <h4>Address</h4>
                                    <p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A. Landmark : Next To Airport</p>
                                    <p> <span class="strong">Phone: </span> <span class="highlighted">+01 1245 2541</span> </p>
                                </div>

                                <div class="col-md-4">
                                    <h4>Timing</h4>
                                    <p>Monday : 10:00 AM - 6:00 PM</p>
                                    <p>Tuesday : 10:00 AM - 6:00 PM</p>
                                    <p>Wednesday : 10:00 AM - 6:00 PM</p>
                                    <p>Thursday : 10:00 AM - 6:00 PM</p>
                                    <p>Friday : 10:00 AM - 6:00 PM</p>
                                    <p>Saturday - Sunday off</p>

                                </div>
                                <div class="col-md-5 foot-social">
                                    <h4>Follow with us</h4>
                                    <p>Join the thousands of other There are many variations of passages of Lorem Ipsum available</p>
                                    <ul>
                                        <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                        <li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                        <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                                        <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                        <li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
                                        <li><a href="#!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- .widget-area -->
        </div>
        <!-- .sidebar-inner -->
    </div>
    <!-- #quaternary -->
</footer>
<!--COPY RIGHTS-->
<section class="copy">
    <div class="container">
        <p>© 2019 <lable style="color:#da2129;">{{$otherDetail->website_name}}</lable>.</p>
    </div>
</section>

<!--SCRIPT FILES-->
<script src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/js/materialize.min.js')}}" type="text/javascript"></script>
<script src="{{asset('frontend/js/custom.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/validation/jquery.validate.js') }}"></script>

<script>
    $("#resetPassword").validate({
        rules: {
            new_password: {
                required: true,
            },
            confirm_password: {
                required: true,
                equalTo: "#new_password"
            },
        }
    });
</script>


</body>

</html>

