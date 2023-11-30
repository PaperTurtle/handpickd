<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Details</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
        }

        .order-details {
            width: 100%;
        }

        .product-item {
            border-bottom: 1px solid #ddd;
            padding: 8px;
            display: flex;
        }

        .product-info {
            flex-grow: 1;
            margin-left: 16px;
        }

        .product-image {
            width: 100px;
            height: 100px;
        }

        .total {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="order-details">
        <h1>Thanks for ordering</h1>
        <p>We appreciate your order, the artisan is currently processing it.</p>

        @php $orderPayment = 0; @endphp
        @foreach ($transactionDetails as $transaction)
            @php
                $orderPayment += $transaction->total_price;
            @endphp
            <div class="product-item">
                <img src="{{ storage_path('app/public/' . $transaction->product->images->first()->thumbnail_image_path) }}"
                    alt="Product Image" class="product-image">
                <div class="product-info">
                    <h3>{{ $transaction->product->name }}</h3>
                    <p>{{ $transaction->quantity }}x</p>
                </div>
                <p class="product-price">{{ number_format($transaction->total_price, 2) }} €</p>
            </div>
        @endforeach

        <div class="total">
            <strong>Total: {{ number_format($orderPayment, 2) }} €</strong>
        </div>
    </div>
</body>

</html>
