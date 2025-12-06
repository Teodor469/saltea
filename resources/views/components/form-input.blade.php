@props([
    'label' => null,
    'type' => 'text',
    'wireModel' => null,
    'placeholder' => null,
    'required' => false,
    'id' => null,
    'name' => null,
    'rows' => null, // For textarea
    'width' => 'w-full',
    'containerClass' => '',
])

<div class="flex flex-col gap-2 {{ $containerClass ?: 'w-full' }}">
    @if($label)
        <label for="{{ $id ?? $name }}" class="font-semibold text-sm">
            {{ $label }}
            @if($required) <span class="text-red-500">*</span> @endif
        </label>
    @endif

    {{ $slot }}
    
    @if($type === 'textarea')
        <textarea
            @if($id) id="{{ $id }}" @endif
            @if($name) name="{{ $name }}" @endif
            @if($wireModel) wire:model="{{ $wireModel }}" @endif
            @if($placeholder) placeholder="{{ $placeholder }}" @endif
            @if($required) required @endif
            @if($rows) rows="{{ $rows }}" @endif
            {{ $attributes->merge(['class' => $width . ' border border-neutral-200 dark:border-neutral-700 rounded-lg bg-gray-50 dark:bg-zinc-800 px-4 py-3']) }}
        ></textarea>
    @else
        <input
            type="{{ $type }}"
            @if($id) id="{{ $id }}" @endif
            @if($name) name="{{ $name }}" @endif
            @if($wireModel) wire:model="{{ $wireModel }}" @endif
            @if($placeholder) placeholder="{{ $placeholder }}" @endif
            @if($required) required @endif
            {{ $attributes->merge(['class' => $width . ' border border-neutral-200 dark:border-neutral-700 rounded-lg bg-gray-50 dark:bg-zinc-800 px-4 py-3']) }}
        >
    @endif
    
    @error($wireModel)
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>