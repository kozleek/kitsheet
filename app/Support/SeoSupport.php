<?php

namespace App\Support;

class SeoSupport
{
    /**
     * Generate a title for the given page.
     */
    public static function getPageTitle($title = '')
    {
        return $title != '' ? $title . ' - ' . config('app.name') : config('app.name');
    }

    /**
     * Generate a meta description for the given page.
     */
    public static function getMetaDescription($description = '')
    {
        return $description != '' ? $description : 'KitSheet je jednoduchý (ale promyšlený) generátor pracovních listů do matematiky';
    }
}
