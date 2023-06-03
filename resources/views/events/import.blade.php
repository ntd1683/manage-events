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

                        {{ Breadcrumbs::render('google') }}

                        <div class="d-flex justify-content-between">
                            <h1 class="page-header">{{ __('Form Google') }}</h1>
                            <x-forms.buttons.warning type="submit" data-bs-toggle="modal" data-bs-target="#modalCoverExample" id="button_how_to_use">{{ __('How to use') }}</x-forms.buttons.warning>
                        </div>

                        <hr class="mb-4" />

                        <!-- BEGIN #formControls -->
                        <div id="formControls" class="mb-5">
                            <div class="card">
                                <div class="card-body pb-2">
                                    <form action="{{ route('ajax.google-spreadsheet') }}" onsubmit="return false" id="form">
                                        <div class="row">
                                            <x-forms.inputs.label for="eventId">{{ __('Select Event') }}</x-forms.inputs.label>
                                            @csrf
                                            <x-forms.inputs.select class="mb-3" name="event_id" id="select_event">
                                                <option value="-1">{{ __('Choose Event Import') }}</option>
                                                @foreach($events as $event)
                                                    <option value="{{ $event->id }}" @selected($eventId == $event->id) >{{ $event->title }}</option>
                                                @endforeach
                                            </x-forms.inputs.select>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="sheet_id">{{ __('Link Google Sheet: ') }}</label>
                                                <input type="text" class="form-control" id="sheet_id" value="{{ old('sheet') }}" name="sheet"
                                                       placeholder="https://docs.google.com/spreadsheets/d/xxxxxxxx/edit#gid=866183761"/>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="sheet_tab_name">{{ __('Name Tab Google Sheet: ') }}</label>
                                                <input type="text" class="form-control" id="sheet_tab_name" value="{{ old('sheet_tab_name') }}" name="sheet_tab_name"
                                                       placeholder="{{ __('SHEET 1') }}"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="name">{{ __('Name of column name: ') }}</label>
                                                <input type="text" class="form-control" id="name" value="{{ old('name') }}" name="name"
                                                       placeholder="{{ __('name') }}"/>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="code_student">{{ __('Name of column code student: ') }}</label>
                                                <input type="text" class="form-control" id="code_student" value="{{ old('code_student') }}" name="code_student"
                                                       placeholder="{{ __('code_student') }}"/>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="class">{{ __('Name of column code class: ') }}</label>
                                                <input type="text" class="form-control" id="class" value="{{ old('class') }}" name="class"
                                                       placeholder="{{ __('class') }}"/>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="faculty">{{ __('Name of column faculty: ') }}</label>
                                                <input type="text" class="form-control" id="faculty" value="{{ old('faculty') }}" name="faculty"
                                                       placeholder="{{ __('faculty') }}"/>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="phone">{{ __('Name of column phone: ') }}</label>
                                                <input type="text" class="form-control" id="phone" value="{{ old('phone') }}" name="phone"
                                                       placeholder="{{ __('phone') }}"/>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="email">{{ __('Name of column email: ') }}</label>
                                                <input type="text" class="form-control" id="email" value="{{ old('email') }}" name="email"
                                                       placeholder="{{ __('email') }}"/>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <x-forms.buttons.primary type="button" disabled id="button_submit">
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
                            <a class="nav-link" href="#formControls" data-toggle="scroll-to">{{ __('Form controls') }}</a>
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

    <x-modal id="modalCoverExample" title="{{ __('How to use')}}">
        <p>{{ __('This is link') }}: </p>
        <img src="{{ asset('images/google/link.png') }}" alt="{{ __('Link Google Sheet') }}" style="height: 23px;width: auto;">
        <p>{{ __('This is tab') }}: </p>
        <img src="{{ asset('images/google/tab.png') }}" alt="{{ __('Name Tab Google Sheet') }}:" style="height: 30px;width: auto;">
        <p>{{ __('This is name column') }}: </p>
        <img src="{{ asset('images/google/column.png') }}" alt="{{ __('Name of column') }}" style="height: 20px;width: 100%;">
        <x-slot:buttons>
            <button type="button" class="btn btn-default text-white" data-bs-dismiss="modal">{{ __('Close') }}</button>
        </x-slot:buttons>
    </x-modal>

    <x-forms.buttons.warning type="button" data-bs-toggle="modal" data-bs-target="#modal_error" id="button_error" class="opacity-0">{{ __('Error') }}</x-forms.buttons.warning>
    <x-modal id="modal_error" title="{{ __('Error') }}">

        <x-slot:buttons>
            <button type="button" class="btn btn-default text-white" data-bs-dismiss="modal">{{ __('Close') }}</button>
        </x-slot:buttons>
    </x-modal>

    <x-toast status="success" title="Success" time="1s ago">
    </x-toast>

    <x-toast status="error" title="Error" time="1s ago">
    </x-toast>

    @push('js')
        <script src="{{ asset('js/google.js') }}"></script>
    @endpush
</x-layouts.master>
