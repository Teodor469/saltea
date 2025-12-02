{{-- this is card for different info --}}
@props([
    'title' => 'Example Title',
    'text' => 'Example Text',
    'image' => 'Image placeholder',
])
<div class="aspect-square overflow-hidden my-4 mx-4 border border-2 shadow-lg rounded-xl p-2 relative group">
    {{-- the card itself --}}
    {{-- The image is bigger therefore the margin is not applied correctly on the bottom --}}
    @if ($image)
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-full object-cover object-center transition-opacity duration-300 group-hover:opacity-50">
        <div class="absolute inset-2 flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
            <h3 class="font-info text-lg font-semibold mb-2 text-center">{{ $title }}</h3>
            <p class="font-body text-sm text-center">{{ $text }}</p>
        </div>
    @else
        <div class="w-full h-full bg-pearl-100 flex items-center justify-center">
            <span class="font-body text-pearl-400 font-medium text-sm">{{ $title }}</span>
        </div>
    @endif
</div>
