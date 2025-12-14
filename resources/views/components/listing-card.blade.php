@props([
    'product' => null,
])

{{-- !Right now this component is only for products. Makes me ask myself is it necessary to be a component? --}}
{{-- ?How to make it so I can reuse the same thing but for the users listing? --}}
{{-- ?Also need to learn a bit of alpine to make the ingriedients dropdown without user selection --}}
{{-- Mobile: Square card layout, Desktop: Table-like horizontal layout --}}

<div class="w-full bg-white dark:bg-zinc-900 rounded-lg border border-neutral-200 dark:border-neutral-700 p-6 hover:shadow-lg transition-shadow" x-data="{ showIngredients: false }">
    
    <!-- Mobile Layout: Square Card (visible on small screens) -->
    <div class="block md:hidden">
        <div class="flex flex-col items-center text-center space-y-4">
            <!-- Product Image -->
            @if ($product && $product->images && count($product->images) > 0)
                <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->title }}"
                    class="w-20 h-20 rounded-lg object-cover">
            @else
                <div class="w-20 h-20 bg-gray-200 dark:bg-gray-700 rounded-lg flex items-center justify-center">
                    <span class="text-gray-400 text-xs">No Image</span>
                </div>
            @endif

            <!-- Title -->
            <h3 class="font-body text-gray-900 dark:text-white text-lg font-semibold">{{ $product->title }}</h3>

            <!-- Price -->
            <div class="text-green-700 dark:text-green-200 flex items-center gap-1 text-lg font-bold">
                <flux:icon name='currency-euro' class="w-5 h-5" />
                {{ $product->price }}
            </div>

            <!-- Description -->
            <p class="font-body text-gray-600 dark:text-gray-300 text-sm line-clamp-2">{{ $product->description }}</p>

            <!-- Ingredients -->
            <div class="w-full" x-data="{ mobileDropdownOpen: false }">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Ingredients</label>
                <div class="relative">
                    <button @click="mobileDropdownOpen = !mobileDropdownOpen" 
                            class="w-full bg-gray-100 dark:bg-zinc-700 text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 text-sm text-left flex items-center justify-between">
                        <span>View Ingredients ({{ count($product->ingredients) }})</span>
                        <svg class="w-4 h-4 transition-transform" :class="mobileDropdownOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="mobileDropdownOpen" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95"
                         @click.outside="mobileDropdownOpen = false"
                         class="absolute z-10 mt-1 w-full bg-white dark:bg-zinc-800 border border-gray-300 dark:border-gray-600 rounded-lg shadow-lg max-h-40 overflow-y-auto">
                        @foreach ($product->ingredients as $ingredient)
                            <div class="px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-zinc-700 border-b last:border-b-0 border-gray-200 dark:border-gray-600">
                                {{ $ingredient }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex gap-3">
                <button wire:click='edit({{ $product->id }})'
                    class="border border-neutral-200 dark:border-neutral-700 px-4 py-2 text-blue-700 hover:text-blue-800 dark:text-blue-200 dark:hover:text-blue-500 hover:scale-105 transition-transform rounded-lg text-sm flex items-center gap-2">
                    <flux:icon name='pencil-square' class="w-4 h-4"></flux:icon>
                    Edit
                </button>
                <button wire:click='delete({{ $product->id }})'
                    wire:confirm='Are you sure you want to delete "{{ $product->title }}? This action cannot be undone."'
                    class="border border-neutral-200 dark:border-neutral-700 px-4 py-2 text-red-700 hover:text-red-800 dark:text-red-200 dark:hover:text-red-500 hover:scale-105 transition-transform rounded-lg text-sm flex items-center gap-2">
                    <flux:icon name='trash' class="w-4 h-4"></flux:icon>
                    Delete
                </button>
            </div>
        </div>
    </div>

    <!-- Desktop Layout: Horizontal Table-like (hidden on small screens) -->
    <div class="hidden md:block">
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
            <div class="col-span-3 text-center" x-data="{ desktopDropdownOpen: false }">
                <div class="relative">
                    <button @click="desktopDropdownOpen = !desktopDropdownOpen" 
                            class="w-full bg-gray-100 dark:bg-zinc-700 text-gray-700 dark:text-gray-300 border border-gray-300 dark:border-gray-600 rounded-lg px-2 py-1 text-sm text-left flex items-center justify-between">
                        <span class="truncate">Ingredients ({{ count($product->ingredients) }})</span>
                        <svg class="w-3 h-3 transition-transform ml-1" :class="desktopDropdownOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="desktopDropdownOpen" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95"
                         @click.outside="desktopDropdownOpen = false"
                         class="absolute z-10 mt-1 w-full bg-white dark:bg-zinc-800 border border-gray-300 dark:border-gray-600 rounded-lg shadow-lg max-h-40 overflow-y-auto">
                        @foreach ($product->ingredients as $ingredient)
                            <div class="px-2 py-1 text-xs text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-zinc-700 border-b last:border-b-0 border-gray-200 dark:border-gray-600">
                                {{ $ingredient }}
                            </div>
                        @endforeach
                    </div>
                </div>
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
</div>