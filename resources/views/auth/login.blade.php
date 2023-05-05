<x-layouts.guest>
    <!-- BEGIN login -->
    <div class="login">
        <!-- BEGIN login-content -->
        <div class="login-content">
            <form action="{{ route('processLogin') }}" method="POST" name="login_form">
                @csrf
                <h1 class="text-center">{{ __('Log In') }}</h1>
                <div class="text-white text-opacity-50 text-center mb-4">
                    {{ __('For your protection, please verify your identity.') }}
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">{{ __('Email Address') }}<span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg bg-white bg-opacity-5" name="email" id="email"
                           placeholder="{{ __('Please Enter Email...') }}" value="{{ old('email') }}"/>
                </div>
                <div class="mb-3">
                    <div class="d-flex">
                        <label class="form-label" for="password">{{ __('Password') }}<span class="text-danger">*</span></label>
                        <a href="{{ route('forgot-password') }}" class="ms-auto text-white text-decoration-none text-opacity-50">{{ __('Forgot
                            password?') }}</a>
                    </div>
                    <input type="password" class="form-control form-control-lg bg-white bg-opacity-5" name="password" id="password"/>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ old('remember') }}" id="remember" name="remember"/>
                        <label class="form-check-label" for="remember">{{ __('Remember me') }}</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3">{{ __('Log In') }}</button>
                <div class="text-center text-white text-opacity-50">
                    {{ __('Don\'t have an account yet?') }} <a href="{{ route('register') }}">{{ __('Sign up') }}</a>.
                </div>
            </form>
        </div>
        <!-- END login-content -->
    </div>
    <!-- END login -->
</x-layouts.guest>
