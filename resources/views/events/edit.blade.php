<x-layouts.master>
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/form-plugin.css') }}">
    @endpush
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

                        {{ Breadcrumbs::render('edit_event', $event) }}

                        <h1 class="page-header">
                        {{ __('Edit Event') }}
                        </h1>

                        <hr class="mb-4" />

                        <!-- BEGIN #formControls -->
                        <div id="formControls" class="mb-5">
                            <div class="card">
                                <div class="card-body pb-2">
                                    <form action="{{ route('events.update', $event) }}" method="post" enctype="multipart/form-data">
                                        @include('events.form', [$event, $media])
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

    <form action="{{ route('events.destroy', $event) }}" method="post" class="form-delete">
        @csrf
        @method('DELETE')
        <x-forms.buttons.danger type="submit" class="opacity-0">
            {{ __('Delete') }}
        </x-forms.buttons.danger>
    </form>
    <!-- END container -->
    @if(! $event->google_sheet)
        <x-forms.buttons.warning type="button" data-bs-toggle="modal" data-bs-target="#modal" id="button_google" class="opacity-0">{{ __('click') }}</x-forms.buttons.warning>
        <x-modal id="modal" title="{{ __('Google Import From Sheet')}}">
            <p>{{ __('Do you want to add members registered by google sheet') }}: </p>
            <x-slot:buttons>
                <a href="{{ route('events.google.import') }}?event_id={{ $event->id }}" class="btn btn-outline-theme">{{ __('Yes') }}</a>
                <button type="button" class="btn btn-default text-white" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </x-slot:buttons>
        </x-modal>
        @push('js')
            <script>
                window.addEventListener('load', () => {
                    $('#button_google').click();
                    $('.btn-delete').on('click', () => {
                        let confirm_delete = confirm("Are you sure you want to delete?");
                        if (confirm_delete === true) {
                            $('.form-delete').submit();
                        }
                    })
                });
            </script>
        @endpush
    @endif
</x-layouts.master>
