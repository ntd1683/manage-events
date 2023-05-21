@props([
    'title' => '',
    'action' => '',
    'method' => 'get',
    'buttons' => '',
    'onsubmit' => ''
])
<div {{ $attributes->merge(["class" => "modal modal-cover fade"]) }}>
    <div class="modal-dialog">
        <div class="modal-content border border-gray-400">
            <div class="modal-header border-bottom border-gray-400">
                <h5 class="modal-title">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ $action }}" method="{{ $method }}" @if($onsubmit) return false; @endif>
                <div class="modal-body">
                    {{ $slot }}
                </div>
                <div class="modal-footer">
                    {{ $buttons }}
                </div>
            </form>
        </div>
    </div>
</div>
