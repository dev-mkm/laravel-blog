<?php

namespace App\Livewire\Comments;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class CommentList extends Component
{
    use WithoutUrlPagination,WithPagination;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.comments.comment-list', [
            'comments' => Auth::user()->comments()->paginate(10),
        ]);
    }
}
