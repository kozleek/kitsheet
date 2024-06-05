@props(['kit'])

@if ($kit)
    <div class="mt-4 flex flex-row sm:flex-wrap space-x-3 sm:space-x-6 text-sky-400 border-amber-300">
        <x-info.sheets :kit="$kit" />
        <x-info.examples :kit="$kit" />
        <x-info.numbers :kit="$kit" />
        <x-info.range :kit="$kit" />
        <x-info.operations :kit="$kit" />
    </div>
@endif
