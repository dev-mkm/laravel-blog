<?php

namespace App\Livewire;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    public Collection $posts;

    public function mount()
    {
        $this->posts = Auth::user()->posts;
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.dashboard');
    }
}
