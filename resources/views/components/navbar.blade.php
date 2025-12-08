<!-- Navigation -->
<nav class="bg-ivory-50 shadow-lg border-b border-pearl-200" x-data="{ mobileMenuOpen: false }" @resize.window="if (window.innerWidth >= 768) mobileMenuOpen = false" x-init="$watch('mobileMenuOpen', value => { if (value) document.body.style.overflow = 'hidden'; else document.body.style.overflow = 'auto'; })"
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center h-16">
            <!-- Left side navigation links -->
            <div class="flex items-center space-x-8 flex-1">
                <!-- Desktop navigation links -->
                <div class="hidden md:flex space-x-5">
                    <a href="{{ route('home') }}" class="text-pearl-800 hover:text-olive-600 px-3 py-2 rounded-md text-sm font-medium transition-colors font-body {{ request()->routeIs('home') ? 'text-olive-600 font-semibold bg-pearl-100' : '' }}">{{ __('common.Home') }}</a>
                    <a href="{{ route('about') }}" class="text-pearl-800 hover:text-olive-600 px-3 py-2 rounded-md text-sm font-medium transition-colors font-body">{{ __('common.About') }}</a>
                    <a href="{{ route('contact') }}" class="text-pearl-800 hover:text-olive-600 px-3 py-2 rounded-md text-sm font-medium transition-colors font-body">{{ __('common.Contact') }}</a>
                </div>
            </div>

            <!-- Center logo -->
            <div class="flex-shrink-0 absolute left-1/2 transform -translate-x-1/2">
                <a href="{{ route('home') }}" class="text-2xl font-bold hover:opacity-75 transition-opacity font-accent">
                    {{ config('app.name', 'Store') }}
                </a>
            </div>

            <!-- Right side auth links -->
            <div class="flex items-center space-x-4 flex-1 justify-end">
                <!-- Language Switcher -->
                <x-language-switcher />
                <!-- Desktop auth links -->
                <div class="hidden md:flex items-center space-x-4">
                    @auth
                        @if(auth()->user()->isAdmin())
                            <a href="{{ route('admin.dashboard') }}" class="text-pearl-800 hover:text-olive-600 px-3 py-2 rounded-md text-sm font-medium transition-colors font-body">Admin Dashboard</a>
                        @endif
                        <div class="flex items-center space-x-2">
                            <span class="text-sm text-pearl-700 font-body">Hello, {{ auth()->user()->name }}</span>
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-pearl-800 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium transition-colors font-body">Logout</button>
                            </form>
                        </div>
                    {{-- @else
                        <a href="{{ route('login') }}" class="text-pearl-800 hover:text-olive-600 px-3 py-2 rounded-md text-sm font-medium transition-colors font-body">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-olive-600 hover:bg-olive-700 text-ivory-50 px-4 py-2 rounded-md text-sm font-medium transition-colors font-body">Register</a>
                        @endif --}}
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button 
                        @click="mobileMenuOpen = !mobileMenuOpen"
                        id="mobile-menu-button" class="text-pearl-800 hover:text-olive-600 focus:outline-none focus:text-olive-600 transition-colors" aria-label="Toggle mobile menu">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu (hidden by default) -->

    <div x-show="mobileMenuOpen"
        x-cloak
        @click.away="mobileMenuOpen = false"
        class="fixed inset-0 z-50"
        style="background-color: rgba(0, 0, 0, 0.5);">
        <div class="flex flex-col bg-white w-64 h-full shadow-2xl border-l border-gray-200 p-4 ml-auto"
             x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-500 transform"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in duration-500 transform"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full">
            
            <!-- Top branding section -->
            <div class="w-full text-center pt-4 pb-4 border-b border-gray-100 mb-6">
                <h2 class="font-accent text-xl text-pearl-900">{{ config('app.name') }}</h2>
                <p class="text-xs text-gray-500 mt-1">Natural Bath Salts</p>
            </div>

            <button @click="mobileMenuOpen = false" class="self-end mb-6">
                <flux:icon name="chevron-double-right"></flux:icon>
            </button>

            <!-- Menu items -->
            <div class="flex flex-col items-center gap-6 flex-1">
                <div class="flex border border-neutral-700 rounded-xl w-full items-center justify-center">
                    <flux:icon name="home" class="w-4 h-4"></flux:icon>
                    <a href="{{ route('home') }}" @click="mobileMenuOpen = false" class="text-pearl-800 hover:text-olive-600 px-3 py-2 rounded-md text-sm font-medium transition-colors font-body {{ request()->routeIs('home') ? 'text-olive-600 font-semibold bg-pearl-100' : '' }}">{{ __('common.Home') }}</a>
                </div>
                <div class="flex border border-neutral-700 rounded-xl w-full items-center justify-center">
                    <flux:icon name="beaker" class="w-4 h-4"></flux:icon>
                    <a href="{{ route('about') }}" @click="mobileMenuOpen = false" class="text-pearl-800 hover:text-olive-600 px-3 py-2 rounded-md text-sm font-medium transition-colors font-body">{{ __('common.About') }}</a>
                </div>
                <div class="flex border border-neutral-700 rounded-xl w-full items-center justify-center">
                    <flux:icon name="building-storefront" class="w-4 h-4"></flux:icon>
                    <a href="{{ route('contact') }}" @click="mobileMenuOpen = false" class="text-pearl-800 hover:text-olive-600 px-3 py-2 rounded-md text-sm font-medium transition-colors font-body">{{ __('common.Contact') }}</a>
                </div>
            </div>

            <!-- Language switcher -->
            <div class="mt-auto mb-4 flex justify-center">
                <x-language-switcher />
            </div>

            <!-- Footer -->
            <div class="text-center text-xs text-gray-400 border-t border-gray-100 pt-4">
                <p>Premium Bath Products</p>
                <p class="mt-1">Made with Love</p>
            </div>
        </div>
    </div>