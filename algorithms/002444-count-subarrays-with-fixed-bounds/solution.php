<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $minK
     * @param Integer $maxK
     * @return Integer
     */
    function countSubarrays($nums, $minK, $maxK) {
        $start = 0;
        $lastMin = -1;
        $lastMax = -1;
        $count = 0;
        $n = count($nums);

        for ($i = 0; $i < $n; $i++) {
            $num = $nums[$i];
            if ($num < $minK || $num > $maxK) {
                $start = $i + 1;
                $lastMin = -1;
                $lastMax = -1;
            } else {
                if ($num == $minK) {
                    $lastMin = $i;
                }
                if ($num == $maxK) {
                    $lastMax = $i;
                }
                if ($lastMin != -1 && $lastMax != -1) {
                    $count += max(0, min($lastMin, $lastMax) - $start + 1);
                }
            }
        }
        return $count;
    }
}