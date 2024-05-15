<x-mail::message>
Ahoj,

Sada pracovních listů byla úspěšně vytvořena.

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

Rozsah: {{ $kit->range_min }} - {{ $kit->range_max }}

Počet desetinných míst: {{ $kit->range_decimals }}

Matematické operace: {{ $operations }}
</x-mail::panel>
<x-mail::button :url="$url" color="success">
Zobrazit sadu
</x-mail::button>
</x-mail::message>
