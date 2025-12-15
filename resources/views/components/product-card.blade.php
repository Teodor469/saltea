@props([
    'name' => 'Sample Product',
    'description' => 'Beautifully crafted with attention to detail and quality materials...',
    'longDescription' => 'This premium herbal blend combines traditional wellness wisdom with modern craftsmanship. Each ingredient is carefully selected for its unique properties and therapeutic benefits.',
    'ingredients' => ['Chamomile', 'Lavender', 'Lemon Balm', 'Peppermint'],
    'benefits' => ['Promotes relaxation', 'Supports digestive health', 'Natural stress relief', 'Caffeine-free'],
    'price' => null,
    'image' => null,
    'images' => [],
    'id' => null,
    'href' => '#'
])

{{-- Product card with image carousel support for multiple images --}}

<div x-data="{ 
    modalOpen: false, 
    currentImageIndex: 0,
    images: @js(array_filter($images ?: [$image])),
    nextImage() { 
        this.currentImageIndex = (this.currentImageIndex + 1) % this.images.length 
    },
    prevImage() { 
        this.currentImageIndex = this.currentImageIndex === 0 ? this.images.length - 1 : this.currentImageIndex - 1 
    }
}" class="group">
    <!-- Product Image -->
    <div class="aspect-square overflow-hidden rounded-2xl mb-4">
        @if($image)
            <button type="button"
            @click="modalOpen = true">
                <img src="{{ $image }}" alt="{{ $name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            </button>
        @else
            <div class="w-full h-full bg-pearl-100 flex items-center justify-center">
                <span class="text-pearl-400 font-medium font-body text-sm">{{ $name }}</span>
            </div>
        @endif
    </div>
    
    <!-- View Details Button -->
    {{-- <button type="button" 
            @click="modalOpen = true"
            class="w-full bg-ivory-50 hover:bg-pearl-100 text-pearl-900 border-2 border-pearl-900 py-3 rounded-xl text-sm font-medium transition-all duration-300 hover:shadow-lg font-body">
        {{ __('common.View Details') }}
    </button> --}}

    <!-- Product Modal -->
    <template x-if="modalOpen">
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4" style="background-color: rgba(0, 0, 0, 0.3);" @click="modalOpen = false">
            <div class="relative bg-ivory-50 rounded-2xl shadow-2xl w-full max-w-6xl h-[80vh] overflow-hidden border border-pearl-200" @click.stop>
                
                <!-- Modal content -->
                <div class="flex h-full">
                    <!-- Left side - Image Carousel -->
                    <div class="w-1/2 bg-pearl-100 relative">
                        <template x-if="images.length > 0">
                            <div class="relative w-full h-full">
                                <!-- Current Image -->
                                <img :src="images[currentImageIndex]" :alt="'{{ $name }} - Image ' + (currentImageIndex + 1)" class="w-full h-full object-cover">
                                
                                <!-- Navigation buttons (only show if more than 1 image) -->
                                <template x-if="images.length > 1">
                                    <div>
                                        <!-- Previous button -->
                                        <button @click="prevImage()" 
                                                class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-70 text-white rounded-full p-2 transition-all">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                            </svg>
                                        </button>
                                        
                                        <!-- Next button -->
                                        <button @click="nextImage()" 
                                                class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 hover:bg-opacity-70 text-white rounded-full p-2 transition-all">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                            </svg>
                                        </button>
                                        
                                        <!-- Image indicators -->
                                        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
                                            <template x-for="(image, index) in images" :key="index">
                                                <button @click="currentImageIndex = index" 
                                                        :class="currentImageIndex === index ? 'bg-white' : 'bg-white bg-opacity-50'"
                                                        class="w-3 h-3 rounded-full transition-all">
                                                </button>
                                            </template>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </template>
                        
                        <!-- Fallback when no images -->
                        <template x-if="images.length === 0">
                            <div class="w-full h-full flex items-center justify-center">
                                <span class="text-pearl-600 font-medium font-body text-xl">{{ $name }}</span>
                            </div>
                        </template>
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
                                <span class="text-4xl font-bold text-olive-600 font-info">{{ number_format($price, 2) }}лв.</span>
                            @else
                                <span class="text-4xl font-bold text-olive-600 font-info">{{ number_format(rand(10, 100), 2) }}лв.</span>
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