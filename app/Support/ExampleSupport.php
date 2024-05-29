<?php

namespace App\Support;

use Illuminate\Support\Str;
use InvalidArgumentException;

class ExampleSupport
{

    /**
     * Save the answer
     * Normalize the answer, check if it is correct and update the example
     */

    public static function saveAnswer($example, $answer)
    {
        // normalize the answer
        $answer = Str::replace(' ', '', $answer);
        $answer = Str::replace('.', ',', $answer);

        // check if the answer is correct
        if ($answer === '') {
            $isCorrect = null;
        } else {
            $isCorrect = $answer === $example->result ? 1 : 0;
        }

        // update the example
        $example->update([
            'answer' => $answer,
            'is_correct' => $isCorrect,
        ]);
    }

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

        // check if divide operation is allowed
        $isDivideAllowed = in_array('divide', $rangeOperations) ? true : false;

        // if isDivideAllowed is true, set the minimum value to 1 (min is 1 not 0)
        $range['min'] = $isDivideAllowed && $range['min'] == 0 ? 1 : $range['min'];

        do {
            $specification = [];
            $maxNumbers = $countNumbers - 1;

            // every number is followed by an operation, except the last number
            for ($i = 0; $i <= $maxNumbers; $i++) {
                // generate a random number
                do {
                    // get a random number
                    $number = RandomSupport::getRandomNumber($range, $level);
                    // if isDivideAllowed is true, repeat the process until the number is not 0
                } while ($isDivideAllowed && $number == 0);

                // add the number to the array
                $specification[] = $number;

                // if not the last number, add a random operation
                if ($i < $maxNumbers) {
                    $specification[] = RandomSupport::getRandomSign($rangeOperations)['sign'];
                }
            }

            // if withParentheses is true, add parentheses
            if ($withParentheses) {
                $specification = self::addParentheses($specification);
            }

            // get the result of the specification
            $result = self::getResult($specification, $range['decimals']);

            // if onlyPositiveValues is true, repeat the process until the result is positive
        } while ($onlyPositiveValues && $result < 0);

        return [
            'specification' => $specification,
            'specification_formatted' => self::getSpecificationFormatted($specification),
            'result' => $result,
        ];
    }

    /**
     * Add parentheses to the expression
     * This method add parentheses to the expression.
     */
    private static function addParentheses($specification): array
    {
        $count = count($specification);
        $specificationWithParentheses = $specification;

        // two numbers and one operation
        if ($count == 3) {
            return $specification;
        } else {
            // three numbers and two operations
            if ($count == 5) {
                $specificationWithParentheses = ['(', $specification[0], $specification[1], $specification[2], ')', $specification[3], $specification[4]];
            }
            // four numbers and three operations
            if ($count == 7) {
                $specificationWithParentheses = ['(', $specification[0], $specification[1], $specification[2], ')', $specification[3], '(', $specification[4], $specification[5], $specification[6], ')'];
            }
            // five numbers and four operations
            if ($count == 9) {
                $specificationWithParentheses = ['(', $specification[0], $specification[1], $specification[2], ')', $specification[3], '(', $specification[4], $specification[5], $specification[6], ')', $specification[7], $specification[8]];
            }

            return $specificationWithParentheses;
        }
    }

    /**
     * Get result of the specification
     * This method calculates the result of the specification
     */
    private static function getResult($specification, $decimals = 0): string
    {
        $specificationForEvaluation = implode($specification);

        // get the result of the specification
        // eval() is used to calculate the result of the specification
        $result = $specification ? eval('return ' . $specificationForEvaluation . ';') : '';

        // if result is float, fix the number of decimals
        if (is_float($result)) {
            $result = number_format($result, $decimals, ',', '');
        }

        return $result;
    }

    /**
     * Get formatted specification
     * This method formats the specification for better readability
     *
     * Spaces are added before and after the operators
     * String operators are replaced with their symbols
     * Decimal point is replaced with a comma
     */
    private static function getSpecificationFormatted($specification): string
    {
        $specificationString = implode($specification);

        // add space before and after the operators
        $format = preg_replace('/([+\-\/*^])/', ' $1 ', $specificationString);
        // replace multiplication and division operators with their symbols
        $format = Str::replace(['*', '/'], ['×', ':'], $format);
        // replace decimal point with comma
        $format = Str::replace('.', ',', $format);

        return $format;
    }
}
