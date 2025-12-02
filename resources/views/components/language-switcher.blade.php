<div class="flex items-center space-x-2 text-sm font-body">
    @php
        $currentLocale = app()->getLocale();
        \Illuminate\Support\Facades\Log::debug('Language switcher rendering', [
            'current_locale' => $currentLocale,
            'session_locale' => session('locale')
        ]);
    @endphp
    
    @if($currentLocale === 'bg')
        <span class="text-pearl-900 font-medium">BG</span>
        <span class="text-pearl-400">|</span>
        <a href="{{ route('language.switch', 'en') }}" class="text-pearl-500 hover:text-pearl-900 transition-colors">EN</a>
    @else
        <a href="{{ route('language.switch', 'bg') }}" class="text-pearl-500 hover:text-pearl-900 transition-colors">BG</a>
        <span class="text-pearl-400">|</span>
        <span class="text-pearl-900 font-medium">EN</span>
    @endif
</div>