<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer[][] $queries
     * @return Integer
     */
    function minZeroArray($nums, $queries) {
        $n = count($nums);
        $m = count($queries);
        $low = 0;
        $high = $m;
        $ans = -1;

        while ($low <= $high) {
            $mid = (int)(($low + $high) / 2);
            $diff = array_fill(0, $n + 1, 0);

            // Apply all queries up to mid-1
            for ($j = 0; $j < $mid; $j++) {
                $l = $queries[$j][0];
                $r = $queries[$j][1];
                $val = $queries[$j][2];
                $diff[$l] += $val;
                if ($r + 1 < $n) {
                    $diff[$r + 1] -= $val;
                }
            }

            // Compute prefix sum and check against nums
            $current_sum = 0;
            $possible = true;
            for ($i = 0; $i < $n; $i++) {
                $current_sum += $diff[$i];
                if ($current_sum < $nums[$i]) {
                    $possible = false;
                    break;
                }
            }

            if ($possible) {
                $ans = $mid;
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }

        return ($ans != -1) ? $ans : -1;
    }
}