@props(['label' => '', 'name', 'description' => ''])

<div class="">
    <label for="{{ $name }}" class="{{ $attributes['disabled'] ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }} relative flex items-start gap-3 rounded-lg border border-neutral-300 p-3 transition hover:bg-gray-50">
        <div class="flex items-center">
            &#8203;
            <input
                type="checkbox"
                id="{{ $name }}"
                name="{{ $name }}"
                {{ $attributes }}
                {{ $attributes['disabled'] ? 'disabled' : '' }}
                {{ $attributes['value'] == 'true' || $attributes['value'] == 1 ? 'checked' : '' }}
                class="size-4 rounded border-neutral-400" id="{{ $name }}"
            />
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

    @error($name)
        <div class="text-xs text-red-500">{{ $message }}</div>
    @enderror

</div>
