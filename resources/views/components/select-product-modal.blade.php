@props([
    'products' => collect([])
])

<div class="fixed inset-0 z-50 flex items-center justify-center p-4" style="background-color: rgba(0, 0, 0, 0.5);" @click="showProductModal = false">
    <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[80vh] overflow-hidden border border-gray-200" @click.stop>
            
            <!-- Modal header -->
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-medium text-gray-900 font-info">
                    {{ __('contact.choose_product') }}
                </h3>
                <button type="button"
                        @click="showProductModal = false"
                        class="text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-pink-500 rounded-md transition-colors">
                    <span class="sr-only">Close</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Modal body -->
            <div class="px-6 py-4 max-h-96 overflow-y-auto">
                @if($products && $products->count() > 0)
                    <!-- Product grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($products as $product)
                            <!-- Product card -->
                            <div class="flex items-center p-4 border border-gray-200 rounded-lg hover:border-pink-300 transition-colors" 
                                 :class="$wire.product.includes({{ $product->id }}) ? 'border-pink-500 bg-pink-50' : ''">
                                    <!-- Product image -->
                                    <div class="flex-shrink-0 w-16 h-16 overflow-hidden rounded-lg bg-gray-100 mr-4">
                                        @if($product && $product->images && count($product->images) > 0)
                                            <img src="{{ asset('storage/' . $product->images[0]) }}" 
                                                 alt="{{ $product->title }}" 
                                                 class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full bg-pearl-200 flex items-center justify-center">
                                                <svg class="w-6 h-6 text-pearl-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Product details -->
                                    <div class="flex-1 min-w-0">
                                        <h4 class="text-sm font-medium text-gray-900 font-body truncate">
                                            {{ $product->title }}
                                        </h4>
                                        <div class="flex items-center justify-between mt-2">
                                            @if($product->price)
                                                <span class="text-sm font-semibold text-pink-600 font-info">
                                                    ${{ number_format($product->price, 2) }}
                                                </span>
                                            @else
                                                <span class="text-sm text-gray-400 font-body">
                                                    Price on request
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Checkbox indicator -->
                                    <div class="flex-shrink-0 ml-3">
                                        <input type="checkbox" 
                                               wire:model="product" 
                                               value="{{ $product->id }}"
                                               class="w-5 h-5 text-pink-600 bg-white border-gray-300 rounded focus:ring-pink-500 focus:ring-2">
                                    </div>
                                </div>
                        @endforeach
                    </div>
                @else
                    <!-- Empty state -->
                    <div class="text-center py-8">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                        </svg>
                        <h4 class="mt-2 text-sm font-medium text-gray-900">No products available</h4>
                        <p class="mt-1 text-sm text-gray-500">No products are currently available for selection.</p>
                    </div>
                @endif
            </div>

            <!-- Modal footer -->
            <div class="flex items-center justify-between px-6 py-4 border-t border-gray-200 bg-gray-50">
                <div class="text-sm text-gray-600 font-body">
                    <span x-show="$wire.product.length === 0">No products selected</span>
                    <span x-show="$wire.product.length === 1" x-text="`${$wire.product.length} product selected`"></span>
                    <span x-show="$wire.product.length > 1" x-text="`${$wire.product.length} products selected`"></span>
                </div>
                
                <div class="flex space-x-3">
                    <button type="button" 
                            @click="showProductModal = false"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-colors">
                        Cancel
                    </button>
                    <button type="button" 
                            @click="showProductModal = false"
                            class="px-4 py-2 text-sm font-medium text-white bg-pink-500 border border-transparent rounded-md hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transition-colors">
                        Done
                    </button>
                </div>
            </div>
    </div>
</div>