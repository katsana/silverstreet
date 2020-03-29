<?php

namespace Silverstreet\Laravel\Notification;

use Illuminate\Notifications\ChannelManager;
use Illuminate\Support\Facades\Notification;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Notification::resolved(function (ChannelManager $service) {
            $service->extend('sms', static function () {
                return new Channel();
            });
        });
    }
}
