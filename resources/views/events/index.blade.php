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
                                            <div class="col-lg-4">
                                                <div class="card">
                                                    <img src="\\wsl.localhost\Ubuntu\home\huynguyen\manage-events\public\images\anh-dai-dien-FB-200.jpg" class="card-img-top" alt="Waterfall" />
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ __('Title') }}</h5>
                                                        <a href="#!" class="btn btn-primary">{{ __('Register') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 d-none d-lg-block">
                                                <div class="card">
                                                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/182.webp" class="card-img-top" alt="Sunset Over the Sea" />
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ __('Title') }}</h5>
                                                        <a href="#!" class="btn btn-primary">{{ __('Register') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 d-none d-lg-block">
                                                <div class="card">
                                                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/nature/183.webp" class="card-img-top" alt="Sunset over the Sea" />
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ __('Title') }}</h5>
                                                        <p class="card-text">
                                                        {{ __('Description') }}
                                                        </p>
                                                        <a href="#!" class="btn btn-primary">{{ __('Register') }}</a>
                                                    </div>
                                                </div>
                                            </div>
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
</x-layouts.master>
