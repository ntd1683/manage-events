<x-layouts.guest>
    <!-- BEGIN register -->
    <div class="register">
        <!-- BEGIN register-content -->
        <div class="register-content">
            <form action="{{ route('processResetPassword') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <h1 class="text-center">{{ __('Reset Password') }}</h1>
                <p class="text-white text-opacity-50 text-center">{{ __('Fill in your details to get started with us') }}</p>
                <div class="mb-3 position-relative">
                    <label class="form-label" for="password">{{ __('Password') }} <span class="text-danger">*</span></label>
                    <div class="form-group">
                        <i class="togglePassword bi bi-eye position-absolute fs-4 text-gray-400" aria-hidden="true" style="bottom : 5px; right:15px; cursor:pointer; "></i>
                        <input type="password" id="password" class="input-password form-control form-control-lg bg-white bg-opacity-5" name="password" aria-label="password"/>
                    </div>
                </div>
                <div class="mb-3 position-relative">
                    <label class="form-label" for="password_confirmation">{{ __('Confirm Password') }}<span class="text-danger">*</span></label>
                    <i class="togglePassword bi bi-eye position-absolute fs-4 text-gray-400" aria-hidden="true" style="bottom : 5px; right:15px; cursor: pointer;"></i>
                    <input type="password" id="password_confirmation" class="input-password form-control form-control-lg bg-white bg-opacity-5" name="password_confirmation" />
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-outline-theme btn-lg d-block w-100">{{ __('Reset Password') }}</button>
                </div>
                <div class="text-white text-opacity-50 text-center">
                    {{ __('Already have an Account ID? ') }}<a href="{{ route('login') }}">{{ __('Sign In') }}</a>
                </div>
            </form>
        </div>
        <!-- END register-content -->
    </div>
    <!-- END register -->

</x-layouts.guest>
