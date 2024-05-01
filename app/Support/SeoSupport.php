<?php

namespace App\Support;

class SeoSupport
{
    /**
     * Generate a title for the given page.
     */
    public static function getPageTitle($title = ''): string
    {
        return $title != '' ? ucfirst($title) . ' - ' . config('kitsheet.name') : config('kitsheet.name');
    }

    /**
     * Generate a meta info for the given page.
     */
    public static function getMetaInfo($kit, $showCountSheets = true, $showCountExamples = true, $showCountNumbers = true, $showRange = true): string
    {
        $countSheets = '';
        $countExamples = '';
        $countNumbers = '';
        $range = '';

        // get info about count of sheets, examples and numbers
        if ($kit->count_sheets === 1) {
            $countSheets = $kit->count_sheets . ' list';
        } else if ($kit->count_sheets > 1 && $kit->count_sheets < 5) {
            $countSheets = $kit->count_sheets . ' listy';
        } else {
            $countSheets = $kit->count_sheets . ' listů';
        }

        if ($kit->count_examples === 1) {
            $countExamples = $kit->count_examples . ' příklad';
        } else if ($kit->count_examples > 1 && $kit->count_examples < 5) {
            $countExamples = $kit->count_examples . ' příklady';
        } else {
            $countExamples = $kit->count_examples . ' příkladů';
        }

        if ($kit->count_numbers === 1) {
            $countNumbers = $kit->count_numbers . ' číslo';
        } else if ($kit->count_numbers > 1 && $kit->count_numbers < 5) {
            $countNumbers = $kit->count_numbers . ' čísla';
        } else {
            $countNumbers = $kit->count_numbers . ' čísel';
        }

        $range =  'Rozsah: ' . json_decode($kit->range_numbers)->min . ' - ' . json_decode($kit->range_numbers)->max;

        // concatenate info
        $info = '';

        if ($showCountSheets) {
            $info .= $countSheets . ' | ';
        }
        if ($showCountExamples) {
            $info .= $countExamples . ' | ';
        }
        if ($showCountNumbers) {
            $info .= $countNumbers . ' | ';
        }
        if ($showRange) {
            $info .= $range . '.';
        }

        return $info;
    }

    /**
     * Generate a meta description for the given page.
     */
    public static function getMetaDescription($description = ''): string
    {
        return $description != '' ? $description : config('kitsheet.description');
    }
}
