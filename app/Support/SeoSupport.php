<?php

namespace App\Support;

class SeoSupport
{
    /**
     * Generate a title for the given page.
     */
    public static function getPageTitle($title = '')
    {
        return $title != '' ? ucfirst($title) . ' - ' . config('app.name') : config('app.name');
    }

    /**
     * Generate a meta info for the given page.
     */
    public static function getMetaInfo($kit)
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
        return $countSheets . ', ' . $countExamples . ', ' . $countNumbers . ', ' . $range . '.';
    }

    /**
     * Generate a meta description for the given page.
     */
    public static function getMetaDescription($description = '')
    {
        return $description != '' ? $description : 'KitSheet je jednoduchý (ale promyšlený) generátor pracovních listů do matematiky';
    }
}
