
@extends('layouts.advertiser.advertiser_main')
@section('title')
    Change Password
@endsection

@section('content')


    <!-- begin::Body -->

    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">Change Password </h3>
                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                        <li class="m-nav__item m-nav__item--home">
                            <a href="{{ route('advertiser.dashboard.index') }}" class="m-nav__link m-nav__link--icon">
                                <i class="m-nav__link-icon la la-home"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- END: Subheader -->
        <div class="m-content">
            <div class="m-portlet m-portlet--mobile">
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Change Password
                            </h3>
                        </div>
                    </div>

                </div>
                <form id="changePasswordForm" class="m-form m-form--fit m-form--label-align-right" method="post" action="{{route('advertiser.changePassword.edit',['id' => $user->id])}}">
                    {{csrf_field()}}
                    <div class="m-portlet__body">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">Current Password</label>

                                    <input type="password" class="form-control m-input" name="current_password" id="current_password" value="{{old('current_password')}}" placeholder="Enter Current Password">
                                    @if ($errors->has('current_password'))
                                        <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('current_password') }}</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">New Password</label>
                                    <input type="password" class="form-control m-input" name="new_password" id="new_password" value="{{old('new_password')}}" placeholder="Enter New Password">
                                    @if ($errors->has('new_password'))
                                        <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('new_password') }}</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group m-form__group">
                                    <label for="exampleInputEmail1">Confirm Password</label>
                                    <input type="password" class="form-control m-input" name="confirm_password" id="confirm_password" value="{{old('confirm_password')}}" placeholder="Enter Confirm Password">
                                    @if ($errors->has('confirm_password'))
                                        <h6 class="m--font-danger m--margin-top-5">{{ $errors->first('confirm_password') }}</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__foot m-portlet__foot--fit">
                        <div class="row">
                            <div class="col-md-3"></div>
                                <div class="m-form__actions">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('advertiser.changePassword.index')}}" class="btn btn-secondary">Cancel</a>
                                </div>
                        </div>

                    </div>
                </form>

            </div>

        </div>
    </div>

    <!-- end:: Body -->
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('js/validation/jquery.validate.js') }}"></script>

    <script>

        $("#changePasswordForm").validate({
            rules: {
                current_password: {
                    required: true,
                },
                new_password: {
                    required: true,
                    minlength:6
                },
                confirm_password: {
                    required: true,
                    minlength:6,
                    equalTo: "#new_password"
                },
            }
        });

    </script>

@endsection