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

                        {{ Breadcrumbs::render('create_event') }}

                        <h1 class="page-header">
                        {{ __('Create Event') }}
                        </h1>

                        <hr class="mb-4" />

                        <!-- BEGIN #formControls -->
                        <div id="formControls" class="mb-5">
                            <div class="card">
                                <div class="card-body pb-2">
                                    <form action="{{ route('events.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="form-group mb-3">
                                                <x-forms.inputs.label for="title">{{ __('Title') }}</x-forms.inputs.label>
                                                <x-forms.inputs.text id="title" value="{{ old('title') }}" name="title" placeholder="{{ __('title') }}" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <x-forms.inputs.label for="subtitle">{{ __('Subtitle') }}</x-forms.inputs.label>
                                                <x-forms.inputs.text id="subtitle" value="{{ old('subtitle') }}" name="subtitle" placeholder="{{ __('subtitle') }}" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-3">
                                                <x-forms.inputs.label for="description">{{ __('Description') }}</x-forms.inputs.label>
                                                <x-forms.inputs.text id="description" value="{{ old('description') }}" name="description" placeholder="{{ __('description') }}" />
                                            </div>
                                            <div class="form-group mb-3">
                                                <x-forms.inputs.label for="content">{{ __('Content') }}</x-forms.inputs.label>
                                                <x-forms.inputs.textarea name="content" id="content" placeholder="{{ __('content') }}">{{ old('content') }}</x-forms.inputs.textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-3">
                                                <x-forms.inputs.label>{{ __('QR Code') }}</x-forms.inputs.label>
                                                <x-forms.inputs.image name="qr_code" value="{{ old('qr_code') }}"/>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <x-forms.buttons.primary type="submit">
                                                {{ __('Submit') }}
                                            </x-forms.buttons.primary>
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
                        <!-- END #formControls -->
                    </div>
                    <!-- END col-9-->
                    <!-- BEGIN col-3 -->
                    <div class="col-xl-3">
                        <!-- BEGIN #sidebar-bootstrap -->
                        <x-layouts.partials.menu-container>
                            <a class="nav-link" href="#formControls" data-toggle="scroll-to">{{ __('Register Event') }}</a>
                        </x-layouts.partials.menu-container>
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
