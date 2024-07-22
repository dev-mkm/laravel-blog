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
    private ?int $id = null;

    #[Validate('required|string|min:3')]
    public string $title;

    public string $content;

    public array $noformat;

    #[Validate('required|exists:categories,id')]
    public int $category;

    public Collection $categories;

    public function mount(?Post $post) {
        $this->categories = Category::all();
        if (isset($post)) {
            $this->id = $post->id;
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
        if (isset($this->id)) {
            Post::update([
                'id' => $this->id,
                'title' => $this->title,
                'category_id' => $this->category,
                'content' => $this->content,
                'noformat' => json_encode($this->noformat)
            ]);
        }
        else {
            $this->id = Post::create([
                'user_id' => Auth::user()->id,
                'title' => $this->title,
                'category_id' => $this->category,
                'content' => $this->content,
                'noformat' => json_encode($this->noformat)
            ])->id;
        }
        return redirect()->to('/posts/'.$this->id);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.posts.create-post')->title('Dashboard | Create Post');
    }
}
