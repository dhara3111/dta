
@extends('layouts.frontend.frontend_main')

@section('title')
    Change Password
@endsection

@section('content')

    <section>
        <div class="tz">

        @include('layouts.frontend.frontend_profile_left_menu')

        <!--CENTER SECTION-->
            <div class="tz-2">
                <div class="tz-2-com tz-2-main">
                    <h4>Manage My Profile</h4>
                    <div class="db-list-com tz-db-table">
                        <div class="ds-boar-title">
                            <h2>Change Password</h2>
                            <p>All the Lorem Ipsum generators on the All the Lorem Ipsum generators on the</p>
                        </div>
                        <div class="tz2-form-pay tz2-form-com">
                            <form id="changePasswordForm" class="col s12" action="{{route('frontend.changePassword.update',['id' => $user->id])}}" method="post">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="password" class="validate" name="current_password" id="current_password" value="">
                                        <label>Current Password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="password" class="validate" name="new_password" id="new_password" value="">
                                        <label>New Password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="password" class="validate" name="confirm_password" id="confirm_password" value="">
                                        <label>Confirm Password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s2">
                                        <i class="waves-effect waves-light btn-large full-btn waves-input-wrapper" style="">
                                            <input type="submit" value="submit" class="waves-button-input">
                                        </i>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!--RIGHT SECTION-->
        </div>
    </section>
    <!--END DASHBOARD-->
@endsection
@section('js')
    <script>
        $("#changePasswordForm").validate({
            rules: {
                current_password: {
                    required: true,
                },
                new_password: {
                    required: true,
                    minlength:8,
                    regex:'^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$',
                },
                confirm_password: {
                    required: true,
                    minlength:8,
                    regex:'^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$',
                    equalTo: "#new_password"
                },
            },
            message:{
                current_password: {
                    required: "Fill the Current Password",
                },
                new_password: {
                    required: "Enter the new password",
                    minlength:8
                },
                confirm_password: {
                    required: "Enter the confirm password",
                    minlength:8,
                    equalTo: "#new_password"
                },
            }
        });
    </script>
@endsection

