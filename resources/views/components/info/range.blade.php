@props(['kit'])

@if ($kit)
    <div class="flex items-center text-sm text-white gap-1">
        <x-heroicon-o-chevron-left />
        <span>{{ $kit->range_numbers['min'] }}, {{ $kit->range_numbers['max'] }}</span>
        <x-heroicon-o-chevron-right />
    </div>
@endif
