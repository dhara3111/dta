<section>
    <div class="v3-top-menu">
        <div class="container">
            <div class="row">
                <div class="v3-menu">
                    <div class="v3-m-1">
                        <a href="{{route('frontend.home.index')}}">
                                <span class="color_fff">
                                    <img alt="" src="{{asset('frontend/images/logo.png')}}" style="margin-top: -8px;"/>
                                </span>
                        </a>
                    </div>
                    <div class="v3-m-2">

                    </div>
                    @if(auth()->user())
                        @if(auth()->user()->profile == 'frontend')
                            <div class="v3-m-12">
                                <!-- Dropdown Trigger -->
                                <a class='waves-effect dropdown-button top-user-pro' href='#' data-activates='top-menu' style="padding: 0px 20px;">
                                    <img src="{{asset('frontend/images/users/6.png')}}" alt="" />
                                    Welcome {{auth()->user()->name}}
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                                <!-- Dropdown Structure -->
                                <ul id='top-menu' class='dropdown-content top-menu-sty'>
                                    <li><a href="{{route('frontend.profile.index')}}" class="waves-effect"><i class="fa fa-cogs"></i>Profile</a> </li>
                                    <li><a href="{{route('frontend.assignLead.index')}}"><i class="fa fa-bar-chart"></i> Assign Lead</a> </li>
                                    <li><a href="{{route('frontend.purchaseLead.index')}}"><i class="fa fa-buysellads" aria-hidden="true"></i>Purchase Lead</a> </li>
                                    <li><a href="{{route('frontend.knowledge.index')}}"><i class="fa fa-buysellads" aria-hidden="true"></i>Knowledge Based</a> </li>
                                    <li><a href="#requestCallModal" data-toggle="modal" data-target="#requestCallModal"><i class="fa fa-buysellads" aria-hidden="true"></i>Request Call Back</a> </li>
                                    <li><a href="#requestTrainingModal" data-toggle="modal" data-target="#requestTrainingModal"><i class="fa fa-buysellads" aria-hidden="true"></i>Request Training</a> </li>
                                    <li><a href="{{route('frontend.changePassword.index')}}"><i class="fa fa-buysellads" aria-hidden="true"></i>Change Password</a> </li>
                                    <li><a href="{{ route('frontend.login.logout') }}" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a> </li>
                                </ul>
                            </div>
                        @else
                            <div class="v3-m-4">
                                <div class="v3-top-ri">
                                    <ul>
                                        <li><a href="{{route('frontend.login.index')}}" class="v3-menu-sign"><i class="fa fa-sign-in"></i> Sign In</a> </li>
                                        <li><a href="{{route('frontend.register.index')}}" class="v3-add-bus"><i class="fa fa-plus" aria-hidden="true"></i> Register</a> </li>
                                        <li><a href="{{route('frontend.helpline.index')}}">Help<img src="{{asset('frontend/images/question1.png')}}"></a></li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="v3-m-4">
                            <div class="v3-top-ri">
                                <ul>
                                    <li><a href="{{route('frontend.login.index')}}" class="v3-menu-sign"><i class="fa fa-sign-in"></i> Sign In</a> </li>
                                    <li><a href="{{route('frontend.register.index')}}" class="v3-add-bus"><i class="fa fa-plus" aria-hidden="true"></i> Register</a> </li>
                                    <li><a href="{{route('frontend.helpline.index')}}">Help<img src="{{asset('frontend/images/question1.png')}}"></a></li>
                                </ul>
                            </div>
                        </div>
                    @endif
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
                        <a href="{{route('frontend.home.index')}}">
                                <span class="color_fff">
                                   <img alt="" src="{{asset('frontend/images/logo.png')}}" style="margin-top: 3px;width: 179px;"/>
                                </span>
                        </a>
                    </div>
                    @if(auth()->user())
                        @if(auth()->user()->profile == 'frontend')
                            <div class="v3-mob-m-2">
                                <div class="v3-top-ri">
                                    <ul>
                                        <li><a href="{{route('frontend.register.index')}}" data-toggle="modal" data-target="#register">Register</a> </li>
                                        <li><a href="{{route('frontend.login.index')}}" data-toggle="modal" data-target="#sign-in">Sign In</a> </li>
                                        <li><a href="#" class="ts-menu-5" id="v3-mob-menu-btn"><i class="fa fa-bars" aria-hidden="true"></i>My Account</a> </li>
                                    </ul>
                                </div>
                            </div>
                        @else
                            <div class="v3-mob-m-2">
                                <div class="v3-top-ri">
                                    <ul>
                                        <li><a href="{{route('frontend.register.index')}}" data-toggle="modal" data-target="#register">Register</a> </li>
                                        <li><a href="{{route('frontend.login.index')}}" data-toggle="modal" data-target="#sign-in">Sign In</a> </li>
                                        <li><a href="#" class="ts-menu-5" id="v3-mob-menu-btn"><i class="fa fa-bars" aria-hidden="true"></i>Menu</a> </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="v3-mob-m-2">
                            <div class="v3-top-ri">
                                <ul>
                                    <li><a href="{{route('frontend.register.index')}}" data-toggle="modal" data-target="#register">Register</a> </li>
                                    <li><a href="{{route('frontend.login.index')}}" data-toggle="modal" data-target="#sign-in">Sign In</a> </li>
                                    <li><a href="#" class="ts-menu-5" id="v3-mob-menu-btn"><i class="fa fa-bars" aria-hidden="true"></i>Menu</a> </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @if(auth()->user())
        @if(auth()->user()->profile == 'frontend')
            <div class="mob-right-nav" data-wow-duration="0.5s">
                <div class="mob-right-nav-close"><i class="fa fa-times" aria-hidden="true"></i> </div>
                <h5>Welcome : {{auth()->user()->name}}</h5>
                <ul class="mob-menu-icon">
                    <li><a href="{{route('frontend.profile.index')}}" class="waves-effect"><i class="fa fa-cogs"></i>Profile</a> </li>
                    <li><a href="{{route('frontend.assignLead.index')}}"><i class="fa fa-bar-chart"></i> Assign Lead</a> </li>
                    <li><a href="{{route('frontend.purchaseLead.index')}}"><i class="fa fa-buysellads" aria-hidden="true"></i>Purchase Lead</a> </li>
                    <li><a href="{{route('frontend.knowledge.index')}}"><i class="fa fa-buysellads" aria-hidden="true"></i>Knowledge Based</a> </li>
                    <li><a href="#requestCallModal" data-toggle="modal" data-target="#requestCallModal"><i class="fa fa-buysellads" aria-hidden="true"></i>Request Call Back</a> </li>
                    <li><a href="#requestTrainingModal" data-toggle="modal" data-target="#requestTrainingModal"><i class="fa fa-buysellads" aria-hidden="true"></i>Request Training</a> </li>
                    <li><a href="{{route('frontend.changePassword.index')}}"><i class="fa fa-buysellads" aria-hidden="true"></i>Change Password</a> </li>
                    <li><a href="{{ route('frontend.login.logout') }}" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a> </li>
                </ul>
            </div>
        @else
            <div class="mob-right-nav" data-wow-duration="0.5s">
                <div class="mob-right-nav-close"><i class="fa fa-times" aria-hidden="true"></i> </div>
                <h5>Menu</h5>
                <ul class="mob-menu-icon">
                    <li><a href="{{route('frontend.register.index')}}" data-toggle="modal" data-target="#register">Register</a> </li>
                    <li><a href="{{route('frontend.login.index')}}" data-toggle="modal" data-target="#sign-in">Sign In</a> </li>
                    <li><a href="{{route('frontend.helpline.index')}}">Help</a></li>
                </ul>
            </div>
        @endif
    @else
        <div class="mob-right-nav" data-wow-duration="0.5s">
            <div class="mob-right-nav-close"><i class="fa fa-times" aria-hidden="true"></i> </div>
            <h5>Menu</h5>
            <ul class="mob-menu-icon">
                <li><a href="{{route('frontend.register.index')}}" data-toggle="modal" data-target="#register">Register</a> </li>
                <li><a href="{{route('frontend.login.index')}}" data-toggle="modal" data-target="#sign-in">Sign In</a> </li>
                <li><a href="{{route('frontend.helpline.index')}}">Help</a></li>
            </ul>
        </div>
    @endif
</section>