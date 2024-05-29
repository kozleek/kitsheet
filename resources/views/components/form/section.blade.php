@props(['label' => null, 'description' => null])

<div>
    @if ($label)
        <h3 class="{{ $description ? 'mb-3' : 'mb-6' }} flex items-center">
            <span class="pr-6 text-neutral-500">{{ $label }}</span>
            <span class="h-px flex-1 bg-neutral-200"></span>
        </h3>
    @endif

    @if ($description)
        <div class="mb-8 text-neutral-400 text-sm">
            <p>{{ $description }}</p>
        </div>
    @endif

    {{ $slot }}
</div>
