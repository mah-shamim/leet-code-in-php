<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function longestBalanced(array $nums): int
    {
        $n = count($nums);
        $max_len = 0;

        for ($i = 0; $i < $n; $i++) {
            $even_set = [];
            $odd_set = [];

            for ($j = $i; $j < $n; $j++) {
                if ($nums[$j] % 2 == 0) {
                    $even_set[$nums[$j]] = true;
                } else {
                    $odd_set[$nums[$j]] = true;
                }

                if (count($even_set) == count($odd_set)) {
                    $max_len = max($max_len, $j - $i + 1);
                }
            }
        }

        return $max_len;
    }
}