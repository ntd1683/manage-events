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

            .my-button:hover {
                background-color: #3e8e41
            }

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
    <div class="mb-3">
        <form action="{{ route('ajax.scan-qrcode') }}" method="post" onsubmit="return false" id="form">
            @csrf
            <x-forms.inputs.label>{{ __('Select Event') }}</x-forms.inputs.label>
            <x-forms.inputs.select name="event_id" id="select_event">
                <option value="-1">{{ __('Choose Event In Progress') }}</option>
                @foreach($events as $event)
                    <option value="{{ $event->id }}" @selected($eventId == $event->id)>{{ $event->title }}</option>
                @endforeach
            </x-forms.inputs.select>
        </form>
    </div>
    <div id="reader" width="600px" class="bg-gray-800 rounded"></div>

    <x-forms.buttons.warning type="button" data-bs-toggle="modal" data-bs-target="#modal_success" id="button_success"
                             class="opacity-0">{{ __('Success') }}</x-forms.buttons.warning>
    <x-modal id="modal_success" title="{{ __('Success') }}">
        <div>
            <p>{{ __('Successfully added') }}</p>
        </div>
        <x-slot:buttons>
            <button type="button" class="btn btn-default text-white" data-bs-dismiss="modal">{{ __('Close') }}</button>
        </x-slot:buttons>
    </x-modal>
    <!-- END #content -->
    @push('js')
        <script src="{{ asset('js/scan-qrcode.js') }}"></script>
    @endpush
</x-layouts.master>
