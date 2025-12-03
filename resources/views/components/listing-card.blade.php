@props([
    'product' => null,
])

{{-- !Right now this component is only for products. Makes me ask myself is it necessary to be a component? --}}
{{-- ?How to make it so I can reuse the same thing but for the users listing? --}}
{{-- ?Also need to learn a bit of alpine to make the ingriedients dropdown without user selection --}}

<div class="w-full bg-white dark:bg-zinc-900 rounded-lg border border-neutral-200 dark:border-neutral-700 p-6 hover:shadow-lg transition-shadow">
    <div class="flex items-center justify-between gap-6">
        <!-- Product Image -->
        <div class="flex-shrink-0">
            @if($product && $product->images && count($product->images) > 0)
                <img src="{{ asset('storage/' . $product->images[0]) }}" 
                     alt="{{ $product->title }}" 
                     class="w-16 h-16 rounded-lg object-cover">
            @else
                <div class="w-16 h-16 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                    <span class="text-gray-400 text-xs">No Image</span>
                </div>
            @endif
        </div>
        
        <!-- Product Info -->
        <div class="flex-1 grid grid-cols-12 items-center gap-4">
            <!-- Title & Description -->
            <div class="col-span-6">
                <span class="font-body text-gray-900 dark:text-white truncate">{{ $product->title }}</span>
            </div>
            
            <!-- Price & Ingredients Dropdown -->
            <div class="col-span-3 text-center">
                <span class="text-green-200">{{ $product->price }}</span>

            </div>
            
            <!-- Actions -->
            <div class="col-span-3 flex justify-end gap-6">
                <button wire:click='edit' class="border border-neutral-200 dark:border-neutral-700 px-3 py-2 text-blue-200">
                    Edit
                </button>
                <button wire:click='delete' class="border border-neutral-200 dark:border-neutral-700 px-3 py-2 text-red-200">
                    Delete
                </button>
            </div>
        </div>
    </div>
</div>