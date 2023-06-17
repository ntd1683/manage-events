<x-layouts.guest>
    <!-- BEGIN error -->
    <div class="error-page">
        <!-- BEGIN error-page-content -->
        <div class="error-page-content">
            <div class="card mb-5 mx-auto" style="max-width: 320px;">
                <div class="card-body">
                    <div class="card">
                        <div class="error-code">{{ __('404') }}</div>
                        <div class="card-arrow">
                            <div class="card-arrow-top-left"></div>
                            <div class="card-arrow-top-right"></div>
                            <div class="card-arrow-bottom-left"></div>
                            <div class="card-arrow-bottom-right"></div>
                        </div>
                    </div>
                </div>
                <div class="card-arrow">
                    <div class="card-arrow-top-left"></div>
                    <div class="card-arrow-top-right"></div>
                    <div class="card-arrow-bottom-left"></div>
                    <div class="card-arrow-bottom-right"></div>
                </div>
            </div>
            <h1>{{ __('Oops!') }}</h1>
            <h3>{{ __('We can\'t seem to find the page you\'re looking for') }}</h3>
            <hr />
            <p class="mb-1">
                {{ __('Here are some helpful links instead:') }}
            </p>
            <a @if(auth()->guest()) href="{{ route('login') }}" @else href="{{ route('index') }}" @endif class="btn btn-outline-theme px-3 me-2 rounded-pill"><i class="bi bi-house-door me-1 ms-n1"></i> {{ __('Home') }}</a>
            <a href="{{ url()->previous() }}" class="btn btn-outline-theme px-3 rounded-pill"><i class="fa fa-arrow-left me-1 ms-n1"></i> {{ __('Go Back') }}</a>
        </div>
        <!-- END error-page-content -->
    </div>
    <!-- END error -->
</x-layouts.guest>
