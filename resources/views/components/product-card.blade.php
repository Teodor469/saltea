@props([
    'name' => 'Sample Product',
    'description' => 'Beautifully crafted with attention to detail and quality materials...',
    'longDescription' => 'This premium herbal blend combines traditional wellness wisdom with modern craftsmanship. Each ingredient is carefully selected for its unique properties and therapeutic benefits.',
    'ingredients' => ['Chamomile', 'Lavender', 'Lemon Balm', 'Peppermint'],
    'benefits' => ['Promotes relaxation', 'Supports digestive health', 'Natural stress relief', 'Caffeine-free'],
    'price' => null,
    'image' => null,
    'id' => null,
    'href' => '#'
])

<div x-data="{ modalOpen: false }" class="group">
    <!-- Product Image -->
    <div class="aspect-square overflow-hidden rounded-2xl mb-4">
        @if($image)
            <img src="{{ $image }}" alt="{{ $name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
        @else
            <div class="w-full h-full bg-pearl-100 flex items-center justify-center">
                <span class="text-pearl-400 font-medium font-body text-sm">{{ $name }}</span>
            </div>
        @endif
    </div>
    
    <!-- View Details Button -->
    <button type="button" 
            @click="modalOpen = true"
            class="w-full bg-ivory-50 hover:bg-pearl-100 text-pearl-900 border-2 border-pearl-900 py-3 rounded-xl text-sm font-medium transition-all duration-300 hover:shadow-lg font-body">
        {{ __('common.View Details') }}
    </button>

    <!-- Product Modal -->
    <template x-if="modalOpen">
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4" style="background-color: rgba(0, 0, 0, 0.3);" @click="modalOpen = false">
            <div class="relative bg-ivory-50 rounded-2xl shadow-2xl w-full max-w-6xl h-[80vh] overflow-hidden border border-pearl-200" @click.stop>
                
                <!-- Modal content -->
                <div class="flex h-full">
                    <!-- Left side - Image -->
                    <div class="w-1/2 bg-pearl-100">
                        @if($image)
                            <img src="{{ $image }}" alt="{{ $name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="text-pearl-600 font-medium font-body text-xl">{{ $name }}</span>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Right side - Content -->
                    <div class="w-1/2 p-8 overflow-y-auto">
                        <!-- Close button -->
                        <div class="flex justify-end mb-4">
                            <button @click="modalOpen = false" 
                                    class="text-pearl-600 hover:text-pearl-800 transition-colors">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Product info -->
                        <h2 class="text-3xl font-bold text-pearl-900 mb-4 font-info">{{ $name }}</h2>
                        
                        <div class="mb-6">
                            @if($price)
                                <span class="text-4xl font-bold text-olive-600 font-info">${{ number_format($price, 2) }}</span>
                            @else
                                <span class="text-4xl font-bold text-olive-600 font-info">${{ number_format(rand(10, 100), 2) }}</span>
                            @endif
                        </div>
                        
                        <!-- Description -->
                        <div class="mb-6">
                            <h3 class="text-xl font-semibold text-pearl-900 mb-3 font-info">{{ __('common.Description') }}</h3>
                            <p class="text-pearl-700 font-body leading-relaxed">{{ $longDescription }}</p>
                        </div>
                        
                        <!-- Ingredients -->
                        <div class="mb-6">
                            <h3 class="text-xl font-semibold text-pearl-900 mb-3 font-info">{{ __('product-card.ingredients') }}</h3>
                            <div class="flex flex-wrap gap-2">
                                @foreach($ingredients as $ingredient)
                                    <span class="bg-olive-100 text-olive-800 px-3 py-1 rounded-full text-sm font-body">{{ $ingredient }}</span>
                                @endforeach
                            </div>
                        </div>
                        
                        <!-- Benefits -->
                        <div class="mb-8">
                            <h3 class="text-xl font-semibold text-pearl-900 mb-3 font-info">{{ __('product-card.benefits') }}</h3>
                            <ul class="space-y-2">
                                @foreach($benefits as $benefit)
                                    <li class="flex items-center text-pearl-700 font-body">
                                        <svg class="w-4 h-4 text-olive-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $benefit }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        
                        <!-- Contact information -->
                        <div class="bg-pearl-100 p-4 rounded-lg">
                            <h4 class="font-semibold text-pearl-900 mb-2 font-info">{{ __('product-card.order_info_title') }}</h4>
                            <p class="text-sm text-pearl-700 font-body">{{ __('product-card.order_info_text') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
</div>