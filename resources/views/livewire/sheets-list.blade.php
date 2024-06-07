<div>
    <div class="mb-8">
        <div class="mx-auto max-w-7xl overflow-hidden rounded-md">
            <div class="grid grid-cols-1 gap-px sm:grid-cols-2 lg:grid-cols-4">
                <div class="bg-slate-800 px-4 py-6 sm:px-6 lg:px-8">
                    <p class="text-sm font-medium leading-6 text-gray-400">Správné odpovědi</p>
                    <p class="mt-2 flex items-baseline gap-x-2">
                        <span class="text-4xl font-semibold tracking-tight text-white">{{ $correctAnswersCount }}</span>
                        <span class="text-sm text-gray-400">/ {{ $examplesCount }}</span>
                    </p>
                </div>
                <div class="bg-slate-800 px-4 py-6 sm:px-6 lg:px-8">
                    <p class="text-sm font-medium leading-6 text-gray-400">Špatné odpovědi</p>
                    <p class="mt-2 flex items-baseline gap-x-2">
                        <span class="text-4xl font-semibold tracking-tight text-white">{{ $wrongAnswersCount }}</span>
                        <span class="text-sm text-gray-400">/ {{ $examplesCount }}</span>
                    </p>
                </div>
                <div class="bg-slate-800 px-4 py-6 sm:px-6 lg:px-8">
                    <p class="text-sm font-medium leading-6 text-gray-400">Dokončeno listů</p>
                    <p class="mt-2 flex items-baseline gap-x-2">
                        <span class="text-4xl font-semibold tracking-tight text-white">{{ $finishedSheetsCount }}</span>
                        <span class="text-sm text-gray-400">/ {{ $sheetsCount }}</span>
                    </p>
                </div>
                <div class="bg-slate-800 px-4 py-6 sm:px-6 lg:px-8">
                    <p class="text-sm font-medium leading-6 text-gray-400">Úspěšnost</p>
                    <p class="mt-2 flex items-baseline gap-x-2">
                        <span class="text-4xl font-semibold tracking-tight text-white">{{ $correctAnswersPercentage }}</span>
                        <span class="text-sm text-gray-400">%</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="{{ count($sheets) > 1 ? 'xl:grid-cols-2' : 'xl:grid-cols-1' }} grid grid-cols-1 gap-2" wire:poll.750ms>
        @foreach ($sheets as $sheet)
            <x-sheet.card :sheet="$sheet" />
        @endforeach
    </div>
</div>
