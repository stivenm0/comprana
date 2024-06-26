<?php

namespace App\Listeners;

use App\Events\CreateOrderEvent;
use App\Notifications\OrderEmailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailOrderListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreateOrderEvent $event): void
    {
        // $event->order->user->notify(new OrderEmailNotification($event->order));
    }
}
