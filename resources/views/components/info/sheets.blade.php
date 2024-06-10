@props(['kit'])

@if ($kit)
    <div class="flex items-center text-sm gap-2">
        <x-heroicon-o-academic-cap />
        {{ $kit->count_sheets }}
        <span class="hidden md:block">
            @if ($kit->count_sheets === 1)
                list
            @elseif ($kit->count_sheets > 1 && $kit->count_sheets < 5)
                listy
            @else
                listů
            @endif
        </span>
    </div>
@endif
