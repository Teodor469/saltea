<x-layouts.public>
    {{-- !The design must be changed. No rounded edges. Different font. Remove view details button (keep modal). Make the image clickable. Remove price from Front-end keep on back-end --}}
    <div class="min-h-screen bg-pearl-50">

        <!-- Hero Banner Section -->
        <section class="bg-ivory-100 py-16 lg:py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
                <!-- Banner Image positioned closer to content -->
                <div class="absolute top-0 right-0 w-56 h-56 md:w-72 md:h-72 lg:w-80 lg:h-80">
                    <img src="{{ asset('images/banners/banner-home-first.png') }}" 
                         alt="Herbal Blends" 
                         class="w-full h-full object-contain opacity-90">
                </div>
                
                <!-- Content Area -->
                <div class="relative z-10 max-w-2xl">
                    <div class="space-y-8">
                        <div class="space-y-6">
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-pearl-900 leading-tight font-info">
                                {{ __('welcome.hero_title_plant') }}<br>
                                <span class="font-accent">{{ __('welcome.hero_title_herbal') }}</span>
                            </h1>
                            <p class="text-xl md:text-2xl text-pearl-700 leading-relaxed font-info">
                                {{ __('welcome.hero_subtitle') }}
                            </p>
                        </div>
                        <div>
                            <a href="#" class="bg-ivory-50 hover:bg-pearl-100 text-pearl-900 border-2 border-pearl-900 px-8 py-4 rounded-lg text-lg font-semibold inline-block transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 font-body">
                                {{ __('welcome.shop_button') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Products Section -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <h3 class="text-3xl font-bold mb-8 text-center font-info">{{ __('welcome.featured_products') }}</h3>
            <livewire:product-showcase.product-showcase/>
        </div>

    </div>
    
    @push('scripts')
    {{-- Any page-specific scripts can go here --}}
    @endpush
</x-layouts.public>