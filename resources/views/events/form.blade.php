@csrf
<input type="hidden" name="author" value="{{ $event->author }}"/>
<div class="row">
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
        <x-forms.inputs.label for="publish_at">{{ __('Publish At') }}</x-forms.inputs.label>
        <x-forms.inputs.datepicker id="publish_at" value="{{ old('publish_at', $event->publish_at) }}" name="publish_at"
                                   placeholder="{{ __('d-m-Y') }}"/>
    </div>
    <div class="form-group mb-3">
        <x-forms.inputs.label for="happened_at">{{ __('Happened At') }}</x-forms.inputs.label>
        <x-forms.inputs.datepicker id="happened_at"
                                   value="{{ old('happened_at', \Illuminate\Support\Carbon::parse($event->happened_at)->format('d-m-Y')) }}"
                                   name="happened_at" placeholder="{{ __('d-m-Y') }}"/>
    </div>
    @if(auth()->user()->level === 4)
        <div class="form-group mb-3">
            <x-forms.inputs.label for="accepted">{{ __('Accept') }}</x-forms.inputs.label>
            <!-- inline checkbox -->
            <div class="form-check">
                <x-forms.inputs.checkbox id="accepted" value="1" name="accepted"
                                         :checked="old('accepted', $event->accepted)">{{ __('Accept') }}</x-forms.inputs.checkbox>
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
</div>
