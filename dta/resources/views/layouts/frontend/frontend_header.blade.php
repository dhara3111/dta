<section>
    <div class="v3-top-menu">
        <div class="container">
            <div class="row">
                <div class="v3-menu">
                    <div class="v3-m-1">
                        <a href="{{route('frontend.home.index')}}">
                            <span class="color_fff">
                                <img alt="" src="{{asset('ourLogoImages/'.$otherDetail->image)}}" style="margin-top: -11px;"/>
                            </span>
                        </a>
                    </div>
                    <!--<div class="v3-m-2">-->
                    <!--</div>-->
                    @if(auth()->user())
                        @if(auth()->user()->profile == 'frontend')
                            <div class="v3-m-12 " align="right">
                                <ul >
                                    <li>
                                        <a class='dropdown-button ed-sub-menu' href='#' data-activates='drop-mega-dash' style="padding: 0px 20px;">
                                            <img src="{{asset('frontend/images/users/6.png')}}" alt="" style=" height: 35px;"/>
                                            <span style="padding-left: 10px;">My Profile</span>
                                        </a>
                                        <ul id="drop-mega-dash" class="dropdown-content" style="">
                                            <li><a href="{{route('frontend.profile.index')}}" class="waves-effect"><i class="fa fa-cogs"></i>Profile</a> </li>
                                            <li><a href="{{route('frontend.knowledge.index')}}"><i class="fa fa-buysellads" aria-hidden="true"></i>Knowledge Based</a> </li>
                                            <li><a href="#requestCallModal" data-toggle="modal" data-target="#requestCallModal"><i class="fa fa-tachometer" aria-hidden="true"></i>Request Call Back</a> </li>
                                            <li><a href="#requestTrainingModal" data-toggle="modal" data-target="#requestTrainingModal"><i class="fa fa-tachometer" aria-hidden="true"></i>Request Training</a> </li>
                                            <li><a href="{{route('frontend.changePassword.index')}}"><i class="fa fa-buysellads" aria-hidden="true"></i>Change Password</a> </li>
                                            <li><a href="{{ route('frontend.login.logout') }}" class="ho-dr-con-last waves-effect"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a> </li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- Dropdown Structure -->
                                <ul id='top-menu' class='dropdown-content top-menu-sty'>
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
                                   <img alt="" src="{{asset('ourLogoImages/'.$otherDetail->image)}}" style="margin-top: 3px;width: 179px;"/>
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
                    <li><a href="{{route('frontend.profile.index')}}" class="waves-effect"><i class="fa fa-user"></i>Profile</a> </li>
                    <li><a href="{{route('frontend.assignLead.index')}}"><i class="fa fa-bar-chart"></i> Assign Lead</a> </li>
                    <li><a href="{{route('frontend.purchaseLead.index')}}"><i class="fa fa-buysellads" aria-hidden="true"></i>Purchase Lead</a> </li>
                    <li><a href="{{route('frontend.orderLead.index')}}"><i class="fa fa-bar-chart"></i>My Order</a> </li>
                    <li><a href="{{route('frontend.orderLead.refundOrder')}}"><i class="fa fa-bar-chart"></i>Return Order</a> </li>
                    <li><a href="{{route('frontend.knowledge.index')}}"><i class="fa fa-buysellads" aria-hidden="true"></i>Knowledge Based</a> </li>
                    <li><a href="#requestCallModal" data-toggle="modal" data-target="#requestCallModal"><i class="fa fa-tachometer" aria-hidden="true"></i>Request Call Back</a> </li>
                    <li><a href="#requestTrainingModal" data-toggle="modal" data-target="#requestTrainingModal"><i class="fa fa-tachometer" aria-hidden="true"></i>Request Training</a> </li>
                    <li><a href="{{route('frontend.changePassword.index')}}"><i class="fa fa-cogs" aria-hidden="true"></i>Change Password</a> </li>
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