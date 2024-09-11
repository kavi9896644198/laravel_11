@component('mail::message')
# Forgot Your Password?

Hello {{ $user->name }},

It looks like you’ve requested a password reset. Click the button below to reset your password:

@component('mail::button', ['url' => url('reset', $user->remember_token)])
Reset Password
@endcomponent

If you did not request this password reset, please ignore this email.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
