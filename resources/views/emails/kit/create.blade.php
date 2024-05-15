<x-mail::message>

Ahoj,

Sada pracovních listů byla úspěšně vytvořena.

<x-mail::panel>
ID: {{ $kit->id }}

Datum vytvoření: {{ $kit->created_at->format('j.n.Y h:i') }}

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

Operace:
@if($kit->operation_add)
* Sčítání
@endif
@if($kit->operation_subtract)
* Odčítání
@endif
@if($kit->operation_multiply)
* Násobení
@endif
@if($kit->operation_divide)
* Dělení
@endif
</x-mail::panel>

<x-mail::button :url="$url" color="success">
Zobrazit sadu
</x-mail::button>

</x-mail::message>
