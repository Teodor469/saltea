<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class ListProduct extends Component
{
    public function sold()
    {
        //! This will keep track of the sold items. Make a simple manual count
    }

    public function edit($id)
    {
        //TODO Open an edit form for an already created product. (This is going to be where they are being listed)
        return $this->redirect(route('admin.edit_product', $id));
    }

    public function delete($id)
    {
        //? Maybe I should create some policies on who can or cannot delete
        //!No error handling
        //!No flash message
        //!No confirmation
        $product = Product::find($id);
        $product->delete();
    }

    public function render()
    {
        $products = Product::paginate(5);
        return view('livewire.product.list-product', [
            'products' => $products,
        ]);
    }
}
