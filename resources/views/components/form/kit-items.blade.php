@props(['kit' => null])

<div class="space-y-4">
    <x-form.section label="{{ __('kit.form.section_1.label') }}" description="{{ __('kit.form.section_1.description') }}">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 gap-y-8">
            <x-form.input type="text" label="{{ __('kit.form.kit_title') }}" name="title" value="{{ $kit ? $kit->title : '' }}" autofocus />
            <x-form.input type="text" label="{{ __('kit.form.kit_description') }}" name="description" value="{{ $kit ? $kit->description : '' }}" />
            <x-form.input type="text" label="{{ __('kit.form.teacher_name') }}" name="teacherName" value="{{ $kit ? $kit->teacher_name : '' }}" />
            <x-form.input type="text" label="{{ __('kit.form.teacher_email') }}" name="teacherEmail" value="{{ $kit ? $kit->teacher_email : '' }}" />
        </div>
    </x-form.section>

    <x-form.section label="{{ __('kit.form.section_2.label') }}">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
            <x-form.input type="number" label="{{ __('kit.form.count_sheets') }}" name="countSheets" value="{{ $kit ? $kit->count_sheets : '10' }}" min="1" max="50" required />
            <x-form.input type="number" label="{{ __('kit.form.count_examples') }}" name="countExamples" value="{{ $kit ? $kit->count_examples : '10' }}" min="1" max="50" required />
        </div>
    </x-form.section>

    <x-form.section label="{{ __('kit.form.section_3.label') }}">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            <x-form.input type="number" label="{{ __('kit.form.range_min') }}" name="rangeMin" value="{{ $kit ? $kit->range_numbers['min'] : '1' }}" min="-1000000" max="1000000" required />
            <x-form.input type="number" label="{{ __('kit.form.range_max') }}" name="rangeMax" value="{{ $kit ? $kit->range_numbers['max'] : '50' }}" min="-1000000" max="1000000" required />
            <x-form.input type="number" label="{{ __('kit.form.count_numbers') }}" name="countNumbers" value="{{ $kit ? $kit->count_numbers : '2' }}" min="2" max="5" required />
            <x-form.input type="number" label="{{ __('kit.form.range_decimals') }}" name="rangeDecimals" value="{{ $kit ? $kit->range_numbers['decimals'] : '0' }}" min="0" max="3" required />
        </div>
    </x-form.section>

    <x-form.section label="{{ __('kit.form.section_4.label') }}">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
            <x-form.checkbox label="{{ __('kit.form.operation_add') }}" name="operationAdd" value="{{ $kit ? in_array('add', $kit->range_operations) : 'true' }}" />
            <x-form.checkbox label="{{ __('kit.form.operation_subtract') }}" name="operationSubtract" value="{{ $kit ? in_array('subtract', $kit->range_operations) : 'true' }}" />
            <x-form.checkbox label="{{ __('kit.form.operation_multiply') }}" name="operationMultiply" value="{{ $kit ? in_array('multiply', $kit->range_operations) : 'false' }}" />
            <x-form.checkbox label="{{ __('kit.form.operation_divide') }}" name="operationDivide" value="{{ $kit ? in_array('divide', $kit->range_operations) : 'false' }}" />
        </div>
    </x-form.section>

    <x-form.section label="{{ __('kit.form.section_5.label') }}">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
            <x-form.checkbox
                label="{{ __('kit.form.settings_examples_only_positive.label') }}"
                description="{{ __('kit.form.settings_examples_only_positive.description') }}"
                name="settingsExamplesOnlyPositive"
                value="{{ $kit ? in_array('onlyPositive', $kit->settings_examples) : 'true' }}"
            />
            <x-form.checkbox
                label="{{ __('kit.form.settings_examples_with_parentheses.label') }}"
                description="{{ __('kit.form.settings_examples_with_parentheses.description') }}"
                name="settingsExamplesWithParentheses"
                value="{{ $kit ? in_array('withParentheses', $kit->settings_examples) : 'false' }}"
            />
            <x-form.checkbox
                label="{{ __('kit.form.settings_examples_selection_of_results.label') }}"
                description="{{ __('kit.form.settings_examples_selection_of_results.description') }}"
                name="settingsExamplesSelectionOfResults"
                value="{{ $kit ? in_array('selectionOfResults', $kit->settings_examples) : 'false' }}"
            />
        </div>
    </x-form.section>
</div>
