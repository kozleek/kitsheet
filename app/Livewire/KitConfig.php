<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Kit;
use App\Models\Example;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Support\RandomSupport;
use App\Support\ExampleSupport;

class KitConfig extends Component
{
    public $kit;
    public $mode;
    public $id;
    public $title;
    public $name;
    public $description;
    public $countSheets;
    public $countExamples;
    public $countNumbers;
    public $rangeType;
    public $rangeMin;
    public $rangeMax;
    public $rangeDecimals;
    public $rangeResultsMin;
    public $rangeResultsMax;
    public $operationAdd;
    public $operationSubtract;
    public $operationMultiply;
    public $operationDivide;
    public $settingsExamplesOnlyPositive;
    public $settingsExamplesWithParentheses;
    public $settingsSheetsWritten;
    public $canSave;

    /**
     * Mount the component.
     * Set values for the form fields.
     */

    public function mount($kit = null)
    {
        $this->mode              = $this->kit ? 'edit' : 'create';
        $this->id                = $this->kit ? $this->kit->id : null;
        $this->title             = $this->kit ? $this->kit->title : '';
        $this->description       = $this->kit ? $this->kit->description : '';
        $this->countSheets       = $this->kit ? intval($this->kit->count_sheets) : 10;
        $this->countExamples     = $this->kit ? intval($this->kit->count_examples) : 15;
        $this->countNumbers      = $this->kit ? intval($this->kit->count_numbers) : 2;
        $this->rangeType         = $this->kit ? json_decode($this->kit->range_numbers)->type : 'numbers';
        $this->rangeMin          = $this->kit ? intval(json_decode($this->kit->range_numbers)->min) : 1;
        $this->rangeMax          = $this->kit ? intval(json_decode($this->kit->range_numbers)->max) : 50;
        $this->rangeDecimals     = $this->kit ? intval(json_decode($this->kit->range_numbers)->decimals) : 0;
        $this->operationAdd      = $this->kit ? in_array('add', json_decode($this->kit->range_operations)) : true;
        $this->operationSubtract = $this->kit ? in_array('subtract', json_decode($this->kit->range_operations)) : true;
        $this->operationMultiply = $this->kit ? in_array('multiply', json_decode($this->kit->range_operations)) : false;
        $this->operationDivide   = $this->kit ? in_array('divide', json_decode($this->kit->range_operations)) : false;
        $this->canSave           = $this->canSave();

        $this->settingsExamplesOnlyPositive    = $this->kit ? ($this->kit->settings_examples ? in_array('onlyPositive', json_decode($this->kit->settings_examples)) : false) : true;
        $this->settingsExamplesWithParentheses = $this->kit ? ($this->kit->settings_examples ? in_array('withParentheses', json_decode($this->kit->settings_examples)) : false) : false;

        $this->settingsSheetsWritten = $this->kit ? ($this->kit->settings_sheets ? in_array('writtenCounting', json_decode($this->kit->settings_sheets)) : false) : false;
    }

    /**
     * Check if the form can be saved.
     * The form can be saved if at least one operation is selected.
     */

    private function canSave()
    {
        $hasAnyOperations = $this->operationAdd || $this->operationSubtract || $this->operationMultiply || $this->operationDivide;
        return $hasAnyOperations;
    }

    /**
     * Store the kit.
     * Validate the form fields and update or create the kit.
     */

    public function store()
    {
        // Validate the form fields
        $this->validate([
            'title'                           => 'string|max:255',
            'description'                     => 'string',
            'countSheets'                     => 'required|numeric|min:1|max:50',
            'countExamples'                   => 'required|numeric|min:1|max:50',
            'countNumbers'                    => 'required|numeric|min:2|max:5',
            'rangeType'                       => 'required|in:numbers,results',
            'rangeMin'                        => 'required|numeric',
            'rangeMax'                        => 'required|numeric|gte:rangeMin',
            'rangeDecimals'                   => 'required|numeric|min:0|max:3',
            'operationAdd'                    => 'boolean',
            'operationSubtract'               => 'boolean',
            'operationMultiply'               => 'boolean',
            'operationDivide'                 => 'boolean',
            'settingsExamplesOnlyPositive'    => 'boolean',
            'settingsExamplesWithParentheses' => 'boolean',
            'settingsSheetsWritten'           => 'boolean',
        ]);

        // Set ranges array
        $rangeNumbers = [
            'type'    => $this->rangeType,
            'min'     => $this->rangeMin,
            'max'     => $this->rangeMax,
            'decimals' => $this->rangeDecimals,
        ];

        // Set operations array
        $rangeOperations = [];
        if ($this->operationAdd) {
            $rangeOperations[] = 'add';
        }
        if ($this->operationSubtract) {
            $rangeOperations[] = 'subtract';
        }
        if ($this->operationMultiply) {
            $rangeOperations[] = 'multiply';
        }
        if ($this->operationDivide) {
            $rangeOperations[] = 'divide';
        }

        // Set settings for kit
        $settingsKit = [];

        // Set settings for sheets
        $settingsSheets = [];
        if ($this->settingsSheetsWritten) {
            $settingsSheets[] = 'writtenCounting';
        }

        // Set settings for examples
        $settingsExamples = [];
        if ($this->settingsExamplesOnlyPositive) {
            $settingsExamples[] = 'onlyPositive';
        }
        if ($this->settingsExamplesWithParentheses) {
            $settingsExamples[] = 'withParentheses';
        }

        // Update or create the kit
        $this->kit = Kit::updateOrCreate([
            'id' => $this->id,  // update by id or create a new one
        ], [
            'title'               => ucfirst($this->title),
            'description'         => $this->description,
            'count_sheets'        => $this->countSheets,
            'count_examples'      => $this->countExamples,
            'count_numbers'       => $this->countNumbers,
            'range_numbers'       => json_encode($rangeNumbers),
            'range_operations'    => json_encode($rangeOperations),
            'settings_kit'        => $settingsKit ? json_encode($settingsKit) : null,
            'settings_sheets'     => $settingsSheets ? json_encode($settingsSheets) : null,
            'settings_examples'   => $settingsExamples ? json_encode($settingsExamples) : null,
        ]);

        // Regenerate sheets
        // If exists, delete all sheets...
        if ($this->kit->sheets->count() > 0) {
            $this->kit->sheets->each->delete();
        }

        // ...and create new ones
        foreach (range(1, $this->countSheets) as $i) {
            $sheet = $this->kit->sheets()->create([
                'code' => $i,
                'result' => RandomSupport::getRandomNumber($rangeNumbers),
            ]);
            $examples = [];

            // Create examples for the sheet
            foreach (range(1, $this->countExamples) as $j) {

                // create example until it is unique (not exists in the examples array)
                do {
                    // Get example
                    $example = ExampleSupport::getExample(
                        $this->countNumbers,
                        $rangeNumbers,
                        $rangeOperations,
                        $settingsExamples
                    );
                } while (in_array($example, $examples));

                // Add example to the examples array
                $examples[] = $example;

                // Save example
                Example::create([
                    'sheet_id'                => $sheet->id,
                    'specification'           => json_encode($example['specification']),
                    'specification_formatted' => $example['specification_formatted'],
                    'result'                  => $example['result'],
                    'answer'                  => null,
                    'is_correct'              => null,
                ]);
            }
        }

        // Redirect to the kit
        return redirect()->route('kit.show', $this->kit);
    }

    /**
     * Render the component.
     */

    public function render()
    {
        $this->canSave = $this->canSave();
        return view('livewire.kit-config');
    }
}
