<?php

namespace App\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Component;

class PostItem extends Component
{
    public Post $post;

    public string $summary;

    public array $author;

    public Category $category;

    public function mount(Post $post)
    {
        $this->authorize('view', $post);
        $this->author = User::find($post->user_id)->only(['id', 'name']);
        $this->category = Category::find($post->category_id);
        $this->post = $post;
        $this->summary = Str::of($post->noformat)->limit(100);
    }

    public function render()
    {
        return view('livewire.posts.post-item');
    }
}
