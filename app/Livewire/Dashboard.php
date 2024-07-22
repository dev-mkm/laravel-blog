<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithoutUrlPagination,WithPagination;

    private User $user;

    public function mount($user = null)
    {
        if (isset($user)) {
            $user = User::findOrFail($user);
            $this->authorize('view', $user);
            $this->user = $user;
        } else {
            $this->user = Auth::user();
        }
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.dashboard', [
            'posts' => $this->user->posts()->paginate(10),
        ]);
    }
}
