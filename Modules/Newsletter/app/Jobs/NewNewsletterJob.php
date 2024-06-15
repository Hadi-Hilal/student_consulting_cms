<?php

namespace Modules\Newsletter\Jobs;

use App\Models\User;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Modules\Newsletter\Emails\NewNewsletterMail;
use Modules\Newsletter\Models\Newsletter;
use Modules\Subscriber\Models\Subscriber;

class NewNewsletterJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected Newsletter $newsletter)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $newsletter = $this->newsletter;
        $emails = null;
        switch ($newsletter->to) {
            case 'Subscribers':
                $emails = Subscriber::where('lang', $newsletter->lang)->pluck('email')->toArray();
                break;
            case 'Users':
                $emails = User::where('type', 'user')->pluck('email')->toArray();
                break;

            case 'Admins':
                $emails = User::where('type', 'admin')->pluck('email')->toArray();
                break;
        }
        try {
            foreach ($emails as $email) {
                Mail::to($email)->send(new NewNewsletterMail($newsletter));
            }
            $newsletter->update([
                'count_receivers' => count($emails),
                'status' => 'Sent',
            ]);
        } catch (Exception $exception) {
            $newsletter->update([
                'status' => 'Failed',
            ]);
            Log::error($exception->getMessage());
        }

    }
}
