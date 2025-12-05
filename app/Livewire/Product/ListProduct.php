<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Illuminate\Support\Facades\File;
use Livewire\Component;

class ListProduct extends Component
{
    public function sold()
    {
        //! This will keep track of the sold items. Make a simple manual count
    }

    public function edit($id)
    {
        return $this->redirect(route('admin.edit_product', $id));
    }

    public function delete($id)
    {
        //? Maybe I should create some policies on who can or cannot delete
        $product = Product::find($id);

        if (!$product) {
            session()->flash('fail', 'Product has not been found');
        }

        foreach($product->images as $image) {
            File::delete(public_path('storage/' . $image));
        }

        $product->delete();

        session()->flash('success', 'Product deleted successfully!');
    }

    public function render()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.product.list-product', [
            'products' => $products,
        ]);
    }
}
