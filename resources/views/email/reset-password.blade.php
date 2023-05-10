<x-email>
    <h1>{{ __('Reset Password!') }}</h1>
    <p>{{ __('Dear') }} {{ $user->name }},</p>
    <p>{{ __('Tap the button below to reset your customer account password. If you didn\'t request a new password, you can safely delete this email.') }}</p>
    <a href="{{ route('resetPassword') }}?token={{ $user->remember_token }}" class="btn" style="color: white;">{{ __('Do Something Sweet') }}</a>
</x-email>
