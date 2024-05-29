@props(['kit' => null])

<div class="space-y-4">
    <x-form.section label="Základní informace">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <x-form.input type="text" label="Název sady" name="title" value="{{ $kit ? $kit->title : '' }}" autofocus />
            <x-form.input type="text" label="Stručný popis sady" name="description" value="{{ $kit ? $kit->description : '' }}" />
        </div>
    </x-form.section>

    <x-form.section label="Učitel" description="Nepovinné údaje. Pokud zadáte e-mail, tak Vám příjde automatická notifikace s informacemi o sadě pracovních listů.">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <x-form.input type="text" label="Jméno" name="teacherName" value="{{ $kit ? $kit->teacher_name : '' }}" />
            <x-form.input type="text" label="E-mail" name="teacherEmail" value="{{ $kit ? $kit->teacher_email : '' }}" />
        </div>
    </x-form.section>

    <x-form.section label="Pracovní listy">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <x-form.input type="number" label="Počet pracovních listů" name="countSheets" value="{{ $kit ? $kit->count_sheets : '10' }}" min="1" max="50" required />
            <x-form.input type="number" label="Počet příkladů v pracovním listu" name="countExamples" value="{{ $kit ? $kit->count_examples : '10' }}" min="1" max="50" required />
        </div>
    </x-form.section>

    <x-form.section label="Číselné hodnoty">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            <x-form.input type="number" label="Minimum" name="rangeMin" value="{{ $kit ? $kit->range_numbers['min'] : '1' }}" min="-1000000" max="1000000" required />
            <x-form.input type="number" label="Maximum" name="rangeMax" value="{{ $kit ? $kit->range_numbers['max'] : '50' }}" min="-1000000" max="1000000" required />
            <x-form.input type="number" label="Počet čísel v příkladu" name="countNumbers" value="{{ $kit ? $kit->count_numbers : '2' }}" min="2" max="5" required />
            <x-form.input type="number" label="Počet desetinných míst" name="rangeDecimals" value="{{ $kit ? $kit->range_numbers['decimals'] : '0' }}" min="0" max="3" required />
        </div>
    </x-form.section>

    <x-form.section label="Matematické operace">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
            <x-form.checkbox label="Sčítání" name="operationAdd" value="{{ $kit ? in_array('add', $kit->range_operations) : 'true' }}" />
            <x-form.checkbox label="Odčítání" name="operationSubtract" value="{{ $kit ? in_array('subtract', $kit->range_operations) : 'true' }}" />
            <x-form.checkbox label="Násobení" name="operationMultiply" value="{{ $kit ? in_array('multiply', $kit->range_operations) : 'false' }}" />
            <x-form.checkbox label="Dělení" name="operationDivide" value="{{ $kit ? in_array('divide', $kit->range_operations) : 'false' }}" />
        </div>
    </x-form.section>

    <x-form.section label="Nastavení">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <x-form.checkbox label="Pouze kladné výsledky" description="Negenerují se příklady se záporným výsledkem." name="settingsExamplesOnlyPositive" value="{{ $kit ? in_array('onlyPositive', $kit->settings_examples) : 'true' }}" />
            <x-form.checkbox label="Priority operátorů" description="Do příkladů se přidají závorky pro dvojice čísel (pro 2 a více čísel)." name="settingsExamplesWithParentheses" value="{{ $kit ? in_array('withParentheses', $kit->settings_examples) : 'false' }}" />
        </div>
    </x-form.section>
</div>
