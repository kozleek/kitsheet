<?php
// app/Helpers/Helpers.php

if (!function_exists('localizedRoute')) {
    function localizedRoute($name, $parameters = [], $absolute = true)
    {
        $lang = app()->getLocale();
        $parameters = array_merge(['lang' => $lang], $parameters);
        return route($name, $parameters, $absolute);
    }
}
