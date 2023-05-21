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
                            <form action="{{ route('setting.store') }}" method="post" enctype="multipart/form-data">
                            <!-- BEGIN #notifications -->
                            <div id="general" class="mb-5">
                                <h4><i class="fa-solid fa-earth-asia fa-fw text-theme"></i>{{ __('General') }}</h4>
                                <p>{{ __('Edit website information') }}</p>
                                <div class="card">
                                    <div class="card-body pb-2">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group mb-3">
                                                    <x-forms.inputs.label for="site_name">{{ __('Site Name') }}</x-forms.inputs.label>
                                                    <x-forms.inputs.text id="site_name" value="{{ old('site_name', option('site_name', config('app.name'))) }}" name="site_name" placeholder="{{ __('Site Name') }}" />
                                                </div>
                                                <div class="form-group mb-3 d-flex justify-content-around">
                                                    <div>
                                                        <x-forms.inputs.label for="site_logo">{{ __('Logo') }}</x-forms.inputs.label>
                                                        <x-forms.inputs.image name="site_logo" value="{{ old('site_logo', option('site_logo')) }}" class="rounded-3" />
                                                    </div>
                                                    <div>
                                                        <x-forms.inputs.label for="site_favicon">{{ __('Favicon') }}</x-forms.inputs.label>
                                                        <x-forms.inputs.image name="site_favicon" value="{{ old('site_favicon',  option('site_favicon')) }}" class="rounded-3"/>
                                                    </div>
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
                            </div>
                            <!-- END #notifications -->

                            <!-- BEGIN #languages -->
                            <div id="languages" class="mb-5">
                                <h4><i class="fa fa-language fa-fw text-theme"></i>{{ __('Languages') }}</h4>
                                <p>{{ __('Language font support and auto translation enabled') }}</p>
                                <div class="card">
                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item d-flex align-items-center">
                                            <div class="flex-1 text-break">
                                                <div>{{ __('Language enabled') }}</div>
                                                <div class="text-white text-opacity-50">
                                                    {{ __('English (default), English, Vietnamese') }}
                                                </div>
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
                            </div>

                            <div class="text-end" id="save">
                                <x-forms.buttons.primary type="submit">Save</x-forms.buttons.primary>
                            </div>
                            <!-- END #languages -->
                        </form>
                        </div>
                        <!-- END col-9-->
                        <!-- BEGIN col-3 -->
                        <div class="col-xl-3">
                            <!-- BEGIN #sidebar-bootstrap -->
                            <nav id="sidebar-bootstrap" class="navbar navbar-sticky d-none d-xl-block">
                                <nav class="nav">
                                    <a class="nav-link" href="#general" data-toggle="scroll-to">{{ __('General') }}</a>
                                    <a class="nav-link" href="#languages" data-toggle="scroll-to">{{ __('Languages') }}</a>
                                    <a class="nav-link" href="#save" data-toggle="scroll-to">{{ __('Save') }}</a>
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
</x-layouts.master>
