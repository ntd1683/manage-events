<x-layouts.guest>
    <!-- BEGIN register -->
    <div class="register">
        <!-- BEGIN register-content -->
        <div class="register-content">
            <form action="{{ route('processRegister') }}" method="POST" name="register_form">
                @csrf
                <h1 class="text-center">{{ __('Sign Up') }}</h1>
                <p class="text-white text-opacity-50 text-center">{{ __('One Admin ID is all you need to access all the Admin
                    services.') }}</p>
                <div class="mb-3">
                    <label class="form-label" for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg bg-white bg-opacity-5"
                           placeholder="{{ __('e.g John Smith') }}" name="name" id="name" value="{{ old('name') }}"/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">{{ __('Email Address ') }}<span class="text-danger">*</span></label>
                    <input type="text" class="form-control form-control-lg bg-white bg-opacity-5"
                           placeholder="username@address.com" name="email" id="email" value="{{ old('email')}}"/>
                </div>
                <div class="mb-3 position-relative">
                    <label class="form-label" for="password">{{ __('Password') }} <span class="text-danger">*</span></label>
                    <div class="form-group">
                        <i class="togglePassword bi bi-eye position-absolute invisible fs-4" aria-hidden="true" style="bottom : 5px; right:15px; color: gray; cursor:pointer; "></i>    
                        <input type="password" id="password" class="input-password form-control form-control-lg bg-white bg-opacity-5" name="password" aria-label="password"/>
                    </div> 
                </div>
                <div class="mb-3 position-relative">
                    <label class="form-label" for="password_confirmation">{{ __('Confirm Password ') }}<span class="text-danger">*</span></label>
                    <i class="togglePassword bi bi-eye position-absolute invisible fs-4 " aria-hidden="true" style="bottom : 5px; right:15px; color: gray; cursor: pointer;"></i>  
                    <input type="password" id="password_confirmation" class="input-password form-control form-control-lg bg-white bg-opacity-5" name="password_confirmation" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="gender">{{ __('Gender ') }}<span class="text-danger">*</span></label>
                    <select class="form-select form-select-lg bg-white bg-opacity-5" name="gender" id="gender">
                        <option class =" bg-white bg-opacity-5"  value="0" >{{ __('Female') }}</option>
                        <option  class =" bg-white bg-opacity-50" value="1">{{ __('Male') }}</option>
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