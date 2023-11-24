<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
</head>

<body style="background-color: #f7fafc; padding: 32px;">
    <div
        style="max-width: 640px; margin: auto; background-color: #ffffff; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); border-radius: 0.5rem; overflow: hidden; padding: 24px;">
        <h1 style="font-size: 1.25rem; font-weight: 700; color: #2d3748;">Hi, {{ $user->name }}</h1>
        <p style="color: #718096;">Your Order has been received and is now being processed.</p>

        <div style="margin-top: 24px;">
            <h2 style="font-size: 1.125rem; font-weight: 600; color: #2d3748;">Order Details:</h2>
            <ul style="list-style: none; padding: 0;">
                @foreach ($transactionDetails as $transaction)
                    <li style="padding: 16px 0; display: flex; align-items: center; border-bottom: 1px solid #e2e8f0;">
                        <div style="margin-left: 16px; flex-grow: 1;">
                            <h3 style="color: #2d3748; font-weight: 500;">{{ $transaction->product->name }}</h3>
                            <p style="color: #a0aec0;">{{ $transaction->quantity }}x</p>
                        </div>

                        <p style="color: #2d3748; font-weight: 500; margin-left: 16px;">
                            ${{ number_format($transaction->total_price, 2) }}
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>
