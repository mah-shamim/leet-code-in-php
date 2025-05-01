<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function countSubarrays($nums, $k) {
        $max = max($nums);
        $indices = array();
        foreach ($nums as $i => $num) {
            if ($num == $max) {
                $indices[] = $i;
            }
        }
        $m = count($indices);
        if ($m < $k) {
            return 0;
        }
        $n = count($nums);
        $total = 0;
        for ($j = $k - 1; $j < $m; $j++) {
            $i = $j - $k + 1;
            $prev = ($i > 0) ? $indices[$i - 1] : -1;
            $left = $indices[$i] - $prev;
            $right = $n - $indices[$j];
            $total += $left * $right;
        }
        return $total;
    }
}