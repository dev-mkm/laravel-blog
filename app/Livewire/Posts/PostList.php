<?php

namespace App\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    public string $title = "Posts";

    public array $author;

    public Category $category;

    public function mount($category = null, $user = null) {
        if(isset($category)) {
            $this->category = $category;
        }
        if(isset($user)) {
            $this->author = User::findOrFail($user)->only(['id', 'name']);
        }
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        $post = Post::select();
        $title = 'Posts';
        if(isset($this->category)) {
            $post = $post->where('category_id', $this->category->id);
            $title = 'Category | '.$this->category->name;
        }
        elseif (isset($this->author)) {
            $post = $post->where('user_id', $this->author['id']);
            $title = 'Author | '.$this->author['name'];
        }
        return view('livewire.posts.post-list', [
            'posts' => $post->paginate(15),
        ])->title($title);
    }
}
