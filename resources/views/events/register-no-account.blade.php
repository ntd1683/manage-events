<x-layouts.guest>
    <!-- BEGIN login -->
    <div class="login">
        <!-- BEGIN login-content -->
        <div class="login-content">
            <form action="{{ route('events.process-register-events') }}" method="POST" name="login_form">
                @csrf
                <input type="hidden" name="event_id" value="{{ $eventId }}">
                <h1 class="text-center">{{ __('Register Event') }}</h1>
                <div class="text-white text-opacity-50 text-center mb-4">
                    {{ __('Enter information to register for the event.') }}
                </div>
                <div class="form-group mb-3">
                    <x-forms.inputs.label for="name">{{ __('Name') }}</x-forms.inputs.label>
                    <x-forms.inputs.text id="name" value="{{ old('name', $user->name) }}" name="name"
                                         placeholder="{{ __('name') }}"/>
                    <x-forms.inputs.error messages="{{ $errors->first('name') }}"/>
                </div>
                <div class="form-group mb-3">
                    <x-forms.inputs.label for="code_student">{{ __('Code Student') }}</x-forms.inputs.label>
                    <x-forms.inputs.text id="code_student" value="{{ old('code_student', $user->code_student) }}" name="code_student"
                                         placeholder="218xxxxx368"/>

                    <x-forms.inputs.error messages="{{ $errors->first('code_student') }}"/>
                </div>
                <div class="form-group mb-3">
                    <x-forms.inputs.label for="class">{{ __('Class') }}</x-forms.inputs.label>
                    <x-forms.inputs.text id="class" value="{{ old('class', $user->class) }}" name="class"
                                         placeholder="21xxxxx"/>

                    <x-forms.inputs.error messages="{{ $errors->first('class') }}"/>
                </div>
                <div class="form-group mb-3">
                    <x-forms.inputs.label for="faculty">{{ __('Faculty') }}</x-forms.inputs.label>
                    <x-forms.inputs.text id="faculty" value="{{ old('faculty', $user->faculty) }}" name="faculty"
                                         placeholder="CNTT"/>

                    <x-forms.inputs.error messages="{{ $errors->first('faculty') }}"/>
                </div>
                <div class="form-group mb-3">
                    <x-forms.inputs.label for="phone">{{ __('Phone') }}</x-forms.inputs.label>
                    <x-forms.inputs.text id="phone" value="{{ old('phone', $user->phone) }}" name="phone"
                                         placeholder="032xxxxxx09"/>

                    <x-forms.inputs.error messages="{{ $errors->first('phone') }}"/>
                </div>
                <div class="form-group mb-3">
                    <x-forms.inputs.label for="email">{{ __('Email') }}</x-forms.inputs.label>
                    <x-forms.inputs.text id="email" value="{{ old('email', $user->email) }}" name="email"
                                         placeholder="xxxx@xxx.xxx"/>

                    <x-forms.inputs.error messages="{{ $errors->first('email') }}"/>
                </div>
                <div class="form-group mb-3">
                    <x-forms.inputs.label class="me-5">{{ __('Type') }}</x-forms.inputs.label>
                    <!-- inline checkbox -->
                    <div class="form-check form-check-inline">
                        <x-forms.inputs.radio value="1" name="type" :checked="old('type', $user->type)"
                        >{{ __('In Club') }}</x-forms.inputs.radio>
                    </div>
                    <div class="form-check form-check-inline">
                        <x-forms.inputs.radio value="0" name="type" :checked="old('type', $user->type)"
                        >{{ __('Not In Club') }}</x-forms.inputs.radio>
                    </div>
                    <div class="form-check form-check-inline">
                        <x-forms.inputs.radio value="2" name="type" :checked="old('type', $user->type)"
                        >{{ __('Unknown') }}</x-forms.inputs.radio>
                    </div>
                    <x-forms.inputs.error messages="{{ $errors->first('type') }}"/>
                </div>
                <div class="text-end">
                    <a class="btn btn-outline-primary" @if($user->id === null) href="{{ route('login') }}" @else href="{{ route('index') }}" @endif>
                        <i class="bi bi-house-door"></i>
                        {{ __('Home') }}
                    </a>
                    <x-forms.buttons.primary type="submit">
                        {{ __('Submit') }}
                    </x-forms.buttons.primary>
                </div>
            </form>
        </div>
        <!-- END login-content -->
    </div>
    <!-- END login -->
</x-layouts.guest>
