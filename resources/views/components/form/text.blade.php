@props(['name', 'label' => '', 'placeholder' => '', 'class' => '', 'change' => '', 'required' => false, 'disabled' => false])

<div class="{{ $disabled ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }} flex flex-col gap-2">
    <label
        for="Username"
        class="relative block rounded-md border border-neutral-300 bg-white shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600"
    >
        <input
            type="text" id="{{ $name }}"
            wire:model="{{ $name }}"
            @if ($change)
                wire:change="{{ $change }}"
            @endif
            {{ $required ? 'reguired' : '' }} {{ $disabled ? 'disabled' : '' }}
            class="peer w-full border-none bg-transparent p-3 placeholder-transparent text-inherit focus:border-transparent focus:outline-none focus:ring-0  {{ $class }}"
            @if ($placeholder)
                placeholder="{{ $placeholder }}"
            @endif
        />

        @if ($label)
            <span class="px-2 flex gap-2 items-center pointer-events-none absolute start-2.5 top-0 -translate-y-1/2 bg-white p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                {{ $label }}
                @if ($required)
                    <span class="block bg-red-300 border border-red-400 w-1 h-1 rounded-full"></span>
                @endif
            </span>
        @endif
    </label>
    @error($name)
        <div class="text-xs text-red-500">{{ $message }}</div>
    @enderror
</div>
