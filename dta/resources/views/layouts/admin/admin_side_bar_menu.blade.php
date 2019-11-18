<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500">
        <ul class="m-menu__nav ">
            <li class="m-menu__item {{ Request::is( 'dashboard*') ? 'm-menu__item--active' : '' }} " aria-haspopup="true" >
                <a  href="{{route('admin.dashboard.index')}}" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon flaticon-dashboard"></i>
                    <span class="m-menu__link-text">Dashboard</span>
                </a>
            </li>
            <?php
            $modules=\App\Models\Module::whereStatus('1')->get();
            ?>
                @foreach ($modules as $index => $module)
                    <?php
                    $userId= Auth::user()->id;
                    $permissions=\App\Models\Permission::whereUserId($userId)->get();
                    ?>
                        @foreach ($permissions as $index => $permission)

                            @if($permission->module_id == $module->id && $permission->module->status == \App\Models\Module::ACTIVE && $permission->view == 1)

                                <li class="m-menu__item {{ Request::is( $module->folder_name.'/create') || Request::is( $module->folder_name.'*') ? 'm-menu__item--active' : '' }} " aria-haspopup="true" >
                                    <a  href="{{route('admin.'.$module->file_name.'.index',['userId'=>$userId,'module'=>$module->id])}}" class="m-menu__link ">
                                        <span class="m-menu__item-here"></span><i class="{{ $module->icon }}"></i>
                                        <span class="m-menu__link-text">{{ $module->title_name }}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                @endforeach

                <li class="m-menu__item {{ Request::is( 'changePassword/edit') || Request::is( 'changePassword*') ? 'm-menu__item--active' : '' }} " aria-haspopup="true" >
                    <a  href="{{route('admin.changePassword.index')}}" class="m-menu__link ">
                        <span class="m-menu__item-here"></span>
                        <i class="m-menu__link-icon flaticon-list-3"></i>
                        <span class="m-menu__link-text">Change Password</span>
                    </a>
                </li>

                @if(Auth::user()->type == 0)
                    <li class="m-menu__item {{ Request::is( 'module/edit') || Request::is( 'module/create') || Request::is( 'module*') ? 'm-menu__item--active' : '' }} " aria-haspopup="true" >
                        <a  href="{{route('admin.module.index')}}" class="m-menu__link ">
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