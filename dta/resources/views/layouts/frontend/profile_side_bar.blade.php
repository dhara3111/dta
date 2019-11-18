<div class="col-lg-4 col-md-4 col-sm-12">
    <!-- User account box start -->
    <div class="user-account-box">
        <div class="header clearfix">
            {{--<div class="edit-profile-photo">--}}
                {{--<img src="img/avatar/avatar-3.jpg" alt="agent-1" class="img-responsive">--}}
                {{--<div class="change-photo-btn">--}}
                    {{--<div class="photoUpload">--}}
                        {{--<span><i class="fa fa-upload"></i> Upload Photo</span>--}}
                        {{--<input type="file" class="upload">--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            <h3> Welcome</h3>
            <h3>{{ getName() }}</h3>
            <p>{{ auth()->user()->email }}</p>

            {{--<ul class="social-list clearfix">--}}
                {{--<li>--}}
                    {{--<a href="#" class="facebook">--}}
                        {{--<i class="fa fa-facebook"></i>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#" class="twitter">--}}
                        {{--<i class="fa fa-twitter"></i>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#" class="linkedin">--}}
                        {{--<i class="fa fa-linkedin"></i>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#" class="google">--}}
                        {{--<i class="fa fa-google-plus"></i>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a href="#" class="rss">--}}
                        {{--<i class="fa fa-rss"></i>--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}

        </div>
        <div class="content">
            <ul>
                <li>
                    <a href="{{route('frontend.profile.index')}}" class="{{ Request::is('profile*') ? 'active' : '' }}">
                        <i class="flaticon-social"></i>Profile
                    </a>
                </li>
                <li>
                    <a href="{{route('frontend.property.myProperties')}}" class="{{ Request::is('my-properties') ? 'active' : '' }}">
                        <i class="flaticon-apartment"></i>My Properties
                    </a>
                </li>
                <li>
                    <a href="{{route('frontend.favourite.index')}}">
                        <i class="fa fa-heart"></i>Favorite Properties
                    </a>
                </li>
                <li>
                    <a href="{{route('frontend.property.create')}}" class="{{ Request::is('property*') ? 'active' : '' }}">
                        <i class="fa fa-plus"></i>Submit New Property
                    </a>
                </li>
                <li>
                    <a href="{{route('frontend.changePassword.index')}}" class="{{ Request::is('changePassword*') ? 'active' : '' }}">
                        <i class="flaticon-security"></i>Change Password
                    </a>
                </li>
                <li>
                    <a href="{{route('frontend.login.logout')}}" class="{{ Request::is('login*') ? 'active' : '' }}">
                        <i class="flaticon-sign-out-option"></i>Log Out
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- User account box end -->
</div>