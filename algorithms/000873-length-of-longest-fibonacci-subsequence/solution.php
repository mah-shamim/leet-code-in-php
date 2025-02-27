<?php

class Solution {

    /**
     * @param Integer[] $arr
     * @return Integer
     */
    function lenLongestFibSubseq($arr) {
        $n = count($arr);
        if ($n < 3) return 0;

        $valueMap = array();
        // Store indices of values in arr for quick lookup
        foreach ($arr as $i => $val) {
            $valueMap[$val] = $i;
        }

        $max = 0;
        $dp = array_fill(0, $n, array_fill(0, $n, 2));

        // Dynamic programming approach
        for ($k = 0; $k < $n; $k++) {
            for ($j = 0; $j < $k; $j++) {
                $diff = $arr[$k] - $arr[$j]; // Previous term in Fibonacci sequence
                if (isset($valueMap[$diff])) {
                    $i = $valueMap[$diff];
                    if ($i < $j) {
                        $dp[$j][$k] = $dp[$i][$j] + 1;
                        if ($dp[$j][$k] > $max) {
                            $max = $dp[$j][$k];
                        }
                    }
                }
            }
        }

        return $max >= 3 ? $max : 0;
    }
}