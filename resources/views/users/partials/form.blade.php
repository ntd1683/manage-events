@csrf
@push('css')
    <link rel="stylesheet" href="{{ asset('css/form-plugin.css') }}">
@endpush
<div class="row" id="formControls" >
    <div class="form-group mb-3">
        <x-forms.inputs.label for="name">{{ __('Name') }}</x-forms.inputs.label>
        <x-forms.inputs.text id="name" required value="{{ old('name', $user->name) }}" name="name"
                             placeholder="Nguyễn Văn A"/>
        <x-forms.inputs.error messages="{{ $errors->first('name') }}"/>
    </div>
    <div class="form-group mb-3">
        <x-forms.inputs.label class="me-5">{{ __('Gender') }}</x-forms.inputs.label>
        <!-- inline checkbox -->
        <div class="form-check form-check-inline">
            <x-forms.inputs.radio value="1" name="gender" :checked="old('gender', $user->gender)"
            >{{ __('Male') }}</x-forms.inputs.radio>
        </div>
        <div class="form-check form-check-inline">
            <x-forms.inputs.radio value="0" name="gender" :checked="old('gender', $user->gender)"
            >{{ __('Female') }}</x-forms.inputs.radio>
        </div>
        <div class="form-check form-check-inline">
            <x-forms.inputs.radio value="2" name="gender" :checked="old('gender', $user->gender)"
            >{{ __('Other') }}</x-forms.inputs.radio>
        </div>
        <x-forms.inputs.error messages="{{ $errors->first('gender') }}"/>
    </div>
    <div class="form-group mb-3">
        <x-forms.inputs.label for="code_student">{{ __('Code Student') }}</x-forms.inputs.label>
        <x-forms.inputs.text id="code_student" value="{{ old('code_student', $user->code_student) }}" name="code_student"
                             placeholder="2188xxxx07368"/>
        <x-forms.inputs.error messages="{{ $errors->first('code_student') }}"/>
    </div>
    <div class="form-group mb-3">
        <x-forms.inputs.label for="class">{{ __('Class') }}</x-forms.inputs.label>
        <x-forms.inputs.text id="class" value="{{ old('class', $user->class) }}" name="class"
                             placeholder="21DTHC6"/>
        <x-forms.inputs.error messages="{{ $errors->first('class') }}"/>
    </div>
    <div class="form-group mb-3">
        <x-forms.inputs.label for="faculty">{{ __('Faculty') }}</x-forms.inputs.label>
        <x-forms.inputs.text id="faculty" value="{{ old('faculty', $user->faculty) }}" name="faculty"
                             placeholder="CNTT"/>
        <x-forms.inputs.error messages="{{ $errors->first('faculty') }}"/>
    </div>
    @if($user->id == null)
    <div class="form-group mb-3">
        <x-forms.inputs.label for="email">{{ __('Email') }}</x-forms.inputs.label>
        <x-forms.inputs.text required id="email" value="{{ old('email', $user->email) }}" name="email"
                             placeholder="xxxxx@xxxx.xxx"/>
        <x-forms.inputs.error messages="{{ $errors->first('email') }}"/>
    </div>
    @endif
    <div class="form-group mb-3">
        <x-forms.inputs.label for="phone">{{ __('Phone') }}</x-forms.inputs.label>
        <x-forms.inputs.text id="phone" value="{{ old('phone', $user->phone) }}" name="phone"
                             placeholder="0xxxxxxxx0"/>
        <x-forms.inputs.error messages="{{ $errors->first('phone') }}"/>
    </div>
    <div class="form-group mb-3">
        <x-forms.inputs.label for="content">{{ __('Level') }}</x-forms.inputs.label>
        <x-forms.inputs.select class="me-2" name="level">
            @foreach($levels as $key => $level)
                <option value="{{ $level }}">{{ $key }}</option>
            @endforeach
        </x-forms.inputs.select>
        <x-forms.inputs.error messages="{{ $errors->first('level') }}"/>
    </div>
</div>
<div class="text-end">
    @if($user->id !== null)
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
