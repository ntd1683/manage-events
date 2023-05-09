<!-- BEGIN #sidebar -->
<div id="sidebar" class="app-sidebar">
    <!-- BEGIN scrollbar -->
    <div class="app-sidebar-content" data-height="100%">
        <!-- BEGIN menu -->
        <div class="menu">
            <div class="menu-header">Navigation</div>
            <div class="menu-item active">
                <a href="index.html" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-house-door"></i></span>
                    <span class="menu-text">Home</span>
                </a>  
            </div>
            <div @class(['menu-item','active' => request()->routeIs('register-event.form-register')]) >
                <a href="{{ route('events.register') }}" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-file-text-fill"></i></span>
                    <span class="menu-text">{{ __('Register Event ') }} </span>
                </a>     
            </div>
                     
        </div>
        <!-- END menu -->
    </div>
    <!-- END scrollbar -->
</div>
<!-- END #sidebar -->
