<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Locked;
use Livewire\Component;

class UserItem extends Component
{
    public User $user;

    public int $postcount;

    public int $commentcount;

    #[Locked]
    public bool $verified;

    #[Locked]
    public bool $admin;

    public function view()
    {
        return redirect()->to('/dashboard/users/'.$this->user->id);
    }

    public function delete()
    {
        $this->authorize('delete', $this->user);

        if (Auth::id() == $this->user->id) {
            abort(403, 'You can\'t delete your own account from here');
        }

        $this->user->delete();

        return redirect()->to('/dashboard/users');
    }

    public function promote()
    {
        $this->authorize('update', $this->user);

        if (! $this->admin) {
            $this->user->update([
                'admin' => true,
            ]);
        } else {
            abort(400, 'User is already admin');
        }

        return redirect()->to('/dashboard/users');
    }

    public function verify()
    {
        $this->authorize('update', $this->user);

        if (! $this->verified) {
            $this->user->email_verified_at = now();
            $this->user->saveOrFail();
        } else {
            abort(400, 'User is already verified');
        }

        return redirect()->to('/dashboard/users');
    }

    public function mount(User $user)
    {
        $this->authorize('view', $user);
        $this->user = $user;
        $this->verified = isset($user->email_verified_at);
        $this->admin = $user->admin;
        $this->postcount = $user->posts()->count();
        $this->commentcount = $user->comments()->count();
    }

    public function render()
    {
        return view('livewire.admin.users.user-item');
    }
}
