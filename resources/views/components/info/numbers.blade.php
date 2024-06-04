@props(['kit'])

@if ($kit)
    <div class="flex items-center text-sm text-white gap-2">
        <x-heroicon-o-calculator />
        {{ $kit->count_numbers }}
        <span class="hidden md:block">
            @if ($kit->count_numbers === 1)
                číslo
            @elseif ($kit->count_numbers > 1 && $kit->count_numbers < 5)
                čísla
            @else
                čísel
            @endif
        </span>
    </div>
@endif
