@csrf
@push('css')
    <link rel="stylesheet" href="{{ asset('css/form-plugin.css') }}">
@endpush
<input type="hidden" name="author" value="{{ $event->author }}"/>
<div class="row" id="formControls" >
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
        <x-forms.inputs.error messages="{{ $errors->first('title') }}"/>
    </div>
    <div class="form-group mb-3">
        <x-forms.inputs.label for="subtitle">{{ __('Subtitle') }}</x-forms.inputs.label>
        <x-forms.inputs.text id="subtitle" value="{{ old('subtitle', $event->subtitle) }}" name="subtitle"
                             placeholder="{{ __('subtitle') }}"/>
        <x-forms.inputs.error messages="{{ $errors->first('subtitle') }}"/>
    </div>

        <div class="form-group mb-3">
            <x-forms.inputs.label for="description">{{ __('Description') }}</x-forms.inputs.label>
            <x-forms.inputs.text id="description" value="{{ old('description', $event->description) }}" name="description"
                                 placeholder="{{ __('description') }}"/>
            <x-forms.inputs.error messages="{{ $errors->first('description') }}"/>
        </div>
        <div class="form-group mb-3">
            <x-forms.inputs.label for="content">{{ __('Content') }}</x-forms.inputs.label>
            <x-forms.inputs.textarea class="summernote" name="content" id="content"
                                     placeholder="{{ __('content') }}">{{ old('content', $event->content) }}</x-forms.inputs.textarea>
            <x-forms.inputs.error messages="{{ $errors->first('content') }}"/>
        </div>
        <div class="form-group mb-3">
            <x-forms.inputs.label for="publish_at">{{ __('Publish') }}</x-forms.inputs.label>
            <!-- inline checkbox -->
            <div class="form-check">
                <x-forms.inputs.checkbox id="published" value="1" name="published"
                                         :checked="old('published', $event->published)">{{ __('Publish') }}</x-forms.inputs.checkbox>
            </div>
            <x-forms.inputs.error messages="{{ $errors->first('published') }}"/>
        </div>
        <div class="form-group mb-3">
            <x-forms.inputs.label for="happened_at">{{ __('Event Venue') }}</x-forms.inputs.label>
            <x-forms.inputs.datepicker id="happened_at"
                                       value="{{ old('happened_at', \Illuminate\Support\Carbon::parse($event->happened_at)->format('d-m-Y')) }}"
                                       name="happened_at" placeholder="{{ __('d-m-Y') }}"/>
            <x-forms.inputs.error messages="{{ $errors->first('happened_at') }}"/>
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
                <x-forms.inputs.error messages="{{ $errors->first('accepted') }}"/>
            </div>
        @endif
</div>
<div class="row" id="add_collaborators">
    <div class="form-group mb-3">
        <x-forms.inputs.label>{{ __('Code Manage Event') }}</x-forms.inputs.label>
        <div class="input-group">
            <x-forms.inputs.text name="code" value="{{ old('code', $event->code) }}" id="code"/>
            <button type="button" class="input-group-text" id="generate_code">
                <i class="fa-solid fa-wand-magic-sparkles"></i>
            </button>
        </div>
        <x-forms.inputs.error messages="{{ $errors->first('code') }}"/>
    </div>
    <div class="ms-0 me-0 mb-3">
        <span class="d-none" id="url_check_email">{{ route('ajax.user.check-email') }}</span>
        <x-forms.inputs.label>{{ __('Add Collaborators') }}</x-forms.inputs.label>
        <x-forms.inputs.text id="tagify" name="emails" value="{{ old('emails', $emails) }}" />
        <x-forms.inputs.error messages="{{ $errors->first('emails') }}"/>
    </div>
</div>
<div class="row" id="qr_code">
    <div class="form-group mb-3">
        <x-forms.inputs.label>{{ __('QR Code') }}</x-forms.inputs.label>
        <x-forms.inputs.image name="qr_code" value="{{ old('qr_code', $media) }}" class="rounded-3"/>
        <x-forms.inputs.error messages="{{ $errors->first('qr_code') }}"/>
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
        @endpush
</div>
