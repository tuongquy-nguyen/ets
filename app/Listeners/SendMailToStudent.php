<?php

namespace App\Listeners;

use App\Events\ChapterGenerated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendMailToStudent
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
     * @param  ChapterGenerated  $event
     * @return void
     */
    public function handle(ChapterGenerated $event)
    {
        //
    }
}
