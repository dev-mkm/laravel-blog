<?php

namespace App\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class ShowPost extends Component
{
    use WithPagination,WithoutUrlPagination;

    public Post $post;

    public array $author;

    public Category $category;

    public string $time;

    public function mount(Post $post)
    {
        $this->authorize('view', $post);
        $this->post = $post;
        $this->category = Category::find($post->category_id);
        $this->author = User::find($post->user_id)->only(['id', 'name']);
        $this->time = Carbon::parse($post->updated_at)->diffForHumans();
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.posts.show-post', [
            'comments' => $this->post->comments()->paginate(10),
        ])->title($this->post->title);
    }
}
