<?php

class Solution {

    /**
     * @param Integer[] $code
     * @param Integer $k
     * @return Integer[]
     */
    function decrypt($code, $k) {
        $n = count($code);
        $result = array_fill(0, $n, 0);

        if ($k === 0) {
            return $result; // If k is 0, all elements become 0.
        }

        for ($i = 0; $i < $n; $i++) {
            $sum = 0;

            // Determine direction and range of elements to sum
            if ($k > 0) {
                for ($j = 1; $j <= $k; $j++) {
                    $sum += $code[($i + $j) % $n]; // Wrap around using modulo
                }
            } else { // k < 0
                for ($j = 1; $j <= abs($k); $j++) {
                    $sum += $code[($i - $j + $n) % $n]; // Wrap around backward using modulo
                }
            }

            $result[$i] = $sum;
        }

        return $result;
    }
}