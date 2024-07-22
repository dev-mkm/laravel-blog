<?php

namespace App\Livewire\Comments;

use App\Models\Comment;
use Livewire\Component;

class CommentItem extends Component
{
    public Comment $comment;

    public string $title;

    public function delete()
    {
        $this->authorize('delete', $this->comment);
        $this->comment->delete();

        return redirect()->to('/dashboard/comments');
    }

    public function view()
    {
        return redirect()->to('/posts/'.$this->comment->post_id);
    }

    public function mount(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $this->comment = $comment;
        $this->title = $comment->post->title;
    }

    public function render()
    {
        return view('livewire.comments.comment-item');
    }
}
