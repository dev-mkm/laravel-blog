<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithoutUrlPagination,WithPagination;

    #[Layout('layouts.app')]
    public function render()
    {
        $this->authorize('viewAny', User::class);

        return view('livewire.admin.users.user-list', [
            'users' => User::paginate(10),
        ]);
    }
}
