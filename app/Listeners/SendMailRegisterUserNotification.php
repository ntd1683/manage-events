<?php

namespace App\Listeners;

use App\Events\UserRegisterEvent;
use App\Notifications\UserRegisterNotificationMail;
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
//        $user = $event->user;
//        Mail::send('admin.staff.send_mail',compact('user'),function ($email) use ($user) {
//            $email->subject('Nhà Xe Thu Đức - Lấy lại mật khẩu');
//            $email->to($user->email,$user->name);
//        });
        Notification::send($event->user, new UserRegisterNotificationMail($event->user));
    }
}
