@props(['title' => '', 'description' => '', 'info' => '', 'actions' => ''])

<div class="lg:flex lg:items-center lg:justify-between py-8 gap-12">
    <div class="">
        @if ($title)
            <h1 class="text-2xl font-bold leading-7 text-neutral-600 sm:truncate sm:text-3xl sm:tracking-tight">
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

    @if ($actions)
        <div class="min-w-1/2 flex-shrink-0 mt-5 flex lg:mt-0 gap-2">
            {{ $actions }}
        </div>
    @endif
</div>
