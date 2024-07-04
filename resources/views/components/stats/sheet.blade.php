<div class="mb-8">
    <div class="mx-auto max-w-7xl overflow-hidden rounded-md">
        <div class="grid grid-cols-1 gap-px sm:grid-cols-1 md:grid-cols-3 lg:grid-cols-3">
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
                title="{{ __('stats.correct_answers_percentage') }}"
                :value="$correctAnswersPercentage"
                description="%"
            />
        </div>
    </div>
</div>
