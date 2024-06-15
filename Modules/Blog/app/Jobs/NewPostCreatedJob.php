<?php

namespace Modules\Blog\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;
use Modules\Blog\Models\BlogPost;
use Modules\Blog\Notifications\NewPostCreated;
use Modules\Subscriber\Models\Subscriber;

class NewPostCreatedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected BlogPost $post, public $locale)
    {
        app()->setLocale($this->locale);
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $subscribers = Subscriber::where('lang', $this->locale)->get();
        Notification::send($subscribers, new NewPostCreated($this->post, $this->locale));
    }
}
