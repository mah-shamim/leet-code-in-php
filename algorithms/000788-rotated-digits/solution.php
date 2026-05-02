<?php

class Solution {

    /**
     * @param Integer $n
     * @return Integer
     */
    function rotatedDigits(int $n): int
    {
        $count = 0;

        for ($i = 1; $i <= $n; $i++) {
            if ($this->isGood($i)) {
                $count++;
            }
        }

        return $count;
    }

    /**
     * Check if a number is "good"
     *
     * @param Integer $num
     * @return bool
     */
    function isGood(int $num): bool
    {
        $hasRotating = false;

        while ($num > 0) {
            $digit = $num % 10;

            // If digit is invalid (3,4,7) → not good
            if ($digit == 3 || $digit == 4 || $digit == 7) {
                return false;
            }

            // If digit is 2,5,6,9 → will change when rotated
            if ($digit == 2 || $digit == 5 || $digit == 6 || $digit == 9) {
                $hasRotating = true;
            }

            $num = (int)($num / 10);
        }

        // Good if we have at least one digit that rotates to a different digit
        return $hasRotating;
    }
}