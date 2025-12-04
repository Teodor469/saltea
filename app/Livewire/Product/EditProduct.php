<?php

namespace App\Livewire\Product;

use App\ManageProductArrays;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads, ManageProductArrays;
    public Product $product;
    public $title;
    public $price;
    public $description;
    public $images = [];
    public $ingredients = [''];
    public $benefits = [''];

    protected $rules = [
            'title' => 'sometimes|min:3|max:255',
            'images.*' => 'sometimes|image|max:4096',
            'price' => 'sometimes|numeric|between:0,99.9999',
            'description' => 'sometimes|string|max:1000',
            'ingredients.*' => 'sometimes|string|max:255',
            'benefits.*' => 'sometimes|string|max:255',
        ];

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->fill([
            'title' => $product->title,
            'price' => $product->price,
            'description' => $product->description,
            'ingredients' => $product->ingredients,
            'benefits' => $product->benefits,
            'images' => $product->images,
        ]);
    }

    public function update()
    {
        $validated = $this->validate();

        $imagePaths = [];

        foreach($this->images as $image) {
            $imagePaths[] = $image->store('product', 'public');
        }

        $ingredients = array_filter($this->ingredients, fn($item) => !empty(trim($item)));
        $benefits = array_filter($this->benefits, fn($item) => !empty(trim($item)));

        $this->product->update([
            'title' => $validated['title'],
            'images' => $imagePaths,
            'price' => $validated['price'],
            'description' => $validated['description'],
            'ingredients' => array_values($ingredients),
            'benefits' => array_values($benefits),
        ]);

        session()->flash('success', 'Product Created Successfully!');
        $this->reset(['title', 'images', 'price', 'description']); //? Should I actually reset those? Would they automatically update after or before the reset?
        $this->ingredients = $this->product->ingredients;
        $this->benefits = $this->product->benefits;
    }

    public function render()
    {
        return view('livewire.product.edit-product');
    }
}
