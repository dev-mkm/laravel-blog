<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CategoryItem extends Component
{
    public Category $category;

    #[Validate('required|string|unique:categories,name|min:3')]
    public string $name;

    public int $count;

    public bool $updating = false;

    public function delete()
    {
        $this->category->delete();

        return redirect()->to('/dashboard/categories');
    }

    public function updateMode()
    {
        if ($this->updating) {
            $this->update();
        } else {
            $this->updating = true;
        }
    }

    public function update()
    {
        if ($this->name == '') {
            $this->name = $this->category->name;
        }
        elseif ($this->category->name != $this->name) {
            $this->validate();
            $this->category->update(['name' => $this->name]);
        }
        $this->updating = false;
    }

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->name = $category->name;
        $this->count = $category->posts()->count();
    }

    public function render()
    {
        return view('livewire.admin.categories.category-item');
    }
}
