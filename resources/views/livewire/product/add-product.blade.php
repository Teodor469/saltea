<div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
    @if (session()->has('success'))
        <x-flash-message/>
    @endif
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">Add New Product</h1>
    </div>
    
    <div class="bg-white dark:bg-zinc-900 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6">
        <form wire:submit.prevent="store" class="space-y-6">
            <x-form-input 
                label="Product Name" 
                wireModel="title" 
                id="title" 
                placeholder="Enter product name"
                required 
            />

            <x-form-input 
                label="Description" 
                type="textarea" 
                wireModel="description" 
                id="description" 
                rows="4"
                placeholder="Enter detailed description"
                required 
            />

            <x-form-input 
                label="Price (лв.)" 
                type="number" 
                wireModel="price" 
                id="price" 
                step="0.01"
                min="0"
                placeholder="0.00"
                required 
            />

            <!-- Ingredients -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">Ingredients</label>
                
                @foreach($ingredients as $index => $ingredient)
                    <div class="flex gap-2 mb-2">
                        <input type="text" 
                               wire:model="ingredients.{{ $index }}"
                               placeholder="Eg. Sea Salt"
                               class="flex-1 border rounded px-3 py-2">
                        
                        @if($index > 0)
                            <button type="button"
                                    wire:click="removeIngredient({{ $index }})"
                                    class="px-3 py-2 bg-red-500 text-white rounded">
                                ✕
                            </button>
                        @endif
                    </div>
                    @error('ingredients.' . $index) 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                @endforeach
                
                <button type="button"
                        wire:click="addIngredient"
                        class="mt-2 text-blue-600 hover:text-blue-800">
                    + Add ingredient
                </button>
            </div>

            <!-- Benefits -->
            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">Benefits</label>
                
                @foreach($benefits as $index => $benefit)
                    <div class="flex gap-2 mb-2">
                        <input type="text" 
                               wire:model="benefits.{{ $index }}"
                               placeholder="Eg. Relaxes Muscles"
                               class="flex-1 border rounded px-3 py-2">
                        
                        @if($index > 0)
                            <button type="button"
                                    wire:click="removeBenefit({{ $index }})"
                                    class="px-3 py-2 bg-red-500 text-white rounded">
                                ✕
                            </button>
                        @endif
                    </div>
                    @error('benefits.' . $index) 
                        <span class="text-red-500 text-sm">{{ $message }}</span> 
                    @enderror
                @endforeach
                
                <button type="button"
                        wire:click="addBenefit"
                        class="mt-2 text-blue-600 hover:text-blue-800">
                    + Add benefit
                </button>
            </div>

            <x-form-input 
                label="Product Image" 
                type="file" 
                wireModel="images" 
                id="image"
                accept="image/*"
                required
            >
                @if ($images)
                    <div class="mt-4 mb-3">
                        @foreach($images as $image)
                            <img src="{{ $image->temporaryUrl() }}" 
                                 class="h-24 w-24 object-cover rounded">
                        @endforeach
                    </div>
                @endif
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Upload a product image (JPG, PNG, max 2MB)</p>
            </x-form-input>

            <!-- Submit Button -->
            <div class="flex justify-end space-x-4 pt-4">
                <a 
                    href="{{ route('admin.dashboard') }}" 
                    class="px-6 py-3 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-zinc-800 transition-colors"
                >
                    Cancel
                </a>
                <button 
                    type="submit" 
                    class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors disabled:opacity-50"
                    wire:loading.attr="disabled"
                >
                    <span wire:loading.remove>Add Product</span>
                    <span wire:loading>Adding Product...</span>
                </button>
            </div>
        </form>
    </div>
</div>
