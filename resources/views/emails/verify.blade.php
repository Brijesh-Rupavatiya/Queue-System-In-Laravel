{{-- @component('mail::message')
# Hello {{ $user->name }}

Please click the button below to verify your email address:

@component('mail::button', ['url' => $verificationUrl])
Verify Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent --}}


<h2>Welcome {{ $user->name }}</h2>
<p>Please click the button below to verify your email address:</p>

<a href="{{ $url }}" style="padding:10px 15px;background:#4F46E5;color:#fff;text-decoration:none;">Verify Email</a>
