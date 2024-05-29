<div>
    @if ($is_finished)
        <div class="flex items-center gap-2 bg-neutral-100 rounded-md py-2 px-4 font-sometype text-xl">
            <div class="flex flex-col md:flex-row items-center gap-2 flex-1">
                <span>
                    {{ $example->specification_formatted }} =
                </span>
                <span class="flex-1">
                    @if ($example->is_correct)
                        <span class="font-bold underline decoration-green-300 decoration-double underline-offset-4">
                            {{ $example->answer }}
                        </span>
                    @else
                        <span class="block underline decoration-red-300 decoration-wavy underline-offset-4">
                            @if ($example->answer == '?')
                                Neodpovězeno
                            @else
                                {{ $example->answer }}
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
        <div class="flex flex-col md:flex-row items-center gap-2 bg-neutral-100 rounded-md py-3 px-4 font-sometype text-xl">
            <div>
                {{ $example->specification_formatted }} =
            </div>
            <div
                class="flex-1 relative"
                x-data="{
                    showResults:false,
                    setInput(value) {
                        this.$refs.answer.value = value;
                        this.showResults = false;
                        // Trigger change event for Livewire
                        this.$refs.answer.dispatchEvent(new Event('input'));
                        this.$refs.answer.dispatchEvent(new Event('change', { bubbles: true }));
                    }
                }">
                <x-form.input type="text" name="answer" wire:model="answer" wire:change="saveAnswer" x-ref="answer" x-on:click="showResults=true" class="font-sometype text-xl w-full border-0 rounded-md" />
                <div
                    class="grid grid-cols-5 gap-1 items-center p-2 bg-white border border-neutral-300 shadow-md rounded-md absolute top-8 right-2 z-50"
                    x-cloak
                    x-show="showResults"
                >
                    <div class="p-2 text-red-500">{{ $example->result}}</div>
                    @foreach ($results as $result)
                        <div
                            class="p-2 border border-neutral-200 rounded cursor-pointer"
                            x-on:click.outside="showResults=false"
                            x-on:click="setInput('{{ $result }}')"
                        >
                            {{ $result }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</div>
