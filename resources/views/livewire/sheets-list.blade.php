<div>
    <x-stats.kit
        :examplesCount="$examplesCount"
        :correctAnswersCount="$correctAnswersCount"
        :wrongAnswersCount="$wrongAnswersCount"
        :sheetsCount="$sheetsCount"
        :finishedSheetsCount="$finishedSheetsCount"
        :correctAnswersPercentage="$correctAnswersPercentage"
    />

    <div class="{{ count($sheets) > 1 ? 'xl:grid-cols-2' : 'xl:grid-cols-1' }} grid grid-cols-1 gap-2" wire:poll.750ms>
        @foreach ($sheets as $sheet)
            <x-sheet.card :sheet="$sheet" />
        @endforeach
    </div>
</div>
