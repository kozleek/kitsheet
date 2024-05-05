<x-page.card>
    <div class="space-y-4">
        <x-form.section label="Nastavení sady">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 mb-8">
                <x-form.text label="Název sady" name="title" />
                <x-form.text label="Stručný popis sady" name="description" />
            </div>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <x-form.number label="Počet pracovních listů / Počet žáků" name="countSheets" min="1" max="50" required="true" />
                <x-form.number label="Počet příkladů v pracovním listu" name="countExamples" min="1" max="50" required="true" />
            </div>
        </x-form.section>

        <x-form.section label="Nastavení čísel">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
                <x-form.number label="Minimum" name="rangeMin" required="true" />
                <x-form.number label="Maximum" name="rangeMax" required="true" />
                <x-form.number label="Počet čísel v příkladu" name="countNumbers" min="2" max="5" required="true" />
                <x-form.number label="Počet desetinných míst" name="rangeDecimals" min="0" max="3" required="true" />
            </div>
        </x-form.section>

        <x-form.section label="Matematické operace">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
                <x-form.checkbox label="Sčítání" name="operationAdd" />
                <x-form.checkbox label="Odčítání" name="operationSubtract" />
                <x-form.checkbox label="Násobení" name="operationMultiply" />
                <x-form.checkbox label="Dělení" name="operationDivide" />
            </div>
        </x-form.section>

        <x-form.section label="Nastavení příkladů">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                <x-form.checkbox label="Pouze kladné výsledky" description="Negenerují se příklady se záporným výsledkem. Např. při odčítání" name="settingsExamplesOnlyPositive" />
                <x-form.checkbox label="Priority operátorů" description="Do příkladů se přidají závorky pro dvojce čísel. Např.: (1 + 2) + (3 + 4) + 5 = ?" name="settingsExamplesWithParentheses" />
            </div>
        </x-form.section>
    </div>

    <div class="mt-8 flex items-center gap-4">
        @if ($mode == 'create')
            <x-button icon="heroicon-o-plus" wire:click="store" primary="true" disabled="{{ $canSave == false }}">
                <span class="block md:hidden">Vytvořit sadu</span>
                <span class="hidden md:block">Vytvořit novou sadu pracovních listů</span>
            </x-button>
        @endif

        @if ($mode == 'edit')
            <x-button x-on:click="modal='update'" primary="true" disabled="{{ $canSave == false }}">
                Uložit sadu
            </x-button>

            <x-modals.update />
        @endif
    </div>
</x-page.card>
