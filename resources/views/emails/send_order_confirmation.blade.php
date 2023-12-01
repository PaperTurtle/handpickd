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
        <p style="margin-top: 24px; font-size: 1rem; color: #2d3748; text-align: center;">Sincerely, <br> Handpickd Team
        </p>
        <p style="font-size: 0.9rem; color: #718096; text-align: center;">For support: handpickd.shop@gmail.com</p>
    </div>
</body>

</html>
