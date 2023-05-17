<?php

namespace App\Listeners;

use App\Events\NewPostPublished;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\PostNotification;
use Illuminate\Support\Facades\Mail;

class SendPostNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\NewPostPublished  $event
     * @return void
     */
    public function handle(NewPostPublished $event)
    {
        $post = $event->post;
        $subscribers = $post->website->subscriptions;

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new PostNotification($post));
        }
    }
}
