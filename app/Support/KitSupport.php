<?php

namespace App\Support;

use App\Models\Kit;
use App\Models\Sheet;
use App\Models\Example;

class KitSupport
{
    public static function saveKitData($data, $kit = null): Kit
    {
        // Set ranges array
        $rangeNumbers = [
            'min'      => $data['rangeMin'],
            'max'      => $data['rangeMax'],
            'decimals' => $data['rangeDecimals'],
        ];

        // Set operations array
        $rangeOperations = [];
        if ($data['operationAdd']) {
            $rangeOperations[] = 'add';
        }
        if ($data['operationSubtract']) {
            $rangeOperations[] = 'subtract';
        }
        if ($data['operationMultiply']) {
            $rangeOperations[] = 'multiply';
        }
        if ($data['operationDivide']) {
            $rangeOperations[] = 'divide';
        }

        // Set example settings array
        $settingsExamples = [];
        if ($data['settingsExamplesOnlyPositive']) {
            $settingsExamples[] = 'onlyPositive';
        }
        if ($data['settingsExamplesWithParentheses']) {
            $settingsExamples[] = 'withParentheses';
        }

        // Update or create the kit
        // if kit is not set, create new kit
        if (is_null($kit)) {
            $kit = Kit::create([
                'title'               => ucfirst($data['title']),
                'description'         => $data['description'],
                'count_sheets'        => $data['countSheets'],
                'count_examples'      => $data['countExamples'],
                'count_numbers'       => $data['countNumbers'],
                'range_numbers'       => json_encode($rangeNumbers),
                'range_operations'    => json_encode($rangeOperations),
                'settings_examples'   => json_encode($settingsExamples),
            ]);
        } else {
            $kit->update([
                'title'               => ucfirst($data['title']),
                'description'         => $data['description'],
                'count_sheets'        => $data['countSheets'],
                'count_examples'      => $data['countExamples'],
                'count_numbers'       => $data['countNumbers'],
                'range_numbers'       => json_encode($rangeNumbers),
                'range_operations'    => json_encode($rangeOperations),
                'settings_examples'   => json_encode($settingsExamples),
            ]);
        }

        // if any sheets exist, delete them
        $kit->sheets()->delete(); // Smažeme staré listy, pokud existují

        foreach (range(1, $data['countSheets']) as $i) {
            $sheet = $kit->sheets()->create([
                'code' => $i,
                'result' => RandomSupport::getRandomNumber($rangeNumbers),
            ]);

            // Create examples for the sheet
            $examples = [];
            foreach (range(1, $data['countExamples']) as $j) {

                // create example until it is unique (not exists in the examples array)
                do {
                    // Get example
                    $example = ExampleSupport::getExample(
                        $data['countNumbers'],
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

        return $kit;
    }
}
