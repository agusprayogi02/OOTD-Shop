<!-- Side Navigation -->
<div class="content-side content-side-full">
    <ul class="nav-main">
        <li>
            <a class="{{ request()->is('member/home') ? ' active' : '' }}" href="{{ route('member.home') }}">
                <i class="si si-cup"></i><span class="sidebar-mini-hide">Dashboard</span>
            </a>
        </li>
        <li class="nav-main-heading">
            <span class="sidebar-mini-visible">CD</span><span class="sidebar-mini-hidden">CRUD</span>
        </li>
        <li>
            <a href="{{ route('member.add') }}" class="{{ request()->is('member/tambah')?'active':'' }}">
                <i class="si si-globe"></i><span class="sidebar-mini-hide">Tambah Barang</span>
            </a>
        </li>
    </ul>
</div>
<!-- END Side Navigation -->
</div>
<!-- Sidebar Content -->
</nav>
<!-- END Sidebar -->
