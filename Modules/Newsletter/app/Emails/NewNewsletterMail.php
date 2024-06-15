<?php

namespace Modules\Newsletter\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Modules\Newsletter\Models\Newsletter;

class NewNewsletterMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(protected Newsletter $newsletter)
    {
        //
    }

    /**
     * Build the message.
     */
    public function build(): self
    {
        $newsletter = $this->newsletter;
        return $this->subject($newsletter->subject)
            ->from($newsletter->from)
            ->view('newsletter::email.index', [
                'newsletter' => $newsletter
            ]);
    }
}
