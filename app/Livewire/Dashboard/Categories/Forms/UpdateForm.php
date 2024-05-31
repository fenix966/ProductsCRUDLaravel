<?php

namespace App\Livewire\Dashboard\Categories\Forms;

use Livewire\Form;
use App\Models\Category;
use Illuminate\Validation\Rule;

class UpdateForm extends Form
{
    public ?Category $category;

    public $name = '';

    public $active = '';

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'active' => ['required', 'boolean'],
        ];
    }

    public function setCategory(Category $category)
    {
        $this->category = $category;

        $this->name = $category->name;
        $this->active = $category->active;
    }

    public function save()
    {
        $this->validate();

        $this->category->update($this->except(['category']));
    }
}
