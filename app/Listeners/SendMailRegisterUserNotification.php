<?php

namespace App\Listeners;

use App\Events\UserRegisterEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class SendMailRegisterUserNotification
{
    /**
     * Create the event listener.
     */

    public function __construct()
    {
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegisterEvent $event): void
    {
        $user = $event->user;
        Mail::send('email.reset-password', compact('user'), function ($email) use ($user) {
            $email->subject('Manage Events - Create Account Successfully');
            $email->to($user->email, $user->name);
        });
    }
}
