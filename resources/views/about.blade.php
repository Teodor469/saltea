<x-layouts.public title="About - {{ config('app.name', 'Saltea') }}">
    <div>
        <section class="bg-ivory-100 py-8 lg:py-16 px-4">
            <div class="flex flex-col lg:flex-row mt-4 max-w-6xl mx-auto gap-6 justify-start">
                {{-- Image --}}
                <div class="w-full lg:w-1/3 h-64 lg:h-80 border border-2 shadow-lg rounded-lg overflow-hidden"> 
                    <img src="" alt="" class="w-full h-full object-cover">
                </div>
                {{-- Content --}}
                <div class="flex-1">
                    <h1 class="font-accent text-3xl sm:text-4xl lg:text-6xl">{{ __('about.The Beginning') }}</h1>
                    <p class="mt-4 font-info text-lg lg:text-xl">{{ __('about.subtitle') }}</p>
                </div>
            </div>
            <div class="flex mt-14 max-w-6xl mx-auto justify-start">
                    <p class="whitespace-pre-line max-w-4xl">{{ __('about.story_text') }}</p>
            </div>
        </section>

        {{-- Bullet point targets with the business --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <div>
                <x-info-card
                    :title="__('about.process.salts.title')"
                    :text="__('about.process.salts.text')"
                    :image="asset('images/info/SaltPour.png')"
                />
            </div>
            <div>
                <x-info-card
                    :title="__('about.process.oils.title')"
                    :text="__('about.process.oils.text')"
                    :image="asset('images/info/EthericOil.jpg')"
                />
            </div>
            <div>
                <x-info-card
                    :title="__('about.process.spices.title')"
                    :text="__('about.process.spices.text')"
                    :image="asset('images/info/Spices.png')"
                />
            </div>
            <div>
                <x-info-card
                    :title="__('about.process.mixing.title')"
                    :text="__('about.process.mixing.text')"
                    :image="asset('images/info/Stirring.png')"
                />
            </div>
        </div>

        {{-- Grid for ingredient quality and origin --}}
        <div class="">

        </div>
    </div>
</x-layouts.public>