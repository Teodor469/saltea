<!-- Navigation -->
<nav class="bg-ivory-50 shadow-lg border-b border-pearl-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center h-16">
            <!-- Left side navigation links -->
            <div class="flex items-center space-x-8 flex-1">
                <!-- Desktop navigation links -->
                <div class="hidden md:flex space-x-5">
                    <a href="{{ route('home') }}" class="text-pearl-800 hover:text-olive-600 px-3 py-2 rounded-md text-sm font-medium transition-colors font-body {{ request()->routeIs('home') ? 'text-olive-600 font-semibold bg-pearl-100' : '' }}">{{ __('common.Home') }}</a>
                    <a href="{{ route('about') }}" class="text-pearl-800 hover:text-olive-600 px-3 py-2 rounded-md text-sm font-medium transition-colors font-body">{{ __('common.About') }}</a>
                    <a href="#" class="text-pearl-800 hover:text-olive-600 px-3 py-2 rounded-md text-sm font-medium transition-colors font-body">{{ __('common.Contact') }}</a>
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
                    <button id="mobile-menu-button" class="text-pearl-800 hover:text-olive-600 focus:outline-none focus:text-olive-600 transition-colors" aria-label="Toggle mobile menu">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile menu (hidden by default) -->
    <div id="mobile-menu" class="md:hidden hidden bg-ivory-50 border-t border-pearl-200">
        <div class="px-4 pt-2 pb-3 space-y-1">
            <a href="{{ route('home') }}" class="block text-pearl-800 hover:text-olive-600 hover:bg-pearl-100 px-3 py-2 rounded-md text-base font-medium transition-colors font-body {{ request()->routeIs('home') ? 'text-olive-600 bg-pearl-200' : '' }}">Home</a>
            <a href="#" class="block text-pearl-800 hover:text-olive-600 hover:bg-pearl-100 px-3 py-2 rounded-md text-base font-medium transition-colors font-body">Shop</a>
            <a href="#" class="block text-pearl-800 hover:text-olive-600 hover:bg-pearl-100 px-3 py-2 rounded-md text-base font-medium transition-colors font-body">Categories</a>
            <a href="#" class="block text-pearl-800 hover:text-olive-600 hover:bg-pearl-100 px-3 py-2 rounded-md text-base font-medium transition-colors font-body">About</a>
            <a href="#" class="block text-pearl-800 hover:text-olive-600 hover:bg-pearl-100 px-3 py-2 rounded-md text-base font-medium transition-colors font-body">Contact</a>
            
            <div class="border-t border-pearl-200 pt-4 mt-4">
                @auth
                    <div class="px-3 py-2 text-sm text-pearl-700 border-b border-pearl-100 mb-2 font-body">
                        Hello, {{ auth()->user()->name }}
                    </div>
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admin.dashboard') }}" class="block text-pearl-800 hover:text-olive-600 hover:bg-pearl-100 px-3 py-2 rounded-md text-base font-medium transition-colors font-body">Admin Dashboard</a>
                    @endif
                    <form method="POST" action="{{ route('logout') }}" class="mt-1">
                        @csrf
                        <button type="submit" class="block w-full text-left text-pearl-800 hover:text-red-600 hover:bg-red-50 px-3 py-2 rounded-md text-base font-medium transition-colors font-body">Logout</button>
                    </form>
                {{-- @else
                    <a href="{{ route('login') }}" class="block text-pearl-800 hover:text-olive-600 hover:bg-pearl-100 px-3 py-2 rounded-md text-base font-medium transition-colors font-body">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="block bg-olive-600 hover:bg-olive-700 text-ivory-50 px-3 py-2 rounded-md text-base font-medium mt-2 transition-colors text-center font-body">Register</a>
                    @endif --}}
                @endauth
            </div>
        </div>
    </div>
</nav>

@push('scripts')
<script>
    // Mobile menu toggle functionality
    document.addEventListener('DOMContentLoaded', function() {
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        if (mobileMenuButton && mobileMenu) {
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                
                // Toggle hamburger icon to X when menu is open
                const svg = mobileMenuButton.querySelector('svg path');
                if (mobileMenu.classList.contains('hidden')) {
                    svg.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
                } else {
                    svg.setAttribute('d', 'M6 18L18 6M6 6l12 12');
                }
            });
            
            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target)) {
                    mobileMenu.classList.add('hidden');
                    const svg = mobileMenuButton.querySelector('svg path');
                    svg.setAttribute('d', 'M4 6h16M4 12h16M4 18h16');
                }
            });
        }
    });
</script>
@endpush