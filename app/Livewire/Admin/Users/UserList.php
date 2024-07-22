<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Layout;
use Livewire\Component;

class UserList extends Component
{
    public Collection $users;

    public function mount()
    {
        $this->authorize('viewAny', User::class);
        $this->users = User::all();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.users.user-list');
    }
}
