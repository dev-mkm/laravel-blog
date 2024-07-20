<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ShowPost extends Component
{
    public Post $post;

    public User $author;

    public Collection $comments;

    public function mount(Post $post)
    {
        $this->post = $post;
        $this->author = User::find($post->user_id);
        $this->comments = $post->comments()->get();
    }

    public function render()
    {
        return view('livewire.posts.show-post');
    }
}
