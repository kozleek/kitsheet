@props(['title' => '', 'description' => '', 'info' => '', 'actions' => ''])

<div class="min-h-full">
    <div class="bg-slate-800">
        @if ($actions != '')
            <nav class="bg-slate-800">
                <div class="content-container">
                    <div class="border-b border-gray-700">
                        <div class="flex h-16 items-center justify-between">
                            <div class="flex items-center">
                                <div class="flex items-baseline gap-4">
                                    {{ $actions }}
                                </div>
                            </div>

                            <x-page.langs />
                        </div>
                    </div>
                </div>
            </nav>
        @endif
        <header class="py-10">
            <div class="content-container">
                @if ($title)
                    <h1 class="text-3xl font-bold tracking-tight text-white">{{ $title }}</h1>
                @endif

                @if ($description)
                    <p class="text-balance mt-2 text-sm leading-5 text-white">
                        {{ $description }}
                    </p>
                @endif

                @if ($info)
                    {{ $info }}
                @endif
            </div>
        </header>
    </div>
</div>

<div class="hidden py-8">
    @if ($actions)
        <div class="mb-4 flex flex-1 flex-col justify-start gap-2 md:mb-6 md:flex-row">
            {{ $actions }}
        </div>
    @endif

    <div class="">

    </div>
</div>
