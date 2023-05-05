<x-layouts.guest>
    <!-- BEGIN register -->
    <div class="register">
        <!-- BEGIN register-content -->
        <div class="register-content">
            <form action="index.html" method="POST" name="register_form">
                <h1 class="text-center">{{ __('Sign Up') }}</h1>
                <p class="text-white text-opacity-50 text-center">{{ __('One Admin ID is all you need to access all the Admin
                    services.') }}</p>
                <div class="mb-3">
                    <label class="form-label" for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg bg-white bg-opacity-5"
                           placeholder="{{ __('e.g John Smith') }}" name="name" id="name"/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">{{ __('Email Address ') }}<span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg bg-white bg-opacity-5"
                           placeholder="username@address.com" name="email" id="email"/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">{{ __('Password') }} <span class="text-danger">*</span></label>
                    <input type="password" class="form-control form-control-lg bg-white bg-opacity-5" name="password" id="password"/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="confirm_password">{{ __('Confirm Password ') }}<span class="text-danger">*</span></label>
                    <input type="password" class="form-control form-control-lg bg-white bg-opacity-5" name="confirm_password" id="confirm_password"/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="gender">Gender <span class="text-danger">*</span></label>
                    <select class="form-select form-select-lg bg-white bg-opacity-5" name="gender" id="gender">
                        <option>Female</option>
                        <option>Male</option>
                    </select>
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="customCheck1"/>
                        <label class="form-check-label" for="customCheck1">{{ __('I have read and agree to the ') }}<a href="#">{{ __('Terms
                                of Use') }}</a> {{ __('and') }} <a href="#">{{ __('Privacy Policy') }}</a>.</label>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-outline-theme btn-lg d-block w-100">{{ __('Sign Up') }}</button>
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
