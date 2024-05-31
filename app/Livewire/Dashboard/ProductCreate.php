<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\Products\Forms\CreateForm;

class ProductCreate extends Component
{
    use WithFileUploads;

    public CreateForm $form;
    public Collection $categories;

    public function mount()
    {
        $this->categories = Category::pluck('name', 'id');
    }

    public function save()
    {
        $this->authorize('create', Product::class);

        $this->validate();

        $product = $this->form->save();

        return redirect()->route('dashboard.products.edit', $product);
    }

    public function render()
    {
        return view('livewire.dashboard.products.create', []);
    }
}
