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
                        {{ Breadcrumbs::render('show_event', $event) }}

                        <h1 class="page-header">
                            {{ __('Detail Event') }}
                        </h1>

                        <hr class="mb-4" />

                        <!-- BEGIN #formControls -->
                        <div id="formControls" class="mb-5">
                            <div class="card">
                                <div class="card-body pb-2">
                                    <h3>{{ $event->title }}</h3>
                                    <h5>{{ $event->subtitle }}</h5>
                                    <h5 class="text-theme">{{ __('Event Day: ') }}{{ $event->happened_at }}</h5>
                                    <hr>
                                    <h5>{{ $event->description }}</h5>
                                    <hr>
                                    <div>{!! $event->content !!}  }}</div>
                                    <a class="btn btn-outline-theme" href="{{ route('events.scanQrCode', $event) }}">
                                        {{ __('Scan QR Code') }}
                                    </a>
                                    <a class="btn btn-outline-theme" href="{{ route('events.google.import') }}">
                                        {{ __('Import List Register') }}
                                    </a>
                                    <x-forms.buttons.primary type="button">
                                        {{ __('Edit') }}
                                    </x-forms.buttons.primary>
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
                            <a class="nav-link" href="#formControls" data-toggle="scroll-to">{{ __('Title') }}</a>
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
