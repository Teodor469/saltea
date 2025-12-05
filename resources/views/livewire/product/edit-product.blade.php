<div class="">
    <h1 class="font-body text-lg lg:text-2xl sm:text-md font-semibold text-gray-900 dark:text-white">
        Edit Product
    </h1>

    <form wire:submit.prevent="update" class="space-y-6">
        @csrf
        <div
            class="bg-white dark:bg-zinc-900 flex flex-col justify-center items-center gap-4 border border-neutral-200 dark:border-neutral-700 rounded-xl p-6">
            <div class="flex flex-col w-full gap-2">
                <label for="name" class="font-semibold text-sm">Product Name</label>
                <input type="text"
                    class="border border-neutral-200 dark:border-neutral-700 rounded-lg bg-gray-50 dark:bg-zinc-800 px-4 py-3"
                    wire:model='title'>
            </div>

            <div class="flex flex-col w-full gap-2">
                <label name="description" id="description" class="font-semibold text-sm">Description</label>
                <textarea type="text"
                    class="border border-neutral-200 dark:border-neutral-700 rounded-lg bg-gray-50 dark:bg-zinc-800 px-4 py-3"
                    wire:model='description'>
                </textarea>
            </div>

            <div class="flex flex-col w-full gap-2">
                <label for="price" class="font-semibold text-sm">Price</label>
                <input type="text"
                    class="border border-neutral-200 dark:border-neutral-700 rounded-lg bg-gray-50 dark:bg-zinc-800 px-4 py-3"
                    wire:model='price'>
            </div>

            <div class="flex flex-col w-full gap-2">
                <label for="ingredients" class="font-semibold text-sm">Ingredients</label>
                @foreach ($ingredients as $index => $ingredient)
                    <div class="flex gap-2 mb-2">
                        <input type="text"
                            class="w-full border border-neutral-200 dark:border-neutral-700 rounded-lg bg-gray-50 dark:bg-zinc-800 px-4 py-3"
                            wire:model='ingredients.{{ $index }}'>
                        @if ($index > 0)
                            <button type="button" wire:click='removeIngredient({{ $index }})'
                                class="px-3 py-2 bg-red-500 text-white rounded">x</button>
                        @endif
                    </div>
                    @error('ingredients.' . $index)
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                @endforeach
                    <button type="button"
                        wire:click="addIngredient"
                        class="mt-1 mb-2 text-blue-600 hover:text-blue-800 self-start">
                    + Add ingredient
                </button>
            </div>

            <div class="flex flex-col w-full gap-2">
                <label for="benefits" class="font-semibold text-sm">Benefits</label>
                @foreach ($benefits as $index => $benefit)
                    <div class="flex gap-2 mb-2">
                        <input type="text"
                            class="w-full border border-neutral-200 dark:border-neutral-700 rounded-lg bg-gray-50 dark:bg-zinc-800 px-4 py-3"
                            wire:model='benefits.{{ $index }}'>
                        @if ($index > 0)
                            <button type="button" wire:click='removeBenefit({{ $index }})'
                                class="px-3 py-2 bg-red-500 text-white rounded">x</button>
                        @endif
                    </div>
                    @error('benefits.' . $index)
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                @endforeach
                <button type="button"
                        wire:click="addBenefit"
                        class="mt-1 mb-2 text-blue-600 hover:text-blue-800 self-start">
                    + Add benefit
                </button>
            </div>

            <div class="flex flex-col w-full gap-2">
                <label for="images" class="font-semibold text-sm">Product Image</label>
                {{-- !I need to fetch existingImages --}}
                @if ($product->images && count($product->images) > 0)
                    <div class="flex gap-2">
                        @foreach ($existingImages as $image)
                            <div class="relative">
                                <img src="{{ asset('storage/' . $image) }}" alt="Product Image" class="w-24 h-24 object-cover rounded">
                                <button 
                                wire:click='deleteImage("{{ $image }}")'
                                class="absolute top-1 right-1 w-4 h-4 bg-red-500 rounded-full text-white border border-neutral-200 dark:border-neutral-700 flex items-center justify-center">
                                x</button>
                            </div>
                        @endforeach
                    </div>
                @endif
                {{-- TODO then replace them here with this. --}}
                <input type="file"
                wire:model='images'
                accept="image/*"
                class="border border-neutral-200 dark:border-neutral-700 rounded-lg bg-gray-50 dark:bg-zinc-800 px-4 py-3">
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Upload a product image (JPG, PNG, max 2MB)</p>
                @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <button
            type="submit"
                class="border border-neutral-200 dark:border-neutral-600 self-end px-6 py-3 rounded-lg text-yellow-700 dark:text-yellow-100 
            hover:text-yellow-800 dark:hover:text-yellow-300 hover:scale-110 transition-transform">
                Update
            </button>
        </div>
    </form>
</div>
