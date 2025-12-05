<?php

namespace App\Livewire\ProductShowcase;

use App\Models\Product;
use Livewire\Component;

class ProductShowcase extends Component
{
    public function render()
    {
        $products = Product::orderBy('updated_at', 'desc')->paginate(4);
        return view('livewire.product-showcase.product-showcase', [
            'products' => $products
        ]);
    }
}
