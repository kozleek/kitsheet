@props(['kit'])

@if ($kit)
    <div class="flex items-center text-sm gap-2">
        <x-heroicon-o-academic-cap />
        {{ $kit->count_sheets }}
        <span class="hidden md:block">
            @if ($kit->count_sheets === 1)
                {{ __('info.sheets.level_1') }}
            @elseif ($kit->count_sheets > 1 && $kit->count_sheets < 5)
                {{ __('info.sheets.level_2') }}
            @else
                {{ __('info.sheets.level_3') }}
            @endif
        </span>
    </div>
@endif
