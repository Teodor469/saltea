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
        return $this->redirect(route('admin.edit_product', $id));
    }

    public function delete($id)
    {
        //? Maybe I should create some policies on who can or cannot delete
        $product = Product::find($id);

        if (!$product) {
            session()->flash('failure', 'Product has not been found');
        }
        $product->delete();

        session()->flash('success', 'Product deleted successfully!');
    }

    public function render()
    {
        $products = Product::paginate(5);
        return view('livewire.product.list-product', [
            'products' => $products,
        ]);
    }
}
