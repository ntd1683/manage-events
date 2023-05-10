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
                                    <form action="{{ route('api.google-spreadsheet') }}" method="get">
                                        <div class="row">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="title_id">{{ __('Title:') }}</label>
                                                <input type="text" class="form-control" id="title_id" value="{{ old('title_id') }}" name="title_id"
                                                       placeholder="{{ __('title') }}"/>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="subtitle_name">{{ __('Subtitle:') }}</label>
                                                <input type="text" class="form-control" id="Subtitle_name" value="{{ old('subtitle_name') }}" name="subtitle_name"
                                                       placeholder="{{ __('subtitle') }}"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="author">{{ __('Author:') }}</label>
                                                <input type="text" class="form-control" id="author" value="{{ old('author') }}" name="author"
                                                       placeholder="{{ __('author name') }}"/>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="description">{{ __('Description:') }}</label>
                                                <input type="text" class="form-control" id="description" value="{{ old('description') }}" name="description"
                                                       placeholder="{{ __('description') }}"/>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="content">{{ __('Content:') }}</label>
                                                <textarea name="conent" id="content" class="form-control" value="{{ old('content') }}" cols="30" rows="5"placeholder="{{ __('content') }}"></textarea>
                                            </div>

                                        </div>
                                        <div class="text-center">
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
