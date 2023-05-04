@props([
    'status' => 'info',
    'title' => 'Notify',
    'time' => '',
])
<div class="toasts-container">
    <div
        {{ $attributes->merge(['class' => 'toast toast-' . $status . ' border-' . $status ]) }}
        data-autohide="false"
    >
        <div class="toast-header">
            <i class="far fa-bell text-muted me-2"></i>
            <strong class="me-auto">{{ $title }}</strong>
            <small>{{ $time }}</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body message-{{ $status }}">
            {{ $slot }}
        </div>
    </div>
</div>
