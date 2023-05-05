
<!-- BEGIN #header -->
<div id="header" class="app-header">
    <!-- BEGIN desktop-toggler -->
    <div class="desktop-toggler">
        <button type="button" class="menu-toggler" data-toggle-class="app-sidebar-collapsed" data-dismiss-class="app-sidebar-toggled" data-toggle-target=".app">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
    </div>
    <!-- BEGIN desktop-toggler -->

    <!-- BEGIN mobile-toggler -->
    <div class="mobile-toggler">
        <button type="button" class="menu-toggler" data-toggle-class="app-sidebar-mobile-toggled" data-toggle-target=".app">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
    </div>
    <!-- END mobile-toggler -->

    <!-- BEGIN brand -->
    <div class="brand">
        <a href="#" class="brand-logo">
					<span class="brand-img">
						<span class="brand-img-text text-theme">H</span>
					</span>
            <span class="brand-text">HUD ADMIN</span>
        </a>
    </div>
    <!-- END brand -->

    <!-- BEGIN menu -->
    <div class="menu">
        <div class="menu-item dropdown">
            <a href="#" data-toggle-class="app-header-menu-search-toggled" data-toggle-target=".app" class="menu-link">
                <div class="menu-icon"><i class="bi bi-search nav-icon"></i></div>
            </a>
        </div>
        <div class="menu-item dropdown dropdown-mobile-full">
            <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
                <div class="menu-icon"><i class="bi bi-grid-3x3-gap nav-icon"></i></div>
            </a>
            <div class="dropdown-menu fade dropdown-menu-end w-300px text-center p-0 mt-1">
                <div class="row row-grid gx-0">
                    <div class="col-4">
                        <a href="#" class="dropdown-item text-decoration-none p-3 bg-none">
                            <div class="position-relative">
                                <i class="bi bi-circle-fill position-absolute text-theme top-0 mt-n2 me-n2 fs-6px d-block text-center w-100"></i>
                                <i class="bi bi-envelope h2 opacity-5 d-block my-1"></i>
                            </div>
                            <div class="fw-500 fs-10px text-white">INBOX</div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="#" class="dropdown-item text-decoration-none p-3 bg-none">
                            <div><i class="bi bi-hdd-network h2 opacity-5 d-block my-1"></i></div>
                            <div class="fw-500 fs-10px text-white">DISK DRIVE</div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="#" class="dropdown-item text-decoration-none p-3 bg-none">
                            <div><i class="bi bi-calendar4 h2 opacity-5 d-block my-1"></i></div>
                            <div class="fw-500 fs-10px text-white">CALENDAR</div>
                        </a>
                    </div>
                </div>
                <div class="row row-grid gx-0">
                    <div class="col-4">
                        <a href="#" class="dropdown-item text-decoration-none p-3 bg-none">
                            <div><i class="bi bi-terminal h2 opacity-5 d-block my-1"></i></div>
                            <div class="fw-500 fs-10px text-white">TERMINAL</div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="#" class="dropdown-item text-decoration-none p-3 bg-none">
                            <div class="position-relative">
                                <i class="bi bi-circle-fill position-absolute text-theme top-0 mt-n2 me-n2 fs-6px d-block text-center w-100"></i>
                                <i class="bi bi-sliders h2 opacity-5 d-block my-1"></i>
                            </div>
                            <div class="fw-500 fs-10px text-white">SETTINGS</div>
                        </a>
                    </div>
                    <div class="col-4">
                        <a href="#" class="dropdown-item text-decoration-none p-3 bg-none">
                            <div><i class="bi bi-collection-play h2 opacity-5 d-block my-1"></i></div>
                            <div class="fw-500 fs-10px text-white">LIBRARY</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item dropdown dropdown-mobile-full">
            <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
                <div class="menu-icon"><i class="bi bi-bell nav-icon"></i></div>
                <div class="menu-badge bg-theme"></div>
            </a>
            <div class="dropdown-menu dropdown-menu-end mt-1 w-300px fs-11px pt-1">
                <h6 class="dropdown-header fs-10px mb-1">NOTIFICATIONS</h6>
                <div class="d-flex align-items-center py-10px dropdown-item text-wrap fs-6 bg-white bg-opacity-15 text-white text-opacity-50 h-100px">
                    No record found
                </div>
                <hr class="bg-white-transparent-5 mb-0 mt-0" />
                <div class="py-10px mb-n2 text-center">
                    <a href="#" class="text-decoration-none fw-bold">SEE ALL</a>
                </div>
            </div>
        </div>
        <div class="menu-item dropdown dropdown-mobile-full">
            <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
                <div class="menu-img online">
                    <div class="d-flex align-items-center justify-content-center w-100 h-100 bg-white bg-opacity-25 text-white text-opacity-50 rounded-circle overflow-hidden">
                        <i class="bi bi-person-fill fs-32px mb-n3"></i>
                    </div>
                </div>
                <div class="menu-text d-sm-block d-none">username@account.com</div>
            </a>
            <div class="dropdown-menu dropdown-menu-end me-lg-3 fs-11px mt-1">
                <a class="dropdown-item d-flex align-items-center" href="#">PROFILE <i class="bi bi-person-circle ms-auto text-theme fs-16px my-n1"></i></a>
                <a class="dropdown-item d-flex align-items-center" href="#">INBOX <i class="bi bi-envelope ms-auto text-theme fs-16px my-n1"></i></a>
                <a class="dropdown-item d-flex align-items-center" href="#">CALENDAR <i class="bi bi-calendar ms-auto text-theme fs-16px my-n1"></i></a>
                <a class="dropdown-item d-flex align-items-center" href="#">SETTINGS <i class="bi bi-gear ms-auto text-theme fs-16px my-n1"></i></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">LOGOUT <i class="bi bi-toggle-off ms-auto text-theme fs-16px my-n1"></i></a>
            </div>
        </div>
    </div>
    <!-- END menu -->

    <!-- BEGIN menu-search -->
    <form class="menu-search" method="POST" name="header_search_form">
        <div class="menu-search-container">
            <div class="menu-search-icon"><i class="bi bi-search"></i></div>
            <div class="menu-search-input">
                <input type="text" class="form-control form-control-lg" placeholder="Search menu..." />
            </div>
            <div class="menu-search-icon">
                <a href="#" data-toggle-class="app-header-menu-search-toggled" data-toggle-target=".app"><i class="bi bi-x-lg"></i></a>
            </div>
        </div>
    </form>
    <!-- END menu-search -->
</div>
<!-- END #header -->
