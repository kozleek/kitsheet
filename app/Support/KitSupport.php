<?php

namespace App\Support;

use App\Models\Kit;
use App\Models\Sheet;
use App\Models\Example;

class KitSupport
{
    /**
     * Get kit name
     */

    public static function getKitName($kit): string
    {
        // default title
        $title = __('kit.header.title');

        // if title is set, use it
        if ($kit->title) {
            $title = $kit->title;
        }
        // if teacher name is set, use it
        elseif ($kit->teacher_name) {
            $title = $kit->teacher_name;
        }

        return $title;
    }

    /**
     * Get settings names
     */

    public static function getSettingsNames($settings): string
    {
        $settingsNames = [];
        foreach ($settings as $setting) {
            switch ($setting) {
                case 'onlyPositive':
                    $settingsNames[] = __('settings.only_positive.label');
                    break;
                case 'withParentheses':
                    $settingsNames[] = __('settings.with_parentheses.label');
                    break;
                case 'selectionOfResults':
                    $settingsNames[] = __('settings.selection_of_results.label');
                    break;
            }
        }

        return implode(', ', $settingsNames);
    }

    /**
     * Get sheets count
     */

    public static function getSheetsCount($kit): int
    {
        return $kit->sheets->count();
    }

    /**
     * Get examples count
     */

    public static function getExamplesCount($kit): int
    {
        $examplesCount = 0;
        foreach ($kit->sheets as $sheet) {
            $examplesCount += $sheet->examples->count();
        }

        return $examplesCount;
    }

    /**
     * Get count for correct answers
     */

    public static function getCorrectAnswersCount($kit): int
    {
        $correctAnswersCount = 0;
        foreach ($kit->sheets as $sheet) {
            $correctAnswersCount += $sheet->correct_answers_counter;
        }

        return $correctAnswersCount;
    }

    /**
     * Get percentage of correct answers
     */

    public static function getCorrectAnswersPercentage($kit): int
    {
        $examplesCount = self::getExamplesCount($kit);
        $correctAnswersCount = self::getCorrectAnswersCount($kit);

        if ($examplesCount > 0) {
            return round($correctAnswersCount / $examplesCount * 100);
        }

        return 0;
    }

    /**
     * Get count for incorrect answers
     */

    public static function getWrongAnswersCount($kit): int
    {
        $wrongAnswersCount = 0;
        foreach ($kit->sheets as $sheet) {
            $wrongAnswersCount += $sheet->wrong_answers_counter;
        }

        return $wrongAnswersCount;
    }

    /**
     * Get percentage of wrong answers
     */

    public static function getWrongAnswersPercentage($kit): int
    {
        $examplesCount = self::getExamplesCount($kit);
        $wrongAnswersCount = self::getWrongAnswersCount($kit);

        if ($examplesCount > 0) {
            return round($wrongAnswersCount / $examplesCount * 100);
        }

        return 0;
    }

    /**
     * Get count of empty answers
     */

    public static function getEmptyAnswersCount($kit): int
    {
        $emptyAnswersCount = 0;
        foreach ($kit->sheets as $sheet) {
            foreach ($sheet->examples as $example) {
                if (is_null($example->answer)) {
                    $emptyAnswersCount++;
                }
            }
        }

        return $emptyAnswersCount;
    }

    /**
     * Get percentage of empty answers
     */

    public static function getEmptyAnswersPercentage($kit): int
    {
        $examplesCount = self::getExamplesCount($kit);
        $emptyAnswersCount = self::getEmptyAnswersCount($kit);

        if ($examplesCount > 0) {
            return round($emptyAnswersCount / $examplesCount * 100);
        }

        return 0;
    }

    /**
     * Get count of finished sheets
     */

    public static function getFinishedSheetsCount($kit): int
    {
        $finishedSheetsCount = 0;
        foreach ($kit->sheets as $sheet) {
            if ($sheet->is_finished) {
                $finishedSheetsCount++;
            }
        }

        return $finishedSheetsCount;
    }

    /**
     * Get percentage of finished sheets
     */

    public static function getFinishedSheetsPercentage($kit): int
    {
        $sheetsCount = self::getSheetsCount($kit);
        $finishedSheetsCount = self::getFinishedSheetsCount($kit);

        if ($sheetsCount > 0) {
            return round($finishedSheetsCount / $sheetsCount * 100);
        }

        return 0;
    }

    /**
     * Save kit data
     */

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
        if ($data['settingsExamplesSelectionOfResults']) {
            $settingsExamples[] = 'selectionOfResults';
        }

        // Update or create the kit
        // if kit is not set, create new kit
        if (is_null($kit)) {
            $kit = Kit::create([
                'title'               => ucfirst($data['title']),
                'description'         => $data['description'],
                'teacher_name'        => $data['teacherName'],
                'teacher_email'       => $data['teacherEmail'],
                'count_sheets'        => $data['countSheets'],
                'count_examples'      => $data['countExamples'],
                'count_numbers'       => $data['countNumbers'],
                'range_numbers'       => $rangeNumbers,
                'range_operations'    => $rangeOperations,
                'settings_examples'   => $settingsExamples,
            ]);
        } else {
            $kit->update([
                'title'               => ucfirst($data['title']),
                'description'         => $data['description'],
                'teacher_name'        => $data['teacherName'],
                'teacher_email'       => $data['teacherEmail'],
                'count_sheets'        => $data['countSheets'],
                'count_examples'      => $data['countExamples'],
                'count_numbers'       => $data['countNumbers'],
                'range_numbers'       => $rangeNumbers,
                'range_operations'    => $rangeOperations,
                'settings_examples'   => $settingsExamples,
            ]);
        }

        // if any sheets exist, delete them
        $kit->sheets()->delete(); // Smažeme staré listy, pokud existují

        foreach (range(1, $data['countSheets']) as $i) {

            // generate random example and result
            $example = ExampleSupport::getExample(
                $data['countNumbers'],
                $rangeNumbers,
                $rangeOperations,
                $settingsExamples
            );

            $sheet = $kit->sheets()->create([
                'code' => $i,
                'result' => $example['result']
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
