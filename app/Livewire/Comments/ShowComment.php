<?php

namespace App\Livewire\Comments;

use App\Models\Comment;
use App\Models\User;
use App\Notifications\CommentDeleted;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ShowComment extends Component
{
    public Comment $comment;

    public array $author;

    public string $time;

    #[Validate('string|min:5')]
    public string $content;

    public bool $owned;

    public bool $updating = false;

    public function edit()
    {
        $this->authorize('update', $this->comment);
        $this->updating = true;
    }

    public function delete()
    {
        $this->authorize('delete', $this->comment);
        if (Auth::id() != $this->comment->user_id) {
            $this->comment->user->notify(new CommentDeleted($this->comment));
        }
        $this->comment->delete();

        return redirect()->to('/posts/'.$this->comment->post_id);
    }

    public function save()
    {
        $this->authorize('update', $this->comment);

        if ($this->content == '') {
            $this->content = $this->comment->content;
        } elseif ($this->comment->content != $this->content) {
            $this->validate();
            $user = Auth::id();
            if (RateLimiter::tooManyAttempts('edit-comment:'.$user, 10)) {
                abort(429, 'Too many updates!');
            }

            RateLimiter::increment('edit-comment:'.$user, 3600);
            $this->comment->update(['content' => $this->content]);
        }
        $this->updating = false;
    }

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
        $this->content = $comment->content;
        $this->owned = Auth::id() == $comment->user_id;
        $this->author = User::find($comment->user_id)->only(['id', 'name']);
        $this->time = Carbon::parse($comment->created_at)->diffForHumans();
    }

    public function render()
    {
        return view('livewire.comments.show-comment');
    }
}
