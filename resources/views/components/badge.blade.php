@props(['value' => null, 'color' => 'gray'])

<div
    class="
        inline-flex items-center gap-x-1.5 rounded-full px-2 py-1 text-xs font-medium !hover:no-underline !no-underline
        {{ $color === 'green' ? 'bg-green-100 text-green-700' : '' }}
        {{ $color === 'red' ? 'bg-red-100 text-red-700' : '' }}
        {{ $color === 'gray' ? 'bg-gray-100 text-gray-700' : '' }}
    ">
    <span
        class="
            block size-1.5 rounded-full
            {{ $color === 'green' ? 'bg-green-500' : '' }}
            {{ $color === 'red' ? 'bg-red-500' : '' }}
            {{ $color === 'gray' ? 'bg-gray-500' : '' }}
        ">
    </span>
    {{ $value }}
</div>
