@props(['icon' => '', 'primary' => false, 'danger' => false, 'disabled' => false, 'small' => false, 'tooltip' => ''])


<a
    {{ $attributes }}
    @if ($tooltip)
        data-tippy-content="{{ $tooltip }}"
    @endif
    class="
        @if ($primary)
            {{ 'action action-primary' }}
        @elseif ($danger)
            {{ 'action action-danger' }}
        @else
            {{ 'action action-normal' }}
        @endif
    "
>
    @if ($icon)
        <div>
            @svg($icon, 'h-4 h-4 lg:h-6 lg:w-6 group-hover:text-sky-500')
        </div>
    @endif
    {{ $slot }}
</a>
