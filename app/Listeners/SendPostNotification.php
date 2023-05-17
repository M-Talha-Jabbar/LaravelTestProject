<?php

namespace App\Listeners;

use App\Events\NewPostPublished;
use App\Jobs\SendEmailJob;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\PostNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Models\Subscription;
use Illuminate\Support\Facades\Queue;

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
        $subscribers = Subscription::where('web_id', $post->web_id)
        ->join('accounts', 'subscriptions.user_id', '=', 'accounts.user_id')
        ->get();

        foreach ($subscribers as $subscriber) {
            try {
                Mail::to($subscriber->email)->send(new PostNotification($post));
                Log::info('Post notification job queued for: ' . $subscriber->email);
            } catch (\Exception $e) {
                Log::error('Failed to send post notification email to: ' . $subscriber->email);
                Log::error($e->getMessage());
            }
        }
    }
}
