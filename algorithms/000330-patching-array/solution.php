<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $n
     * @return Integer
     */
    function minPatches($nums, $n) {
        $ans = 0;
        $i = 0;       // nums' index
        $miss = 1;    // the minimum sum in [1, n] we might miss

        while ($miss <= $n) {
            if ($i < count($nums) && $nums[$i] <= $miss) {
                $miss += $nums[$i++];
            } else {
                // Greedily add `miss` itself to increase the range from
                // [1, miss) to [1, 2 * miss).
                $miss += $miss;
                ++$ans;
            }
        }

        return $ans;
    }
}