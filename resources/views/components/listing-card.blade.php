@props([
    'product' => null,
])

{{-- !Right now this component is only for products. Makes me ask myself is it necessary to be a component? --}}
{{-- ?How to make it so I can reuse the same thing but for the users listing? --}}
{{-- ?Also need to learn a bit of alpine to make the ingriedients dropdown without user selection --}}
{{-- TODO Make the mobile view a single a square card with information displayed one under another --}}

<div
    class="w-full bg-white dark:bg-zinc-900 rounded-lg border border-neutral-200 dark:border-neutral-700 p-6 hover:shadow-lg transition-shadow">
    <div class="grid grid-cols-12 gap-4 items-center">
        <!-- Product Image -->
        <div class="col-span-1 flex justify-center">
            @if ($product && $product->images && count($product->images) > 0)
                <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->title }}"
                    class="w-12 h-12 rounded-lg object-cover">
            @else
                <div class="w-12 h-12 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                    <span class="text-gray-400 text-xs">No Image</span>
                </div>
            @endif
        </div>

        <!-- Title -->
        <div class="col-span-2 text-center">
            <span class="font-body text-gray-900 dark:text-white truncate">{{ $product->title }}</span>
        </div>

        <!-- Description -->
        <div class="col-span-2 text-center">
            <p class="font-body text-gray-900 dark:text-white truncate">{{ $product->description }}</p>
        </div>

        <!-- Price -->
        <div class="col-span-1 flex justify-center">
            <span class="text-green-700 dark:text-green-200 flex items-center gap-1">
                <flux:icon name='currency-euro' class="w-4 h-4" />
                {{ $product->price }}
            </span>
        </div>

        <!-- Ingredients -->
        <div class="col-span-3 text-center">
            <select name="ingredients" id="ingredients"
                class="w-full bg-white dark:bg-zinc-800 text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg px-2 py-1 text-sm">
                @foreach ($product->ingredients as $ingredient)
                    <option value="{{ $ingredient }}" class="bg-white dark:bg-zinc-800 text-gray-900 dark:text-white">
                        {{ $ingredient }}</option>
                @endforeach
            </select>
        </div>

        <!-- Actions -->
        <div class="col-span-3 flex justify-center gap-2 ml-6">
            <button wire:click='edit({{ $product->id }})'
                class="border border-neutral-200 dark:border-neutral-700 px-3 py-2 text-blue-700 hover:text-blue-800 dark:text-blue-200 dark:hover:text-blue-500 hover:scale-110 transition-transform rounded text-sm">
                <span>
                    <flux:icon name='pencil-square' class="w-4 h-4"></flux:icon>
                </span>
            </button>
            <button wire:click='delete({{ $product->id }})'
                wire:confirm='Are you sure you want to delete "{{ $product->title }}? This action cannot be undone."'
                class="border border-neutral-200 dark:border-neutral-700 px-3 py-2 text-red-700 hover:text-red-800 dark:text-red-200 dark:hover:text-red-500 hover:scale-110 transition-transform rounded text-sm">
                <span>
                    <flux:icon name='trash' class="w-4 h-4"></flux:icon>
                </span>
            </button>
        </div>
    </div>
</div>