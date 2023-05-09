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
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">{{ __('FORMS') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('FORM ELEMENTS') }}</li>
                        </ul>

                        <h1 class="page-header">{{ __('Form Google') }}</h1>

                        <hr class="mb-4" />

                        <!-- BEGIN #formControls -->
                        <div id="formControls" class="mb-5">
                            <h4>{{ __('Form Google') }}</h4>
                            <div class="card">
                                <div class="card-body pb-2">
                                    <form action="{{ route('api.google-spreadsheet') }}" method="get">
                                        <div class="row">
                                            <div class="form-group mb-3">
                                                <label class="form-label" for="sheet_id">{{ __('Link Google Sheet: ') }}</label>
                                                <input type="text" class="form-control" id="sheet_id" value="{{ old('sheet_id') }}" name="sheet_id"
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
                                            <x-forms.buttons.primary type="submit">{{ __('Submit') }}</x-forms.buttons.primary>
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
