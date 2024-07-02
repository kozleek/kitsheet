<div class="mb-8">
    <div class="mx-auto max-w-7xl overflow-hidden rounded-md">
        <div class="grid grid-cols-2 gap-px sm:grid-cols-2 md:grid-cols-4">
            <x-stats.card
                title="{{ __('stats.correct_answers_count') }}"
                :value="$correctAnswersCount"
                description="/ {{ $examplesCount }}"
            />
            <x-stats.card
                title="{{ __('stats.wrong_answers_count') }}"
                :value="$wrongAnswersCount"
                description="/ {{ $examplesCount }}"
            />
            <x-stats.card
                title="{{ __('stats.finished_sheets_count') }}"
                :value="$finishedSheetsCount"
                description="/ {{ $sheetsCount }}"
            />
            <x-stats.card
                title="{{ __('stats.correct_answers_percentage') }}"
                :value="$correctAnswersPercentage"
                description="%"
            />
        </div>
    </div>
</div>
