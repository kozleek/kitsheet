<div
    aria-labelledby="modal-title" role="dialog" aria-modal="true"
    x-cloak x-show="modal=='{{ $id }}'"
    class="z-10 fixed inset-0 bg-black bg-opacity-80"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="fixed top-20 left-1/2 transform -translate-x-1/2 z-50 w-full md:w-auto px-4 md:px-0">
            <div
                class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all w-full sm:max-w-lg sm:p-6 md:min-w-[600px]"
                x-on:click.outside="modal = null"
                x-show="modal=='{{ $id }}'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            >
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 sm:mt-0">
                        <h3 class="text-xl font-semibold leading-6 text-gray-900" id="modal-title">{{ $title }}</h3>
                        <div class="mt-4 space-y-2 text-base text-gray-500">
                            {{ $text }}
                        </div>
                    </div>
                </div>

                <div class="mt-4 sm:mt-8 sm:flex flex items-center gap-4">
                    {{ $actions }}
                    <span x-on:click="modal=null" class="text-sm text-gray-400 underline hover:text-gray-600 hover:no-underline cursor-pointer">Zrušit</span>
                </div>
            </div>
        </div>
    </div>
</div>
