<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>Sign-Up | {{$otherDetail->website_name}}</title>
    <meta name="description" content="Default form examples">
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
    <link rel="shortcut icon" href="{{asset('ourLogoImages/'.$otherDetail->favicon)}}" />
    <!--end::Web font -->
    <!--begin::Base Styles -->
    <link href="{{asset('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--RTL version:<link href="{{asset('assets/vendors/base/vendors.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />-->
    <link href="{{asset('assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <!--RTL version:<link href="{{asset('assets/demo/default/base/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />-->
    <!--end::Base Styles -->
    <link rel="shortcut icon" href="{{asset('assets/demo/default/media/img/logo/favicon.ico')}}" />
</head>
<!-- end::Head -->
<!-- begin::Body -->
<style type="text/css">
    .form-control{
        border: 1px solid #CACFD5;
    }
    .select2-container--default .select2-selection--multiple, .select2-container--default .select2-selection--single {
        border: 1px solid #EBEDF2;
        border: 1px solid
        #CACFD5;
    }
</style>
<body>
<!-- END: Left Aside -->
<div class="m-wrapper">
    <section style="background: whitesmoke;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        {{--m-portlet--}}
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-login__title" style="margin-top: 10px;">
                                    <img src="{{asset('ourLogoImages/'.$otherDetail->image)}}" alt="" class="m-b-20" style="height: 50px; width: 20%;margin-left: 35px; ">
                                </div>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <form class="m-form m-form--fit" method="POST" action="{{ route('advertiser.signUp.store') }}">
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

                            <div class="m-portlet__body">
                                <div class="m-form__section m-form__section--first">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="m-form__heading">
                                                <h2 class="m-form__heading-title" style="margin-top: 35px;">Advertiser Sign Up</h2>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="m-form__heading">
                                                <h4 class="m-form__heading-title">Company Info:</h4>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 " style="padding-top: 15px;">
                                            <div class="form-group m-form__group">
                                                <label for="example_input_full_name">Company Name</label>
                                                <input type="text" name="company_name" id="company_name" class="form-control m-input {{ $errors->has('company_name') ? ' is-invalid' : '' }}" placeholder="Company Name">
                                                @if ($errors->has('company_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('company_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-12" style="padding-top: 15px;">
                                            <div class="form-group m-form__group">
                                                <label>Company Website</label>
                                                <input type="text" name="company_website" id="company_website" class="form-control m-input {{ $errors->has('company_website') ? ' is-invalid' : '' }}" placeholder="Company Website">
                                                @if ($errors->has('company_website'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('company_website') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="padding-top: 15px;">
                                            <div class="form-group m-form__group">
                                                <label for="example_input_full_name">Address</label>
                                                <textarea name="address" id="address" class="form-control m-input {{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="Address"></textarea>
                                                {{--<input type="text" name="address" id="address" class="form-control m-input" placeholder="Address">--}}
                                                @if ($errors->has('address'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('address') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="padding-top: 15px;">
                                            <div class="form-group m-form__group">
                                                <label>Address 2</label>
                                                <textarea name="address2" id="address2" class="form-control m-input {{ $errors->has('address2') ? ' is-invalid' : '' }}" placeholder="Address2"></textarea>
                                                {{--<input type="text" name="address2" id="address2"  class="form-control m-input" placeholder="Address 2">--}}
                                                @if ($errors->has('address2'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('address2') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="padding-top: 15px;">
                                            <div class="form-group m-form__group">
                                                <label>City</label>
                                                <input type="text" name="city" id="city" class="form-control m-input {{ $errors->has('city') ? ' is-invalid' : '' }}" placeholder="City">
                                                @if ($errors->has('city'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('city') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="padding-top: 15px;">
                                            <div class="form-group m-form__group">
                                                <label class=""> State</label>
                                                <input type="text" name="state" id="state" class="form-control m-input {{ $errors->has('state') ? ' is-invalid' : '' }}" placeholder="State">
                                                @if ($errors->has('state'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('state') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="padding-top: 15px;">
                                            <div class="form-group m-form__group">
                                                <label class="">Country</label>
                                                <input type="text" name="country" id="country" class="form-control m-input {{ $errors->has('country') ? ' is-invalid' : '' }}" placeholder="Country">
                                                @if ($errors->has('country'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('country') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="padding-top: 15px;">
                                            <div class="form-group m-form__group">
                                                <label>Zip Code</label>
                                                <input type="text" name="zipcode" id="zipcode" class="form-control m-input {{ $errors->has('zipcode') ? ' is-invalid' : '' }}" placeholder="Zip Code">
                                                @if ($errors->has('zipcode'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('zipcode') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="col-lg-12" style="margin-top: 35px;">
                                            <div class="m-form__heading">
                                                <h3 class="m-form__heading-title">User Details:</h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-12" style="padding-top: 15px;">
                                            <div class="form-group m-form__group">
                                                <label>Email</label>
                                                <input type="text" name="email" id="email" class="form-control m-input {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email">
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="padding-top: 15px;">
                                            <div class="form-group m-form__group">
                                                <label>First Name</label>
                                                <input type="text" name="first_name" id="first_name" class="form-control m-input {{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="First Name">
                                                @if ($errors->has('first_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('first_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="padding-top: 15px;">
                                            <div class="form-group m-form__group">
                                                <label>Last Name</label>
                                                <input type="text" name="last_name" id="last_name" class="form-control m-input {{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="Last Name">
                                                @if ($errors->has('last_name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('last_name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="padding-top: 15px;">
                                            <div class="form-group m-form__group">
                                                <label>Title</label>
                                                <input type="text" name="title" id="title" class="form-control m-input {{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="Title">
                                                @if ($errors->has('title'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('title') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="padding-top: 15px;">
                                            <div class="form-group m-form__group">
                                                <label>Phone Number</label>
                                                <input type="text" name="phone" id="phone" class="form-control m-input {{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="Phone Number" onkeypress="javascript:return digitOnly(event)">
                                                @if ($errors->has('phone'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('phone') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="padding-top: 15px;">
                                            <div class="form-group m-form__group">
                                                <label>Password</label>
                                                <input type="password" name="password" id="password" class="form-control m-input {{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password">
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="padding-top: 15px;">
                                            <div class="form-group m-form__group">
                                                <label>Confirm Password</label>
                                                <input type="password" name="confirm_password" id="confirm_password" class="form-control m-input {{ $errors->has('confirm_password') ? ' is-invalid' : '' }}" placeholder="Confirm Password">
                                                @if ($errors->has('confirm_password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions--solid">
                                    <button type="submit" name="submit" value="Submit" class="btn btn-danger">Submit</button>

                                    <button type="reset" class="btn btn-metal">Cancel</button>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!--begin::Base Scripts -->
<script src="{{asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/demo/default/custom/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>
<!--begin::Page Snippets -->
<script src="{{asset('assets/demo/default/custom/components/base/sweetalert2.js')}}" type="text/javascript"></script>
<!--end::Page Snippets -->
<script type="text/javascript">
    $("#signUpForm").validate({
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

    $('textarea').each(function () {
            $(this).val($(this).val().trim());
        }
    );

    function digitOnly(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode < 48 || iKeyCode > 57)
            return false;

        return true;
    }

</script>

<!--end::Base Scripts -->
</body>
<!-- end::Body -->
</html>