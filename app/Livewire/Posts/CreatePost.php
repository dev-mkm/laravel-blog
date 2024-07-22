<?php

namespace App\Livewire\Posts;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreatePost extends Component
{
    public Post $post;

    #[Validate('required|string|min:3')]
    public string $title;

    public string $content;

    #[Validate('required|string|min:50')]
    public string $noformat;

    #[Validate('required|exists:categories,id')]
    public int $category;

    public Collection $categories;

    public function mount($post = null) {
        $this->categories = Category::all();
        if (isset($post)) {
            $this->post = $post;
            $this->title = $post->title;
            $this->content = $post->content;
            $this->category = $post->category_id;
        } else {
            $cat = $this->categories->first();
            if (isset($cat)) $this->category = $cat->id;
        }
    }

    public function save() {
        $this->validate();
        if (isset($this->post)) {
            $this->authorize('update', $this->post);
            $this->post->update([
                'title' => $this->title,
                'category_id' => $this->category,
                'content' => $this->content,
                'noformat' => $this->noformat
            ]);
            return redirect()->to('/posts/'.$this->post->id);
        }
        else {
            $this->authorize('create', Post::class);
            $id = Post::create([
                'user_id' => Auth::user()->id,
                'title' => $this->title,
                'category_id' => $this->category,
                'content' => $this->content,
                'noformat' => $this->noformat
            ])->id;
            return redirect()->to('/posts/'.$id);
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.posts.create-post')->title('Dashboard | Create Post');
    }
}
