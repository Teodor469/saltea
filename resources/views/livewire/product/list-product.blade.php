<div class="flex w-full h-full flex-1 flex-col gap-6 rounded-xl">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">All products</h1>
    </div>

    <div class="bg-white dark:bg-zinc-900 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6">
        {{-- This will be the main container of the listings --}}
        <div class="flex justify-end">
            {{-- This will be the search bar --}}
            <input type="text" placeholder="Search..."
                class="border border-neutral-200 dark:border-neutral-700 p-2 rounded-lg">
        </div>

        <div class="flex flex-wrap gap-6 mt-4">
            {{-- The filters shall be situated here --}}
            <input type="text" placeholder="Filter ID"
                class="border border-neutral-200 dark:border-neutral-700 p-4 rounded-lg">
            <input type="text" placeholder="Filter Name"
                class="border border-neutral-200 dark:border-neutral-700 p-4 rounded-lg">
            <input type="text" placeholder="Filter Price"
                class="border border-neutral-200 dark:border-neutral-700 p-4 rounded-lg">
            {{-- !Don't forget to add ascending and descending for created_at --}}
        </div>

        <div class="my-6 space-y-4">
            {{-- The listing with all the different buttons bells and whistles --}}
            <div class="bg-zinc-50 dark:bg-zinc-800 p-4 rounded-lg">
                <div class="grid grid-cols-12 gap-4 items-center">
                    <div class="col-span-1 text-center">Product</div>
                    <div class="col-span-2 text-center">Title</div>
                    <div class="col-span-2 text-center">Description</div>
                    <div class="col-span-1 text-center">Price</div>
                    <div class="col-span-3 text-center">Ingredients</div>
                    <div class="col-span-3 text-center">Actions</div>
                </div>
            </div>
            @foreach ($products as $product)
                <x-listing-card wire:key='"listing-{{ $product->id }}' :product="$product" />
            @endforeach
        </div>

        <div class="mt-6">
            {{ $products->links() }}
        </div>
    </div>
</div>
