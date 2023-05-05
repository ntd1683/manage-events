@props([
    'title' => '',
    'action' => '',
    'method' => 'get'
])
<div class="modal modal-cover fade" id="modalCoverExample" style="display: block;opacity: 1;">
    <div class="modal-dialog">
        <div class="modal-content border border-gray-400">
            <div class="modal-header border-bottom border-gray-400">
                <h5 class="modal-title">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ $action }}" method="{{ $method }}">
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <button type="submit" class="btn btn-outline-theme">{{ __('Save changes') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
