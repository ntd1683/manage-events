<!-- BEGIN #header -->
<div id="header" class="app-header">
    <!-- BEGIN desktop-toggler -->
    <div class="desktop-toggler">
        <button type="button" class="menu-toggler" data-toggle-class="app-sidebar-collapsed"
                data-dismiss-class="app-sidebar-toggled" data-toggle-target=".app">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
    </div>
    <!-- BEGIN desktop-toggler -->

    <!-- BEGIN mobile-toggler -->
    <div class="mobile-toggler">
        <button type="button" class="menu-toggler" data-toggle-class="app-sidebar-mobile-toggled"
                data-toggle-target=".app">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
    </div>
    <!-- END mobile-toggler -->

    <!-- BEGIN brand -->
    <div class="brand">
        <a href="{{ route('index') }}" class="brand-logo">
            <span class="brand-img">
                <span class="brand-img-text text-theme">{{ auth()->user()->key_level }}</span>
            </span>
        </a>
    </div>
    <!-- END brand -->

    <!-- BEGIN menu -->
    <div class="menu">
        <div class="menu-item dropdown dropdown-mobile-full">
            <div class="me-2">
                <label class="form-check-label" for="customSwitch1">{{ __('English') }}</label>
            </div>
                <div class="form-check form-switch">
                    <form action="{{ route('change-language') }}" method="get" id="form_change_language">
                        <input type="checkbox" class="form-check-input" name="language" value="vi" id="language" onclick="changeLanguage()" @if(session()->get('lang') === 'vi') checked @endif>
                            <script>
                                function changeLanguage() {
                                    $('#form_change_language').submit();
                                }
                            </script>
                    </form>
                    <label class="form-check-label" for="language">{{ __('Vietnamese') }}</label>
                </div>
            <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
                <div class="menu-icon"><i class="bi bi-bell nav-icon"></i></div>
                <div class="menu-badge bg-theme"></div>
            </a>
            <div class="dropdown-menu dropdown-menu-end mt-1 w-300px fs-11px pt-1">
                <h6 class="dropdown-header fs-10px mb-1">{{ __('NOTIFICATIONS') }}</h6>
                <hr class="bg-white-transparent-5 mb-0 mt-0"/>

                @if(auth()->user()->email_verified_at == null)
                    <a href="{{ route('profile') }}#verify_email" class="d-flex align-items-center py-10px dropdown-item text-wrap fw-semibold">
                        <div class="fs-20px">
                            <i class="fa-solid fa-envelope text-theme"></i>
                        </div>
                        <div class="flex-1 flex-wrap ps-3">
                            <div class="mb-1 text-inverse">{{ __('Verify Email') }}</div>
                            <div class="small text-inverse text-opacity-50">{{ __('JUST NOW') }}</div>
                        </div>
                        <div class="ps-2 fs-16px">
                            <i class="bi bi-chevron-right"></i>
                        </div>
                    </a>
                    <hr class="bg-white-transparent-5 mb-0 mt-0"/>
                @endif
                @forelse(getNotify() as $notify)
                    <a @if($notify->link) href="{{ $notify->link }}" @endif class="d-flex align-items-center py-10px dropdown-item text-wrap fw-semibold">
                        <div class="fs-20px">
                            <i class="fa-solid {{ $notify->icon }} text-theme"></i>
                        </div>
                        <div class="flex-1 flex-wrap ps-3">
                            <div class="mb-1 text-inverse">{{ $notify->title }}</div>
                            <div class="small text-inverse text-opacity-50">{{ $notify->created_at->diffForHumans() }}</div>
                        </div>
                        <div class="ps-2 fs-16px">
                            <i class="bi bi-chevron-right"></i>
                        </div>
                    </a>
                @empty
                    <div class="d-flex align-items-center py-10px dropdown-item text-wrap fs-6 bg-white bg-opacity-15 text-white text-opacity-50 h-100px">
                        {{ __('No record found') }}
                    </div>
                @endforelse
                <hr class="bg-white-transparent-5 mb-0 mt-0"/>
                <div class="py-10px mb-n2 text-center">
                    <a href="{{ route('notify.index') }}" class="text-decoration-none fw-bold">{{ __('SEE ALL') }}</a>
                </div>
            </div>
        </div>
        <div class="menu-item dropdown dropdown-mobile-full">
            <a href="#" data-bs-toggle="dropdown" data-bs-display="static" class="menu-link">
                <div class="menu-img online">
                    <div
                        class="d-flex align-items-center justify-content-center w-100 h-100 bg-white bg-opacity-25 text-white text-opacity-50 rounded-circle overflow-hidden">
                        <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}">
                    </div>
                </div>
                <div class="menu-text d-sm-block d-none">{{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-end me-lg-3 fs-11px mt-1">
                <a class="dropdown-item d-flex align-items-center" href="{{ route('profile') }}">{{ __('PROFILE') }} <i
                        class="bi bi-person-circle ms-auto text-theme fs-16px my-n1"></i></a>
                @if(auth()->user()->level == 4)
                    <a class="dropdown-item d-flex align-items-center" href="{{ route('setting') }}">{{ __('SETTINGS') }}<i
                            class="bi bi-gear ms-auto text-theme fs-16px my-n1"></i></a>
                @endif
                <div class="dropdown-divider"></div>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">{{ __('LOGOUT') }}<i
                        class="bi bi-toggle-off ms-auto text-theme fs-16px my-n1"></i></a>
            </div>
        </div>
    </div>
    <!-- END menu -->
</div>
<!-- END #header -->
