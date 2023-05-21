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
    {{ Breadcrumbs::render('scan-qrcode') }}

    <h1 class="page-header">
        {{ __('Scan QR CODE') }} <small>{{ __('Attendance list of students') }}</small>
    </h1>
    <div id="reader" width="600px" class="bg-gray-800 rounded"></div>
    <!-- END #content -->
    @push('js')
        <script src="{{ asset('js/scan-qrcode.js') }}"></script>
    @endpush
</x-layouts.master>