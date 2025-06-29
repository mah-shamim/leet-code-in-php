<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    function numSubseq($nums, $target) {
        $mod = 1000000007;
        sort($nums);
        $n = count($nums);

        $pow2 = array_fill(0, $n, 1);
        for ($i = 1; $i < $n; $i++) {
            $pow2[$i] = ($pow2[$i-1] * 2) % $mod;
        }

        $j = $n - 1;
        $ans = 0;
        for ($i = 0; $i < $n; $i++) {
            while ($j >= $i && $nums[$i] + $nums[$j] > $target) {
                $j--;
            }
            if ($j < $i) {
                break;
            }
            $ans = ($ans + $pow2[$j - $i]) % $mod;
        }

        return $ans;
    }
}