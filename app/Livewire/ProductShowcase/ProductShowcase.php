<?php

namespace App\Livewire\ProductShowcase;

use App\Models\Product;
use Livewire\Component;

class ProductShowcase extends Component
{
    public function render()
    {
        $products = Product::all();
        return view('livewire.product-showcase.product-showcase', [
            'products' => $products
        ]);
    }
}
