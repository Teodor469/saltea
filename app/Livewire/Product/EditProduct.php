<?php

namespace App\Livewire\Product;

use App\ManageProductArrays;
use App\Models\Product;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
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
    public $existingImages = [];

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
        ]);
        $this->existingImages = $product->images;
    }

    public function update()
    {
        $validated = $this->validate();

        $imagePaths = $this->existingImages;

        if(!empty($this->images) && is_array($this->images)) {
            foreach($this->images as $image) {
                if(is_object($image)) {
                    $imagePaths[] = $image->store('product', 'public');
                }
            }
        }

        //TODO Understand this part
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

        session()->flash('success', 'Product Updated Successfully!');
        $this->ingredients = $this->product->ingredients;
        $this->benefits = $this->product->benefits;
    }

    public function deleteImage($image)
    {
        if (count($this->existingImages) <= 1) {
            session()->flash('fail', 'At least one image is required.');
            return;
        }
        if($image && in_array($image, $this->existingImages)) {
            File::delete(public_path('storage/' . $image));

            $this->existingImages = array_filter($this->existingImages, fn($img) => $img !== $image);
            $this->existingImages = array_values($this->existingImages); //!Re-indexing or array

            $this->product->update(['images' => $this->existingImages]);

            session()->flash('success', 'Image deleted successfully!');
        } else {
            session()->flash('fail', 'Image not found or already deleted!');
        }
    }

    public function render()
    {
        return view('livewire.product.edit-product');
    }
}
