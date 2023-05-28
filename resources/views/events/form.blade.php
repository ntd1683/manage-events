@csrf
<input type="hidden" name="author" value="{{ $event->author }}"/>
<div class="row">
    @if($event->id != null)
        <div class="form-group mb-3">
            <x-forms.inputs.label for="number_participants">{{ __('Number Of Participants') }}</x-forms.inputs.label>
            <x-forms.inputs.readonly id="number_participants" value="{{ old('number_participants', $event->number_participants) }}" />
        </div>
    @endif
    <div class="form-group mb-3">
        <x-forms.inputs.label for="title">{{ __('Title') }}</x-forms.inputs.label>
        <x-forms.inputs.text id="title" value="{{ old('title', $event->title) }}" name="title"
                             placeholder="{{ __('title') }}"/>
    </div>
    <div class="form-group mb-3">
        <x-forms.inputs.label for="subtitle">{{ __('Subtitle') }}</x-forms.inputs.label>
        <x-forms.inputs.text id="subtitle" value="{{ old('subtitle', $event->subtitle) }}" name="subtitle"
                             placeholder="{{ __('subtitle') }}"/>
    </div>
</div>
<div class="row">
    <div class="form-group mb-3">
        <x-forms.inputs.label for="description">{{ __('Description') }}</x-forms.inputs.label>
        <x-forms.inputs.text id="description" value="{{ old('description', $event->description) }}" name="description"
                             placeholder="{{ __('description') }}"/>
    </div>
    <div class="form-group mb-3">
        <x-forms.inputs.label for="content">{{ __('Content') }}</x-forms.inputs.label>
        <x-forms.inputs.textarea name="content" id="content"
                                 placeholder="{{ __('content') }}">{{ old('content', $event->content) }}</x-forms.inputs.textarea>
    </div>
</div>
<div class="row">
    <div class="form-group mb-3">
        <x-forms.inputs.label for="publish_at">{{ __('Publish') }}</x-forms.inputs.label>
        <!-- inline checkbox -->
        <div class="form-check">
            <x-forms.inputs.checkbox id="published" value="1" name="published"
                                     :checked="old('published', $event->published)">{{ __('Publish') }}</x-forms.inputs.checkbox>
        </div>
    </div>
    <div class="form-group mb-3">
        <x-forms.inputs.label for="happened_at">{{ __('Happened At') }}</x-forms.inputs.label>
        <x-forms.inputs.datepicker id="happened_at"
                                   value="{{ old('happened_at', \Illuminate\Support\Carbon::parse($event->happened_at)->format('d-m-Y')) }}"
                                   name="happened_at" placeholder="{{ __('d-m-Y') }}"/>
    </div>
    @if(auth()->user()->level === 4 && $event->id)
        <div class="form-group mb-3">
            <x-forms.inputs.label class="me-5">{{ __('Accept') }}</x-forms.inputs.label>
            <!-- inline checkbox -->
            <div class="form-check form-check-inline">
                <x-forms.inputs.radio id="accepted"
                                      value="1"
                                      name="accepted"
                                      :checked="old('accepted', $event->accepted)"
                >{{ __('Accept') }}</x-forms.inputs.radio>
            </div>
            <div class="form-check form-check-inline">
                <x-forms.inputs.radio id="no_accepted"
                                      value="0"
                                      name="accepted"
                                      :checked="old('accepted', $event->accepted)"
                >{{ __('No Accept') }}</x-forms.inputs.radio>
            </div>
        </div>
    @endif
</div>
<div class="row">
    <div class="form-group mb-3">
        <x-forms.inputs.label>{{ __('QR Code') }}</x-forms.inputs.label>
        <x-forms.inputs.image name="qr_code" value="{{ old('qr_code', $media) }}" class="rounded-3"/>
    </div>
</div>
<div class="text-end">
    @if($event->id !== null)
        <x-forms.buttons.danger type="button" class="me-2 btn-delete">
            {{ __('Delete') }}
        </x-forms.buttons.danger>
    @endif

    <x-forms.buttons.primary type="submit">
        {{ __('Submit') }}
    </x-forms.buttons.primary>

        @push('js')
            <script src="{{ asset('js/form-plugin.js') }}"></script>
            <script>
                window.addEventListener('load', () => {
                    $("#happened_at").datepicker({
                            startDate: new Date(),
                            autoclose: true,
                            format: 'dd-mm-yyyy',
                    });
                })
            </script>
        @endpush
</div>
