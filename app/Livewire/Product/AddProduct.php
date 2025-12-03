<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use function Livewire\store;

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

    public function addIngredient()
    {
        $this->ingredients[] = '';
    }

    public function removeIngredient($index)
    {
        unset($this->ingredients[$index]);
        $this->ingredients = array_values($this->ingredients);
    }

    public function addBenefit()
    {
        $this->benefits[] = '';
    }

    public function removeBenefit($index)
    {
        unset($this->benefits[$index]);
        $this->benefits = array_values($this->benefits);
    }

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

        session()->flash('success', 'Product Created Successfully!');
        //*From the tutorial I understood that I will need to reset the form fields. I am not sure if it's going to apply for my case though
        //* $this->reset([attributes])
        $this->reset(['title', 'images', 'price', 'description']);
        $this->ingredients = [''];
        $this->benefits = [''];
    }

    public function render()
    {
        return view('livewire.product.add-product');
    }
}
