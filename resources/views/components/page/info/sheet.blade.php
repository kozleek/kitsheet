@props(['kit'])

@if ($kit)
    <div class="mt-4 flex flex-row sm:flex-wrap space-x-3 sm:space-x-6">
        <x-page.info.examples :kit="$kit" />
        <x-page.info.numbers :kit="$kit" />
        <x-page.info.range :kit="$kit" />
        <x-page.info.operations :kit="$kit" />
    </div>
@endif
