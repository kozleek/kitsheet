@props(['kit'])

@if ($kit)
    <div class="flex items-center text-xs text-neutral-500 gap-2">
        @if (in_array('add', json_decode($kit->range_operations)))
            <span class="flex items-center justify-center rounded border border-black/20 size-5">+</span>
        @endif
        @if (in_array('subtract', json_decode($kit->range_operations)))
            <span class="flex items-center justify-center rounded border border-black/20 size-5">-</span>
        @endif
        @if (in_array('multiply', json_decode($kit->range_operations)))
            <span class="flex items-center justify-center rounded border border-black/20 size-5">×</span>
        @endif
        @if (in_array('divide', json_decode($kit->range_operations)))
            <span class="flex items-center justify-center rounded border border-black/20 size-5">:</span>
        @endif
    </div>
@endif
