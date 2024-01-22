<nav id="sidebar" aria-label="Main Navigation">
    <div class="bg-header-dark">
    <div class="content-header bg-white-5">
        <a class="fw-semibold text-white tracking-wide" href="/">
            <!-- <img src="{{ asset('logo.png') }}" width="20%" alt="Digipen"> -->
            <!-- <img src="{{ asset('img/header.png') }}" width="100%" alt="Digipen"> -->
            <span class="smini-visible">
                S<span class="opacity-75">P</span>
            </span>
            <span class="smini-hidden">
                SCI - <span class="opacity-75">SUPUT</span>
            </span>
        </a>

        <div>
        <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="class-toggle" data-target="#sidebar-style-toggler" data-class="fa-toggle-off fa-toggle-on" onclick="Dashmix.layout('sidebar_style_toggle');Dashmix.layout('header_style_toggle');">
            <i class="fa fa-toggle-off" id="sidebar-style-toggler"></i>
        </button>
        <button type="button" class="btn btn-sm btn-alt-secondary d-lg-none" data-toggle="layout" data-action="sidebar_close">
            <i class="fa fa-times-circle"></i>
        </button>
        </div>
    </div>
    </div>

    <div class="js-sidebar-scroll">
    <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('home') ? ' active' : '' }}" href="{{route('home')}}">
                    <i class="nav-main-link-icon fa fa-location-arrow"></i>
                    <span class="nav-main-link-name">Dashboard</span>
                    <!-- <span class="nav-main-link-badge badge rounded-pill bg-primary">5</span> -->
                    </a>
                </li>
                <li class="nav-main-heading">Signature</li>
                <li class="nav-main-item">
                    <a class="nav-main-link{{ request()->is('administration/cert*') ? ' active' : '' }}" href="{{route('cert.index')}}">
                    <i class="nav-main-link-icon fa fa-qrcode"></i>
                    <span class="nav-main-link-name">Cert ROA</span>
                    </a>
                </li>
                
                <li class="nav-main-heading">Pengaturan</li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="#">
                    <i class="nav-main-link-icon fa fa-users"></i>
                    <span class="nav-main-link-name">Data User</span>
                    </a>
                </li>
                <li class="nav-main-item">
                    <a class="nav-main-link" href="#" onclick="confirmLogout()">
                        <i class="nav-main-link-icon fa fa-sign-out-alt"></i>
                        <span class="nav-main-link-name">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
</nav>