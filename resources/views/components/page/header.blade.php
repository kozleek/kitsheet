@props(['title' => '', 'description' => '', 'info' => '', 'actions' => ''])

<div class="min-h-full">
    <div class="bg-slate-800">
        <nav class="bg-slate-800">
            <div class="content-container">
                @if ($actions != '' || Str::contains(Route::currentRouteName(), 'kit.create'))
                    <div class="border-b border-gray-700">
                        <div class="flex h-16 items-center justify-between">
                            @if ($actions != '')
                                <div class="flex items-center">
                                    <div class="flex items-baseline gap-4">
                                        {{ $actions }}
                                    </div>
                                </div>
                            @endif

                            @if(Str::contains(Route::currentRouteName(), 'kit.create'))
                                <x-page.langs />
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </nav>
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
