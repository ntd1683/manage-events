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
        <div class="d-flex justify-content-between">
            <h1 class="page-header">
                {{ __('Scan QR CODE') }} <small>{{ __('Attendance list of students') }}</small>
            </h1>
            <x-forms.buttons.warning type="button" data-bs-toggle="modal" data-bs-target="#modal_error" id="button_error">{{ __('Scan QR Code') }}</x-forms.buttons.warning>
        </div>
    <div class="mb-3">
        <input type="hidden" value="{{ route('ajax.scan-qrcode.getcode') }}" id="getCode">
        <form action="{{ route('ajax.scan-qrcode') }}" method="post" onsubmit="return false" id="form">
            @csrf
            @foreach($events as $event)
                @if($event->media)
                <input type="text" class="d-none" id="media_{{ $event->id }}"
                       value="{{ Storage::url($event->media) }}">
                @endif
            @endforeach
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
        <div class="text-center">
            <h3>{{ __('Successfully added') }}</h3>
        </div>
        <x-slot:buttons>
            <button type="button" class="btn btn-default text-white" data-bs-dismiss="modal">{{ __('Close') }}</button>
        </x-slot:buttons>
    </x-modal>

    <x-modal id="modal_error" title="{{ __('Error') }}">
        <div class="text-center">
            <h3>{{ __('Register through google form') }}</h3>
            <p id="text_error" class="mb-2"></p>
            <div id="qrcode" class="d-flex justify-content-center">

            </div>
        </div>
        <x-slot:buttons>
            <button type="button" class="btn btn-default text-white" data-bs-dismiss="modal">{{ __('Close') }}</button>
        </x-slot:buttons>
    </x-modal>
    <!-- END #content -->
    @push('js')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
        <script src="{{ asset('js/scan-qrcode.js') }}"></script>
    @endpush
</x-layouts.master>
