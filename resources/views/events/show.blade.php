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
                                    <x-forms.buttons.primary data-bs-toggle="modal"
                                                             data-bs-target="#modal_register"
                                                             data-event-id="{{ $event->id }}"
                                                             class="button-register"
                                    >{{ __('Register') }}</x-forms.buttons.primary>
                                    @if(auth()->user()->level == 4)
                                        <a class="btn btn-outline-theme" href="{{ route('events.scanQrCode', $event) }}">
                                            {{ __('Scan QR Code') }}
                                        </a>
                                        <a class="btn btn-outline-theme" href="{{ route('events.google.import') }}?event_id={{$event->id}}">
                                            {{ __('Import List Register') }}
                                        </a>
                                        <a class="btn btn-outline-theme" href="{{ route('events.edit', $event) }}">
                                            {{ __('Edit') }}
                                        </a>
                                    @endif
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
    <div class="toasts-container">
        <x-toast status="error" title="Error" time="1s ago">
            {{ session()->get('error') }}
        </x-toast>
    </div>
    <x-modal id="modal_register" title="{{ __('Register Event')}}" action="{{ route('ajax.events.store') }}"
             onsubmit="return false;" formId="form">
        <p>{{ __('Are you sure you want to register for the event?') }}</p>
        <x-slot:buttons>
            <x-forms.buttons.default type="button" data-bs-dismiss="modal" id="button_close_modal">
                {{ __('Close') }}
            </x-forms.buttons.default>
            <x-forms.buttons.primary type="button" id="submit_form">
                {{ __('Yes') }}
            </x-forms.buttons.primary>
        </x-slot:buttons>
    </x-modal>
    @push('js')
        <script>
            window.addEventListener('load', () => {
                let eventId;
                let buttonRegister = $('.button-register');
                let buttonSubmit = $('#submit_form');
                let url = $('#form').attr('action');
                buttonRegister.click((e) => {
                    eventId = e.target.dataset.eventId;
                });

                buttonSubmit.click(() => {
                    $.ajax({
                        method: 'GET',
                        url: url,
                        data: {
                            "event_id": eventId,
                        },
                        success: function (data) {
                            $('.message-success').text(data.message);
                            $('.toast-success').toast('show');
                            $('#button_close_modal').click();
                        },
                        error: function (data) {
                            $('.message-error').text(data.responseJSON.message);
                            $('.toast-error').toast('show');
                            $('#button_close_modal').click();
                        }
                    });
                })
            })
        </script>
    @endpush
</x-layouts.master>
