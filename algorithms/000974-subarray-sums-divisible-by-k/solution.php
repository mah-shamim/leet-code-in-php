<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Integer
     */
    function subarraysDivByK($nums, $k) {
        $n = count($nums);
        $prefixMod = 0;
        $result = 0;

        // There are k mod groups 0...k-1.
        $modGroups = array_fill(0, $k, 0);
        $modGroups[0] = 1;

        foreach ($nums as $num) {
            // Take modulo twice to avoid negative remainders.
            $prefixMod = ($prefixMod + $num % $k + $k) % $k;
            // Add the count of subarrays that have the same remainder as the current
            // one to cancel out the remainders.
            $result += $modGroups[$prefixMod];
            $modGroups[$prefixMod]++;
        }

        return $result;
    }
}