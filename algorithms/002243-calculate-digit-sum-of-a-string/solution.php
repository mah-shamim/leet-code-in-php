<?php

class Solution {

    /**
     * @param String $s
     * @param Integer $k
     * @return String
     */
    function digitSum(string $s, int $k): string
    {
        while (strlen($s) > $k) {
            $newS = '';
            $n = strlen($s);

            for ($i = 0; $i < $n; $i += $k) {
                $sum = 0;
                $end = min($i + $k, $n);

                for ($j = $i; $j < $end; $j++) {
                    $sum += ord($s[$j]) - ord('0');
                }

                $newS .= (string) $sum;
            }

            $s = $newS;
        }

        return $s;
    }
}