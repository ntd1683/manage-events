<!-- BEGIN #sidebar -->
<div id="sidebar" class="app-sidebar">
    <!-- BEGIN scrollbar -->
    <div class="app-sidebar-content" data-height="100%">
        <!-- BEGIN menu -->
        <div class="menu">
            <div class="menu-header">{{ __('Menu')}}</div>
            <div @class(['menu-item', 'active' => request()->routeIs('index')]) >
                <a href="{{ route('index') }}" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-house-door"></i></span>
                    <span class="menu-text">{{ __('Dashboard')}}</span>
                </a>
            </div>
            <div @class(['menu-item has-sub', 'active expand' => substr(Request()->route()->getPrefix(), 1) === 'events' ])>
                <a href="#" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-file-medical-fill"></i></span>
                    <span class="menu-text">{{ __('Events') }}</span>
                    <span class="menu-caret"><b class="caret"></b></span>
                </a>
                <div class="menu-submenu" @if(substr(Request()->route()->getPrefix(), 1) === 'events') style="display: block;" @endif >
                    <div @class(['menu-item','active' => request()->routeIs('events.index')])>
                        <a href="{{ route('events.index') }}" class="menu-link" style="padding-left:0;">
                            <span class="menu-icon" style="margin-right: 3px;">
                                <i class="bi bi-file-medical-fill"></i>
                            </span>
                            <span class="menu-text">{{ __('Index') }}</span>
                        </a>
                    </div>
                    <div @class(['menu-item', 'active' => request()->routeIs('events.create')])>
                        <a href="{{ route('events.create') }}" class="menu-link" style="padding-left: 0;" >
                            <span class="menu-icon" style="margin-right: 3px;" >
                                <i class="fa-solid fa-plus"></i>
                            </span>
                            <span class="menu-text">{{ __('Create') }}</span>
                        </a>
                    </div>
                    <div @class(['menu-item', 'active' => request()->routeIs('events.analytics')]) >
                        <a href="{{ route('events.analytics') }}" class="menu-link" style="padding-left: 0;" >
                            <span class="menu-icon" style="margin-right: 3px;" >
                                <i class="fa-solid fa-chart-line"></i>
                            </span>
                            <span class="menu-text">{{ __('Analytics') }}</span>
                        </a>
                    </div>
                    <div @class(['menu-item', 'active' => request()->routeIs('events.manage')]) >
                        <a href="{{ route('events.manage') }}" class="menu-link" style="padding-left: 0;" >
                            <span class="menu-icon" style="margin-right: 3px;" >
                                <i class="fa-solid fa-briefcase"></i>
                            </span>
                            <span class="menu-text">{{ __('Manage') }}</span>
                        </a>
                    </div>
                    <div @class(['menu-item', 'active' => request()->routeIs('events.google.import')]) >
                        <a href="{{ route('events.google.import') }}" class="menu-link" style="padding-left: 0;" >
                            <span class="menu-icon" style="margin-right: 3px;" >
                                <i class="fa-brands fa-google"></i>
                            </span>
                            <span class="menu-text">{{ __('Google Sheet Import') }}</span>
                        </a>
                    </div>
                    <div @class(['menu-item', 'active' => request()->routeIs('events.scanQrCode')]) >
                        <a href="{{ route('events.scanQrCode') }}" class="menu-link" style="padding-left: 0;" >
                            <span class="menu-icon" style="margin-right: 3px;" >
                                <i class="fa-solid fa-qrcode"></i>
                            </span>
                            <span class="menu-text">{{ __('Attendant Events') }}</span>
                        </a>
                    </div>
                </div>
            </div>
            @if(auth()->user()->level === 4)
                <div @class(['menu-item', 'active' => request()->routeIs('media.index')]) >
                    <a href="{{ route('media.index') }}" class="menu-link">
                        <span class="menu-icon"><i class="fa-solid fa-photo-film"></i></span>
                        <span class="menu-text">{{ __('Media') }}</span>
                    </a>
                </div>
            @endif
        </div>
        <!-- END menu -->
    </div>
    <!-- END scrollbar -->
</div>
<!-- END #sidebar -->
