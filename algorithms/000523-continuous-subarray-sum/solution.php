<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $k
     * @return Boolean
     */
    function checkSubarraySum($nums, $k) {
        $prefixMod = 0;
        $modSeen = array();
        $modSeen[0] = -1;

        for ($i = 0; $i < count($nums); $i++) {
            $prefixMod = ($prefixMod + $nums[$i]) % $k;

            if (array_key_exists($prefixMod, $modSeen)) {
                // ensures that the size of subarray is atleast 2
                if ($i - $modSeen[$prefixMod] > 1) {
                    return 1;
                }
            } else {
                // mark the value of prefixMod with the current index.
                $modSeen[$prefixMod] = $i;
            }
        }

        return 0;
    }
}