<div>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($products as $product)
            <x-product-card 
                wire:key="product-{{ $product->id }}"
                :name="$product->title" 
                :longDescription="$product->description" 
                :ingredients="$product->ingredients" 
                :benefits="$product->benefits" 
                :price="$product->price"
                :image="isset($product->images[0]) ? asset('storage/' . $product->images[0]) : asset('images/default-product.jpg')"
                :images="collect($product->images)->map(fn($img) => asset('storage/' . $img))->toArray()"
                :id="$product->id" />
        @endforeach
    </div>
    <div class="mt-6 flex justify-end">
        {{-- TODO Give these links different styling more fitting for the aesthetic --}}
        {{ $products->links() }}
    </div>
</div>
