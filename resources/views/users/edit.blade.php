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

                        {{ Breadcrumbs::render('edit_user', $user) }}

                        <h1 class="page-header">
                            {{ __('Edit User') }}
                        </h1>

                        <hr class="mb-4"/>

                        <!-- BEGIN #formControls -->
                        <div class="mb-5">
                            <div class="card">
                                <div class="card-body pb-2">
                                    <form action="{{ route('users.update', $user) }}" method="post">
                                        @method('PUT')
                                        @include('users.partials.form', $user)
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
                               data-toggle="scroll-to">{{ __('Form Register User') }}</a>
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
    <!-- END container -->    <!-- END container -->
    <form action="{{ route('users.destroy', $user) }}" method="post" class="form-delete">
        @csrf
        @method('DELETE')
        <x-forms.buttons.danger type="submit" class="opacity-0">
            {{ __('Delete') }}
        </x-forms.buttons.danger>
    </form>
    @push('js')
        <script>
            window.addEventListener('load', () => {
                $('.btn-delete').on('click', () => {
                    let confirm_delete = confirm("Are you sure you want to delete?");
                    if (confirm_delete === true) {
                        $('.form-delete').submit();
                    }
                })
            });
        </script>
    @endpush
</x-layouts.master>
