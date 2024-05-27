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

    /**
     * Generate a string with names of the given operations
     * This method generates a string with names of the given operations
     */
    public static function getOperationsNames($operations): string
    {
        $operationsNames = [];
        foreach ($operations as $operation) {
            $operationsNames[] = self::getOperationName($operation);
        }

        return implode(', ', $operationsNames);
    }
}
