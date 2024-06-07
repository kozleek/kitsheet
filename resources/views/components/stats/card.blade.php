@props(['title' => '', 'value' => '', 'description' => ''])

<div class="bg-slate-800 px-4 py-6 sm:px-6 lg:px-8">
    <p class="text-sm font-medium leading-6 text-gray-400">{{ $title }}</p>
    <p class="mt-2 flex items-baseline gap-x-2">
        <span class="text-4xl font-semibold tracking-tight text-white">{{ $value }}</span>
        <span class="text-sm text-gray-400">{{ $description }}</span>
    </p>
</div>
