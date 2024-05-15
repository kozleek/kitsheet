@props(['kit'])

@if ($kit)
    <div class="flex items-center text-sm text-neutral-500 gap-1">
        <x-heroicon-o-chevron-left class="text-black/30" />
        <span>{{ json_decode($kit->range_numbers)->min }}, {{ json_decode($kit->range_numbers)->max }}</span>
        <x-heroicon-o-chevron-right class="text-black/30" />
    </div>
@endif