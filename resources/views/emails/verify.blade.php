@component('mail::message')
# Подтверждение адреса электронной почты

Нажмите кнопку ниже, чтобы подтвердить ваш email.

@component('mail::button', ['url' => $url])
Подтвердить Email
@endcomponent

Если вы не создавали аккаунт, проигнорируйте это письмо.
@endcomponent
