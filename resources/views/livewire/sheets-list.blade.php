<div>
    <div class="mb-8">
        <dl class="mt-5 grid grid-cols-1 divide-y divide-gray-200 overflow-hidden rounded-md bg-white md:grid-cols-4 md:divide-x md:divide-y-0">
            <div class="px-4 py-5 sm:p-6">
                <dt class="text-base font-normal text-gray-900">Správné odpovědi:</dt>
                <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                    <div class="flex items-baseline text-2xl font-semibold text-green-600">
                        {{ $correctAnswersCount }}
                        <span class="ml-2 text-sm font-medium text-gray-500">/ {{ $examplesCount }}</span>
                    </div>

                    <div class="inline-flex items-baseline rounded-full bg-green-100 px-2.5 py-0.5 text-sm font-medium text-green-800 md:mt-2 lg:mt-0">
                        {{ $correctAnswersPercentage }}%
                    </div>
                </dd>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <dt class="text-base font-normal text-gray-900">Špatné odpovědi:</dt>
                <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                    <div class="flex items-baseline text-2xl font-semibold text-rose-600">
                        {{ $wrongAnswersCount }}
                        <span class="ml-2 text-sm font-medium text-gray-500">/ {{ $examplesCount }}</span>
                    </div>

                    <div class="inline-flex items-baseline rounded-full bg-red-100 px-2.5 py-0.5 text-sm font-medium text-red-800 md:mt-2 lg:mt-0">
                        {{ $wrongAnswersPercentage }}%
                    </div>
                </dd>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <dt class="text-base font-normal text-gray-900">Zbývá vyřešit příkladů:</dt>
                <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                    <div class="flex items-baseline text-2xl font-semibold text-neutral-500">
                        {{ $emptyAnswersCount }}
                        <span class="ml-2 text-sm font-medium text-gray-500">/ {{ $examplesCount }}</span>
                    </div>

                    <div class="inline-flex items-baseline rounded-full bg-neutral-100 px-2.5 py-0.5 text-sm font-medium text-neutral-400 md:mt-2 lg:mt-0">
                        {{ $emptyAnswersPercentage }}%
                    </div>
                </dd>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <dt class="text-base font-normal text-gray-900">Zkontrolováno:</dt>
                <dd class="mt-1 flex items-baseline justify-between md:block lg:flex">
                    <div class="flex items-baseline text-2xl font-semibold text-neutral-500">
                        {{ $finishedSheetsCount }}
                        <span class="ml-2 text-sm font-medium text-gray-500">/ {{ $sheetsCount }}</span>
                    </div>

                    <div class="inline-flex items-baseline rounded-full bg-neutral-100 px-2.5 py-0.5 text-sm font-medium text-neutral-400 md:mt-2 lg:mt-0">
                        {{ $finishedSheetsPercentage }}%
                    </div>
                </dd>
            </div>
        </dl>
    </div>

    <div class="{{ count($sheets) > 1 ? 'xl:grid-cols-2' : 'xl:grid-cols-1' }} grid grid-cols-1 gap-2" wire:poll.750ms>
        @foreach ($sheets as $sheet)
            <x-sheet.card :sheet="$sheet" />
        @endforeach
    </div>
</div>
