<x-mail::message>
Ahoj,

Sada pracovních listů byla úspěšně změněna.

<x-mail::panel>
@if($kit->title)
Název: {{ $kit->title }}
@endif

@if($kit->description)
Popis: {{ $kit->description }}
@endif

Počet pracovních listů: {{ $kit->count_sheets }}

Počet příkladů v pracovním listu: {{ $kit->count_examples }}

Počet čísel v příkladu: {{ $kit->count_numbers }}

Rozsah: {{ $kit->range_numbers['min'] }} - {{ $kit->range_numbers['max'] }}

Počet desetinných míst: {{ $kit->range_numbers['decimals'] }}

Matematické operace: {{ $operations }}
</x-mail::panel>
<x-mail::button :url="$url" color="success">
Zobrazit sadu
</x-mail::button>
</x-mail::message>