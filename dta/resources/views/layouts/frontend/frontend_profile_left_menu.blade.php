<!--LEFT SECTION-->
<div class="tz-l">
    <div class="tz-l-1">
        <ul>
            <li><img src="{{asset('frontend/images/db-profile.jpg')}}" alt="" /> </li>
        </ul>
    </div>
    <div class="tz-l-2">
        <div class="sb2-13">
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                    <a href="{{ route('frontend.profile.index') }}" class="menu-active {{ Request::is('profile*') ? 'list-active color-white' : '' }}">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        Profile
                    </a> 
                </li>
                <li>
                    <a href="javascript:void(0)" class="collapsible-header {{ Request::is('lead-list*') || Request::is('my-order-list*') || Request::is('my-purchase-lead-list*') || Request::is('my-return-order*')? 'active' : '' }}">
                        <i class="fa fa-list-ul" aria-hidden="true"></i> Leads
                    </a>
                    <div class="collapsible-body left-sub-menu">
                        <ul class="collapsible">
                            <li><a class="{{ Request::is('lead-list*') ? 'list-active color-white' : '' }}" href="{{route('frontend.assignLead.index')}}">Assign Lead</a> </li>
                            <li><a class="{{ Request::is('my-purchase-lead-list*') ? 'list-active ' : '' }}" href="{{route('frontend.purchaseLead.index')}}">Purchase Lead</a> </li>
                            <li><a class="{{ Request::is('my-order-list*') ? 'list-active color-white' : '' }}" href="{{route('frontend.orderLead.index')}}">My Order</a> </li>
                            <li><a class="{{ Request::is('my-return-order*') ? 'list-active color-white' : '' }}" href="{{route('frontend.orderLead.refundOrder')}}">Return Order</a> </li>
                        </ul>
                    </div>
                </li>
                <li><a href="{{route('frontend.knowledge.index')}}" class="menu-active {{ Request::is('knowledge-based*') ? 'list-active color-white' : '' }}"><i class="fa fa-buysellads" aria-hidden="true"></i>
                        Knowledge Base</a> </li>
                <li><a href="#requestCallModal" data-toggle="modal" data-target="#requestCallModal" class="menu-active "><i class="fa fa-tachometer" aria-hidden="true"></i> Request Call Back</a> </li>
                <li><a href="#requestTrainingModal" data-toggle="modal" data-target="#requestTrainingModal" class="menu-active"><i class="fa fa-tachometer" aria-hidden="true"></i> Request Training</a> </li>
                <li><a href="{{ route('frontend.changePassword.index') }}" class="menu-active {{ Request::is('change-password*') ? 'list-active color-white' : '' }}"><i class="fa fa-cogs" aria-hidden="true"></i>
                        Change Password</a> </li>
            </ul>
        </div>
    </div>
</div>

<!--LEFT SECTION-->
{{--<div class="tz-l">--}}
    {{--<div class="tz-l-1">--}}
        {{--<ul>--}}
            {{--<li><img src="{{asset('frontend/images/db-profile.jpg')}}" alt="" /> </li>--}}
        {{--</ul>--}}
    {{--</div>--}}
    {{--<div class="tz-l-2">--}}
        {{--<ul  class="mainmenu">--}}
            {{--<li class=" {{ Request::is('profile*') ? 'tz-lma' : '' }}" >--}}
                {{--<a href="{{ route('frontend.profile.index') }}" >--}}
                    {{--<i class="fa fa-cogs"></i> My Profile--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="" class=" {{ Request::is('lead-list*') || Request::is('my-order-list*') || Request::is('my-return-order*')? 'tz-lma' : '' }}">--}}
                    {{--<i class="fa fa-bar-chart"></i>--}}
                    {{--Lead--}}
                {{--</a>--}}
                {{--<ul class="submenu">--}}
                    {{--<li>--}}
                        {{--<a href="{{route('frontend.assignLead.index')}}" >--}}
                             {{--Assign Lead--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{route('frontend.purchaseLead.index')}}" >--}}
                            {{--Purchase Lead--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{route('frontend.orderLead.index')}}" >--}}
                            {{--My Order--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{route('frontend.orderLead.refundOrder')}}">--}}
                             {{--Return Order--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</li>--}}

            {{--<li class=" {{ Request::is('knowledge-based*') ? 'tz-lma' : '' }}">--}}
                {{--<a href="{{route('frontend.knowledge.index')}}" class=" {{ Request::is('knowledge-Based*') ? 'tz-lma' : '' }}">--}}
                    {{--<i class="fa fa-buysellads" aria-hidden="true"></i>--}}
                    {{--Knowledge Based--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#requestCallModal" data-toggle="modal" data-target="#requestCallModal">--}}
                    {{--<i class="fa fa-buysellads" aria-hidden="true"></i>--}}
                    {{--Request Call Back--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
                {{--<a href="#requestTrainingModal" data-toggle="modal" data-target="#requestTrainingModal">--}}
                    {{--<i class="fa fa-buysellads" aria-hidden="true"></i>--}}
                    {{--Request Training--}}
                {{--</a>--}}
            {{--</li>--}}
            {{--<li class=" {{ Request::is('change-password*') ? 'tz-lma' : '' }}">--}}
                {{--<a href="{{ route('frontend.changePassword.index') }}" class=" {{ Request::is('Change-Password*') ? 'tz-lma' : '' }}">--}}
                    {{--<i class="fa fa-buysellads" aria-hidden="true"></i>--}}
                    {{--Change Password--}}
                {{--</a>--}}
            {{--</li>--}}
        {{--</ul>--}}
    {{--</div>--}}
{{--</div>--}}