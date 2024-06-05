@props(['icon' => '', 'primary' => false, 'danger' => false, 'disabled' => false, 'small' => false, 'tooltip' => ''])


<a
    {{ $attributes }}
    @if ($tooltip)
        data-tippy-content="{{ $tooltip }}"
    @endif
    class="flex gap-2 items-center rounded-md bg-slate-700 px-3 py-2 text-sm font-medium text-white cursor-pointer hover:bg-slate-900 group ease-in-out transition-colors duration-150"
>
    @if ($icon)
        <div>
            @svg($icon, 'h-4 h-4 lg:h-6 lg:w-6 group-hover:text-sky-500')
        </div>
    @endif
    {{ $slot }}
</a>
