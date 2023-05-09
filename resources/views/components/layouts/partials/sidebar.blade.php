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
                    <span class="menu-text">{{ __('Home') }}</span>
                </a>
            </div>
            <div @class(['menu-item', 'active' => request()->routeIs('google.import')]) >
                <a href="{{ route('google.import') }}" class="menu-link">
                    <span class="menu-icon"><i class="fa-brands fa-google"></i></span>
                    <span class="menu-text">{{ __('Google Sheet Import') }}</span>
                </a>
            </div>
        </div>
        <!-- END menu -->
    </div>
    <!-- END scrollbar -->
</div>
<!-- END #sidebar -->
