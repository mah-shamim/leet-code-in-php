<?php

class Solution {

    /**
     * @param String $n
     * @return Integer
     */
    function minPartitions(string $n): int
    {
        $maxDigit = 0;
        $len = strlen($n);
        for ($i = 0; $i < $len; $i++) {
            // current digit as integer
            $digit = (int) $n[$i];
            if ($digit > $maxDigit) {
                $maxDigit = $digit;
                // if we already reached the maximum possible digit (9), we can stop
                if ($maxDigit == 9) {
                    break;
                }
            }
        }
        return $maxDigit;
    }
}