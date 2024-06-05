@if ($slot)
    <div class="bg-danger px-6 py-2.5 sm:px-3.5 text-center mb-6">
        <p class="text-sm leading-6 text-white">
            {{ $slot }}
        </p>
    </div>
@endif
