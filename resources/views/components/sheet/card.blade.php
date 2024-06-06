@props(['sheet'])

<div class="flex flex-col gap-3 rounded-md bg-white p-4 lg:p-6 shadow-md hover:shadow-lg">
    <div class="">
        <div class="flex items-center gap-3">
            <div class="flex gap-2">
                <div
                    class="size-7 rounded flex items-center justify-center cursor-pointer bg-gray-400 text-gray-900"
                    data-clipboard-text="{{ route('sheet.show', ['sheet' => $sheet]) }}"
                    data-tippy-content="Zkopírovat odkaz pracovního listu"
                >
                    <x-heroicon-o-link class="!h-4 !w-4 text-white" />
                </div>
            </div>

            <h3 class="font-semibold text-lg">
                <a href="{{ route('sheet.show', ['sheet' => $sheet]) }}" class="hover:underline">
                    @if ($sheet->name)
                        {{ $sheet->name }}
                    @else
                        Pracovní list č. {{ $sheet->code }}
                    @endif
                </a>
            </h3>
        </div>
        @if ($sheet->is_finished)
            <div class="flex gap-2 text-xs text-neutral-500 items-center mt-2">
                <div>Správně: {{ $sheet->correct_answers_counter }}</div>
                <div class="w-1 h-1 bg-neutral-300 rounded-full"></div>
                <div>Špatně: {{ $sheet->wrong_answers_counter }}</div>
                @if ($sheet->empty_answers_counter > 0)
                    <div class="w-1 h-1 bg-neutral-300 rounded-full"></div>
                    <div>Neodpovězeno: {{ $sheet->empty_answers_counter }}</div>
                @endif
            </div>
        @endif
    </div>

    @if ($sheet->examples->count())
        <div class="flex flex-wrap gap-1.5 mt-2">
            @foreach ($sheet->examples as $example)
                @if (!is_null($example->is_correct))
                    <span
                        class="{{ $example->is_correct ? 'border border-green-400 bg-green-200 text-green-600' : 'border-red-300 bg-red-200 text-red-600' }} size-5 rounded-sm border flex items-center justify-center"
                    >
                        @if($example->is_correct == 1)
                            <x-heroicon-o-check class="!w-3 !h-3 text-current" />
                        @endif
                        @if($example->is_correct == 0)
                            <x-heroicon-o-x-mark class="!w-3 !h-3 text-current" />
                        @endif
                    </span>
                @else
                    <span class="size-5 rounded-sm border border-gray-200 bg-gray-100 text-gray-500 flex items-center justify-center text-xs">?</span>
                @endif
            @endforeach
        </div>
    @endif
</div>
