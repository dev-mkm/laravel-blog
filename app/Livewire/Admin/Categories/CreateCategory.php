<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateCategory extends Component
{
    #[Validate('required|string|unique:categories,name|min:3')]
    public $name;

    public function save()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
        ]);

        return redirect()->to('/dashboard/categories');
    }

    public function render()
    {
        return view('livewire.admin.categories.create-category');
    }
}
