<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function largestDivisibleSubset($nums) {
        sort($nums);
        $n = count($nums);
        if ($n == 0) {
            return [];
        }
        $dp = array_fill(0, $n, 1);
        $prev = array_fill(0, $n, -1);
        $max_len = 1;
        $max_idx = 0;

        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $i; $j++) {
                if ($nums[$i] % $nums[$j] == 0) {
                    if ($dp[$j] + 1 > $dp[$i]) {
                        $dp[$i] = $dp[$j] + 1;
                        $prev[$i] = $j;
                    }
                }
            }
            if ($dp[$i] > $max_len) {
                $max_len = $dp[$i];
                $max_idx = $i;
            }
        }

        $result = [];
        $idx = $max_idx;
        while ($idx != -1) {
            array_unshift($result, $nums[$idx]);
            $idx = $prev[$idx];
        }

        return $result;
    }
}