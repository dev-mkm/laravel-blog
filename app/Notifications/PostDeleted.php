<?php

namespace App\Notifications;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostDeleted extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(private Post $post)
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Your post was deleted by an admin!')
            ->greeting('Hello '.$notifiable->name)
            ->line('Your '.$this->post->title.' post was deleted by our admins')
            ->line('Here\'s your post content')
            ->line($this->post->noformat);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'user' => [
                'id' => $notifiable->id,
                'name' => $notifiable->name,
            ],
            'category' => [
                'id' => $this->post->category_id,
            ],
            'post' => $this->post->only(['id', 'title', 'content', 'noformat']),
        ];
    }
}
