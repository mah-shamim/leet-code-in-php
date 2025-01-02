<?php

class Solution {

    /**
     * @param String $expression
     * @return String
     */
    function fractionAddition($expression) {
        // Match fractions with regex
        preg_match_all('/[+-]?[0-9]+\/[0-9]+/', $expression, $matches);
        $fractions = $matches[0];

        // Start with a base fraction of 0/1
        $numerator = 0;
        $denominator = 1;

        foreach ($fractions as $fraction) {
            list($num, $den) = explode('/', $fraction);
            list($numerator, $denominator) = $this->addFractions($numerator, $denominator, intval($num), intval($den));
        }

        // Return the result as a fraction
        return $numerator . '/' . $denominator;

    }

    /**
     * @param $a
     * @param $b
     * @return float|int
     */
    function gcd($a, $b) {
        while ($b != 0) {
            $temp = $b;
            $b = $a % $b;
            $a = $temp;
        }
        return abs($a);
    }

    /**
     * @param $numerator1
     * @param $denominator1
     * @param $numerator2
     * @param $denominator2
     * @return float[]|int[]
     */
    function addFractions($numerator1, $denominator1, $numerator2, $denominator2) {
        // Find the common denominator
        $commonDenominator = $denominator1 * $denominator2;
        $newNumerator = $numerator1 * $denominator2 + $numerator2 * $denominator1;

        // Simplify the fraction
        $commonGCD = $this->gcd($newNumerator, $commonDenominator);
        $simplifiedNumerator = $newNumerator / $commonGCD;
        $simplifiedDenominator = $commonDenominator / $commonGCD;

        return [$simplifiedNumerator, $simplifiedDenominator];
    }

}