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

                        <hr class="mb-4"/>

                        <!-- BEGIN #formControls -->
                        <div class="mb-5">
                            <div class="card">
                                <div class="card-body pb-2">
                                    <form action="{{ route('events.store') }}" method="post"
                                          enctype="multipart/form-data">
                                        @include('events.partials.form', [$event, $media, $emails])
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
                            <a class="nav-link" href="#formControls"
                               data-toggle="scroll-to">{{ __('Form Register Event') }}</a>
                            <a class="nav-link" href="#add_collaborators"
                               data-toggle="scroll-to">{{ __('Add Collaborators') }}</a>
                            <a class="nav-link" href="#qr_code" data-toggle="scroll-to">{{ __('QR Code') }}</a>
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
