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

                        {{ Breadcrumbs::render('events') }}

                        <h1 class="page-header">
                        {{ __('Event') }}
                        </h1>
                        <hr class="mb-4" />
                        <div id="carouselMultiItemExample" class="carousel slide carousel-dark text-center" data-mdb-ride="carousel" >
                            <!-- Inner -->
                            <form action="{{ route('ajax.events.index') }}" id="form_filter"
                                  onsubmit="return false;">
                                <div class="d-flex justify-content-between">
                                    <x-forms.inputs.text placeholder="{{ __('Enter title events') }}" id="search_filter"
                                                         style="width:70%;"/>
                                    <x-forms.inputs.select id="select_filter" style="width:25%;">
                                        <option value="-1">{{ __('Select filters') }}</option>
                                        <option value="0">{{ __('Oldest') }}</option>
                                        <option value="1">{{ __('Newest') }}</option>
                                    </x-forms.inputs.select>
                                </div>
                            </form>
                            <div class="carousel-inner py-4">
                            <!-- Single item -->
                                <div class="carousel-item active">
                                    <div class="container" id="list_events">
                                        @include('events.partials.list', $events)
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END col-9-->
                    </div>
                </div>
                <!-- END row -->
            </div>
            <!-- END col-10 -->
        </div>
        <!-- END row -->
    </div>
    <!-- END container -->
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
    <div class="toasts-container">
        <x-toast status="error" title="Error" time="1s ago">
            {{ session()->get('error') }}
        </x-toast>
    </div>
    @push('js')
        <script src="{{ asset('js/event.js') }}"></script>
    @endpush
</x-layouts.master>
