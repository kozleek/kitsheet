<?php

namespace App\Support;

class OperationSupport
{
    /**
     * Generate a name for the given operation
     */
    public static function getOperationName($operation): string
    {
        switch ($operation) {
            case 'add':
                return 'sčítání';
            case 'subtract':
                return 'odčítání';
            case 'multiply':
                return 'násobení';
            case 'divide':
                return 'dělení';
            default:
                return '';
        }
    }
}
