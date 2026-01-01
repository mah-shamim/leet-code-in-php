<?php

class Solution {

    /**
     * @param Integer[] $digits
     * @return Integer[]
     */
    function plusOne($digits) {
        $carry = 1;  // We're adding 1
        $n = count($digits);

        for ($i = $n - 1; $i >= 0; $i--) {
            $sum = $digits[$i] + $carry;
            $digits[$i] = $sum % 10;
            $carry = floor($sum / 10);

            // Early exit if no carry
            if ($carry === 0) {
                return $digits;
            }
        }

        // If carry remains after processing all digits
        if ($carry > 0) {
            array_unshift($digits, $carry);
        }

        return $digits;
    }
}