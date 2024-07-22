<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CategoryList extends Component
{
    public Collection $categories;

    public function mount()
    {
        $this->categories = Category::all();
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.admin.categories.category-list');
    }
}
