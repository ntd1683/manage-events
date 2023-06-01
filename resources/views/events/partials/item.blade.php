<div class="card-body pb-2">
    @if($event->media)
        <div style="height:230px;"
             class="d-flex align-items-center justify-content-center">
            <img src="{{ Storage::url($event->media) }}"
                 class="card-img-top h-100 img-fluid"
                 alt="{{ $event->title }}" style="width: auto;"/>
        </div>
    @else
        <div style="height:230px"
             class="d-flex align-items-center">
            <p title="{{ $event->description }}">{{ $event->description }}</p>
        </div>
    @endif
    <hr>
    <div>
        <a href="{{ route("events.show", $event) }}" class="text-decoration-none">
            <h5 class="card-title"
                title="{{ 'Detail' . $event->title }}">{{ Str::limit($event->title, 22) }}</h5>
        </a>
        <x-forms.buttons.primary data-bs-toggle="modal"
                                 data-bs-target="#modal_register"
                                 data-event-id="{{ $event->id }}"
                                 class="button-register"
        >{{ __('Register') }}</x-forms.buttons.primary>
    </div>
</div>
