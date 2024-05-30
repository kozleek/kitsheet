<x-mail::message>
Ahoj,

byla nahlášená nová chyba k aplikaci {{ config('app.name') }}.

<x-mail::panel>
@if($name)
Autor: {{ $name }}
@endif

@if($mail)
E-mail: {{ $mail }}
@endif

{{ $message }}

@if($techinfo)
{{ $techinfo }}
@endif
</x-mail::panel>
</x-mail::message>
