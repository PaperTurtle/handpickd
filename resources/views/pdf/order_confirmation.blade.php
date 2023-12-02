<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Details</title>
</head>

<body style="font-family: 'Verdana', sans-serif; background-color: white; color: #333;">
    <div style="display: block; max-width: 600px; margin: auto; padding: 20px;">
        <h1 style="font-size: 24px; color: #333; margin-bottom: 10px;">Thanks for ordering</h1>
        <p style="font-size: 14px; color: #555; margin-bottom: 20px;">We appreciate your order, the artisan is currently
            processing it.</p>

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
                <p style="margin: 5px 0; font-size: 14px; color: #555;"><strong>Name:</strong> {{ $buyer->first_name }}
                    {{ $buyer->last_name }}</p>
                <p style="margin: 5px 0; font-size: 14px; color: #555;"><strong>Email:</strong> {{ $buyer->email }}</p>
                <p style="margin: 5px 0; font-size: 14px; color: #555;"><strong>Phone:</strong>
                    {{ $buyer->phone_number }}</p>
                <p style="margin: 5px 0; font-size: 14px; color: #555;"><strong>Address:</strong> {{ $buyer->address }},
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
                    alt="Product Image" style="width: 100px; height: 100px; object-fit: cover; border-radius: 4px;">
                <div style="flex-grow: 1; margin-left: 16px;">
                    <h3 style="font-size: 16px; color: #333;">{{ $transaction->product->name }}</h3>
                    <p style="font-size: 14px; color: #555;">{{ $transaction->quantity }}x</p>
                </div>
                <p style="flex-shrink: 0; font-size: 14px; color: #333;">{{ $transaction->total_price }} €</p>
            </div>
            <hr>
        @endforeach
        <div style="margin-top: 20px; text-align: right;">
            <p style="font-size: 14px; color: #555;">Shipping: {{ $shipping }} €</p>
            <strong style="font-size: 16px; color: #333;">Total: {{ number_format($orderPayment, 2) + $shipping }}
                €</strong>
        </div>
    </div>
</body>

</html>
