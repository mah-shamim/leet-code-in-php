<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function countPairs($nums, $k) {
        $count = 0;
        $n = count($nums);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = $i + 1; $j < $n; $j++) {
                if ($nums[$i] == $nums[$j] && ($i * $j) % $k == 0) {
                    $count++;
                }
            }
        }
        return $count;
    }
}