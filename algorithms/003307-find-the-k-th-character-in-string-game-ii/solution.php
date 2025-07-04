<?php

class Solution {

    /**
     * @param Integer $k
     * @param Integer[] $operations
     * @return String
     */
    function kthCharacter($k, $operations) {
        $n = count($operations);
        $total_shift = 0;
        $exp = $n;  // Exponent representing current string length = 2^$exp

        for ($i = $n - 1; $i >= 0; $i--) {
            if ($exp - 1 < 48) {
                $half = 1 << ($exp - 1);
                if ($k > $half) {
                    $k -= $half;
                    if ($operations[$i] == 1) {
                        $total_shift++;
                    }
                }
            }
            $exp--;
        }

        $total_shift %= 26;
        return chr(ord('a') + $total_shift);
    }
}