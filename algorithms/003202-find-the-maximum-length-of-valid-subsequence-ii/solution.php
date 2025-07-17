<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function maximumLength($nums, $k) {
        $n = count($nums);
        $ans = 0;
        for ($val = 0; $val < $k; $val++) {
            $dp = array_fill(0, $k, 0);
            for ($i = 0; $i < $n; $i++) {
                $r = $nums[$i] % $k;
                $s = ($k + $val - $r) % $k;
                $candidate = 1;
                if ($dp[$s] > 0) {
                    $candidate = $dp[$s] + 1;
                }
                if ($candidate > $dp[$r]) {
                    $dp[$r] = $candidate;
                }
                if ($dp[$r] > $ans) {
                    $ans = $dp[$r];
                }
            }
        }
        return $ans;
    }
}