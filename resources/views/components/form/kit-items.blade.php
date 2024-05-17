@props(['kit' => null])

<div class="space-y-4">
    <x-form.section label="Základní informace">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 mb-8">
            <x-form.input type="text" label="Název" name="title" value="{{ $kit ? $kit->title : '' }}" autofocus />
            <x-form.input type="text" label="Stručný popis" name="description" value="{{ $kit ? $kit->description : '' }}" />
        </div>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <x-form.input type="number" label="Počet pracovních listů" name="countSheets" value="{{ $kit ? $kit->count_sheets : '10' }}" min="1" max="50" required />
            <x-form.input type="number" label="Počet příkladů v pracovním listu" name="countExamples" value="{{ $kit ? $kit->count_examples : '10' }}" min="1" max="50" required />
        </div>
    </x-form.section>

    <x-form.section label="Čísla">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            <x-form.input type="number" label="Minimum" name="rangeMin" value="{{ $kit ? json_decode($kit->range_numbers)->min : '1' }}" required />
            <x-form.input type="number" label="Maximum" name="rangeMax" value="{{ $kit ? json_decode($kit->range_numbers)->max : '50' }}" required />
            <x-form.input type="number" label="Počet čísel v příkladu" name="countNumbers" value="{{ $kit ? $kit->count_numbers : '2' }}" min="2" max="5" required />
            <x-form.input type="number" label="Počet desetinných míst" name="rangeDecimals" value="{{ $kit ? json_decode($kit->range_numbers)->decimals : '0' }}" min="0" max="3" required />
        </div>
    </x-form.section>

    <x-form.section label="Matematické operace">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
            <x-form.checkbox label="Sčítání" name="operationAdd" value="{{ $kit ? in_array('add', json_decode($kit->range_operations)) : 'true' }}" />
            <x-form.checkbox label="Odčítání" name="operationSubtract" value="{{ $kit ? in_array('subtract', json_decode($kit->range_operations)) : 'true' }}" />
            <x-form.checkbox label="Násobení" name="operationMultiply" value="{{ $kit ? in_array('multiply', json_decode($kit->range_operations)) : 'false' }}" />
            <x-form.checkbox label="Dělení" name="operationDivide" value="{{ $kit ? in_array('divide', json_decode($kit->range_operations)) : 'false' }}" />
        </div>
    </x-form.section>

    <x-form.section label="Nastavení">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <x-form.checkbox label="Pouze kladné výsledky" description="Negenerují se příklady se záporným výsledkem." name="settingsExamplesOnlyPositive" value="{{ $kit ? in_array('onlyPositive', json_decode($kit->settings_examples)) : 'true' }}" />
            <x-form.checkbox label="Priority operátorů" description="Do příkladů se přidají závorky pro dvojice čísel." name="settingsExamplesWithParentheses" value="{{ $kit ? in_array('withParentheses', json_decode($kit->settings_examples)) : 'false' }}" />
        </div>
    </x-form.section>
</div>
