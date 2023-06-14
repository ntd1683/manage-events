@csrf
@push('css')
    <link rel="stylesheet" href="{{ asset('css/form-plugin.css') }}">
@endpush
<div class="row" id="formControls" >
    <div class="form-group mb-3">
        <x-forms.inputs.label for="title">{{ __('Title') }}</x-forms.inputs.label>
        <x-forms.inputs.text id="title" value="{{ old('title', $notify->title) }}" name="title"
                             placeholder="{{ __('title') }}"/>
    </div>
    <div class="form-group mb-3">
        <x-forms.inputs.label for="content">{{ __('Content') }}</x-forms.inputs.label>
        <x-forms.inputs.text id="content" value="{{ old('content', $notify->content) }}" name="content"
                             placeholder="{{ __('content') }}"/>
    </div>
    <div class="form-group mb-3">
        <x-forms.inputs.label for="link">{{ __('Link') }}</x-forms.inputs.label>
        <x-forms.inputs.text id="link" value="{{ old('link', $notify->link) }}" name="link"
                             placeholder="{{ __('link') }}"/>
    </div>
    <div class="form-group mb-3">
        <div class="d-flex justify-content-between">
            <x-forms.inputs.label for="icon">{{ __('Icon') }}</x-forms.inputs.label>
                <a class="active text-decoration-none" style="cursor: pointer" id="back_icon">{{ __('Back') }}</a>
        </div>
        <x-forms.inputs.fontawesome value="{{ old('icon', $notify->icon) }}" name="icon"
                             placeholder="{{ __('icon') }}"/>
    </div>
</div>
<div class="text-end">
    @if($notify->id !== null)
        <x-forms.buttons.danger type="button" class="me-2 btn-delete">
            {{ __('Delete') }}
        </x-forms.buttons.danger>
    @endif

    <x-forms.buttons.primary type="submit">
        {{ __('Submit') }}
    </x-forms.buttons.primary>
</div>
@push('js')
    <script src="{{ asset('js/form-plugin.js') }}"></script>
@endpush
