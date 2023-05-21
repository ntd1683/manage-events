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
                        <div id="carouselMultiItemExample" class="carousel slide carousel-dark text-center" data-mdb-ride="carousel" >
                            <!-- Inner -->
                            <div class="carousel-inner py-4">
                            <!-- Single item -->
                                <div class="carousel-item active">
                                    <div class="container">
                                        <div class="row">
                                            @foreach($events as $event)
                                            <div class="col-lg-6 pb-2">
                                                    <div class="card">
                                                        <div class="card-body pb-2">
                                                            @if($event->media)
                                                                <div style="height:230px;"
                                                                     class="d-flex align-items-center justify-content-center">
                                                                    <img src="{{ $event->media }}"
                                                                         class="card-img-top h-100 img-fluid"
                                                                         alt="Waterfall" style="width: auto;"/>
                                                                </div>
                                                            @else
                                                                <div style="height:230px"
                                                                     class="d-flex align-items-center">
                                                                    <p title="{{ $event->description }}">{{ $event->description }}</p>
                                                                </div>
                                                            @endif
                                                            <hr>
                                                            <div>
                                                                <a href="#" class="text-decoration-none">
                                                                    <h5 class="card-title"
                                                                        title="{{ 'Detail' . $event->title }}">{{ Str::limit($event->title, 22) }}</h5>
                                                                </a>
                                                                <x-forms.buttons.primary data-bs-toggle="modal"
                                                                                         data-bs-target="#modal_register">{{ __('Register') }}</x-forms.buttons.primary>
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
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END col-9-->
                    </div>
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
    <x-modal id="modal_register" title="{{ __('Register Event')}}">
        <p>{{ __('Are you sure you want to register for the event?') }}</p>
        <x-slot:buttons>
            <button type="button" class="btn btn-default" data-bs-dismiss="modal">{{ __('Close') }}</button>
            <button type="button" class="btn btn-outline-theme" id="submit_form">{{ __('Yes') }}</button>
        </x-slot:buttons>
    </x-modal>
</x-layouts.master>
