<?php

namespace App\Notifications;

use App\Models\Comment;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentOnPost extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(private Comment $comment)
    {
        //
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
            ->subject('New comment on your post!')
            ->greeting('Hello '.$notifiable->name)
            ->line('you have a new comment on your '.$this->comment->post->title.' post by '.$this->comment->user->name)
            ->line('here\'s the content of the comment')
            ->line($this->comment->content)
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
            'by' => [
                'id' => $this->comment->user_id,
                'name' => $this->comment->user->name,
            ],
            'post' => $this->comment->post->only(['id', 'title', 'content', 'noformat']),
        ];
    }
}
