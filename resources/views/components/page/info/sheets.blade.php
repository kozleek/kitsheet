@props(['kit'])

@if ($kit)
    <div class="flex items-center text-sm text-neutral-500 gap-2">
        <x-heroicon-o-academic-cap class="text-black/30" />
        {{ $kit->count_sheets }}
        @if ($kit->count_sheets === 1)
            list
        @elseif ($kit->count_sheets > 1 && $kit->count_sheets < 5)
            listy
        @else
            listů
        @endif
    </div>
@endif
