<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ProductForm extends Form
{
    //TODO Finish this up
    #[Validate('required|min:3|max:255')]
    public $title;

    #[Validate('required|numeric|between:0,999.9999')]
    public $price;

    #[Validate('required|string|max:1000')]
    public $description;

    #[Validate('required|image|max:4096')]
    public $images = [];

    #[Validate('required|string|max:255')]
    public $ingredients = [''];

    #[Validate('')]
    public $benefits = ['required|string|max:255'];

    public function store()
    {
        $validated = $this->validate();
        
        $imagePaths = [];

        foreach($this->images as $image) {
            $imagePaths[] = $image->store('product', 'public');
        }

        $ingredients = array_filter($this->ingredients, fn($item) => !empty(trim($item)));
        $benefits = array_filter($this->benefits, fn($item) => !empty(trim($item)));


        Product::create([
            //!All of the attributes above
            'title' => $validated['title'],
            'images' => $imagePaths,
            'price' => $validated['price'],
            'description' => $validated['description'],
            'ingredients' => array_values($ingredients),
            'benefits' => array_values($benefits),
        ]);

        $this->reset();
    }

    public function update()
    {
        
    }
}
