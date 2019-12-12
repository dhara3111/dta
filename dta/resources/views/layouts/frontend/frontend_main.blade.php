<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') | {{$otherDetail->website_name}} </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_url" content="{{ URL('') }}">
    @yield('meta')

    @include('layouts.frontend.frontend_header_script')
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

    <style>
        .tz2-form-com form {
            padding: 15px 20px 12px 20px !important;
            background: #eaedef;
            margin-top: 5px !important;
        }

        /* define a fixed width for the entire menu */
        .navigation {
            width: 300px;
        }

        /* reset our lists to remove bullet points and padding */
        .mainmenu, .submenu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        /* make ALL links (main and submenu) have padding and background color */
        .mainmenu a {
            display: block;
            /*background-color: #CCC;*/
            text-decoration: none;
            padding: 10px;
            color: #000;
        }

        /* add hover behaviour */
        .mainmenu a:hover {
            background-color: #C5C5C5;
        }


        /* when hovering over a .mainmenu item,
          display the submenu inside it.
          we're changing the submenu's max-height from 0 to 200px;
        */

        .mainmenu li:hover .submenu {
            display: block;
            max-height: 200px;
        }

        /*
          we now overwrite the background-color for .submenu links only.
          CSS reads down the page, so code at the bottom will overwrite the code at the top.
        */

        .submenu a {
            /*background-color: #999;*/
            margin-left: 30px;
        }

        /* hover behaviour for links inside .submenu */
        .submenu a:hover {
            background-color: red;
        }

        /* this is the initial state of all submenus.
          we set it to max-height: 0, and hide the overflowed content.
        */
        .submenu {
            overflow: hidden;
            max-height: 0;
            -webkit-transition: all 0.5s ease-out;
        }

    </style>

    @yield('head-js')

    @yield('css')

</head>

<body >
<!--PRE LOADING-->

{{--<div id="preloader">--}}
{{--<div id="status">&nbsp;</div>--}}
{{--</div>--}}

@include('layouts.frontend.frontend_header')

@yield('content')

@if(auth()->user())

    <!-- Request Call Modal Start-->

    <div class="modal fade" id="requestCallModal" role="dialog">
        <div class="modal-dialog modal-mg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> <i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Request a CallBack</h4>
                </div>
                <div class="modal-body">
                    <div class="tz2-form-pay tz2-form-com" >
                        <form class="col s12" action="{{route('frontend.requestCall.store')}}" method="post" >
                            {{ csrf_field() }}

                            <input type="hidden" name="user_id" id="user_id" class="validate" value="{{auth()->user()->id}}" readonly >

                            <fieldset>
                                <legend>Phone Number</legend>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input type="text" name="phone" id="phone" class="validate" value="{{old('phone')}}">
                                        <label>Phone Number</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <div class="select-wrapper">
                                            <span class="caret">▼</span>
                                            <select class="initialized" name="time_to_call" id="time_to_call">
                                                <option value=""><label>Best Time To Call You</label></option>
                                                <option value="Immediately">Immediately</option>
                                                <option value="Morning">Morning</option>
                                                <option value="Afternoon">Afternoon</option>
                                                <option value="Evening">Evening</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                            <fieldset>
                                <legend>Call Request Information</legend>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <p><b>To better serve you and have someone specialized call you, please explain the  reason for the call request:</b></p>
                                    </div>
                                    <div class="input-field col s12">
                                        <textarea name="request_info" id="request_info" class="validate" style="height: 150px !important;">{{old('info')}}</textarea>
                                        <label>Call Request Information</label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="modal-footer ">
                                <div class="col-md-8">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" value="submit" name="submit" class="btn btn-primary" >Request Calling</button>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Request Call Modal End-->

    <!-- Request Training Modal Start-->

    <div class="modal fade" id="requestTrainingModal" role="dialog">
        <div class="modal-dialog modal-mg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> <i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Request a CallBack</h4>
                </div>
                <div class="modal-body">
                    <div class="tz2-form-pay tz2-form-com" >
                        <form class="col s12" action="{{route('frontend.requestTraining.store')}}" method="post" >
                            {{ csrf_field() }}

                            <input type="hidden" name="user_id" id="user_id" class="validate" value="{{auth()->user()->id}}" readonly >

                            <fieldset>
                                <legend>Availability Information</legend>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <p><b>Please provide three different time frames and we will try our best to schedule your training on that time.</b></p>
                                    </div>
                                    <div class="input-field col s6">
                                        <div class="select-wrapper">
                                            <span class="caret">▼</span>
                                            <select class="initialized" name="day_1" id="day_1">
                                                <option value=""><label>Day 1</label></option>
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-field col s6">
                                        <div class="select-wrapper">
                                            <span class="caret">▼</span>
                                            <select class="initialized" name="best_time_1" id="best_time_1">
                                                <option value=""><label>Best Time</label></option>
                                                <option value="Morning">Morning</option>
                                                <option value="Afternoon">Afternoon</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <div class="select-wrapper">
                                            <span class="caret">▼</span>
                                            <select class="initialized" name="day_2" id="day_2">
                                                <option value=""><label>Day 2</label></option>
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-field col s6">
                                        <div class="select-wrapper">
                                            <span class="caret">▼</span>
                                            <select class="initialized" name="best_time_2" id="best_time_2">
                                                <option value=""><label>Best Time</label></option>
                                                <option value="Morning">Morning</option>
                                                <option value="Afternoon">Afternoon</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <div class="select-wrapper">
                                            <span class="caret">▼</span>
                                            <select class="initialized" name="day_3" id="day_3">
                                                <option value=""><label>Day 3</label></option>
                                                <option value="Monday">Monday</option>
                                                <option value="Tuesday">Tuesday</option>
                                                <option value="Wednesday">Wednesday</option>
                                                <option value="Thursday">Thursday</option>
                                                <option value="Friday">Friday</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-field col s6">
                                        <div class="select-wrapper">
                                            <span class="caret">▼</span>
                                            <select class="initialized" name="best_time_3" id="best_time_3">
                                                <option value=""><label>Best Time</label></option>
                                                <option value="Morning">Morning</option>
                                                <option value="Afternoon">Afternoon</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <br>
                            <fieldset>
                                <legend>Training Topics</legend>
                                <div class="row">
                                    <div class="input-field col s2">
                                        <p><b>Topics:</b></p>
                                    </div>
                                    <div class="input-field col s10">
                                        <textarea name="topics" id="topics" class="validate" style="height: 150px !important;">{{old('topics')}}</textarea>
                                        <label>Topics</label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="modal-footer ">
                                <div class="col-md-8">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" value="submit" name="submit" class="btn btn-primary" >Request Training</button>
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Request Training Modal End-->
@endif

@include('layouts.frontend.frontend_footer')

@include('layouts.frontend.frontend_footer_script')


@yield('js')

</body>

</html>