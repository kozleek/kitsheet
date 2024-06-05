<div class="grid grid-cols-1 gap-2 {{ count($sheets) > 1 ? 'xl:grid-cols-2' : 'xl:grid-cols-1' }}" wire:poll.750ms>
    @foreach ($sheets as $sheet)
        <x-sheet.card :sheet="$sheet" />
    @endforeach
</div>
