<?php

namespace App\Livewire\Dashboard\Products\Forms;

use Livewire\Form;
use App\Models\Product;
use Livewire\Attributes\Rule;

class CreateForm extends Form
{
    #[Rule('required|string')]
    public $name = '';

    #[Rule('required|string')]
    public $description = '';

    #[Rule('required')]
    public $price = '';

    #[Rule('required|string')]
    public $stock_keeping_unit = '';

    #[Rule('required')]
    public $category_id = '';

    public function save()
    {
        $this->validate();

        $product = Product::create($this->except([]));

        $this->reset();

        return $product;
    }
}
