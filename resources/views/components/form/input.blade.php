@props(['label' => '', 'name'])

<div class="{{ $attributes['disabled'] ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }} flex flex-col gap-2">
    <label for="{{ $name }}" class="relative block rounded-md border border-neutral-300 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
        <input
            id="{{ $name }}"
            name="{{ $name }}"
            {{ $attributes }}
            class="peer w-full border-none bg-transparent p-3 px-3.5 focus:border-transparent focus:outline-none focus:ring-0 rounded-md "
        />

        @if ($label)
            <span class="px-2 flex gap-1 items-center pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-focus:top-0 peer-focus:text-xs">
                {{ $label }}
                @if ($attributes['required'])
                    <x-heroicon-m-star class="relative -top-1 !h-2.5 !w-2.5 text-red-300" />
                @endif
            </span>
        @endif
    </label>

    @error($name)
        <div class="text-xs text-red-500">{{ $message }}</div>
    @enderror
</div>
