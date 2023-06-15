<x-layouts.master>
    <!-- BEGIN container -->
    <div class="container">
        <!-- BEGIN row -->
        <div class="row justify-content-center">
            <!-- BEGIN col-10 -->
            <div class="col-xl-10">
                <!-- BEGIN row -->
                <div class="row">
                    <!-- BEGIN col-9 -->
                    <div class="col-xl-9">
                        <div id="avatar" class="text-center">
                            <div class="imgUp">
                                <img src="{{ auth()->user()->avatar_url }}" class="imagePreview rounded-circle"
                                     style="width:10rem; height:10rem" alt="{{ __('avatar') }}">
                                <div class="mt-3">
                                    <form action="{{ route('ajax.profile.avatar') }}" onsubmit="return false;"
                                          id="form_avatar">
                                        <label class="btn btn-outline-info">
                                            {{ __('Upload') }}
                                            <input type="file" class="uploadFile img"
                                                   value="{{ auth()->user()->avatar }}"
                                                   style="width: 0;height: 0;overflow: hidden;" name="avatar"
                                                   accept="image/png, image/jpeg, image/jpg" id="input_avatar">
                                        </label>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="information" class="mb-5">
                            <h4><i class="fa-solid fa-earth-asia fa-fw text-theme"></i>{{ __('Information') }}</h4>
                            <p>{{ __('Edit profile information') }}</p>
                            <div class="card">
                                <form action="{{ route('profile.update') }}" method="POST">
                                    @csrf
                                    <div class="card-body pb-2">
                                        <div class="row">
                                            <div class="form-group mb-3">
                                                <x-forms.inputs.label for="name">{{ __('Name') }}</x-forms.inputs.label>
                                                <x-forms.inputs.text id="name"
                                                                     value="{{ old('name', auth()->user()->name) }}"
                                                                     name="name" placeholder="{{ __('Name') }}"/>
                                            </div>
                                            <div class="form-group mb-3">

                                                <div class="form-check form-check-inline">
                                                    <x-forms.inputs.radio value="1" name="gender" :checked="old('gender', auth()->user()->gender)"
                                                    >{{ __('Male') }}</x-forms.inputs.radio>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <x-forms.inputs.radio value="0" name="gender" :checked="old('gender', auth()->user()->gender)"
                                                    >{{ __('Female') }}</x-forms.inputs.radio>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <x-forms.inputs.radio value="2" name="gender" :checked="old('gender', auth()->user()->gender)"
                                                    >{{ __('Other') }}</x-forms.inputs.radio>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-3">
                                                <x-forms.inputs.label
                                                    for="code_student">{{ __('Code Student') }}</x-forms.inputs.label>
                                                <x-forms.inputs.text id="code_student"
                                                                     value="{{ old('code_student', auth()->user()->code_student) }}"
                                                                     name="code_student"
                                                                     placeholder="{{ __('Code Student') }}"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-3">
                                                <x-forms.inputs.label for="class">{{ __('Class') }}</x-forms.inputs.label>
                                                <x-forms.inputs.text id="class"
                                                                     value="{{ old('class', auth()->user()->class) }}"
                                                                     name="class" placeholder="{{ __('Class') }}"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-3">
                                                <x-forms.inputs.label
                                                    for="faculty">{{ __('Faculty') }}</x-forms.inputs.label>
                                                <x-forms.inputs.text id="faculty"
                                                                     value="{{ old('faculty', auth()->user()->faculty) }}"
                                                                     name="faculty" placeholder="{{ __('Faculty') }}"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-3">
                                                <x-forms.inputs.label for="phone">{{ __('Phone') }}</x-forms.inputs.label>
                                                <x-forms.inputs.text id="phone"
                                                                     value="{{ old('phone', auth()->user()->phone) }}"
                                                                     name="phone" placeholder="{{ __('Phone') }}"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-3">
                                                <div class="d-flex justify-content-between">
                                                    <x-forms.inputs.label
                                                        for="email">{{ __('Email') }}</x-forms.inputs.label>
                                                    @if(! auth()->user()->email_verified_at)
                                                        <a class="active text-decoration-none"
                                                           data-bs-toggle="modal" data-bs-target="#modal_verify_email" style="cursor: pointer"; id="verify_email">{{ __('Verify Email') }}</a>
                                                    @endif
                                                </div>
                                                <x-forms.inputs.text value="{{ old('email', auth()->user()->email) }}"
                                                                     placeholder="{{ __('Email') }}" name="email"/>
                                            </div>
                                        </div>
                                        <div class="text-end" id="save">
                                            <x-forms.buttons.primary type="submit">Save</x-forms.buttons.primary>
                                        </div>
                                    </div>
                                </form>
                                <div class="card-arrow">
                                    <div class="card-arrow-top-left"></div>
                                    <div class="card-arrow-top-right"></div>
                                    <div class="card-arrow-bottom-left"></div>
                                    <div class="card-arrow-bottom-right"></div>
                                </div>
                            </div>
                        </div>
                        <div id="password" class="mb-5">
                            <h4><i class="fa-solid fa-earth-asia fa-fw text-theme"></i>{{ __('Password') }}</h4>
                            <p>{{ __('Change password') }}</p>
                            <div class="card">
                                <div class="card-body pb-2">
                                    <form action="{{ route('ajax.profile.changePassword') }}" method="POST" onsubmit="return false;" id="form_change_password">
                                        <div class="row">
                                            <div class="mb-3 position-relative">
                                                <x-forms.inputs.label for="password">{{ __('Old Password') }} <span
                                                        class="text-danger">*</span></x-forms.inputs.label>
                                                <x-forms.inputs.password id="old_password" name="old_password"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="mb-3 position-relative">
                                                <x-forms.inputs.label for="password">{{ __('New Password') }} <span
                                                        class="text-danger">*</span></x-forms.inputs.label>
                                                <x-forms.inputs.password id="new_password" name="new_password"/>
                                            </div>
                                            <div class="mb-3 position-relative">
                                                <x-forms.inputs.label
                                                    for="password_confirmation">{{ __('Confirm New Password') }}<span
                                                        class="text-danger">*</span></x-forms.inputs.label>
                                                <x-forms.inputs.password id="new_password_confirmation"
                                                                         name="new_password_confirmation"/>
                                            </div>
                                            <div class="text-end">
                                                <x-forms.buttons.primary type="submit" id="button_password">Save
                                                </x-forms.buttons.primary>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-arrow">
                                    <div class="card-arrow-top-left"></div>
                                    <div class="card-arrow-top-right"></div>
                                    <div class="card-arrow-bottom-left"></div>
                                    <div class="card-arrow-bottom-right"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END col-9-->
                    <!-- BEGIN col-3 -->
                    <div class="col-xl-3">
                        <!-- BEGIN #sidebar-bootstrap -->
                        <nav id="sidebar-bootstrap" class="navbar navbar-sticky d-none d-xl-block">
                            <nav class="nav">
                                <a class="nav-link" href="#avatar" data-toggle="scroll-to">{{ __('Avatar') }}</a>
                                <a class="nav-link" href="#information"
                                   data-toggle="scroll-to">{{ __('Information') }}</a>
                                <a class="nav-link" href="#password" data-toggle="scroll-to">{{ __('Password') }}</a>
                            </nav>
                        </nav>
                        <!-- END #sidebar-bootstrap -->
                    </div>
                    <!-- END col-3 -->
                </div>
                <!-- END row -->
            </div>
            <!-- END col-10 -->
        </div>
        <!-- END row -->
    </div>
    <!-- END container -->
    <x-modal id="modal_verify_email" title="{{ __('Verify Email') }}" action="{{ route('ajax.profile.verifyEmail') }}" method="POST" onsubmit="return false;" formId="form_verify_email">
        <h3>{{ __('Click submit to verify email') }}</h3>
        <x-slot:buttons>
            <x-forms.buttons.primary type="submit" id="button_verify_email">{{ __('Submit') }}</x-forms.buttons.primary>
            <button type="button" class="btn btn-default text-white" data-bs-dismiss="modal" id="button_close_verify_email">{{ __('Close') }}</button>
        </x-slot:buttons>
    </x-modal>
    @push('js')
        <script src="{{ asset('js/profile.js') }}"></script>
    @endpush
</x-layouts.master>
