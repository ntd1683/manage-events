<div class="row">
    @foreach($events as $event)
        <div class="col-lg-6 pb-2">
            <div class="card">
                @include('events.partials.item')
                <div class="card-arrow">
                    <div class="card-arrow-top-left"></div>
                    <div class="card-arrow-top-right"></div>
                    <div class="card-arrow-bottom-left"></div>
                    <div class="card-arrow-bottom-right"></div>
                </div>
            </div>
        </div>
    @endforeach
    {{ $events->links() }}
</div>
