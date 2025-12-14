<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        @media (prefers-color-scheme: dark) {
            .bg-gray-50 { background-color: #1f2937 !important; }
            .bg-white { background-color: #111827 !important; }
            .text-gray-900 { color: #f9fafb !important; }
            .text-gray-700 { color: #d1d5db !important; }
            .text-gray-600 { color: #9ca3af !important; }
            .border-gray-200 { border-color: #374151 !important; }
            .bg-blue-50 { background-color: #1e3a8a !important; }
            .text-blue-700 { color: #93c5fd !important; }
        }
    </style>
</head>
<body class="font-sans leading-relaxed text-gray-900 max-w-2xl mx-auto p-5" style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; line-height: 1.6; color: #111827; max-width: 600px; margin: 0 auto; padding: 20px;">
    <div class="bg-gray-50 p-5 rounded-lg mb-5" style="background-color: #f9fafb; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
        <h1 class="text-2xl font-bold mb-2" style="font-size: 24px; font-weight: bold; margin-bottom: 8px; color: #111827;">New Contact Form Submission</h1>
        <p class="text-gray-700" style="color: #374151; margin: 0;">You have received a new contact form submission from your website.</p>
    </div>

    <div class="bg-white p-5 border border-gray-200 rounded-lg" style="background-color: #ffffff; padding: 20px; border: 1px solid #e5e7eb; border-radius: 8px;">
        <div class="mb-4" style="margin-bottom: 16px;">
            <div class="font-bold text-gray-700 mb-1" style="font-weight: bold; color: #374151; margin-bottom: 4px;">Product Interest:</div>
            <div class="bg-blue-50 text-blue-700 p-3 rounded font-medium" style="background-color: #eff6ff; color: #1d4ed8; padding: 12px; border-radius: 6px; font-weight: 500;">
                @if ($products && $products->count() > 0)
                    @foreach ($products as $product)
                        <div class="mb-2 p-2 bg-blue-50 rounded" style="margin-bottom: 8px; padding: 8px; background-color: #f0f9ff; border-radius: 4px;">
                            <strong class="text-blue-800" style="color: #1e40af;">{{ $product->title }}</strong>
                            @if($product->price)
                                - ${{ $product->price }}
                            @endif
                        </div>
                    @endforeach
                @else
                    <span>No products selected</span>
                @endif
            </div>
        </div>

        <div class="mb-4" style="margin-bottom: 16px;">
            <div class="font-bold text-gray-700 mb-1" style="font-weight: bold; color: #374151; margin-bottom: 4px;">Customer Name:</div>
            <div class="bg-gray-50 p-2 rounded" style="background-color: #f9fafb; padding: 8px; border-radius: 4px; color: #111827;">{{ $contactData['first_name'] }} {{ $contactData['last_name'] }}</div>
        </div>

        <div class="mb-4" style="margin-bottom: 16px;">
            <div class="font-bold text-gray-700 mb-1" style="font-weight: bold; color: #374151; margin-bottom: 4px;">Email Address:</div>
            <div class="bg-gray-50 p-2 rounded" style="background-color: #f9fafb; padding: 8px; border-radius: 4px; color: #111827;">{{ $contactData['email'] }}</div>
        </div>

        <div class="mb-4" style="margin-bottom: 16px;">
            <div class="font-bold text-gray-700 mb-1" style="font-weight: bold; color: #374151; margin-bottom: 4px;">Phone Number:</div>
            <div class="bg-gray-50 p-2 rounded" style="background-color: #f9fafb; padding: 8px; border-radius: 4px; color: #111827;">{{ $contactData['phone_number'] }}</div>
        </div>

        <div class="mb-4" style="margin-bottom: 16px;">
            <div class="font-bold text-gray-700 mb-1" style="font-weight: bold; color: #374151; margin-bottom: 4px;">Address:</div>
            <div class="bg-gray-50 p-2 rounded" style="background-color: #f9fafb; padding: 8px; border-radius: 4px; color: #111827;">{{ $contactData['address'] }}</div>
        </div>

        @if($contactData['additional_info'])
        <div class="mb-4" style="margin-bottom: 16px;">
            <div class="font-bold text-gray-700 mb-1" style="font-weight: bold; color: #374151; margin-bottom: 4px;">Additional Information:</div>
            <div class="bg-gray-50 p-2 rounded" style="background-color: #f9fafb; padding: 8px; border-radius: 4px; color: #111827;">{{ $contactData['additional_info'] }}</div>
        </div>
        @endif
    </div>

    <div class="mt-5 p-4 bg-gray-100 rounded text-sm text-gray-600" style="margin-top: 20px; padding: 16px; background-color: #f3f4f6; border-radius: 6px; font-size: 14px; color: #4b5563;">
        <p style="margin: 0 0 8px 0;"><strong style="color: #111827;">Note:</strong> This email was sent from the contact form on {{ config('app.name') }}.</p>
        <p style="margin: 0;">You can reply directly to this email to respond to the customer.</p>
    </div>
</body>
</html>