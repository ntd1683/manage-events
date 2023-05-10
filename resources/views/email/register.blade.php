<x-email>
    <h1>{{ __('Congratulations on Successful Registration!') }}</h1>
    <p>{{ __('Dear') }} {{ $user->name }},</p>
    <p>{{ __('Thank you for registering with us. Your account has been successfully created and is now ready to use.') }}</p>
    <p>{{ __('We are excited to have you on board and look forward to providing you with the best possible experience.') }}</p>
    <a href="{{ config('app.url')  }}" class="btn" style="color: white;">{{ __('Visit Our Website') }}</a>
</x-email>
