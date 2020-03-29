<?php

namespace Silverstreet\Laravel\Notification;

use Illuminate\Support\Facades\Notification;

class Channel
{
    /**
     * Send the given notification.
     *
     * @param mixed $notifiable
     *
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        if (\is_null($to = $notifiable->routeNotificationFor('sms', $notification))) {
            return;
        }

        $message = $notification->toSms($notifiable);

        if (! $message instanceof Message) {
            return;
        }

        \resolve('silverstreet')->uses('Message')
            ->text($message->text(), $to, $message->sender() ?? \config('app.name'));
    }
}
