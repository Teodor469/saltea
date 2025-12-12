<div>
    <!-- Hero Section -->
    <section class="bg-ivory-100 py-12 lg:py-16">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="font-accent text-4xl sm:text-5xl lg:text-6xl text-pearl-900 mb-4">{{ __('contact.hero_title') }}</h1>
            <p class="font-info text-lg lg:text-xl text-pearl-700 max-w-2xl mx-auto">
                {{ __('contact.hero_description') }}
            </p>
        </div>
    </section>

    <section class="">
        <div class="flex-1 flex items-center justify-center p-4">
            <div class="flex w-full sm:w-2/3 lg:w-2/4 min-h-[500px] gap-4 p-4 rounded-lg">
                @if (session('success'))
                    <div class="w-full mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif
                
                <form wire:submit.prevent="submit" class="flex flex-col w-full justify-center gap-4 items-center">
                    @csrf
                    <div class="flex flex-col gap-1 w-full sm:w-2/3 px-3 py-2">
                        <label for="product" class="text-md sm:text-sm lg:text-lg">{{ __('contact.choose_product') }}</label>
                        <select wire:model="product" id="product" class="border-2 w-full px-3 py-2" multiple>
                            @foreach ($products as $productItem)
                                <option value="{{ $productItem->id }}">{{ $productItem->title }}</option>
                            @endforeach
                        </select>
                        @error('product') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        @error('product.*') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="flex flex-col gap-1 w-full sm:w-2/3 px-3 py-2">
                        <label for="first_name" class="text-md sm:text-sm lg:text-lg">{{ __('contact.first_name') }} <span class="text-red-500">*</span></label>
                        <input wire:model="first_name" type="text" id="first_name" placeholder="{{ __('contact.first_name_placeholder') }}" class="border-2 px-3 py-2" required>
                        @error('first_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="flex flex-col gap-1 w-full sm:w-2/3 px-3 py-2">
                        <label for="last_name" class="text-md sm:text-sm lg:text-lg">{{ __('contact.last_name') }} <span class="text-red-500">*</span></label>
                        <input wire:model="last_name" type="text" id="last_name" placeholder="{{ __('contact.last_name_placeholder') }}" class="border-2 px-3 py-2" required>
                        @error('last_name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="flex flex-col gap-1 w-full sm:w-2/3 px-3 py-2">
                        <label for="email" class="text-md sm:text-sm lg:text-lg">{{ __('contact.email') }} <span class="text-red-500">*</span></label>
                        <input wire:model="email" type="email" id="email" placeholder="{{ __('contact.email_placeholder') }}" class="border-2 px-3 py-2" required>
                        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="flex flex-col gap-1 w-full sm:w-2/3 px-3 py-2">
                        <label for="phone_number" class="text-md sm:text-sm lg:text-lg">{{ __('contact.phone_number') }} <span class="text-red-500">*</span></label>
                        <input wire:model="phone_number" type="tel" id="phone_number" placeholder="{{ __('contact.phone_placeholder') }}" class="border-2 px-3 py-2" required>
                        @error('phone_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="flex flex-col gap-1 w-full sm:w-2/3 px-3 py-2">
                        <label for="address" class="text-md sm:text-sm lg:text-lg">{{ __('contact.address') }} <span class="text-red-500">*</span></label>
                        <input wire:model="address" type="text" id="address" placeholder="{{ __('contact.address_placeholder') }}" class="border-2 px-3 py-2" required>
                        @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    
                    <div class="flex flex-col gap-1 w-full sm:w-2/3 px-3 py-2">
                        <label for="additional_info" class="text-md sm:text-sm lg:text-lg">{{ __('contact.additional_information') }}</label>
                        <textarea wire:model="additional_info" id="additional_info" rows="2" placeholder="{{ __('contact.additional_info_placeholder') }}" class="border-2 px-3 py-2"></textarea>
                        @error('additional_info') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                    
                    <button type="submit" class="w-full sm:w-2/3 lg:w-1/2 h-12 bg-pink-500 hover:bg-pink-600 text-white font-medium rounded-lg mt-4">
                        {{ __('contact.submit_order') }}
                    </button>
                </form>
            </div>
        </div>
    </section>
</div>