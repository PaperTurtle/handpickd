<!DOCTYPE html>
<html>

<head>
    <title>New Message Received</title>
    <style>
        .email-container {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            color: #333333;
            max-width: 600px;
            margin: 20px auto;
        }

        .email-header {
            background-color: #4a76a8;
            color: white;
            padding: 15px;
            text-align: center;
            font-size: 24px;
            border-top-left-radius: 7px;
            border-top-right-radius: 7px;
        }

        .email-body {
            background-color: white;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
        }

        .email-body p {
            line-height: 1.5;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            New Message Received!
        </div>

        <div class="email-body">
            <p><strong>From:</strong> {{ $data['firstName'] }} {{ $data['lastName'] }}</p>
            <p><strong>Email:</strong> <a href="mailto:{{ $data['email'] }}">{{ $data['email'] }}</a></p>
            <p><strong>Message:</strong></p>
            <p>{{ $data['message'] }}</p>
        </div>
    </div>
</body>

</html>
