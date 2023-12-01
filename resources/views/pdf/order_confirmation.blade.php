<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Details</title>
</head>

<body style="font-family: 'DejaVu Sans', sans-serif;">
    <div style="width: 100%;">
        <h1>Thanks for ordering</h1>
        <p>We appreciate your order, the artisan is currently processing it.</p>

        @php
            $orderPayment = 0;
            $shipping = 0;
            $firstTransaction = reset($transactionDetails);
            $buyer = $firstTransaction->transactionBuyer ?? null;
        @endphp

        @if ($buyer)
            <div
                style="margin-top: 20px; padding: 10px; background-color: #f8f8f8; border: 1px solid #eaeaea; border-radius: 8px;">
                <h2 style="margin-top: 0; color: #333; font-size: 18px;">Buyer Information:</h2>
                <p style="margin: 5px 0; font-size: 14px; color: #555;">Name: {{ $buyer->first_name }}
                    {{ $buyer->last_name }}</p>
                <p style="margin: 5px 0; font-size: 14px; color: #555;">Email: {{ $buyer->email }}</p>
                <p style="margin: 5px 0; font-size: 14px; color: #555;">Phone: {{ $buyer->phone_number }}</p>
                <p style="margin: 5px 0; font-size: 14px; color: #555;">Address: {{ $buyer->address }},
                    {{ $buyer->city }}, {{ $buyer->state_province }} {{ $buyer->postal_code }}, {{ $buyer->country }}
                </p>
            </div>
        @endif

        @foreach ($transactionDetails as $transaction)
            @php
                $orderPayment += $transaction->product->price * $transaction->quantity;
                $shipping = $transaction->delivery_method === 'Standard' ? 4.99 : 12.99;
            @endphp
            <div style="border-bottom: 1px solid #ddd; padding: 8px; display: flex;">
                <img src="{{ storage_path('app/public/' . $transaction->product->images->first()->thumbnail_image_path) }}"
                    alt="Product Image" style="width: 100px; height: 100px;">
                <div style="flex-grow: 1; margin-left: 16px;">
                    <h3>{{ $transaction->product->name }}</h3>
                    <p>{{ $transaction->quantity }}x</p>
                </div>
                <p style="flex-shrink: 0;">{{ $transaction->total_price }} €</p>
            </div>
        @endforeach
        <p>{{ $shipping }}</p>
        <div style="text-align: right;">
            <strong>Total: {{ number_format($orderPayment, 2) + $shipping }} €</strong>
        </div>
    </div>
</body>

</html>
