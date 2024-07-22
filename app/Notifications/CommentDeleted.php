<?php

namespace App\Notifications;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentDeleted extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(private Comment $comment)
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
            ->subject('Your comment was deleted by an admin!')
            ->greeting('Hello '.$notifiable->name)
            ->line('The following comment of your\'s was deleted by our admins')
            ->line($this->comment->content)
            ->line('on the '.$this->comment->post->title.' post')
            ->action('View Post', url('/posts/'.$this->comment->post_id));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'comment' => $this->comment->only(['id', 'content']),
            'user' => [
                'id' => $notifiable->id,
                'name' => $notifiable->name,
            ],
            'post' => [
                'id' => $this->comment->post_id,
                'tite' => $this->comment->post->title,
            ],
        ];
    }
}
