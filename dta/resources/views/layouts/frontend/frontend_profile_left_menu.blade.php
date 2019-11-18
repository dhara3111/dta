<!--LEFT SECTION-->
<div class="tz-l">
    <div class="tz-l-1">
        <ul>
            <li><img src="{{asset('frontend/images/db-profile.jpg')}}" alt="" /> </li>
        </ul>
    </div>
    <div class="tz-l-2">
        <ul>
            <li class=" {{ Request::is('My-Profile*') ? 'tz-lma' : '' }}" >
                <a href="{{ route('frontend.profile.index') }}" >
                    <img src="{{asset('frontend/images/icon/dbl6.png')}}" alt="" /> My Profile
                </a>
            </li>
            <li>
                <a href="{{route('frontend.assignLead.index')}}" class=" {{ Request::is('Lead-List*') ? 'tz-lma' : '' }}">
                    <img src="{{asset('frontend/images/icon/dbl6.png')}}" alt="" /> Assign Lead
                </a>
            </li>
            <li>
                <a href="{{route('frontend.purchaseLead.index')}}" class=" {{ Request::is('Purchase-Lead-List*') ? 'tz-lma' : '' }}">
                    <img src="{{asset('frontend/images/icon/dbl6.png')}}" alt="" /> Purchase Lead
                </a>
            </li>
            <li>
                <a href="{{route('frontend.knowledge.index')}}" class=" {{ Request::is('knowledge-Based*') ? 'tz-lma' : '' }}">
                    <img src="{{asset('frontend/images/icon/dbl6.png')}}" alt="" />
                    Knowledge Based
                </a>
            </li>
            <li>
                <a href="{{ route('frontend.changePassword.index') }}" class=" {{ Request::is('Change-Password*') ? 'tz-lma' : '' }}">
                    <img src="{{asset('frontend/images/icon/dbl6.png')}}" alt="" />Change Password
                </a>
            </li>
            <li>
                <a href="#requestCallModal" data-toggle="modal" data-target="#requestCallModal">
                    <img src="{{asset('frontend/images/icon/dbl6.png')}}" alt="" />Request Call Back
                </a>
            </li>
            <li>
                <a href="#requestTrainingModal" data-toggle="modal" data-target="#requestTrainingModal">
                    <img src="{{asset('frontend/images/icon/dbl6.png')}}" alt="" />Request Training
                </a>
            </li>
        </ul>
    </div>
</div>