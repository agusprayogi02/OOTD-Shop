<!-- Side Navigation -->
<div class="content-side content-side-full">
    <ul class="nav-main">
        <li>
            <a class="{{ request()->is('member/home') ? ' active' : '' }}" href="{{ route('member.home') }}">
                <i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span>
            </a>
        </li>
        <li class="nav-main-heading">
            <span class="sidebar-mini-visible">BR</span><span class="sidebar-mini-hidden">Barang</span>
        </li>
        <li>
            <a href="{{ route('member.addBrg') }}" class="{{ request()->is('member/brg/tambah')?'active':'' }}">
                <i class="si si-plus"></i><span class="sidebar-mini-hide">Tambah Barang</span>
            </a>
            <a href="{{ route('member.list_ktgr') }}" class="{{ request()->is('member/ktgr/list')?'active':'' }}">
                <i class="si si-chart"></i><span class="sidebar-mini-hide">List Kategori</span>
            </a>
            <a href="{{ route('member.add_ktgr') }}" class="{{ request()->is('member/ktgr/tambah')?'active':'' }}">
                <i class="fa fa-plus-square"></i><span class="sidebar-mini-hide">Tambah Kategori</span>
            </a>
        </li>
    </ul>
</div>
<!-- END Side Navigation -->
</div>
<!-- Sidebar Content -->
</nav>
<!-- END Sidebar -->
