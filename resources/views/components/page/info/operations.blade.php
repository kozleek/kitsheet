@props(['kit'])

@if ($kit)
    <div class="flex items-center text-xs text-neutral-500 gap-2">
        @if (in_array('add', $kit->range_operations))
            <span class="flex items-center justify-center rounded border border-black/20 size-5 cursor-default" data-tippy-content="Sčítání">+</span>
        @endif
        @if (in_array('subtract', $kit->range_operations))
            <span class="flex items-center justify-center rounded border border-black/20 size-5 cursor-default" data-tippy-content="Odčítání">-</span>
        @endif
        @if (in_array('multiply', $kit->range_operations))
            <span class="flex items-center justify-center rounded border border-black/20 size-5 cursor-default" data-tippy-content="Násobení">×</span>
        @endif
        @if (in_array('divide', $kit->range_operations))
            <span class="flex items-center justify-center rounded border border-black/20 size-5 cursor-default" data-tippy-content="Dělení">:</span>
        @endif
    </div>
@endif
