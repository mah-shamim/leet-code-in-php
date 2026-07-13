<?php

class Solution {

    /**
     * @param Integer $low
     * @param Integer $high
     * @return Integer[]
     */
    function sequentialDigits(int $low, int $high): array
    {
        $result = [];

        // Start from digit 1 through 9
        for ($start = 1; $start <= 9; $start++) {
            $num = $start;
            $nextDigit = $start + 1;

            // Build sequential numbers
            while ($nextDigit <= 9 && $num <= $high) {
                $num = $num * 10 + $nextDigit;

                if ($num >= $low && $num <= $high) {
                    $result[] = $num;
                }

                $nextDigit++;
            }
        }

        sort($result);
        return $result;
    }
}