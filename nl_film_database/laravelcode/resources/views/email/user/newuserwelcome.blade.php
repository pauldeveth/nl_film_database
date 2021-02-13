@component('mail::message')
# Welkom  op YOURHOST

Dank je voor je **registratie** 

@component('mail::panel')
 Het email-addres waarmeeje registreerde is  {{ $user->email }}

@component('mail::button', ['url' => 'YOURHOST'])
View Webstore
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
