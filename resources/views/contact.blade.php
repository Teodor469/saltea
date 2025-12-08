<x-layouts.public title="{{ __('contact.title') }} - {{ config('app.name', 'Saltea') }}" bodyClass="bg-pearl-50">

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
                <form action="" class="flex flex-col w-full justify-center gap-4 items-center">
                    @csrf
                    <div class="flex flex-col gap-1 w-full sm:w-2/3 px-3 py-2">
                        <label for="" class="text-md sm:text-sm lg:text-lg">{{ __('contact.choose_product') }}</label>
                        <select name="product" id="product" class="border-2 w-full px-3 py-2">
                            {{-- TODO Make that a modal with the list of products and checkboxes --}}
                            {{-- *Each checkbox will automatically fill in the name of the product --}}
                            {{-- *Upon form submission all this data will be sent via email --}}
                            <option value="">{{ __('contact.choose_product_placeholder') }}</option>
                            <option value="salt1">{{ __('contact.product_lavender') }}</option>
                            <option value="salt2">{{ __('contact.product_eucalyptus') }}</option>
                            <option value="salt3">{{ __('contact.product_rose') }}</option>
                            <option value="salt4">{{ __('contact.product_mint') }}</option>
                        </select>
                    </div>
                    <x-form-input 
                        :label="__('contact.first_name') . ' ' . __('contact.required_indicator')"
                        type="text"
                        :placeholder="__('contact.first_name_placeholder')"
                        containerClass="w-full sm:w-2/3 px-3 py-2"
                        class="border-2 px-3 py-2"
                        required
                    />
                    <x-form-input 
                        :label="__('contact.last_name') . ' ' . __('contact.required_indicator')"
                        type="text"
                        :placeholder="__('contact.last_name_placeholder')"
                        containerClass="w-full sm:w-2/3 px-3 py-2"
                        class="border-2 px-3 py-2"
                        required
                    />
                    <x-form-input 
                        :label="__('contact.email') . ' ' . __('contact.required_indicator')"
                        type="email"
                        :placeholder="__('contact.email_placeholder')"
                        containerClass="w-full sm:w-2/3 px-3 py-2"
                        class="border-2 px-3 py-2"
                        required
                    />
                    <x-form-input 
                        :label="__('contact.phone_number') . ' ' . __('contact.required_indicator')"
                        type="tel"
                        :placeholder="__('contact.phone_placeholder')"
                        containerClass="w-full sm:w-2/3 px-3 py-2"
                        class="border-2 px-3 py-2"
                        required
                    />
                    <x-form-input 
                        :label="__('contact.address') . ' ' . __('contact.required_indicator')"
                        type="text"
                        :placeholder="__('contact.address_placeholder')"
                        containerClass="w-full sm:w-2/3 px-3 py-2"
                        class="border-2 px-3 py-2"
                        required
                    />
                    <x-form-input 
                        :label="__('contact.additional_information')"
                        type="textarea"
                        name="info"
                        id="info"
                        rows="2"
                        :placeholder="__('contact.additional_info_placeholder')"
                        containerClass="w-full sm:w-2/3 px-3 py-2"
                        class="border-2 px-3 py-2"
                    />
                    <button type="submit"
                        class="w-full sm:w-2/3 lg:w-1/2 h-12 bg-pink-500 hover:bg-pink-600 text-white font-medium rounded-lg mt-4">
                        {{ __('contact.submit_order') }}
                    </button>
                </form>
            </div>
        </div>
    </section>

</x-layouts.public>
