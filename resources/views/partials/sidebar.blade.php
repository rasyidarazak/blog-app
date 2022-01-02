<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{ request()->is('/') ? ' active' : '' }}" href="/">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Features</div>
                <a class="nav-link {{ request()->is('posts', 'posts/*') ? ' active' : '' }}" href="{{ route('posts.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Posts
                </a>
            </div>
        </div>
    </nav>
</div>