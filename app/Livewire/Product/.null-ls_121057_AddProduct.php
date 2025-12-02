<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddProduct extends Component
{
    use WithFileUploads;

    public $title;
    public $price;
    public $description;
    public $images = [];
    public $ingredients = [''];
    public $benefits = [''];
    
    protected $rules = [
            'title' => 'required|min:3|max:255',
            'images.*' => 'required|image|max:4096',
            'price' => 'required|numeric|between:0,99.9999',
            'description' => 'required|string|max:1000',
            'ingredients.*' => 'required|string|max:255',
            'benefits.*' => 'required|string|max:255',
        ];

    public function store()
    {
        $validated = $this->validate();

        Product::create([
            //!All of the attributes above
            'title' => $validated['title'],
            'image' => $validated['image'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'ingredients' => $validated['ingredients'],
            'benefits' => $validated['benefits']
        ]);
        //*From the tutorial I understood that I will need to reset the form fields. I am not sure if it's going to apply for my case though
        //* $this->reset([attributes])
        $this->reset(['title', 'image', 'price', 'description', 'ingredients', 'benefits']);
        //? Maybe return to the same page?
    }

    public function show()
    {
        //?Is it still Id route binding like it was in Laravel?
    }

    public function edit()
    {
        //TODO Open an edit form for an already created product. (This is going to be where they are being listed)
    }

    public function update()
    {
        //! I will have to use another set of rules for this validation.
    }

    public function sold()
    {
        //! This will keep track of the sold items. My idea is to make it like a soft delete
    }

    public function delete()
    {
        //!Normal deleting of a record
    }
    public function render()
    {
        return view('livewire.product.add-product');
    }
}
