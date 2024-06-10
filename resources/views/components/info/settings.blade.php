@props(['kit', 'settings' => ''])

@if ($settings)
    <div class="flex items-center text-sm gap-2">
        <x-heroicon-o-cog-6-tooth />
        {{ $settings }}
    </div>
@endif
