<?php

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer
     */
    function maxDistance(array $nums1, array $nums2): int
    {
        $i = 0;
        $j = 0;
        $ans = 0;
        $n = count($nums1);
        $m = count($nums2);

        while ($i < $n && $j < $m) {
            if ($nums1[$i] <= $nums2[$j]) {
                // current pair (i,j) is valid
                if ($j >= $i) {
                    $ans = max($ans, $j - $i);
                }
                // try to increase j for same i
                $j++;
            } else {
                // move i to try to satisfy condition
                $i++;
                // ensure j >= i for future checks
                if ($j < $i) {
                    $j = $i;
                }
            }
        }

        return $ans;
    }
}