<!-- Side Navigation -->
<div class="content-side content-side-full">
    <ul class="nav-main">
        <li>
            <a class="{{ request()->is('admin/home') ? ' active' : '' }}" href="{{ route('admin.home') }}">
                <i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span>
            </a>
        </li>
        <li class="nav-main-heading">
            <span class="sidebar-mini-visible">SR</span><span class="sidebar-mini-hidden">Users</span>
        </li>
        <li class="{{ request()->is('admin/list/*') ? ' open' : '' }}">
            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-users"></i><span
                    class="sidebar-mini-hide">List</span></a>
            <ul>
                <li>
                    <a class="{{ request()->is('admin/list/user') ? ' active' : '' }}"
                        href="{{ route('admin.users') }}">Users</a>
                </li>
                <li>
                    <a class="{{ request()->is('admin/list/member') ? ' active' : '' }}"
                        href="{{ route('admin.members') }}">Members</a>
                </li>
                <li>
                    <a class="{{ request()->is('admin/list/pesanan') ? ' active' : '' }}"
                        href="{{ route('admin.pesanan') }}">Pesanan</a>
                </li>
            </ul>
        </li>
        <li class="nav-main-heading">
            <span class="sidebar-mini-visible">UA</span><span class="sidebar-mini-hidden">Uang</span>
        </li>
        <li>
            <a class="{{ request()->is('admin/uang') ? ' active' : '' }}" href="{{ route('admin.uang') }}">
                <i class="si si-plus"></i><span class="sidebar-mini-hide">Top Up</span>
            </a>
        </li>
    </ul>
</div>