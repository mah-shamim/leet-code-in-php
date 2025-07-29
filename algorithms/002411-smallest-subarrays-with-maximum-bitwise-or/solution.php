<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer[]
     */
    function smallestSubarrays($nums) {
        $n = count($nums);
        $ans = array_fill(0, $n, 0);
        $next_occurrence = array_fill(0, 32, -1);
        $curOR = 0;

        for ($i = $n - 1; $i >= 0; $i--) {
            $num = $nums[$i];

            for ($b = 0; $b < 32; $b++) {
                if ($num & (1 << $b)) {
                    $next_occurrence[$b] = $i;
                }
            }

            $curOR |= $num;

            $max_j = $i;
            for ($b = 0; $b < 32; $b++) {
                if ($curOR & (1 << $b)) {
                    if ($next_occurrence[$b] > $max_j) {
                        $max_j = $next_occurrence[$b];
                    }
                }
            }

            $ans[$i] = $max_j - $i + 1;
        }

        return $ans;
    }
}