<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Locked;
use Livewire\Component;

class PostDashboard extends Component
{
    public Post $post;

    public int $count;

    #[Locked]
    public bool $owned;

    public function delete()
    {
        $this->authorize('delete', $this->post);
        $this->post->delete();

        return redirect()->to('/dashboard');
    }

    public function update()
    {
        $this->authorize('update', $this->post);
        return redirect()->to('/dashboard/edit-post/'.$this->post->id);
    }

    public function view()
    {
        return redirect()->to('/posts/'.$this->post->id);
    }

    public function mount(Post $post)
    {
        $this->authorize('delete', $post);
        $this->post = $post;
        $this->owned = $post->user_id == Auth::id();
        $this->count = $post->comments()->count();
    }

    public function render()
    {
        return view('livewire.posts.post-dashboard');
    }
}
