<div>
    @if ($is_finished)
        <div class="flex items-center gap-2 border border-gray-200 bg-gray-100 py-2 px-4 font-sometype text-xl">
            <div class="flex items-center gap-2 flex-1">
                <span>
                    {{ $example->specification_formatted }}
                </span>
                <span>=</span>
                <span class="flex-1">
                    @if ($example->is_correct)
                        {{ $example->answer }}
                    @else
                        <span
                            class="block underline decoration-red-300 decoration-wavy underline-offset-4 cursor-help w-full"
                            data-tippy-content="Správný výsledek: {{ $example->result }}"
                        >
                            {{ $example->answer }}
                        </span>
                    @endif
                </span>
            </div>
            <div class="w-6 flex-shrink-0 text-center">
                @if ($example->is_correct)
                    <x-heroicon-o-check class="text-green-600" />
                @else
                    <x-heroicon-o-x-mark class="text-red-500" />
                @endif
            </div>
        </div>
    @else
        <div class="flex items-center gap-2 border border-gray-200 bg-gray-100 py-2 px-4 font-sometype text-xl">
            <span>
                {{ $example->specification_formatted }}
            </span>
            <span>=</span>
            <span class="flex-1">
                <x-form.text name="answer" change="saveAnswer" class="font-sometype text-xl" />
            </span>
        </div>
    @endif
</div>
