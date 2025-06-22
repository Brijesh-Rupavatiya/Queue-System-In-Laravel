{{-- @component('mail::message')
# Hello {{ $username }},

{{ $messageContent }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}


<!DOCTYPE html>
<html>

<head>
    <title>{{ $subjectText }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 520px;
            margin: 40px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
            padding: 32px 32px 24px 32px;
        }

        .header {
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 16px;
            margin-bottom: 24px;
        }

        .user-info {
            display: flex;
            align-items: center;
            margin-bottom: 24px;
        }

        .avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: #e0e7ef;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: #6366f1;
            font-weight: bold;
            margin-right: 16px;
        }

        .user-details {}

        .user-name {
            font-size: 18px;
            font-weight: 600;
            color: #374151;
        }

        .user-email {
            font-size: 14px;
            color: #6b7280;
        }

        .body-content {
            font-size: 16px;
            color: #374151;
            margin-bottom: 24px;
        }

        .footer {
            font-size: 14px;
            color: #6b7280;
            text-align: right;
            border-top: 1px solid #e5e7eb;
            padding-top: 16px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2 style="margin:0; color:#4f46e5;">{{ $subjectText }}</h2>
        </div>
        <div class="user-info">
            <div class="avatar">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <div class="user-details">
                <div class="user-name">{{ $user->name }}</div>
                <div class="user-email">{{ $user->email }}</div>
            </div>
        </div>
        <div class="body-content">
            {!! nl2br(e($bodyText)) !!}
        </div>
        <div class="footer">
            Thanks,<br>{{ config('app.name') }}
        </div>
    </div>
</body>

</html>