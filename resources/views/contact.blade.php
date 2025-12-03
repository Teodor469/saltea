<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact - {{ config('app.name', 'Saltea') }}</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Marck+Script&family=Poiret+One:wght@400&family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')

    <!-- Ensure Alpine.js is loaded -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="antialiased bg-pearl-50">
    <x-navbar />

    <!-- Hero Section -->
    <section class="bg-ivory-100 py-12 lg:py-16">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <h1 class="font-accent text-4xl sm:text-5xl lg:text-6xl text-pearl-900 mb-4">Claim Your Calm.</h1>
            <p class="font-info text-lg lg:text-xl text-pearl-700 max-w-2xl mx-auto">
                Ready to bring tranquility into your daily routine? Let us know which products speak to you.
            </p>
        </div>
    </section>

    <section class="">
        <div class="flex-1 flex items-center justify-center p-4">
            <div class="flex w-full sm:w-2/3 lg:w-2/4 min-h-[500px] gap-4 p-4 rounded-lg">
                <form action="" class="flex flex-col w-full justify-center gap-4 items-center">
                    @csrf
                    <div class="flex flex-col gap-1 w-2/3 px-3 py-2">
                        <label for="" class="text-md sm:text-sm lg:text-lg">Choose Product</label>
                        <select name="product" id="product" class="border-2 w-full px-3 py-2">
                            <option value="">Choose a product...</option>
                            <option value="salt1">Bath Salt - Lavender</option>
                            <option value="salt2">Bath Salt - Eucalyptus</option>
                            <option value="salt3">Bath Salt - Rose</option>
                            <option value="salt4">Bath Salt - Mint</option>
                        </select>
                    </div>
                    <div class="flex flex-col gap-1 w-2/3 px-3 py-2">
                        <label for="" class="text-md sm:text-sm lg:text-lg">First Name *</label>
                        <input type="text" class="border-2 w-full px-3 py-2" placeholder="Your Name..." required>
                    </div>
                    <div class="flex flex-col gap-1 w-2/3 px-3 py-2">
                        <label for="" class="text-md sm:text-sm lg:text-lg">Last Name *</label>
                        <input type="text" class="border-2 w-full px-3 py-2" placeholder="Your Last Name..."
                            required>
                    </div>
                    <div class="flex flex-col gap-1 w-2/3 px-3 py-2">
                        <label for="" class="text-md sm:text-sm lg:text-lg">Email *</label>
                        <input type="text" class="border-2 w-full px-3 py-2" placeholder="Your Email..." required>
                    </div>
                    <div class="flex flex-col gap-1 w-2/3 px-3 py-2">
                        <label for="" class="text-md sm:text-sm lg:text-lg">Phone Number *</label>
                        <input type="tel" class="border-2 w-full px-3 py-2" placeholder="+359 XX XXX XXXX" required>
                    </div>
                    <div class="flex flex-col gap-1 w-2/3 px-3 py-2">
                        <label for="" class="text-md sm:text-sm lg:text-lg">Address *</label>
                        <input type="text" class="border-2 w-full px-3 py-2" placeholder="Your Address..." required>
                    </div>
                    <div class="flex flex-col gap-1 w-2/3 px-3 py-2">
                        <label for="" class="text-md sm:text-sm lg:text-lg">Additional Information</label>
                        <textarea name="info" id="info" cols="30" rows="2" class="border-2 w-full px-3 py-2"
                            placeholder="Additional Info For Delivery"></textarea>
                    </div>
                    <button type="submit"
                        class="w-full sm:w-2/3 lg:w-1/2 h-12 bg-pink-500 hover:bg-pink-600 text-white font-medium rounded-lg mt-4">
                        Submit Order
                    </button>
                </form>
            </div>
        </div>
    </section>

    <x-footer/>
</body>
