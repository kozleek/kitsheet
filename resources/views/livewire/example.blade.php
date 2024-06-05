<div>
    @if ($isFinished)
        <div class="flex items-center gap-2 bg-neutral-100 rounded-md py-3 px-4 font-sometype text-xl">
            <div class="flex flex-col md:flex-row items-center gap-2 flex-1">
                <span>
                    {{ $example->specification_formatted }} =
                </span>
                <span class="flex-1 flex gap-2">
                    @if ($example->is_correct)
                        <span class="underline decoration-green-300 decoration-double underline-offset-4">
                            {{ $example->answer }}
                        </span>
                    @else
                        <span class="block">
                            @if ($example->answer == '?')
                                <span class="underline underline-offset-4 decoration-red-300 decoration-wavy">Neodpovězeno</span>
                                <span class="text-rose-500">({{ $example->result }})</span>
                            @else
                                <span class="line-through decoration-red-500">{{ $example->answer }}</span>
                                <span class="text-rose-500">{{ $example->result }}</span>
                            @endif
                        </span>

                    @endif
                </span>
            </div>
            @if ($example->is_correct)
                <div class="size-6 bg-green-200 flex items-center justify-center flex-shrink-0 text-center border border-green-400 rounded">
                    <x-heroicon-o-check class="h-4 w-4 text-green-600" />
                </div>
            @else
                <div
                    class="size-6 bg-red-200 flex items-center justify-center flex-shrink-0 text-center border border-red-400 rounded cursor-help"
                    data-tippy-content="Správný výsledek: {{ $example->result }}"
                >
                    <x-heroicon-o-x-mark class="text-red-500" />
                </div>
            @endif
        </div>
    @else
        <div class="flex flex-col md:flex-row items-center gap-2 rounded-md py-3 px-4 font-sometype text-base lg:text-xl xl:text-2xl">
            <div>
                {{ $example->specification_formatted }} =
            </div>
            <div
                class="flex-1 relative"
                @if($selectionOfResults)
                    x-data="{
                        showResults:false,
                        setInput(value) {
                            this.$refs.answer.value = value;
                            this.showResults = false;
                            // Trigger change event for Livewire
                            this.$refs.answer.dispatchEvent(new Event('input'));
                            this.$refs.answer.dispatchEvent(new Event('change', { bubbles: true }));
                        }
                    }"
                @endif
                }">
                <x-form.input type="text" name="answer" wire:model="answer" wire:change="saveAnswer" x-ref="answer" x-on:click="showResults=true" class="font-sometype text-xl w-full border-0 rounded-md" />
                @if($selectionOfResults)
                    <div class="absolute top-3 right-3">
                        <x-heroicon-o-chevron-down class="text-neutral-500" ::class="{ 'transform rotate-180': showResults }" />
                    </div>
                    <div
                        class="w-full grid grid-cols-3 gap-1 items-center p-2 bg-blue-200 border-2 border-blue-600 shadow-md rounded-md absolute top-14 left-0 z-50"
                        x-cloak
                        x-show="showResults"
                    >
                        @foreach ($results as $result)
                            <div
                                class="p-2 bg-white rounded cursor-pointer text-base border border-blue-600"
                                x-on:click.outside="showResults=false"
                                x-on:click="setInput('{{ $result }}')"
                            >
                                {{ $result }}
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @endif
</div>
