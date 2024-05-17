<div class="space-y-4">
    <x-form.section label="Základní informace">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 mb-8">
            <x-form.input type="text" label="Název" name="title" value="test" autofocus />
            <x-form.input type="text" label="Stručný popis" name="description" value="text" />
        </div>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <x-form.input type="number" label="Počet pracovních listů" name="countSheets" value="10" min="1" max="50" required />
            <x-form.input type="number" label="Počet příkladů v pracovním listu" name="countExamples" value="10" min="1" max="50" required />
        </div>
    </x-form.section>

    <x-form.section label="Čísla">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            <x-form.input type="number" label="Minimum" name="rangeMin" value="1" required />
            <x-form.input type="number" label="Maximum" name="rangeMax" value="50" required />
            <x-form.input type="number" label="Počet čísel v příkladu" value="2" name="countNumbers" min="2" max="5" required />
            <x-form.input type="number" label="Počet desetinných míst" value="0" name="rangeDecimals" min="0" max="3" required />
        </div>
    </x-form.section>

    <x-form.section label="Matematické operace">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
            <x-form.checkbox label="Sčítání" name="operationAdd" value="true" checked />
            <x-form.checkbox label="Odčítání" name="operationSubtract" value="true" checked />
            <x-form.checkbox label="Násobení" name="operationMultiply" value="false" />
            <x-form.checkbox label="Dělení" name="operationDivide" value="false" />
        </div>
    </x-form.section>

    <x-form.section label="Nastavení">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <x-form.checkbox label="Pouze kladné výsledky" description="Negenerují se příklady se záporným výsledkem." name="settingsExamplesOnlyPositive" value="true" checked />
            {{-- <x-form.checkbox label="Písemné počitání" description="Příklady se zapisují pod sebe." name="settingsSheetsWritten" /> --}}
            <x-form.checkbox label="Priority operátorů" description="Do příkladů se přidají závorky pro dvojice čísel." name="settingsExamplesWithParentheses" value="false" />
        </div>
    </x-form.section>
</div>
