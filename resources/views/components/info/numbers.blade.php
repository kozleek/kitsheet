@props(['kit'])

@if ($kit)
    <div class="flex items-center text-sm gap-2">
        <x-heroicon-o-calculator />
        {{ $kit->count_numbers }}
        <span class="hidden md:block">
            @if ($kit->count_numbers === 1)
                {{ __('info.numbers.level_1') }}
            @elseif ($kit->count_numbers > 1 && $kit->count_numbers < 5)
                {{ __('info.numbers.level_2') }}
            @else
                {{ __('info.numbers.level_3') }}
            @endif
        </span>
    </div>
@endif
