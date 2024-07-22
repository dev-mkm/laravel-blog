<?php

namespace App\Livewire\Comments;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Notifications\CommentOnPost;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateComment extends Component
{
    #[Locked]
    public int $post_id;

    #[Locked]
    public int $post_user;

    #[Validate('required|string|min:5')]
    public string $content;

    public function mount(Post $post, ?Comment $comment = null)
    {
        $this->post_id = $post->id;
        $this->post_user = $post->user_id;
        if (isset($comment)) {
            $this->reply_id = $comment->id;
        }
    }

    public function save()
    {
        $this->validate();
        $this->authorize('create', Comment::class);
        $user = Auth::id();
        if (RateLimiter::tooManyAttempts('create-comment:'.$this->post_id.'.'.$user, 3) ||
        RateLimiter::tooManyAttempts('create-comment:'.$user, 10)) {
            abort(429, 'Too many comments!');
        }

        RateLimiter::increment('create-comment:'.$this->post_id.'.'.$user, 10800);
        RateLimiter::increment('create-comment:'.$user, 3600);
        $comment = Comment::create([
            'user_id' => $user,
            'post_id' => $this->post_id,
            'content' => $this->content,
        ]);
        if (Auth::id() != $this->post_user) {
            User::find($this->post_user)->notify(new CommentOnPost($comment));
        }

        return redirect()->to('/posts/'.$this->post_id);
    }

    public function render()
    {
        return view('livewire.comments.create-comment');
    }
}
