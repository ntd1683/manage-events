<x-layouts.master>
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/datatable.css') }}">
    @endpush
    <!-- BEGIN container -->
    <div class="container">
        <!-- BEGIN row -->
        <div class="row justify-content-center">
            <!-- BEGIN col-10 -->
            <div class="col-xl-12">
                <!-- BEGIN row -->
                <div class="row">
                    <!-- BEGIN col-9 -->
                    <div class="col-xl-10">

                        {{ Breadcrumbs::render('analytics_user') }}

                        <h1 class="page-header">
                            {{ __('All Users') }}
                        </h1>

                        <hr class="mb-4" />

                        <!-- BEGIN #datatable -->
                        <div id="table" class="mb-5">

                            <div class="filter d-flex justify-content-between mb-2">
                                    <x-forms.inputs.select class="me-2" id="select_level">
                                        <option value="-1">{{ __('Selected Level') }}</option>
                                        @foreach($levels as $key => $level)
                                            <option value="{{ $level }}">{{ $key }}</option>
                                        @endforeach
                                    </x-forms.inputs.select>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <table id="datatableDefault" class="table text-nowrap w-100">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Gender') }}</th>
                                            <th>{{ __('Email') }}</th>
                                            <th>{{ __('Level') }}</th>
                                            <th>{{ __('Join date') }}</th>
                                            <th>{{ __('Edit') }}</th>
                                            <th>{{ __('Destroy') }}</th>
                                        </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="card-arrow">
                                    <div class="card-arrow-top-left"></div>
                                    <div class="card-arrow-top-right"></div>
                                    <div class="card-arrow-bottom-left"></div>
                                    <div class="card-arrow-bottom-right"></div>
                                </div>
                            </div>
                        </div>
                        <!-- END #datatable -->
                    </div>
                    <!-- END col-9-->
                    <!-- BEGIN col-3 -->
                    <div class="col-xl-2">
                        <!-- BEGIN #sidebar-bootstrap -->
                        <nav id="sidebar-bootstrap" class="navbar navbar-sticky d-none d-xl-block">
                            <nav class="nav">
                                <a class="nav-link" href="#table" data-toggle="scroll-to">{{ __('Table') }}</a>
                            </nav>
                        </nav>
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
    @push('js')
        <script src="{{ asset('js/datatable.js') }}"></script>
        <script type="module">
            let table;
            const handleRenderTableData = function() {
                table = $('#datatableDefault').DataTable({
                    destroy: true,
                    dom: "<'row mb-3'<'col-md-4 mb-3 mb-md-0'l><'col-md-8 text-right'<'d-flex justify-content-end'fB>>>t<'row align-items-center'<'mr-auto col-md-6 mb-3 mb-md-0 mt-n2 'i><'mb-0 col-md-6'p>>",
                    lengthMenu: [ 10, 20, 30, 40, 50 ],
                    responsive: true,
                    ajax: {
                        "url": "{!! route('ajax.users.analytics') !!}",
                        "data": function ( d ) {
                            return $.extend( {}, d, {
                                "level": $('#select_level').val(),
                            } );
                        }
                    },
                    columns: [
                        {data: 'id', name: 'id'},

                        {data: 'name', name: 'name'},
                        {data: 'gender', name: 'gender'},
                        {data: 'email', name: 'email'},
                        {data: 'level', name: 'level'},
                        {data: 'created_at', name: 'created_at'},
                        {
                            data: 'edit',
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row, meta) {
                                return `<a class="btn btn-sm bg-success-light mr-2" href="${data}"><i class="far fa-edit mr-1"></i>Edit</a>`;
                            }
                        },
                        {
                            data: 'destroy',
                            orderable: false,
                            searchable: false,
                            render: function (data, type, row, meta) {
                                return `<form action="${data}" method="post">
                                    @csrf
                                @method('DELETE')
                                <button type='button' class="btn btn-sm bg-danger-light mr-2 btn-delete"><i class="far fa-trash-alt mr-1"></i>Delete</button>
                                </form>`;
                            }
                        },
                    ],
                    buttons: [
                        { extend: 'print', className: 'btn btn-outline-default btn-sm ms-2' },
                        { extend: 'csv', className: 'btn btn-outline-default btn-sm' }
                    ],
                });
            };

            $(document).ready(function () {
                handleRenderTableData();
            });

            $('#select_level').on('change', () => {
                table.ajax.reload();
            });

            $(document).on('click','.btn-delete',function(){
                let confirm_delete = confirm("Are you sure you want to delete?");
                if (confirm_delete === true) {
                    let form = $(this).parents('form');
                    try {
                        $.ajax({
                            type: "POST",
                            url: form.attr('action'),
                            data: form.serialize(),
                            dataType: "json",
                            success: function (response) {
                                if(response.success === true) {
                                    $('.message-success').text(response.message);
                                    $('.toast-success').toast('show');
                                }
                                else if(response.success === false) {
                                    $('.message-error').text(response.message);
                                    $('.toast-error').toast('show');
                                }
                            },
                            error: function(e) {
                                $('.message-error').text(e.responseJSON.message);
                                $('.toast-error').toast('show');
                            },
                        });
                    } catch (e) {
                        $('.message-error').text('Deleted failure event');
                        $('.toast-error').toast('show');
                    }
                    table.draw();
                    table.ajax.reload();
                }
            });
        </script>
    @endpush
</x-layouts.master>
