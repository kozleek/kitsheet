<div class="mb-8">
    <div class="mx-auto max-w-7xl overflow-hidden rounded-md">
        <div class="grid grid-cols-1 gap-px sm:grid-cols-2 lg:grid-cols-4">
            <x-stats.card
                title="Správné odpovědi"
                :value="$correctAnswersCount"
                description="/ {{ $examplesCount }}"
            />
            <x-stats.card
                title="Špatné odpovědi"
                :value="$wrongAnswersCount"
                description="/ {{ $examplesCount }}"
            />
            <x-stats.card
                title="Dokončeno listů"
                :value="$finishedSheetsCount"
                description="/ {{ $sheetsCount }}"
            />
            <x-stats.card
                title="Celková úspěšnost"
                :value="$correctAnswersPercentage"
                description="%"
            />
        </div>
    </div>
</div>
