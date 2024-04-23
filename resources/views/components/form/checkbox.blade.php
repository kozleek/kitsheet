@props(['label', 'name', 'required' => false, 'description' => '', 'disabled' => false, 'beta' => false])

<div class="">
    <label for="{{ $name }}" class="{{ $disabled ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer' }} relative flex items-start gap-3 rounded-lg border border-neutral-300 p-3 transition hover:bg-gray-50">
        <div class="flex items-center">
            &#8203;
            <input type="checkbox" class="size-4 rounded border-neutral-400" id="{{ $name }}" wire:model.live="{{ $name }}" {{ $disabled ? 'disabled' : '' }} />
        </div>

        <div>
            <strong class="font-normal text-gray-900"> {{ $label }} </strong>
            @if ($description)
                <p class="text-pretty mt-1 text-sm text-gray-500">
                    {{ $description }}
                </p>
            @endif
        </div>

        @if ($beta)
            <div class="absolute -top-3 -right-2 py-0.5 px-3 border border-red-600 bg-red-500 text-white rounded-full text-sm">
                Beta
            </div>
        @endif
    </label>
</div>
