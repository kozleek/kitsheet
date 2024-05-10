@props(['kit'])

@if ($kit)
    <div class="flex items-center text-sm text-neutral-500 gap-2">
        <x-heroicon-o-document-text class="text-black/30" />
        {{ $kit->count_examples }}
        <span class="hidden md:block">
            @if ($kit->count_examples === 1)
                příklad
            @elseif ($kit->count_examples > 1 && $kit->count_examples < 5)
                příklady
            @else
                příkladů
            @endif
        </span>
    </div>
@endif
