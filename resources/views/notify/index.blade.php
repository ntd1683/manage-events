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

                            {{ Breadcrumbs::render('notify') }}

                            <h1 class="page-header">
                                {{ __('All Notify') }}
                            </h1>

                            <hr class="mb-4" />

                            <!-- BEGIN #datatable -->
                            <div id="table" class="mb-5">
                                <p>{{ __('All notices on the web') }}</p>
                                <div class="card">
                                    <div class="card-body">
                                        <table id="datatableDefault" class="table text-nowrap w-100">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('Title') }}</th>
                                                <th>{{ __('Content') }}</th>
                                                <th>{{ __('Author') }}</th>
                                                <th>{{ __('Created At') }}</th>
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
                        ajax: "{!! route('ajax.notify.index') !!}",
                        columns: [
                            {data: 'id', name: 'id'},
                            {
                                data: 'title',
                                render: function (data, type, row, meta) {
                                    return `<p title="${data}">${data}</p>`;
                                }
                            },
                            {
                                data: 'content',
                                render: function (data, type, row, meta) {
                                    return `<p title="${data.title}">${data.value}</p>`;
                                }
                            },
                            {
                                data: 'author',
                                render: function (data, type, row, meta) {
                                    return `<p title="${data}">${data}</p>`;
                                }
                            },
                            {
                                data: 'created_at',
                                render: function (data, type, row, meta) {
                                    return `<p title="${data}">${data}</p>`;
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
            </script>
    @endpush
</x-layouts.master>
