@if ($slot)
    <div class="bg-red-500 px-6 py-2.5 sm:px-3.5 text-center">
        <p class="text-sm leading-6 text-white">
            {{ $slot }}
        </p>
    </div>
@endif
