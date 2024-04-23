@props(['label', 'name', 'value', 'required' => false, 'description' => '', 'disabled' => false])

<div class="">
    <label for="{{ $name }}_{{ $value }}" class="{{ $disabled ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }} flex items-start gap-3 rounded-lg border border-neutral-300 p-3 transition hover:bg-gray-50">
        <div class="flex items-center">
            &#8203;
            <input type="radio" class="size-4 rounded-full border-neutral-400" id="{{ $name }}_{{ $value }}" wire:model="{{ $name }}" value="{{ $value }}" {{ $disabled ? 'disabled' : '' }} />
        </div>

        <div>
            <strong class="font-normal text-gray-900"> {{ $label }} </strong>
            @if ($description)
                <p class="text-pretty mt-1 text-sm text-gray-500">
                    {{ $description }}
                </p>
            @endif
        </div>
    </label>
</div>
