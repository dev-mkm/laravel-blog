<?php

namespace App\Livewire\Comments;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateComment extends Component
{
    #[Locked]
    public int $post_id;

    #[Validate('required|string|min:5')]
    public string $content;

    public function mount(Post $post, ?Comment $comment = null) {
        $this->post_id = $post->id;
        if (isset($comment)) {
            $this->reply_id = $comment->id;
        }
    }

    public function save() {
        $this->validate();
        $this->authorize('create', Comment::class);
        Comment::create([
            'user_id' => Auth::user()->id,
            'post_id' => $this->post_id,
            'content' => $this->content
        ]);
        return redirect()->to('/posts/'.$this->post_id);
    }

    public function render()
    {
        return view('livewire.comments.create-comment');
    }
}
