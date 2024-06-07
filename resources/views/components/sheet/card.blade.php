@props(['sheet'])

<div class="flex flex-col gap-3 rounded-md bg-white p-4 lg:p-6 shadow-md hover:shadow-lg">
    <div class="">
        <div class="flex items-center gap-3">
            <div class="flex gap-2">
                <div
                    class="size-7 rounded flex items-center justify-center cursor-pointer bg-gray-100 text-gray-500"
                    data-clipboard-text="{{ route('sheet.show', ['sheet' => $sheet]) }}"
                    data-tippy-content="Zkopírovat odkaz pracovního listu"
                >
                    <x-heroicon-o-link class="!h-4 !w-4 text-inherit" />
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
    </div>

    @if ($sheet->examples->count())
        <div class="flex flex-wrap gap-1 mt-2">
            @foreach ($sheet->examples as $example)
                @if (!is_null($example->is_correct))
                    <span class="{{ $example->is_correct ? 'border border-green-400 bg-green-200' : 'border-red-300 bg-red-200' }} size-3 rounded-full border flex items-center justify-center"></span>
                @else
                    <span class="size-3 rounded-full border border-gray-300 bg-gray-100"></span>
                @endif
            @endforeach
        </div>
    @endif
</div>
