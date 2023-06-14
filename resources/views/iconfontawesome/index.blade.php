<?php

$notify = new \App\Models\Notify();
?>
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

                        <h1 class="page-header">
                            {{ __('Add Icon') }}
                        </h1>

                        <hr class="mb-4"/>

                        <!-- BEGIN #formControls -->
                        <div class="mb-5">
                            <div class="card">
                                <div class="card-body pb-2">
                                    <form action="{{ route('notify.store') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
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
                </div>
                <!-- END row -->
            </div>
            <!-- END col-10 -->
        </div>
        <!-- END row -->
    </div>
    <!-- END container -->
</x-layouts.master>
