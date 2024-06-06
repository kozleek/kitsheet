@props(['kit'])

@if ($kit)
    <div class="mt-8 flex flex-row sm:flex-wrap space-x-3 sm:space-x-6 text-slate-600 print:text-neutral-500">
        <x-info.examples :kit="$kit" />
        <x-info.numbers :kit="$kit" />
        <x-info.range :kit="$kit" />
        <x-info.operations :kit="$kit" />
    </div>
@endif
