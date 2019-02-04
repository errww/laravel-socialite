<?php

namespace App\Listeners;

use App\Events\OpenAwaydayEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class OpenAwaydayListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OpenAwaydayEvent  $event
     * @return void
     */
    public function handle(OpenAwaydayEvent $event)
    {
        //
    }
}
