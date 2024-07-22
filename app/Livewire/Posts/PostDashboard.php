<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;

class PostDashboard extends Component
{
    public Post $post;

    public int $count;

    public function delete()
    {
        $this->post->delete();

        return redirect()->to('/dashboard');
    }

    public function update()
    {
        return redirect()->to('/dashboard/edit-post/'.$this->post->id);
    }

    public function view()
    {
        return redirect()->to('/posts/'.$this->post->id);
    }

    public function mount(Post $post)
    {
        $this->authorize('update', $post);
        $this->post = $post;
        $this->count = $post->comments()->count();
    }

    public function render()
    {
        return view('livewire.posts.post-dashboard');
    }
}
