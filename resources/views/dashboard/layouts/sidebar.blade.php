<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">

            <a href="{{ route('dashboard.index') }}" class="logo">
                <img src="{{ asset('kaiadmin_lite') }}/assets/img/kaiadmin/logo_light.svg" alt="navbar brand"
                    class="navbar-brand" height="20">
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>

        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ request()->segment(1) == 'dashboard' ? 'active' : '' }}">
                    <a href="{{ route('dashboard.index') }}">
                        <i class="fas fa-desktop"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->segment(1) == 'objek-retribusi' ? 'active' : '' }}">
                    <a href="{{ route('objek-retribusi.index') }}">
                        <i class="fab fa-r-project"></i>
                        <p>Objek Retribusi</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->segment(1) == 'materi' ? 'active' : '' }}">
                    <a href="{{ route('materi.index') }}">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Materi</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->segment(1) == 'pemohon' ? 'active' : '' }}">
                    <a href="{{ route('pemohon.index') }}">
                        <i class="fas fa-user-tie"></i>
                        <p>Pemohon</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->segment(1) == 'publikasi' ? 'active' : '' }}">
                    <a href="{{ route('publikasi.index') }}">
                        <i class="fas fa-bullhorn"></i>
                        <p>Publikasi</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->segment(1) == 'videos' ? 'active' : '' }}">
                    <a href="{{ route('videos.index') }}">
                        <i class="fas fa-video"></i>
                        <p>Video</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->segment(1) == 'survey' ? 'active' : '' }}">
                    <a href="{{ route('survey.index') }}">
                        <p>Survey</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
