<?php

class Solution {

    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer
     */
    function getCommon(array $nums1, array $nums2): int
    {
        $i = 0;
        $j = 0;
        $len1 = count($nums1);
        $len2 = count($nums2);

        while ($i < $len1 && $j < $len2) {
            if ($nums1[$i] == $nums2[$j]) {
                return $nums1[$i];
            } elseif ($nums1[$i] < $nums2[$j]) {
                $i++;
            } else {
                $j++;
            }
        }

        return -1;
    }
}