<x-layouts.guest>
    <!-- BEGIN forget password -->
    <div class="login">
        <!-- BEGIN login-content -->
        <div class="login-content">
            <form action="{{ route('processForgotPassword') }}" method="POST">
                @csrf
                <h1 class="text-center">{{ __('CAN\'T SIGN IN?') }}</h1>
                <div class="text-white text-opacity-50 text-center mb-4">
                    {{ __('Forgot password? Need help remembering? You can request a reminder be sent to your linked email
                    here.') }}
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">{{ __('Email Address ') }}<span
                            class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg bg-white bg-opacity-5" name="email"
                           id="email"
                           placeholder="{{ __('Enter your email address') }}"/>
                </div>

                <button type="submit"
                        class="btn btn-outline-theme btn-lg d-block w-100 fw-500 mb-3">{{ __('Forgot Password →') }}</button>
                <div class="text-center text-white text-opacity-50">
                    {{ __('Don\'t have an account yet?') }} <a href="{{ route('register') }}">{{ __('Sign up') }}</a>.
                </div>
                <div class="text-white text-opacity-50 text-center mt-2">
                    {{ __('Already have an Account ID? ') }}<a href="{{ route('login') }}">{{ __('Sign in') }}</a>
                </div>
            </form>
        </div>
        <!-- END login-content -->
    </div>
    <!-- END forget password-->
</x-layouts.guest>
