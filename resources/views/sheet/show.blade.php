@extends('layouts.sheet')

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.3/dist/confetti.browser.min.js"></script>
@endsection

@section('info')
    <x-info.sheet :kit="$sheet->kit" />
@endsection

@section('content')
    @if ($sheet->examples->count())

        @if ($sheet->is_finished)
            <x-stats.sheet
                :examplesCount="$sheet->examples->count()"
                :correctAnswersCount="$sheet->correct_answers_counter"
                :wrongAnswersCount="$sheet->wrong_answers_counter"
                :correctAnswersPercentage="$sheet->percentage_of_correct_answers"
            />
        @endif

        <x-page.content>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($sheet->examples as $example)
                    <livewire:example :example="$example" :results="$results" :selectionOfResults="$settingsExamplesSelectionOfResults" key="$example->id" />
                @endforeach
            </div>

            @if ($sheet->is_finished == false)
                <div class="mt-8">
                    <form action="{{ localizedRoute('sheet.check', ['sheet' => $sheet]) }}" method="POST" id="form-sheet-check">
                        @csrf
                        <a href="#" class="button button-primary" x-on:click="modal='modal-sheet-check'">
                            <x-heroicon-o-check />
                            Odeslat ke kontrole
                        </a>
                    </form>
                </div>
            @endif
        </x-page.content>
    @endif

    @if ($sheet->percentage_of_correct_answers == 100)
        <script>
            var count = 200;
            var defaults = {
                origin: { y: 0.4 }
            };

            function fire(particleRatio, opts) {
            confetti({
                ...defaults,
                ...opts,
                particleCount: Math.floor(count * particleRatio)
            });
            }

            fire(0.25, {
            spread: 26,
            startVelocity: 55,
            });
            fire(0.2, {
            spread: 60,
            });
            fire(0.35, {
            spread: 100,
            decay: 0.91,
            scalar: 0.8
            });
            fire(0.1, {
            spread: 120,
            startVelocity: 25,
            decay: 0.92,
            scalar: 1.2
            });
            fire(0.1, {
            spread: 120,
            startVelocity: 45,
            });
        </script>
    @endif
@endsection

@section('modals')
    <x-modals.sheet.check id="modal-sheet-check" :sheet="$sheet" />
@endsection
