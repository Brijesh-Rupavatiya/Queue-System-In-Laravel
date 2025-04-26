<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Our App</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7fafc;
            color: #2d3748;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 30px;
            max-width: 600px;
            margin: auto;
        }
        .heading {
            font-size: 24px;
            margin-bottom: 10px;
            color: #3182ce;
        }
        .message {
            font-size: 16px;
            margin-bottom: 20px;
        }
        .footer {
            font-size: 14px;
            color: #718096;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="heading">Welcome, {{ $user->name }}!</div>
        <div class="message">
            Thank you for registering. We’re excited to have you on board!<br>
            Let us know if you need help getting started.
        </div>
        <div class="footer">
            &mdash; Team Laravel Queues
        </div>
    </div>
</body>
</html>
