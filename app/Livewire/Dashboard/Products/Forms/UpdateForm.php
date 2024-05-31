<?php

namespace App\Livewire\Dashboard\Products\Forms;

use Livewire\Form;
use App\Models\Product;
use Illuminate\Validation\Rule;

class UpdateForm extends Form
{
    public ?Product $product;

    public $name = '';

    public $description = '';

    public $price = '';

    public $stock_keeping_unit = '';

    public $category_id = '';

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required'],
            'stock_keeping_unit' => ['required', 'string'],
            'category_id' => ['required'],
        ];
    }

    public function setProduct(Product $product)
    {
        $this->product = $product;

        $this->name = $product->name;
        $this->description = $product->description;
        $this->price = $product->price;
        $this->stock_keeping_unit = $product->stock_keeping_unit;
        $this->category_id = $product->category_id;
    }

    public function save()
    {
        $this->validate();

        $this->product->update($this->except(['product', 'category_id']));
    }
}
