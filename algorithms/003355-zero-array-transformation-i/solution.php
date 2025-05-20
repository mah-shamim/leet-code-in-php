<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer[][] $queries
     * @return Boolean
     */
    function isZeroArray($nums, $queries) {
        $n = count($nums);
        $diff = array_fill(0, $n + 1, 0);

        foreach ($queries as $q) {
            $l = $q[0];
            $r = $q[1];
            $diff[$l]++;
            if ($r + 1 < $n) {
                $diff[$r + 1]--;
            }
        }

        $current = 0;
        $Q = array();
        for ($i = 0; $i < $n; $i++) {
            $current += $diff[$i];
            $Q[$i] = $current;
        }

        foreach ($nums as $i => $val) {
            if ($Q[$i] < $val) {
                return false;
            }
        }

        $sum_ranges = 0;
        foreach ($queries as $q) {
            $l = $q[0];
            $r = $q[1];
            $sum_ranges += ($r - $l + 1);
        }

        $sum_nums = array_sum($nums);
        if ($sum_nums > $sum_ranges) {
            return false;
        }

        return true;
    }
}