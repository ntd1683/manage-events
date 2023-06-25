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
                    <x-forms.inputs.label for="email">{{ __('Email Address') }}<span class="text-danger">*</span>
                    </x-forms.inputs.label>
                    <x-forms.inputs.text class="form-control-lg bg-white bg-opacity-5" name="email" id="email"
                                         placeholder="{{ __('Please Enter Email...') }}" value="{{ old('email') }}"/>
                    <x-forms.inputs.error messages="{{ $errors->first('email') }}"/>
                </div>
                <div class="mb-3 position-relative">
                    <div class="d-flex">
                        <x-forms.inputs.label for="password">{{ __('Password') }}<span class="text-danger">*</span></x-forms.inputs.label>
                        <a href="{{ route('forgotPassword') }}"
                           class="ms-auto text-white text-decoration-none text-opacity-50">{{ __('Forgot password?') }}</a>
                    </div>
                    <i class=" togglePassword bi bi-eye position-absolute" aria-hidden="true"
                       style="bottom : 4px; right:15px; font-size: 1.4em; color: gray; cursor: pointer;"></i>
                    <input type="password" class=" input-password form-control form-control-lg bg-white bg-opacity-5"
                           name="password" id="password"/>
                    <x-forms.inputs.error messages="{{ $errors->first('password') }}"/>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{ old('remember') }}" id="remember"
                               name="remember"/>
                        <label class="form-check-label" for="remember">{{ __('Remember me') }}</label>
                    </div>
                </div>
                <button type="submit"
                        class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3">{{ __('Log In') }}</button>
                <div class="text-center h2">
{{--                    <a href="{{ route('login.social.redirect', 'facebook') }}" class="me-3 text-decoration-none">--}}
{{--                        <i class="fa-brands fa-facebook"></i>--}}
{{--                    </a>--}}
                    <a href="{{ route('login.social.redirect', 'google') }}">
                        <i class="fa-brands fa-google"></i>
                    </a>
                </div>
                <div class="text-center text-white text-opacity-50">
                    {{ __('Don\'t have an account yet?') }} <a href="{{ route('register') }}">{{ __('Sign up') }}</a>.
                </div>
            </form>
        </div>
        <!-- END login-content -->
    </div>
    <!-- END login -->
</x-layouts.guest>
