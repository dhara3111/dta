<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Profile | {{$otherDetail->website_name}} </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{asset('ourLogoImages/'.$otherDetail->favicon)}}" type="image/x-icon">
    <!-- GOOGLE FONT -->

    <!-- FONTAWESOME ICONS -->
    <link rel="stylesheet" href="{{asset('frontend/css/font-awesome.min.css')}}">
    <!-- ALL CSS FILES -->
    <link href="{{asset('frontend/css/materialize.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/custom.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />

    <!-- RESPONSIVE.CSS ONLY FOR MOBILE AND TABLET VIEWS -->
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">


</head>

<body>
<!--PRE LOADING-->

<div id="preloader">
    <div id="status">&nbsp;</div>
</div>

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
                        <a href="{{route('frontend.home.index')}}"><span class="color_fff"><img alt="" src="{{asset('ourLogoImages/'.$otherDetail->image)}}" style="margin-top: -8px;"/></span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="tz-login">
    <div class="tz-regi-form">
        <h4>Edit Profile</h4>
        <p>It's free and always will be.</p>
        <form id="register" class="col s12" action="{{ route('frontend.editProfile.update',['key'=>$key,'id'=>$id]) }}" method="post">
            {{ csrf_field() }}
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" name="name" id="name" class="validate" value="{{$user->name}}">
                    <label>User name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="email" class="validate" name="email" id="email" value="{{$user->email}}">
                    <label>Email id</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" class="validate" name="phone" id="phone" value="{{$user->phone}}">
                    <label>Mobile no</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" class="validate" name="street" id="street" value="{{$user->street}}">
                    <label>Street</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" class="validate" name="area" id="area" value="{{$user->area}}">
                    <label>Area</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" class="validate" name="state" id="state" value="{{$user->state}}">
                    <label>State</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" class="validate" name="city" id="city" value="{{$user->city}}">
                    <label>City</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" class="validate" name="zipcode" id="zipcode" value="{{$user->zipcode}}">
                    <label>Zipcode</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" class="validate" name="expertize_in" id="expertize_in" value="{{$user->expertize_in}}">
                    <label>Expertize In</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" class="validate" name="service_in_city" id="service_in_city" value="{{$user->service_in__city}}">
                    <label>Provided Service In City</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="password" class="validate" name="password" id="password">
                    <label>Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="password" class="validate" name="confirm_password" id="conf_password">
                    <label>Confirm Password</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="waves-effect waves-light btn-large full-btn waves-input-wrapper" style="">
                        <input type="submit" value="submit" class="waves-button-input">
                    </i>
                </div>
            </div>
        </form>
    </div>
</section>

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
<script src="{{asset('frontend/js/select2.min.js')}}"></script>
<script src="{{asset('frontend/js/custom.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/validation/jquery.validate.js') }}"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/additional-methods.js"></script>

<script>
    $(".select2").select2();
    // $.validator.addMethod(
    //         "regex",
    //         function(value, element, regexp) {
    //             var re = new RegExp(regexp);
    //             return this.optional(element) || re.test(value);
    //         },
    //         "Please check your input."
    // );
    $("#register").validate({
        rules: {
            name: {
                required: true,
            },
            email: {
                required: true,
                email:true
            },
            phone: {
                required: true,
                phoneUS: true
            },
            street: {
                required: true,
            },
            area: {
                required: true,
            },
            city: {
                required: true,
            },
            state: {
                required: true,
            },
            country: {
                required: true,
            },
            zipcode: {
                required: true,
                maxlength:6
            },
            expertize_in: {
                required: true,
            },
            service_in__city: {
                required: true,
            },
            password: {
                required: true,
            },
            confirm_password: {
                required: true,
                minlength:6,
                equalTo: "#password"
            },
        },
        messages: {
            name: {
                required: "Please Enter Name",
            },
            email: {
                required:  "Please Enter Email ID",
                email: "Please Enter Valid Email ID"
            },
            phone: {
                required:  "Please Enter Contact Number",
                phoneUS:  "Please Enter Valid Contact Number"
            },
            street: {
                required:  "Please Enter Street Address",
            },
            area: {
                required:  "Please Enter Area",
            },
            city: {
                required:  "Please Enter City",
            },
            state: {
                required:  "Please Enter State",
            },
            country: {
                required:  "Please Enter Country",
            },
            zipcode: {
                required:  "Please Enter Zipcode",
                maxlength:"Please Enter Valid Zipcode"
            },
            expertize_in: {
                required:  "Please Enter Your Experties",
            },
            service_in__city: {
                required:  "Please Enter Name of Cities you serve in",
            },
            password: {
                required:  "Please Enter Password"
            },
            confirm_password: {
                required:  "Please Enter Name",
                minlength:6,
                equalTo: "#password"
            },
        }
    });
</script>

</body>

</html>