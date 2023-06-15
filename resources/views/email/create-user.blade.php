<x-email>
    <h1>{{ __('Invitation To Join!') }}</h1>
    <p>{{ __('Dear') }} {{ $user->name }},</p>
    <p>{{ __('We are writing this letter because you were invited by the admin to join our website') }}</p>
    <p>{{ __('Default password is: \'12345678\'') }}</p>
    <a href="{{ config('app.url')  }}" class="btn" style="color: white;">{{ __('Visit Our Website') }}</a>
</x-email>
