@props(['title' => '', 'description' => '', 'info' => '', 'actions' => ''])

<div class="py-8">
    @if ($actions)
        <div class="flex-1 mb-4 md:mb-6 flex flex-col md:flex-row gap-2 justify-start">
            {{ $actions }}
        </div>
    @endif

    <div class="">
        @if ($title)
            <h1 class="text-2xl font-bold leading-7 text-neutral-600 sm:text-3xl sm:tracking-tight">
                {{ $title }}
            </h1>
        @endif

        @if ($description)
            <p class="mt-2 text-sm leading-5 text-neutral-500 text-balance">
                {{ $description }}
            </p>
        @endif

        @if ($info)
            {{ $info }}
        @endif
    </div>
</div>
