<x-layouts.master>
    @push('css')
        <style>
            .my-button {
                padding: 5px;
                font-size: 18px;
                text-align: center;
                cursor: pointer;
                outline: none;
                color: #fff;
                background-color: #04AA6D;
                border: none;
                border-radius: 15px;
                box-shadow: 0 9px #999;
                margin-bottom: 10px;
            }

            .my-button:hover {background-color: #3e8e41}

            .my-button:active {
                background-color: #3e8e41;
                box-shadow: 0 5px #666;
                transform: translateY(4px);
            }
        </style>
    @endpush
    <!-- BEGIN #content -->
    {{ Breadcrumbs::render('index') }}

        <h1 class="page-header">
            {{ __('Starter Page') }} <small>{{ __('page header description goes here...') }}</small>
        </h1>

        <p>
            {{ __(' Start build your page here') }}
        </p>
    <div id="reader" width="600px" class="bg-gray-800 rounded"></div>
    <!-- END #content -->
    @push('js')
        <script src="{{ asset('js/scan-qrcode.js') }}"></script>
    @endpush
</x-layouts.master>
