<?php

namespace Modules\Blog\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Modules\Blog\Models\BlogPost;

class NewPostCreated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected BlogPost $post, public $locale)
    {
        app()->setLocale($this->locale);
    }

    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject(__('A New Post Added!'))
            ->line($this->post->title)
            ->line($this->post->description)
            ->action(__('Complete Reading'), route('blogs.show', $this->post->slug))
            ->line(__('Thanks For Subscription'));

    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable): array
    {
        return [];
    }
}
