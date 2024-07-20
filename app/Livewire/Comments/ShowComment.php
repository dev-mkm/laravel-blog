<?php

namespace App\Livewire\Comments;

use App\Models\Comment;
use Livewire\Component;

class ShowComment extends Component
{
    public Comment $comment;

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function render()
    {
        return view('livewire.comments.show-comment');
    }
}
