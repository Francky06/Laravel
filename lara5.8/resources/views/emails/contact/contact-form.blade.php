@component('mail::message')
Bonjour,

From : {{$data['name']}}<br>
Mail : {{$data['email']}}<br>
Message : {{$data['message']}}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
