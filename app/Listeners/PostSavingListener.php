<?php

namespace App\Listeners;

use App\Events\PostSaving;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Str;

class PostSavingListener
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
     * @param  PostSaving  $event
     * @return void
     */
    public function handle(PostSaving $event)
    {
        $event->post->slug = Str::slug($event->post->title);
    }
}
