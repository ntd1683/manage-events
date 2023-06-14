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

                        {{ Breadcrumbs::render('manage') }}

                        <div class="d-flex justify-content-between">
                            <h1 class="page-header">{{ __('More Collaborators') }}</h1>
                        </div>

                        <hr class="mb-4" />
                        <!-- BEGIN #formControls -->
                        <div id="formControls" class="mb-5">
                            <div class="card">
                                <div class="card-body pb-2">
                                    <form action="{{ route('events.manage.store') }}" method="post">
                                        @csrf
                                        <div class="mb-2">
                                            <x-forms.inputs.label>{{ __('Select Event') }}</x-forms.inputs.label>
                                            <x-forms.inputs.select name="event_id">
                                                @foreach($events as $event)
                                                    <option value="{{ $event->id }}">{{ $event->title }}</option>
                                                @endforeach
                                            </x-forms.inputs.select>
                                        </div>
                                        <div class="mb-2">
                                            <x-forms.inputs.label>{{ __('Enter Code') }}</x-forms.inputs.label>
                                            <x-forms.inputs.text name="code" value="{{ old('code') }}"/>
                                        </div>
                                        <div class="text-end">
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
</x-layouts.master>
