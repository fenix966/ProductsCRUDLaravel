<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Collection;
use App\Livewire\Dashboard\Products\Forms\UpdateForm;

class ProductEdit extends Component
{
    public ?Product $product = null;

    public UpdateForm $form;
    public Collection $categories;

    public function mount(Product $product)
    {
        $this->authorize('view-any', Product::class);

        $this->product = $product;

        $this->form->setProduct($product);
        $this->categories = Category::pluck('name', 'id');
    }

    public function save()
    {
        $this->authorize('update', $this->product);

        $this->validate();

        $this->form->save();

        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.dashboard.products.edit', []);
    }
}
