<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach ($products as $product)
        <x-product-card 
            wire:key="product-{{ $product->id }}"
            :name="$product->title" 
            :longDescription="$product->description" 
            :ingredients="$product->ingredients" 
            :benefits="$product->benefits" 
            :price="$product->price"
            :image="isset($product->images[0]) ? asset('storage/' . $product->images[0]) : asset('images/default-product.jpg')"
            :id="$product->id" />
    @endforeach
</div>
