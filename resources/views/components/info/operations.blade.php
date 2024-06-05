@props(['kit'])

@if ($kit)
    <div class="flex items-center text-xs gap-2">
        @if (in_array('add', $kit->range_operations))
            <span class="flex items-center justify-center rounded border border-sky-500 bg-sky-50/10 size-5 cursor-default" data-tippy-content="Sčítání">+</span>
        @endif
        @if (in_array('subtract', $kit->range_operations))
            <span class="flex items-center justify-center rounded border border-sky-500 bg-sky-50/10 size-5 cursor-default" data-tippy-content="Odčítání">-</span>
        @endif
        @if (in_array('multiply', $kit->range_operations))
            <span class="flex items-center justify-center rounded border border-sky-500 bg-sky-50/10 size-5 cursor-default" data-tippy-content="Násobení">×</span>
        @endif
        @if (in_array('divide', $kit->range_operations))
            <span class="flex items-center justify-center rounded border border-sky-500 bg-sky-50/10 size-5 cursor-default" data-tippy-content="Dělení">:</span>
        @endif
    </div>
@endif
