<x-mail::message>

Ahoj,

Sada pracovních listů byla úspěšně vytvořena.

<x-mail::panel>
ID: {{ $kit->id }}

Datum vytvoření: {{ $kit->created_at->format('j.n.Y h:i') }}

Počet pracovních listů: {{ $kit->count_sheets }}

Počet příkladů v pracovním listu: {{ $kit->count_examples }}

Počet čísel v příkladu: {{ $kit->count_numbers }}
</x-mail::panel>

<x-mail::button :url="$url" color="success">
Zobrazit sadu
</x-mail::button>

</x-mail::message>
