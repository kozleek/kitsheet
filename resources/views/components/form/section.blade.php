@props(['label' => null])

<div>
    @if ($label)
        <h3 class="mb-6 flex items-center">
            <span class="pr-6 text-neutral-400">{{ $label }}</span>
            <span class="h-px flex-1 bg-neutral-200"></span>
        </h3>
    @endif

    {{ $slot }}
</div>
