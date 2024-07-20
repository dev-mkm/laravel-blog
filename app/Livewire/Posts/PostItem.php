<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class PostItem extends Component
{
    private $id;

    public $title;

    public $author;

    public $category;

    public $content;

    public function mount(Post $post) {
        $this->author = $post->author;
        $this->category = $post->category;
        $this->fill(
            $post->only('id', 'title', 'content'),
        );
    }
    public function render()
    {
        return view('livewire.posts.post-item');
    }
}
