<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Saltea') }}</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marck+Script&family=Poiret+One:wght@400&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    
    <!-- Ensure Alpine.js is loaded -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="antialiased">
    {{-- !The design must be changed. No rounded edges. Different font. Remove view details button (keep modal). Make the image clickable. Remove price from Front-end keep on back-end --}}
    <div class="min-h-screen bg-pearl-50">
        <x-navbar />

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
            <h3 class="text-3xl font-bold text-pearl-900 mb-8 text-center font-info">{{ __('welcome.featured_products') }}</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <x-product-card 
                    name="Calm & Peace"
                    long-description="A soothing herbal blend perfect for evening relaxation and stress relief. This premium blend combines the finest herbs to create the ultimate calming experience."
                    :ingredients="['German Chamomile', 'Lavender', 'Lemon Balm', 'Passionflower']"
                    :benefits="['Promotes restful sleep', 'Reduces anxiety', 'Caffeine-free', 'All natural ingredients']"
                    :price="24.99"
                    :image="asset('images/products/calm&peace.jpg')"
                    :id="1"
                />
                
                <x-product-card 
                    name="Joy Soak"
                    long-description="An uplifting herbal blend designed to boost mood and energy naturally. Crafted with vibrant herbs that promote positivity and well-being."
                    :ingredients="['Lemon Verbena', 'Orange Peel', 'Ginger', 'Turmeric']"
                    :benefits="['Boosts mood', 'Increases energy', 'Natural antioxidants', 'Digestive support']"
                    :price="22.99"
                    :image="asset('images/products/joy-soak.jpg')"
                    :id="2"
                />
                
                <x-product-card 
                    name="Lunar Mix"
                    long-description="A mystical nighttime blend that harmonizes with your natural sleep cycle. Perfect for moon rituals and deep relaxation."
                    :ingredients="['Mugwort', 'Lavender', 'Rose Petals', 'Moonstone Essence']"
                    :benefits="['Enhances dreams', 'Deep relaxation', 'Natural sleep aid', 'Spiritual wellness']"
                    :price="28.99"
                    :image="asset('images/products/lunar-mix.jpg')"
                    :id="3"
                />
                
                <x-product-card 
                    name="Moon Soak"
                    long-description="A gentle evening ritual blend that prepares your body and mind for peaceful rest. Infused with lunar energy for deep tranquility."
                    :ingredients="['Chamomile', 'Calendula', 'Jasmine', 'Moon Water']"
                    :benefits="['Calms nerves', 'Promotes sleep', 'Skin soothing', 'Emotional balance']"
                    :price="26.99"
                    :image="asset('images/products/moon-soak.jpg')"
                    :id="4"
                />
                
                <x-product-card 
                    name="Rose Blend"
                    long-description="A luxurious rose-infused blend that nurtures self-love and emotional healing. Experience the gentle power of rose petals in every sip."
                    :ingredients="['Rose Petals', 'Rose Hips', 'Hibiscus', 'Vanilla']"
                    :benefits="['Heart opening', 'Emotional healing', 'Skin beauty', 'Love energy']"
                    :price="32.99"
                    :image="asset('images/products/rose-blend.jpg')"
                    :id="5"
                />
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-pearl-800 text-ivory-50 py-12 mt-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h4 class="text-2xl font-bold mb-4 font-accent">{{ config('app.name', 'Store') }}</h4>
                    <p class="text-pearl-200 mb-4 font-body">Crafting quality products with care and attention to detail</p>
                    <div class="flex justify-center space-x-6 mb-6">
                        <a href="#" class="text-pearl-300 hover:text-olive-300 transition-colors font-body">About Us</a>
                        <a href="#" class="text-pearl-300 hover:text-olive-300 transition-colors font-body">Contact</a>
                        <a href="#" class="text-pearl-300 hover:text-olive-300 transition-colors font-body">Privacy Policy</a>
                        <a href="#" class="text-pearl-300 hover:text-olive-300 transition-colors font-body">Terms of Service</a>
                    </div>
                    <p class="text-pearl-400 font-body">&copy; {{ date('Y') }} {{ config('app.name', 'Store') }}. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </div>
    
    @stack('scripts')
</body>
</html>