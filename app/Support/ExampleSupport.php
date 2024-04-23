<?php

namespace App\Support;

use Illuminate\Support\Str;
use InvalidArgumentException;

class ExampleSupport
{

    /**
     * Get a example
     * This method generates a random example with the given parameters
     */

    public static function getExample($countNumbers, $range, $rangeOperations, $settings = [], $level = 'normal'): array
    {
        // generate only positive values
        $onlyPositiveValues = in_array('onlyPositive', $settings) ? true : false;

        // generate with parentheses
        $withParentheses = in_array('withParentheses', $settings) ? true : false;

        do {
            $numbers  = [];
            $operations = [];

            $maxNumbers = $countNumbers - 1;
            $maxOperations = $maxNumbers - 1;

            $specification = '';

            // generate random numbers
            for ($i = 0; $i <= $maxNumbers; $i++) {
                // generate a random number
                $number = RandomSupport::getRandomNumber($range, $level);
                // add the number to the array
                $numbers[] = $number;
            }

            // generate a random operation
            for ($j = 0; $j <= $maxOperations; $j++) {
                // generate a random operation
                $operation = RandomSupport::getRandomSign($rangeOperations);
                // add the operation to the array
                $operations[] = $operation['sign'];
            }

            // create a specification
            for ($i = 0; $i <= $maxNumbers; $i++) {
                // create a raw specification for calculation
                $specification .= $numbers[$i] . ($i < $maxNumbers ? $operations[$i] : '');
            }

            // add parentheses to the expression
            if ($withParentheses) {
                $specification = self::addParentheses($specification, count($operations));
            }

            // get the result of the specification
            // eval() is used to calculate the result of the specification
            $result = $specification != '' ? eval('return ' . $specification . ';') : '';
        } while ($onlyPositiveValues && $result < 0);

        return [
            'raw' => $specification,
            'formatted' => self::getSpecificationFormatted($specification),
            'result' => $result,
        ];
    }

    /**
     * Get formatted specification
     * This method formats the specification for better readability
     *
     * Spaces are added before and after the operators
     * String operators are replaced with their symbols
     * Decimal point is replaced with a comma
     */

    public static function getSpecificationFormatted($specification): string
    {
        // add space before and after the operators
        $format = preg_replace('/([+\-\/*^])/', ' $1 ', $specification);
        // replace multiplication and division operators with their symbols
        $format = Str::replace(['*', '/'], ['×', '÷'], $format);
        // replace decimal point with comma
        $format = Str::replace('.', ',', $format);

        return $format;
    }

    /**
     * Add parentheses to the expression
     * This method add parentheses to the expression. In BETA only for first two operands!
     * If the number of operands is 1 (only single operation), no parentheses need to be added
     */

    private static function addParentheses($expression, $operationsCount): string
    {
        // Split the string into individual operands and operators
        $operands = preg_split('/\s*([-+*\/])\s*/', $expression, -1, PREG_SPLIT_DELIM_CAPTURE);

        // If the number of operands is 1 (only single operation), no parentheses need to be added
        if ($operationsCount <= 1) {
            return $expression;
        }

        // Initialize the resulting expression with the first two operands and the operator
        $expression_with_parentheses = '(' . $operands[0] . $operands[1] . $operands[2] . ')';

        // Iterate over the remaining operands and operators
        for ($i = 3; $i < count($operands); $i += 2) {
            // Add the next operator and operand to the resulting expression
            $expression_with_parentheses .= ' ' . $operands[$i] . ' ' . $operands[$i + 1];
        }

        return $expression_with_parentheses;
    }
}
