@props(['sheet'])
<div>
    <div class="flex flex-col gap-3 rounded-md bg-white p-4 lg:p-6 shadow-md hover:shadow-lg">
        <div class="">
            <div class="flex items-center gap-2">
                <div
                    x-on:click="modal='modal-sheet-info-{{ $sheet->id }}'"
                    class="size-8 flex items-center justify-center cursor-pointer text-slate-300 hover:text-slate-400 -ms-2"
                >
                    <x-heroicon-m-qr-code class="!w-6 !h-6 text-inherit" />
                </div>

                <h3 class="font-semibold text-lg">
                    <a href="{{ route('sheet.show', ['sheet' => $sheet]) }}" class="group flex items-center gap-2">
                        <div class="group-hover:underline">
                            @if ($sheet->name)
                                {{ $sheet->name }}
                            @else
                                Pracovní list č. {{ $sheet->code }}
                            @endif
                        </div>

                        @if ($sheet->is_finished)
                            <x-badge
                                :value="$sheet->percentage_of_correct_answers . '%'"
                                :color="$sheet->percentage_of_correct_answers >= 60 ? 'green' : 'red'"
                            />
                        @endif
                    </a>
                </h3>
            </div>
        </div>

        @if ($sheet->examples->count())
            <div class="flex flex-wrap gap-1 mt-2">
                @foreach ($sheet->examples as $example)
                    @if (!is_null($example->is_correct))
                        <span class="{{ $example->is_correct ? 'border border-green-400 bg-green-200' : 'border-red-300 bg-red-200' }} size-2.5 rounded-full border flex items-center justify-center"></span>
                    @else
                        <span class="size-2.5 rounded-full border border-gray-300 bg-gray-100"></span>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</div>
