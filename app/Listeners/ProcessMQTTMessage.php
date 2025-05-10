<?php

namespace App\Listeners;

use App\Events\MQTTMessageReceived;
use Illuminate\Support\Facades\Log;

class ProcessMQTTMessage
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
    public function handle(MQTTMessageReceived $event): void
    {
        Log::info("Processing MQTT message from topic [{$event->topic}]: {$event->message}");
    }
}
