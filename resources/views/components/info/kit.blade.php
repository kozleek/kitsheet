@props(['kit', 'settings' => ''])

@if ($kit)
    <div class="space-y-3 mt-8 text-slate-400 print:text-neutral-500">
        <div class=" flex flex-row sm:flex-wrap space-x-3 sm:space-x-6">
            <x-info.sheets :kit="$kit" />
            <x-info.examples :kit="$kit" />
            <x-info.numbers :kit="$kit" />
            <x-info.range :kit="$kit" />
            <x-info.operations :kit="$kit" />
        </div>
        <div>
            <x-info.settings :settings="$settings" />
        </div>
    </div>
@endif
