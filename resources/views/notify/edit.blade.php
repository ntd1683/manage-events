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

                        {{ Breadcrumbs::render('create_notify') }}

                        <h1 class="page-header">
                            {{ __('Edit Notify') }}
                        </h1>

                        <hr class="mb-4"/>

                        <!-- BEGIN #formControls -->
                        <div class="mb-5">
                            <div class="card">
                                <div class="card-body pb-2">
                                    <form action="{{ route('notify.update', $notify) }}" method="post">
                                        @method('PUT')
                                        @include('notify.partials.form', $notify)
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
    <form action="{{ route('notify.destroy', $notify) }}" method="post" class="form-delete">
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
