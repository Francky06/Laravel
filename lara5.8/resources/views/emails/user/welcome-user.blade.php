@component('mail::message')

Bienvenue {{$user->name}}<br>
Mail : {{$user->email}}<br>

Merci de vous être inscrit !! :)


@endcomponent
