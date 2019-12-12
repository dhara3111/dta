<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
        <ul class="m-menu__nav ">
            <li class="m-menu__item {{ Request::is('dashboard*') ? 'm-menu__item--active' : '' }} " aria-haspopup="true" >
                <a  href="{{route('advertiser.dashboard.index')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon flaticon-dashboard"></i>
                    <span class="m-menu__link-text">Dashboard</span>
                </a>
            </li>

                <li class="m-menu__item {{ Request::is( 'changePassword/edit') || Request::is( 'changePassword*') ? 'm-menu__item--active' : '' }} " aria-haspopup="true" >
                    <a  href="{{route('advertiser.changePassword.index')}}" class="m-menu__link ">
                        <span class="m-menu__item-here"></span>
                        <i class="m-menu__link-icon flaticon-list-3"></i>
                        <span class="m-menu__link-text">Change Password</span>
                    </a>
                </li>

                @if(Auth::user()->type == 0)
                    <li class="m-menu__item {{ Request::is( 'module/edit') || Request::is( 'module/create') || Request::is( 'module*') ? 'm-menu__item--active' : '' }} " aria-haspopup="true" >
                        <a  href="{{route('advertiser.module.index')}}" class="m-menu__link ">
                            <span class="m-menu__item-here"></span>
                            <i class="m-menu__link-icon flaticon-list-3"></i>
                            <span class="m-menu__link-text">Module</span>
                        </a>
                    </li>
                @endif
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->