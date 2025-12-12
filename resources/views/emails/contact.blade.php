<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .content {
            background-color: #ffffff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .field {
            margin-bottom: 15px;
        }
        .label {
            font-weight: bold;
            color: #555;
        }
        .value {
            margin-top: 5px;
            padding: 8px;
            background-color: #f8f9fa;
            border-radius: 3px;
        }
        .product {
            background-color: #e3f2fd;
            color: #1976d2;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>New Contact Form Submission</h1>
        <p>You have received a new contact form submission from your website.</p>
    </div>

    <div class="content">
        <div class="field">
            <div class="label">Product Interest:</div>
            <div class="value product">
                @if ($products && $products->count() > 0)
                    @foreach ($products as $product)
                        <div style="margin-bottom: 10px; padding: 5px; background-color: #f0f9ff; border-radius: 3px;">
                            <strong>{{ $product->title }}</strong>
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

        <div class="field">
            <div class="label">Customer Name:</div>
            <div class="value">{{ $contactData['first_name'] }} {{ $contactData['last_name'] }}</div>
        </div>

        <div class="field">
            <div class="label">Email Address:</div>
            <div class="value">{{ $contactData['email'] }}</div>
        </div>

        <div class="field">
            <div class="label">Phone Number:</div>
            <div class="value">{{ $contactData['phone_number'] }}</div>
        </div>

        <div class="field">
            <div class="label">Address:</div>
            <div class="value">{{ $contactData['address'] }}</div>
        </div>

        @if($contactData['additional_info'])
        <div class="field">
            <div class="label">Additional Information:</div>
            <div class="value">{{ $contactData['additional_info'] }}</div>
        </div>
        @endif
    </div>

    <div style="margin-top: 20px; padding: 15px; background-color: #f0f0f0; border-radius: 5px; font-size: 14px; color: #666;">
        <p><strong>Note:</strong> This email was sent from the contact form on {{ config('app.name') }}.</p>
        <p>You can reply directly to this email to respond to the customer.</p>
    </div>
</body>
</html>