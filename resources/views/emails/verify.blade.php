{{-- @component('mail::message')
# Hello {{ $user->name }}

Please click the button below to verify your email address:

@component('mail::button', ['url' => $verificationUrl])
Verify Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}


{{-- <h2>Welcome {{ $user->name }}</h2>
<p>Please click the button below to verify your email address:</p>

<a href="{{ $url }}" style="padding:10px 15px;background:#4F46E5;color:#fff;text-decoration:none;">Verify Email</a>
<p>$url</p> --}}


<!DOCTYPE html>
<html>
<head>
    <title>Verify Your Email</title>
</head>
<body>
    <h1>Verify Your Email Address</h1>
    <p>Click the button below to verify your email address.</p>
    <a href="{{ $url }}" style="display: inline-block; padding: 10px 20px; background-color: #3490dc; color: white; text-decoration: none; border-radius: 5px;">
        Verify Email
    </a>
    <p>If you did not create an account, no further action is required.</p>
</body>
</html>
