<x-mail::message>
# Bonjour vous avez reçu un mail de:

<h3>Nom: {{ $data['visitor_name']}} </h3>
<h3>Email: {{ $data['visitor_email']}} </h3>
<h3>Téléphone: {{ $data['visitor_phone']}} </h3>

#Relativement la propriété {{ $property['type'] }} - {{ $property['surface'] }} de {{ $property['prix'] }} situé à {{ $property['ville'] }}

<h3>Message:</h3>
<p>{{ $data['visitor_phone']}} </p>


<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
