@props(['kit'])

@if ($kit)
    <div class="mt-4 flex flex-col sm:flex-row sm:flex-wrap sm:space-x-6">
        <div class="flex items-center text-sm text-neutral-500 gap-2">
            <x-heroicon-o-document-text class="text-black/30" />
            {{ $kit->count_examples }}
            @if ($kit->count_examples === 1)
                příklad
            @elseif ($kit->count_examples > 1 && $kit->count_examples < 5)
                příklady
            @else
                příkladů
            @endif
        </div>

        <div class="flex items-center text-sm text-neutral-500 gap-2">
            <x-heroicon-o-calculator class="text-black/30" />
            {{ $kit->count_numbers }}
            @if ($kit->count_numbers === 1)
                číslo
            @elseif ($kit->count_numbers > 1 && $kit->count_numbers < 5)
                čísla
            @else
                čísel
            @endif
        </div>

        <div class="flex items-center text-sm text-neutral-500 gap-1">
            <x-heroicon-o-chevron-left class="text-black/30" />
            <span>{{ json_decode($kit->range_numbers)->min }}, {{ json_decode($kit->range_numbers)->max }}</span>
            <x-heroicon-o-chevron-right class="text-black/30" />
        </div>
    </div>
@endif
