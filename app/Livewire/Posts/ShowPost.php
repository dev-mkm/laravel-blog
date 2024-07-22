<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ShowPost extends Component
{
    public Post $post;

    public array $author;

    public Collection $comments;

    public function mount(Post $post)
    {
        $this->authorize('view', $post);
        $this->post = $post;
        $this->author = User::find($post->user_id)->only(['id', 'name']);
        $this->comments = $post->comments()->get();
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.posts.show-post')->title($this->post->title);
    }
}
